<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function getAll(Request $request)
    {
        return view('clients.product.list-product', [
            'title' => "Tất cả sản phẩm",
            'listProduct' => $this->productService->getAll($request),
            'cate' => $this->productService->getCategory(),
        ]);
    }
    public function getProductId(Request $request,$id, $slug = '')
    {
        $nameCate = $this->productService->getNameCategory($id);
        return view('clients.product.category', [
            'title' => "Sản phẩm",
            'cate' => $this->productService->getCategory(),
            'productId' => $this->productService->getProductId($request,$id),
            'nameCate' => $nameCate
        ]);
    }
    public function getDetail($id = '', $slug = '')
    {
        $cateId = $this->productService->getDetail($id);

        return view('clients.product.detail', [
            'title' => "Chi tiết sản phẩm",
            'titleRelated' => "Sản phẩm liên quan",
            'cate' => $this->productService->getCategory(),
            'detail' => $cateId,
            'related' => $this->productService->getRelatedProduct($id)
        ]);
    }
}