<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\OrderService;
use App\Models\Order;
use App\Models\OrderDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderManagerController extends Controller
{
    protected $orderManager;
    public function __construct(OrderService $orderManager)
    {
        $this->orderManager = $orderManager;
    }
    public function index(Request $request)
    {
        $staus = array(
            1 => 'Tiếp nhận',
            2 => 'Vận chuyển',
            3 => 'Thành công',
            4 => 'Hủy'
        );
        return view('admins.order.index', [
            'title' => "Danh sách đơn hàng",
            'listOrder' => $this->orderManager->getAll($request),
            'statusOr' => $staus
        ]);
    }
    public function changeStatus(Request $request)
    {
        $pr = Order::find($request->id);
        $pr->status = (string)$request->status;
        $pr->updated_at = Carbon::now();
        $pr->save();
        return response()->json(['success' => 'Tình trạng đơn hàng đã được cập nhật']);
    }
    public function getDetailOrder($id)
    {
        $order = Order::where('id', $id)
            ->with('users')
            ->firstOrFail();
        return view('admins.order.detail', [
            'title' => "Chi tiết đơn hàng",
            'order' => $order,
            'orderDetails' => $this->orderManager->getDetailOrder($id),
            'total' => $order->total
        ]);
    }
    public function updateMain(Request $request, Order $order)
    {
        $result=$this->orderManager->updateMain($request,$order);
        if($request){
            return redirect('quan-li/don-hang/danh-sach');
        }
        return redirect()->back();
    }
}
