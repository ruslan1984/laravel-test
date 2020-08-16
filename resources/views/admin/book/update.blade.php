@extends('admin.layouts.admin')
@section('content')
<h1>
    Книга <u>{{$detail->name}}</u>
</h1>
<hr>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    {{ Form::model($detail,[
        'method'=>'PUT',
        'url' => route('admin.book.update',['book'=>($detail)]),
        'class'=>'form-group'
        ]) }}
    {{ Form::token()}}
    <div class="form-group">
        <div class="row">
            <div class="col-md-2">
                {{Form::label('name','ID')}}
            </div>
            <div class="col-md-10">
                {{$detail->id}}
            </div>
        </div>
        @include('admin.book.fields')
        <hr>
    </div>
    {{Form::submit('Обновить',[
        'class'=>'btn btn-primary'
    ]) }}
    {{-- <button class="btn btn-primary">Обновить</button> --}}
    {{Form::close() }}
    {{ Form::model($detail,[
            'method'=>'DELETE',
            'url' => route('admin.book.destroy',['book'=>($detail)]),
            'class'=>'form-group'
        ]) }}
        {{ Form::token()}}
        {{Form::submit('Удалить',[
        'class'=>'btn btn-danger'
    ]) }}
    {{Form::close() }}
@endsection
