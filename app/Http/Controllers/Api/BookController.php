<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Book;
use Illuminate\Http\Request;
use App\Service\BookService;
use Validator;

class BookController extends Controller
{
    private $bookService;
    public function __construct(
        BookService $bookService
    ) {
        $this->bookService = $bookService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = $this->bookService->listWithAuthors();
        return response()->json($list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            ['id'=>'required']
        ]);
        if($validator->fails()){
            return response()->json(['Ощибка валидаии'])->setStatusCode(422);
        }
        $data = $request->all();
        $result = $this->bookService->update(Book::find($data['id']),$data);
        if(!$result){
            return response()->json(['Ощибка'])->setStatusCode(422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return response()->json($book->toArray());
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $updated = $this->bookService->destroy($book);
        if(!$updated){
            return response()->json(['Ощибка удаления'])->setStatusCode(422);
        }
    }
}
