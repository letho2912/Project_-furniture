<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Services\HomeService;
use App\Http\Services\NewService;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    protected $newService;
    protected $homeService;
    public function __construct(NewService $newService, HomeService $homeService)
    {
        $this->newService = $newService;
        $this->homeService = $homeService;
    }
    public function getAll()
    {
        return view('clients.new.index', [
            'title' => 'Tin tức',
            'cate' => $this->homeService->getCategory(),
            'listNew' => $this->newService->get()
        ]);
    }
    public function getDetail($id)
    {
        return view('clients.new.detail', [
            'title' => 'Tin tức',
            'cate' => $this->homeService->getCategory(),
            'detailNew' => $this->newService->getDetail($id)
        ]);
    }
}
