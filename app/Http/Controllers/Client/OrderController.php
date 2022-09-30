<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Services\HomeService;
use App\Http\Services\OrderService;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $cartService;
    public function __construct(OrderService $cartService, HomeService $homeService)
    {
        $this->cartService = $cartService;
        $this->homeService = $homeService;
    }
    public function Cart()
    {
        $amountCart = count((array) session('cart'));
        return view('clients.cart.cart', [
            'cate' => $this->homeService->getCategory(),
            'amountCart' => $amountCart
        ]);
    }
    public function addToCart($id)
    {
        return $this->cartService->addToCart($id);
    }
    public function updateCart(Request $request)
    {
        return $this->cartService->update($request);
    }
    public function removeCart(Request $request)
    {
        return $this->cartService->remove($request);
    }
    public function checkout()
    {
        return view('clients.cart.checkout', [
            'title' => "Thanh toán",
            'cate' => $this->homeService->getCategory(),
        ]);
    }
    
    public function storeCheckout(Request $request)
    {
        $this->cartService->storeOrderDetails($request);
        return redirect('/trang-chu/thanh-toan/thanh-cong');
    }
    public function successNoti(){
        return view('clients.cart.success',[
            'title'=>"Đặt hàng thành công",
            'cate' => $this->homeService->getCategory(),
        ]);
    }
    public function huyOrder(Order $order) {
        $cate = Order::find($order->id);
        $cate->active = "Hủy";
        $cate->updated_at = Carbon::now();
        $cate->save();
        return redirect()->back();
    }
}
