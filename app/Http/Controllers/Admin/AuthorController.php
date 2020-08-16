<?php

namespace App\Http\Controllers\Admin;

use App\Model\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\AuthorService;

class AuthorController extends Controller
{
    private $authorService;
    public function __construct(
        AuthorService $authorService
    ) {
        $this->authorService = $authorService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = $this->authorService->listWithBooksCount();
        return view('admin.author.list')->with('list',$list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.author.create');
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
            'name' => 'required'
        ]);
        $data = $request->all();
        $newAuthor = $this->authorService->create($data);
        return view('admin.author.update')->with('detail', $newAuthor);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        return view('admin.author.update')->with('detail', $author);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $updateData = $request->all();
        $updated = $this->authorService->update($author,$updateData);
        if ($updated) {
            return self::show($author);
        }else{
            return self::show($author)->withError('Ошибка обновления');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $updated = $this->authorService->delete($author);
        if($updated){
            return self::index();
        }else{
            return self::show($author)->withError('Ошибка удаления');
        }
    }
}
