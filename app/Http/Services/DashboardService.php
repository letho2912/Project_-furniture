<?php

namespace App\Http\Services;

use App\Models\Product;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class DashboardService
{
    public function getContact()
    {
        Paginator::useBootstrap();
        $list = DB::table('contacts')
        ->where('active',1)
        ->orderByDesc('created_at')
        ->paginate(6);

        return $list;
    }
    public function getOrder(){
        $listOrder= DB::table('users')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->where('orders.status', '=', 'Tiếp nhận')
            ->paginate(8);

        return $listOrder;
    }
}
