<?
namespace App\Service;
use App\Model\Author;

class AuthorService{
    public function list()
    {
        return Author::get();
    }
    public function detail($id):Author{
        return Author::find($id);
    }
    public function update(Author $author, $data):bool
    {
        return $author->update($data);
    }
    public function create($data)
    {
        return Author::create($data);
    }
}
