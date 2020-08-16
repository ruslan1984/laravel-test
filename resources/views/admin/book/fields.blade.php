<div class="row form-group">
    <div class="col-md-2">
        {{Form::label('name','Название')}}
    </div>
    <div class="col-md-10">
        {{Form::text('name',$detail->name??"",
            [
                'id'=>'name',
                'class'=>'form-control'
            ])
        }}
    </div>
</div>
<div class="row form-group">
    <div class="col-md-2">
        {{Form::label('author_id','Автор')}}
    </div>
    <div class="col-md-7">
        {{Form::select('author_id',
            $authorList,
            $detail->author_id??0,
            [
                'id' => 'author_id',
                'class'=>'form-control'
            ]
        )}}
    </div>
    <div class="col-md-3">
        <a class='btn btn-primary' href="{{route('admin.author.create')}}">Добавить автора</a>
    </div>
</div>
