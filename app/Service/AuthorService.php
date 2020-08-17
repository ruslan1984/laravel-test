<?
namespace App\Service;
use App\Model\Author;
use Illuminate\Support\Collection;
use DB;

class AuthorService{
    public function list()
    {
        return Author::where('active',true)->get();
    }
    public function listWithBooksCount(){
        $result = Author::leftJoin('books', 'authors.id', '=', 'books.author_id')
            ->select(
                'authors.id as id',
                'authors.name as name',
                DB::raw('count(books.id) as book_count'
                )
            )

            ->where(['authors.active'=>true, 'books.active'=>true])
            ->orWhere(function($query) {
                $query->where('authors.active',true)
                ->where('books.active',null);
            })
            ->groupBy('id','name')
            ->get();
        return  $result;
    }

    public function listWithBooks(){
        $result = Author::leftJoin('books', 'authors.id', '=', 'books.author_id')
            ->select(
                'authors.id as id',
                'authors.name as name',
                'books.id as book_id',
                'books.name as book_name',
            )
            ->where(['authors.active'=>true,'books.active'=>true])
            ->orWhere(function($query) {
                $query->where('authors.active',true)
                ->where('books.active',null);
            })
            ->get();
            foreach ($result as $item) {
                $data[$item['id']]['id']=$item['id'];
                $data[$item['id']]['name']=$item['name'];
                if ($item['book_id']) {
                    $data[$item['id']]['books'][]=[
                    'id' => $item['book_id'],
                    'name' => $item['book_name']
                ];
                }
            }
        return  $data;
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
    public function delete(Author $author){
        return $author->update(['active' => false]);
    }
}
