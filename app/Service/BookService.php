<?
namespace App\Service;
use App\Model\Book;
use App\Model\Author;

class BookService{
    public function list()
    {
        return Book::get();
    }
    public function listWithAuthors()
    {
        $result = Book::leftJoin('authors', 'authors.id', '=', 'books.author_id')
                ->select('books.id','books.name','authors.name as author_name')
                ->get();
        return  $result;
    }
    public function detail($id):Book{
        return Book::find($id);
    }
    public function update(Book $author,Array $data):bool
    {
        return $author->update($data);
    }
    public function create(Array $data):int
    {
        return Book::create($data);
    }
}
