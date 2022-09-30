<?php

namespace App\Http\Services;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Exception;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class OrderService
{
    public function addToCart($id)
    {
        if (Auth::check()) {
            $product = Product::where('id', $id)->first();
            $cart = session()->get('cart');
            if (!$product) {
                abort(404);
            }
            // $cart = session()->get('cart');
            // if cart is empty then this the first product
            if (!$cart) {
                $cart[$id] = [
                    // $id => [
                    'id' => $product->id,
                    "name" => $product->name,
                    "quantity" => 1,
                    "sale" => $product->sale,
                    "image" => $product->image
                    // ]
                ];

                session()->put('cart', $cart);

                return redirect()->back()->with('success', 'Thêm sản phẩm thành công!');
            }
            // if cart not empty then test if this product exist then increment quantity
            if (isset($cart[$id])) {
                $cart[$id]['quantity']++;
                session()->put('cart', $cart);
                return redirect()->back()->with('success', 'Thêm sản phẩm thành công!');
            }
            // if item not exist in cart then add to cart with quantity = 1
            $cart[$id] = [
                'id' => $product->id,
                "name" => $product->name,
                "quantity" => 1,
                "sale" => $product->sale,
                "image" => $product->image
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Thêm sản phẩm thành công!');
        } else {
            Session::flash('error', 'Vui lòng đăng nhập để mua hàng');
            return redirect('/trang-chu/dang-nhap');
        }
    }
    public function update($request)
    {
        if ($request->id and $request->quantity) {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cập nhật thành công');
        }
    }

    public function remove($request)
    {
        if ($request->id) {

            $cart = session()->get('cart');

            if (isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Xóa sản phẩm thành công');
        }
    }
    public function storeOrderDetails($request)
    {
        $cart = Session::get('cart');
        try {
            $order = new Order();
            $order->user_id = auth()->user()->id;
            $order->total = $request['total'];
            $order->name = $request['name'];
            $order->address = $request['address'];
            $order->phone = $request['phone'];
            $order->note = $request['note'];
            $order->save();

            if (count($cart) > 0) {
                foreach (Session::get('cart') as $id => $cart) {
                    $orderItem = new OrderDetail();
                    $orderItem->order_id = $order->id;
                    $orderItem->product_id = $id;
                    $orderItem->quantity = $cart['quantity'];
                    $orderItem->price = $cart['sale'];
                    $orderItem->save();
                }
            }
        } catch (Exception) {
            Session::flash('err', "Vui lòng điền đủ thông tin");
        }
        // return $order;
        $request->session()->forget('cart');
    }
    // admin 
    public function getAll($request)
    {
        Paginator::useBootstrap();
        $listOrder = DB::table('users')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->paginate(8);
        $cancel = DB::table('users')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->where('orders.status', '=', 'Hủy')
            ->paginate(8);
        $vanchuyen = DB::table('users')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->where('orders.status', '=', 'Vận chuyển')
            ->paginate(8);
        $tiepnhan = DB::table('users')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->where('orders.status', '=', 'Tiếp nhận')
            ->paginate(8);
        $thanhcong = DB::table('users')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->where('orders.status', '=', 'Thành công')
            ->paginate(8);
        $luachon = $request->order_by;
        if ($luachon == NULL) {
            return $listOrder;
        } elseif ($luachon == "Huy") {
            return $cancel;
        } elseif ($luachon == "Vanchuyen") {
            return $vanchuyen;
        } elseif ($luachon == "Tiepnhan") {
            return $tiepnhan;
        } elseif ($luachon == "Thanhcong") {
            return $thanhcong;
        }
        // return $listOrder;
    }
    public function getDetailOrder($id)
    {
        $order = Order::where('id', $id)
            ->with('users')
            ->firstOrFail();
        $orderDetail = OrderDetail::with('products')
            ->where('order_id', $order->id)
            ->get();
        return $orderDetail;
    }
    public function updateMain($request, $order)
    {
        try {
            $order->fill($request->input());
            $order->save();
        } catch (Exception $err) {
            Session::flash('error', 'Có lỗi vui lòng thử lại');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }
    public function getCancel()
    {
        Paginator::useBootstrap();
        $listOrder = DB::table('users')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->where('orders.status', '=', 'Hủy')
            ->paginate(8);
        return $listOrder;
    }
}
