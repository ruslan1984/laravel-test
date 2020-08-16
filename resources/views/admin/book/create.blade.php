@extends('admin.layouts.admin')
@section('content')
<h1>
    Новая книга
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

{{ Form::model('',[
        'method'=>'POST',
        'url' => route('admin.book.store')
        ]) }}
    {{ Form::token()}}
    <div class="form-group">
        @include('admin.book.fields')
    </div>
    <hr>
    <button class="btn btn-primary">Добавить книгу</button>
{{Form::close() }}
@endsection
