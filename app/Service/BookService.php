<?
namespace App\Service;
use App\Model\Book;
use App\Model\Author;

class BookService{
    public function list()
    {
        return Book::where('active',true)->get();
    }
    public function listWithAuthors()
    {
        $result = Book::leftJoin('authors', 'authors.id', '=', 'books.author_id')
                ->select('books.id','books.name','authors.name as author_name')
                ->where('books.active',true)
                ->get();
        return  $result;
    }
    public function detail($id):Book{
        return Book::find($id);
    }
    public function update(Book $book,Array $data):bool
    {
        return $book->update($data);
    }
    public function create(Array $data)
    {
        return Book::create($data);
    }
    public function delete(Book $book){
        return $book->update(['active'=>false]);
    }
}
