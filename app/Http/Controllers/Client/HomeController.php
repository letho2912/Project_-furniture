<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Services\BannerService;
use App\Http\Services\CategoryService;
use App\Http\Services\HomeService;
use App\Http\Services\ProductService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $homeService;
    protected $productService;
    protected $categoryService;
    protected $bannerService;
    public function __construct(
        HomeService $homeService,
        ProductService $productService,
        CategoryService $categorieService,
        BannerService $bannerService
    ) {
        $this->homeService = $homeService;
        $this->productService = $productService;
        $this->categoryService = $categorieService;
        $this->bannerService = $bannerService;
    }
    public function index()
    {
        return view('clients.home', [
            'titleNew' => 'Sản phẩm mới nhất',
            'titleSale' => 'Sản phẩm khuyến mãi',
            'titleSell' => 'Sản phẩm bán chạy',
            'newProduct' => $this->homeService->getNewProduct(),
            'saleProduct' => $this->homeService->getSaleProduct(),
            'sellProduct' => $this->homeService->getSellProduct(),
            'cate' => $this->categoryService->get(),
            'bannerTopLeft' => $this->bannerService->getBannerMain(),
            'bannerTopRight' => $this->bannerService->getBannerTop(),
            'bannerBot' => $this->bannerService->getBannerBot(),
        ]);
    }
    public function searchHome(Request $request)
    {

        $result = $this->homeService->searchHome($request);
        return view('clients.product.search', [
            'title' => "Kết quả tìm kiếm",
            'cate' => $this->categoryService->get(),
            'products' => $result,
            'nameSearch'=>$request->tu_khoa
        ]);
    }
    public function service(){
        return view('clients.service.index',[
            'cate' => $this->categoryService->get(),
        ]);
    }
}
