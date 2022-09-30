<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\UserService;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserManagerController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function index()
    {
        return view('admins.user.index', [
            'title' => 'Danh sách người dùng',
            'titleAdd'=>'Thêm danh mục',
            'titleUpdate'=>"Cập nhật thông tin",
            'users' => $this->userService->getAll(),
        ]);
    }
    public function changeActiveUserAdmin(Request $request) {
        $cate = User::find($request->id);
        $cate->active = $request->active;
        $cate->updated_at = Carbon::now();
        $cate->save();
        return response()->json(['success' => 'Trạng thái đã được cập nhật']);
    }
}
