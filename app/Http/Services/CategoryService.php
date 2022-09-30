<?php

namespace App\Http\Services;

use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CategoryService
{
    public function getList()
    {
        $categories = DB::table('categories')->orderByDesc('created_at')->get();
        return $categories;
        // return Category::orderbyDesc('id');
    }
    public function get()
    {
        $categories = DB::table('categories')
        ->where('active',1)
        ->get();
        return $categories;
    }
    public function create($request)
    {
        try {
            Category::create([
                'name' => (string) $request->input('name'),
                'description' => (string) $request->input('description'),
                'slug' => Str::slug($request->input('name'), '-'),
                'active' => (int) $request->input('active')

            ]);
            Session::flash('success', 'Thêm danh mục thành công');
        } catch (Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }
    public function update($request, $categories)
    {
        try {
            $categories->fill($request->input());
            $categories->save();
        } catch (Exception $err) {
            Session::flash('error', 'Có lỗi vui lòng thử lại');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }
}
