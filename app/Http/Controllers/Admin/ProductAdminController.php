<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Services\ProductService;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductAdminController extends Controller
{
    protected $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function index()
    {
        return view('admins.product.index', [
            'title' => 'Danh sách sản phẩm',
            'products' => $this->productService->get(),
            'cate' => $this->productService->getCategory()
        ]);
    }
    public function create()
    {
        return view('admins.product.create', [
            'title' => 'Thêm sản phẩm',
            'cate' => $this->productService->getCategory()
        ]);
    }

    public function store(ProductRequest $request)
    {
        $result = $this->productService->create($request);
        if ($result) {
            return redirect('quan-li/san-pham/danh-sach');
        }
        return redirect()->back();
    }
    public function show(Product $product)
    {
        return view('admins.product.update', [
            'title' => 'Cập nhật sản phẩm',
            'product' => $product,
            'cate' => $this->productService->getCategory()
        ]);
    }
    public function update(Request $request, Product $product)
    {
        $result = $this->productService->update($request, $product);
        if ($result) {
            return redirect('quan-li/san-pham/danh-sach');
        }
        return redirect()->back();
    }
    public function changeActive(Request $request)
    {
        $pr = Product::find($request->id);
        $pr->active = $request->active;
        $pr->updated_at = Carbon::now();
        $pr->save();
        return response()->json(['success' => 'Trạng thái đã được cập nhật']);
    }
    public function searchName(Request $request)
    {
        return view('admins.product.index', [
            'title' => "Kết quả tìm kiếm",
            'products' => $this->productService->searchName($request),
        ]);
    }
    public function productHide(Request $request)
    {
        $data = Product::where('active', 0)->paginate(6);
        return view('admins.product.hide',[
            'title'=>'Danh sách sản phẩm bị ẩn',
            'products'=>$data
        ]);
    }
}
