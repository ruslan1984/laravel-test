<?
namespace App\Service;
use App\Model\Author;
use Illuminate\Support\Collection;
use DB;

class AuthorService{
    public function list()
    {
        return Author::get();
    }
    public function listWithBooksCount(){
        $result = Author::leftJoin('books', 'authors.id', '=', 'books.author_id')
            ->select(
                'authors.id as id',
                'authors.name as name',
                DB::raw('count(books.id) as book_count')
            )
            ->groupBy('id','name')
            ->get();
        return  $result;
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
    public function listForSelect(){
        $list = self::list();
        $collection = collect($list);
        return ($collection->mapWithKeys( function($item){
            return [$item['id'] => $item['name']];
        })->toArray());
    }
}
