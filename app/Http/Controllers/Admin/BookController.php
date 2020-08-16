<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Book;
use Illuminate\Http\Request;
use App\Service\BookService;
use App\Service\AuthorService;

class BookController extends Controller
{
    private $bookService;
    private $authorService;
    public function __construct(
        BookService $bookService,
        AuthorService $authorService
    ) {
        $this->bookService = $bookService;
        $this->authorService = $authorService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = $this->bookService->list();
        return view('admin.book.list')->with('list',$list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authorList = $this->authorService->listForSelect();
        return view('admin.book.create')->with('authorList', $authorList);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'author_id' => 'required'
        ]);
        $data = $request->all();
        $authorList = $this->authorService->listForSelect();
        $newBook = $this->bookService->create($data);
        return view('admin.book.update')->with(
            [
                'detail'=> $newBook,
                'authorList' => $authorList
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $authorList = $this->authorService->listForSelect();
        return view('admin.book.update')->with([
            'detail'=> $book,
            'authorList' => $authorList
        ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $updateData = $request->all();
        $updated = $this->bookService->update($book,$updateData);
        return self::show($book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
