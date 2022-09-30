<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\ContactService;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class ContactManagerController extends Controller
{
    protected $contactService;
    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }
    public function getAll()
    {

        return view('admins.contact.index',[
            'title'=>'Danh sách liên hệ',
            'contact'=>$this->contactService->getAll()
        ]);
    }
    public function changeActiveContact(Request $request) {
        $cate = Contact::find($request->id);
        $cate->active = $request->active;
        $cate->updated_at = Carbon::now();
        $cate->save();
        return response()->json(['success' => 'Thông tin liên hệ đã được phản hồi!']);
    }
}
