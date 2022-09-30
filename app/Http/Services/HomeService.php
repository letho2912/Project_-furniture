<?php

namespace App\Http\Services;

use App\Models\Product;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class HomeService
{
    public function getNewProduct()
    {
        $newProduct = DB::table('categories')
            ->join('products', 'products.category_id', '=', 'categories.id')
            ->where('categories.active', 1)
            ->where('products.active', 1)
            ->orderByDesc('products.created_at')
            ->paginate(4);
        return $newProduct;
    }
    public function getSaleProduct()
    {
        $saleProduct = DB::table('categories')
            ->join('products', 'products.category_id', '=', 'categories.id')
            ->where('categories.active', 1)
            ->where('products.active', 1)
            ->whereColumn('price', '>', 'sale')
            ->paginate(4);
        return $saleProduct;
    }
    public function getSellProduct()
    {
        $top_sell = DB::table('products')
            ->leftJoin('orders_detail','products.id','=','orders_detail.product_id')
            ->selectRaw('products.id, SUM(orders_detail.quantity) as total')
            ->groupBy('products.id')
            ->orderBy('total','desc')
            ->take(8)
            ->get();
        $sellProduct = [];
        foreach ($top_sell as $item){
            $product = Product::findOrFail($item->id);
            $product->totalQty = $item->total;
            $sellProduct[] = $product;
        }
        return $sellProduct;
    }
    public static function getCategory()
    {
        $cate = DB::table('categories')->where('active', 1)->get();
        return $cate;
    }
    public function searchHome($request)
    {

        $data = DB::table('categories')
            ->join('products', 'categories.id', '=', 'products.category_id');
        if ($request->input('tu_khoa')) {
            $data = $data->where('products.name', 'LIKE', "%" . $request->tu_khoa . "%")
                ->orWhere('products.material', 'LIKE', "%" . $request->tu_khoa . "%")
                ->orWhere('products.producer', 'LIKE', "%" . $request->tu_khoa . "%")
                ->orWhere('categories.name', 'LIKE', "%" . $request->tu_khoa . "%");
        }
        $data = $data->paginate(8);
        return $data;
    }
}
