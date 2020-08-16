@extends('site.layouts.index')
@section('content')
<h1>
    Наши Авторы
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
    <ul class="list-group">
    @forelse ($list as $item)
        <li class="list-group-item">{{ $item['name'] }}</li>
        <ul>
            @if(!empty($item['books']))
                @foreach ($item['books'] as $book)
                    <li class="list-group-item">{{$book['name']}}</li>
                @endforeach
            @else
            <div class="alert alert-info">
                Книг нет
            </div>
            @endif
        </ul>
    @empty
    </ul>
    <div class="alert alert-info">
        Список авторов пуст
    </div>
    @endforelse


@endsection
