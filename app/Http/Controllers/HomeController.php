<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Service\AuthorService;

class HomeController extends Controller
{
    private $authorService;
    public function __construct(
        AuthorService $authorService
    ) {
        $this->authorService = $authorService;
    }
    public function index(){
        $list = (object)$this->authorService->listWithBooks();
        // dd($list);
        return view('site.page')->with('list',$list);
    }
}
