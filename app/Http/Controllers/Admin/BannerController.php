<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\BannerService;
use App\Models\Banner;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    protected $bannerService;
    public function __construct(BannerService $bannerService)
    {
        $this->bannerService = $bannerService;
    }
    public function index()
    {
        return view('admins.banner.index', [
            'title' => 'Danh sách banner',
            'listBanner' => $this->bannerService->getAll()
        ]);
    }
    public function create()
    {
        return view('admins.banner.create', [
            'title' => "Thêm banner",
        ]);
    }
    public function store(Request $request)
    {
        $result = $this->bannerService->create($request);

        return redirect('quan-li/quang-cao/danh-sach');
    }
    public function show(Banner $banner)
    {
        return view('admins.banner.update', [
            'title' => 'Cập nhật thông tin',
            'banner' => $banner
        ]);
    }
    public function update(Request $request, Banner $banner)
    {
        $result = $this->bannerService->update($request, $banner);
        if ($request) {
            return redirect('quan-li/quang-cao/danh-sach');
        }
        return redirect()->back();
    }
    public function changeStatusBanner(Request $request)
    {
        $cate = Banner::find($request->id);
        $cate->active = $request->active;
        $cate->updated_at = Carbon::now();
        $cate->save();
        return response()->json(['success' => 'Trạng thái đã được cập nhật']);
    }
    public function delete($id)
    {
        $banner=Banner::find($id);

        $banner->delete();

        return redirect()->route('indexBanner')
            ->with('success', 'Quảng cáo đã được xóa thành công');
    }
}
