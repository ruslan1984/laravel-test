@extends('admin.layouts.admin')
@section('content')
<h1>
    Новый Автор
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
<form method="POST" action="{{route('admin.author.store')}}">
    @csrf
    <div class="form-group">
        @include('admin.author.form')
    </div>
    <button class="btn btn-primary">Добавить</button>
</form>
@endsection
