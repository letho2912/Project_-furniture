<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Services\CategoryService;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categorieService;

    public function __construct(CategoryService $categorieService)
    {
        $this->categorieService = $categorieService;
    }
    public function index()
    {
        return view('admins.category.index', [
            'title' => 'Danh sách danh mục',
            'titleAdd'=>'Thêm danh mục',
            'titleUpdate'=>"Cập nhật thông tin",
            'categories' => $this->categorieService->getList(),
        ]);
    }
    public function update(Request $request, Category $category)
    {
        $result=$this->categorieService->update($request,$category);
        if($request){
            return redirect('quan-li/danh-muc/danh-sach');
        }
        return redirect()->back();
    }

    public function store(CategoryRequest $request)
    {
        $result = $this->categorieService->create($request);

        return redirect()->back();
    }
    public function changeStatus(Request $request) {
        $cate = Category::find($request->id);
        $cate->active = $request->active;
        $cate->updated_at = Carbon::now();
        $cate->save();
        return response()->json(['success' => 'Trạng thái đã được cập nhật']);
    }
}
