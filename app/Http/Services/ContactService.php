<?php

namespace App\Http\Services;

use App\Models\Category;
use App\Models\Contact;
use Exception;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ContactService
{
    public function getCategory()
    {
        $cate = DB::table('categories')->where('active', 1)->get();
        return $cate;
    }
    public function save($request)
    {
        try {
            Contact::create([
                'name' => (string)$request->input('name'),
                'email' =>(string) $request->input('email'),
                'phone' =>(string) $request->input('phone'),
                'message' =>(string) $request->input('message')
            ]);
            Session::flash('success', 'Cảm ơn quý khách đã liên hệ. Chúng tôi sẽ phản hồi bạn sớm!');
        } catch (Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }
    public function getAll()
    {
        Paginator::useBootstrap();
        $list=DB::table('contacts')->paginate(6);

        return $list;
    }
    // public function getList()
    // {
    //     $categories = DB::table('categories')->get();
    //     return $categories;
    //     // return Category::orderbyDesc('id');
    // }
    // public function get()
    // {
    //     $categories = DB::table('categories')->where('active',1)->get();
    //     return $categories;
    //     // return Category::orderbyDesc('id');
    // }
    // public function create($request)
    // {
    //     try {
    //         Category::create([
    //             'name' => (string) $request->input('name'),
    //             'description' => (string) $request->input('description'),
    //             'slug' => Str::slug($request->input('name'), '-'),
    //             'active' => (int) $request->input('active')

    //         ]);
    //         Session::flash('success', 'Thêm danh mục thành công');
    //     } catch (Exception $err) {
    //         Session::flash('error', $err->getMessage());
    //         return false;
    //     }
    //     return true;
    // }
    // public function update($request, $categories)
    // {
    //     try {
    //         $categories->fill($request->input());
    //         $categories->save();
    //     } catch (Exception $err) {
    //         Session::flash('error', 'Có lỗi vui lòng thử lại');
    //         Log::info($err->getMessage());
    //         return false;
    //     }
    //     return true;
    // }
}
