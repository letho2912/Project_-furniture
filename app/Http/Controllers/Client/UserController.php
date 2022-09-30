<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Services\ProductService;
use App\Http\Services\UserService;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    protected $userService;
    protected $productService;
    public function __construct(UserService $userService, ProductService $productService)
    {
        $this->userService = $userService;
        $this->productService = $productService;
    }
    public function login()
    {
        return view('clients.user.login');
    }
    public function store(Request $request)
    {
        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'active'=>1
        ], $request->input('remember'))) {
            return redirect()->route('home');
        }

        Session::flash('error', 'Email hoặc mật khẩu không chính xác!!!');
        return redirect()->back();
    }
    public function register_show()
    {
        return view('clients.user.register');
    }
    public function register(UserRequest $userRequest)
    {
        $this->userService->store($userRequest);
        return redirect()->back();
    }
    public function logout(Request $request)
    {
        $cart = Session::get('cart');

        Auth::logout();
        // Session::flush();
        $request->session()->forget('cart');
        return redirect('/trang-chu');
    }
    public function home()
    {
        $id = Auth::user()->id;
        $amountOrder = DB::table('users')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->where('users.id', $id)
            ->where('orders.status', '=', 'Hoàn thành')
            ->get();
        $amountProduct = DB::table('orders')
            ->join('orders_detail', 'orders.id', '=', 'orders_detail.order_id')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->where('orders.status', '=', 'Hoàn thành')
            ->where('users.id', $id)
            ->sum('orders_detail.quantity');
        $sumOrder = DB::table('users')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->where('users.id', $id)
            ->where('orders.status', '=', 'Hoàn thành')
            ->sum('orders.total');
        return view('clients.user-manager.index', [
            'cate' => $this->productService->getCategory(),
            'amountOrder' => count($amountOrder),
            'amountProduct' => $amountProduct,
            'sumTotal' => $sumOrder
        ]);
    }
    public function orderManager(Request $request)
    {
        return view('clients.user-manager.order-user', [
            'title' => "Danh sách đơn hàng",
            'listOrder' => $this->userService->getOrderUser($request),
            'cate' => $this->productService->getCategory(),
        ]);
    }
    public function getDetailOrderUser($id)
    {
        $order = Order::where('id', $id)
            ->with('users')
            ->firstOrFail();

        return view('clients.user-manager.detail-order', [
            'title' => "Chi tiết đơn hàng",
            'order' => $order,
            'orderDetails' => $this->userService->getDetailOrderUser($id),
            'total' => $order->total,
            'cate' => $this->productService->getCategory(),
            'status' => $order->status
        ]);
    }
}
