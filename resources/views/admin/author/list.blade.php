@extends('admin.layouts.admin')
@section('content')
    <h1>
        Список
    </h1>
    <hr>
    <ul class="nav flex-column">
    @foreach($list as $item)
        <li class="nav-item">
            <a href="/admin/author/{{$item->id}}" class="nav-link active">
            {{$item->name}}
            <span class="badge badge-primary badge-pill">
                {{$item->book_count}}
            </span>
            </a>
        </li>
    @endforeach
    </ul>
    <hr>
    <a class='btn btn-primary' href="{{route('admin.author.create')}}">Добавить</a>
@endsection
