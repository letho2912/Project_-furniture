<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewRequest;
use App\Http\Services\NewService;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class NewManagerController extends Controller
{
    protected $newManager;
    public function __construct(NewService $newManager)
    {
        $this->newManager = $newManager;
    }
    public function index()
    {
        return view('admins.new.index', [
            'title' => "Tin tức",
            'new' => $this->newManager->getAll()
        ]);
    }
    public function changeActiveNew(Request $request)
    {
        $news = News::find($request->id);
        $news->active = $request->active;
        $news->updated_at = Carbon::now();
        $news->save();
        return response()->json(['success' => "Trạng thái đã được cập nhật"]);
    }
    public function create()
    {
        return view('admins.new.create', [
            'title' => "Thêm mới tin tức"
        ]);
    }
    public function store(NewRequest $request)
    {
        $this->newManager->saveNew($request);
        return redirect()->back();
    }
    public function show(News $new)
    {
        return view('admins.new.update', [
            'title' => 'Chỉnh sửa bài viết',
            'new' => $new
        ]);
    }
    public function update(Request $request, News $new)
    {
        $result=$this->newManager->update($request,$new);
        if($request){
            return redirect('/quan-li/tin-tuc/danh-sach');
        }
        return redirect()->back();
    }

}
