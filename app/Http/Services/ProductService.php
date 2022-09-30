<?php

namespace App\Http\Services;

use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductService
{
    // Home
    public function getAll($request)
    {
        Paginator::useBootstrap();
        $listProduct = DB::table('categories')
            ->join('products', 'categories.id', '=', 'products.category_id')
            ->where('products.active', 1)
            ->where('categories.active', 1)
            ->paginate(6);
        $saleDesc = DB::table('categories')
            ->join('products', 'categories.id', '=', 'products.category_id')
            ->where('products.active', 1)
            ->where('categories.active', 1)
            ->orderByDesc('products.sale')
            ->paginate(6);
        $saleAsc = DB::table('categories')
            ->join('products', 'categories.id', '=', 'products.category_id')
            ->where('products.active', 1)
            ->where('categories.active', 1)
            ->orderBy('products.sale', 'asc')
            ->paginate(6);
        $newPr = DB::table('categories')
            ->join('products', 'categories.id', '=', 'products.category_id')
            ->where('products.active', 1)
            ->where('categories.active', 1)
            ->orderBy('products.created_at', 'desc')
            ->paginate(6);
        $salePr = DB::table('categories')
            ->join('products', 'categories.id', '=', 'products.category_id')
            ->where('products.active', 1)
            ->where('categories.active', 1)
            ->whereColumn('products.sale', '<', 'products.price')
            ->paginate(6);
        $luachon = $request->order_by;
        if ($luachon == "") {
            return $listProduct;
        } elseif ($luachon == "giam_dan") {
            return $saleDesc;
        } elseif ($luachon == "tang_dan") {
            return $saleAsc;
        } elseif ($luachon == "moi_nhat") {
            return $newPr;
        } elseif ($luachon == "khuyen_mai") {
            return $salePr;
        }

        return $listProduct;
    }
    public function getCategory()
    {
        $cate = DB::table('categories')->where('active', 1)->get();
        return $cate;
    }
    public function getNameCategory($cateId)
    {
        return Product::where('category_id', $cateId)
            ->where('active', 1)
            ->with('category')
            ->firstOrFail();
    }
    public function getDetail($id)
    {
        return Product::where('id', $id)
            ->where('active', 1)
            ->with('category')
            ->firstOrFail();
    }
    public function getId($id)
    {
        return Category::where('id', $id)->where('active', 1)->first();
    }
    public function getProductId($request, $id)
    {
        Paginator::useBootstrap();
        $pr = Product::where('category_id', $id)
            ->where('active', 1)
            ->paginate(6);
        $saleDesc = Product::where('category_id', $id)
            ->where('active', 1)
            ->orderByDesc('sale')
            ->paginate(6);
        $saleAsc = Product::where('category_id', $id)
            ->where('active', 1)
            ->orderBy('sale', 'asc')
            ->paginate(6);
        $newPr = Product::where('category_id', $id)
            ->where('active', 1)
            ->orderByDesc('created_at')
            ->paginate(6);
        $salePr = Product::where('category_id', $id)
            ->where('active', 1)
            ->whereColumn('sale', '<', 'price')
            ->paginate(6);
        $luachon = $request->order_by;
        if ($luachon == "") {
            return $pr;
        } elseif ($luachon == "giam_dan") {
            return $saleDesc;
        } elseif ($luachon == "tang_dan") {
            return $saleAsc;
        } elseif ($luachon == "moi_nhat") {
            return $newPr;
        } elseif ($luachon == "khuyen_mai") {
            return $salePr;
        }
    }
    public function getRelatedProduct($id)
    {
        $id1 = Product::where('id', $id)->pluck('category_id');;
        $related = DB::table('categories')
            ->join('products', 'categories.id', '=', 'products.category_id')
            ->where('products.category_id',  $id1)
            ->where('products.id', '!=', $id)
            ->limit(4)
            ->get();

        return $related;
    }
    public function addToCart($request, $id)
    {
        $product = DB::table('products')->find($id);
        $cart = Session::get('cart');
        $cart[$product[0]->id] = array(
            "id" => $product[0]->id,
            "nama" => $product[0]->nama_product,
            "harga" => $product[0]->harga,
            "pict" => $product[0]->pict,
            "qty" => 1,
        );

        Session::put('cart', $cart);
        Session::flash('success', 'barang berhasil ditambah ke keranjang!');
        //dd(Session::get('cart'));
        return redirect()->back();
    }
    // Admin

    public function get()
    {
        Paginator::useBootstrap();
        $products = DB::table('products')
        ->where('active', 1)
        ->orderByDesc('created_at')
        ->paginate(6);
        return $products;
    }
    protected function Price($request)
    {
        if (
            $request->input('price') != 0 && $request->input('sale') != 0
            && $request->input('sale') >= $request->input('price')
        ) {
            Session::flash('error', 'Giá giảm phải nhỏ hơn giá gốc');
            return false;
        }
        if ($request->input('sale') != 0 && (int)$request->input('price') == 0) {
            Session::flash('error', 'Vui lòng nhập giá gốc');
            return false;
        }

        return  true;
    }

    public function create($request)
    {
        $isValidPrice = $this->Price($request);
        if ($isValidPrice === false) return false;
        if ($request->input('sale') == '') $sale = (int)$request->input('price');
        else $sale = (int)$request->input('sale');
        try {
            $name = (string) $request->input('name');
            $description = (string) $request->input('description');
            $seo_description = (string) $request->input('seo_description');
            $slug = Str::slug($request->input('name'), '-');
            $price = (int) $request->input('price');
            // $sale = (int) $request->input('sale');
            $producer = (string) $request->input('producer');
            $material = (string) $request->input('material');
            $category_id = (int) $request->input('category_id');
            $active = $request->input('active');
            $image = $request->file('image');
            $image->move(base_path('public/image/product'), $image->getClientOriginalName());

            $save = new Product();
            $save->image = $image->getClientOriginalName();
            $save->name = $name;
            $save->price = $price;
            $save->sale = $sale;
            $save->producer = $producer;
            $save->material = $material;
            $save->description = $description;
            $save->seo_description = $seo_description;
            $save->slug = $slug;
            $save->active = $active;
            $save->category_id = $category_id;

            $save->save();

            Session::flash('success', 'Thêm Sản phẩm thành công');
        } catch (Exception $err) {
            Session::flash('error', $err->getMessage());
            return  false;
        }

        return  true;
    }
    public function update($request, $product)
    {
        if ($request->input('sale') == '' || $request->input('sale') == 0) $sale = $request->input('price');
        else $sale = $request->input('sale');
        try {
            $input = $request->all();
            $image = $request->file('image');
            $input['sale'] = $sale;
            if ($image) {
                $fileName = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move(base_path("public/image/product"), $fileName);

                $input['image'] = "$fileName";
            } else {
                unset($input['image']);
            }
            $product->update($input);
            Session::flash('success', "Cập nhật thành công");
        } catch (Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }
    public function searchName($request)
    {
        Paginator::useBootstrap();
        $data = DB::table('products');
        if ($request->input('search')) {
            $data = $data->where('name', 'LIKE', "%" . $request->search . "%");
        }
        $data = $data->paginate(5);
        return $data;
    }
    public function hideProduct()
    {
        Paginator::useBootstrap();
        $pr = Product::where('active', 0)
            ->paginate(6);
        return $pr;
    }
    public function descProduct()
    {
        Paginator::useBootstrap();
        $pr = Product::where('active', 1)
            ->orderBy('sale', 'desc')
            ->paginate(6);
        return $pr;
    }
}
