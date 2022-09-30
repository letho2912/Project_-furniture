<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\DashboardService;
use App\Models\Contact;
use App\Models\OrderDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    protected $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }
    public function index()
    {
        $amountOrder = DB::table('orders')
            ->where('status', '=', 'Tiếp nhận')
            ->orderBy('created_at', 'desc')
            ->get();
        $amountProduct = DB::table('contacts')
            ->where('active', 1)
            ->get();
        $sumOrder = DB::table('orders')
            ->where('status', '=', 'Hoàn thành')
            ->sum('total');
        $sumProduct = DB::table('products')
            ->where('active', 1)
            ->get();
        $sumUser = DB::table('orders')
            ->distinct()
            ->count('user_id');
        return view('admins.dashboard', [
            'title' => "Trang quản lí",
            'amountOrder' => count($amountOrder),
            'sumOrder' => $sumOrder,
            'amountContact' => count($amountProduct),
            'sumProduct' => count($sumProduct),
            'amountUser' => $sumUser,
            'contact'=>$this->dashboardService->getContact(),
            'listOrder'=>$this->dashboardService->getOrder()
        ]);
    }
    public function changeActiveContacts(Request $request) {
        $cate = Contact::find($request->id);
        $cate->active = $request->active;
        $cate->updated_at = Carbon::now();
        $cate->save();
        return response()->json(['success' => 'Thông tin liên hệ đã được phản hồi!']);
    }
}
