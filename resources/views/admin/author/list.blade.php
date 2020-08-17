@extends('admin.layouts.admin')
@section('content')
    <h1>
        Список Авторов
    </h1>
    <hr>
    <ul class="nav flex-column">
    @forelse($list as $item)
        <li class="nav-item">
            <a href="/admin/author/{{$item->id}}" class="nav-link active">
            {{$item->name}}
            <span class="badge badge-primary badge-pill">
                {{$item->book_count}}
            </span>
            </a>
        </li>
    @empty
    <div class="alert alert-info">
        Спасик авторов пуст
    </div>
    @endforelse
    </ul>
    <hr>
    <a class='btn btn-primary' href="{{route('admin.author.create')}}">Добавить</a>
@endsection
