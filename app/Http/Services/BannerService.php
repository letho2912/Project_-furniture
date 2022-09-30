<?php

namespace App\Http\Services;

use App\Models\Banner;
use Exception;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BannerService
{
    public function getAll()
    {
        Paginator::useBootstrap();
        return DB::table('banners')->orderByDesc('created_at')->paginate(5);
    }
    public function create($request)
    {
        try {
            $image = $request->file('image');
            $image->move(base_path('public/image/banner'), $image->getClientOriginalName());
            $name = (string) $request->input('name');
            $description = (string) $request->input('description');
            $location = (string) $request->input('location');
            $active = (int) $request->input('active');

            $save = new Banner();
            $save->image = $image->getClientOriginalName();
            $save->name = $name;
            $save->description = $description;
            $save->location = $location;
            $save->active = $active;

            $save->save();

            Session::flash('success', 'Thêm banner thành công');
        } catch (Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }
    public function update($request, $banners)
    {
        try {
            $input = $request->all();
            $image = $request->file('image');
            if ($image) {
                $fileName = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move(base_path('public/image/banner'), $fileName);

                $input['image'] = "$fileName";
            } else {
                unset($input['image']);
            }
            $banners->update($input);
            Session::flash('success', 'Cập nhật thành công');
        } catch (Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }
    // User
    public function getBannerMain()
    {
        return DB::table('banners')
            ->where('location', '=', 'dau-trang-chinh')
            ->where('active', 1)
            ->orderByDesc('created_at')
            ->first();
    }
    public function getBannerTop()
    {
        return DB::table('banners')
            ->where('location', '=', 'dau-trang-phu')
            ->where('active', 1)
            ->orderByDesc('created_at')
            ->limit(2)
            ->get();
    }
    public function getBannerBot()
    {
        return DB::table('banners')
            ->where('location', '=', 'than-trang')
            ->where('active', 1)
            ->orderByDesc('created_at')
            ->first();
    }
}
