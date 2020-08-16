<?
namespace App\Service;
use App\Model\Book;

class BookService{
    public function list()
    {
        return Book::get();
    }
    public function detail($id):Book{
        return Book::find($id);
    }
    public function update(Book $author,Array $data):bool
    {
        return $author->update($data);
    }
    public function create(Array $data)
    {
        return Book::create($data);
    }
}
