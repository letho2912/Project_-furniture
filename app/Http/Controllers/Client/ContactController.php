<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Http\Services\ContactService;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class ContactController extends Controller
{
    protected $contactService;
    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }
    public function index()
    {
        return view('clients.contact.index', [
            'cate' => $this->contactService->getCategory(),
        ]);
    }
    public function contact(ContactRequest $request)
    {
        $result = $this->contactService->save($request);
        if ($result) {
            return redirect('trang-chu/lien-he');
        }
        return redirect()->back();
    }
}
