<?php

namespace App\Http\Services;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Exception;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserService
{
    public function store($userService)
    {
        try {
            User::create([
                'name' => (string) $userService->input('name'),
                'email' => (string) $userService->input('email'),
                'password' => bcrypt($userService->input('password')),
                'phone' => (string) $userService->input('phone'),
                'address' => (string) $userService->input('address')
            ]);
            Session::flash('success', 'Đăng kí thành công');
        } catch (Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }
    public function getOrderUser()
    {
        $id = Auth::user()->id;
        $listOrder = DB::table('users')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->where('users.id', $id)
            ->get();
        return $listOrder;
    }
    public function getDetailOrderUser($id)
    {
        $order = Order::where('id', $id)
            ->with('users')
            ->firstOrFail();
        $orderDetail = OrderDetail::with('products')
            ->where('order_id', $order->id)
            ->get();
        return $orderDetail;
    }
    public function getAll()
    {
        Paginator::useBootstrap();
        $categories = DB::table('users')->paginate(10);
        return $categories;
    }
}
