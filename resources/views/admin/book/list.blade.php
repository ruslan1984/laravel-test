@extends('admin.layouts.admin')
@section('content')
    <h1>
        Список Книг
    </h1>
    <hr>
    <ul class="nav flex-column">
    @forelse($list as $item)
        <li class="nav-item"><a href="/admin/book/{{$item->id}}" class="nav-link active">{{$item->name}}</a></li>
    @empty
    <div class="alert alert-info">
        Нет книг
    </div>
    @endforelse
    </ul>
    <hr>
    <a class='btn btn-primary' href="{{route('admin.book.create')}}">Добавить</a>
@endsection
