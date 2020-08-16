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
        'url' => route('admin.book.update',['book'=>($detail)])
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
    <button class="btn btn-primary">Обновить</button>
    {{Form::close() }}
@endsection
