<?php

namespace App\Http\Services;

use App\Models\News;
use Exception;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class NewService
{
    public function get()
    {
        Paginator::useBootstrap();
        $news = News::with('admin')
            ->where('active', 1)
            ->orderByDesc('created_at')
            ->paginate(4);
        return $news;
    }
    public function getAll()
    {
        Paginator::useBootstrap();
        $news = News::with('admin')
            ->orderByDesc('created_at')
            ->paginate(6);
        return $news;
    }
    public function saveNew($request)
    {
        $admin_id = Auth::guard('admin')->id();
        try {
            $image = $request->file('image');
            $image->move(base_path('public/image/new'), $image->getClientOriginalName());
            $title = (string) $request->input('title');
            $description = (string) $request->input('description');
            $seo_description = (string) $request->input('seo_description');
            $slug = Str::slug($request->input('title'), '-');
            $active = $request->active;

            $save = new News();
            $save->image = $image->getClientOriginalName();
            $save->title = $title;
            $save->description = $description;
            $save->seo_description = $seo_description;
            $save->slug = $slug;
            $save->active = $active;
            $save->admin_id = $admin_id;

            $save->save();

            Session::flash('success', 'Thêm bài viết thành công');
        } catch (Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }
    public function update($request, $news)
    {
        try {
            $input = $request->all();
            $image = $request->file('image');
            if ($image) {
                $fileName = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move(base_path('public/image/new'), $fileName);

                $input['image'] = "$fileName";
            } else {
                unset($input['image']);
            }
            $news->update($input);

            Session::flash('success', 'Cập nhật thành công');
        } catch (Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }
    public function getDetail($id)
    {
        return News::with('admin')
            ->where('active', 1)
            ->where('id',$id)
            ->firstOrFail();
    }
}
