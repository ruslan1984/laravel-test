@extends('admin.layouts.admin')
@section('content')
<h1>
    Автор <u>{{$detail->name}}</u>
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
<form method="POST" action="{{route('admin.author.update',['author'=>($detail)])}}">
    @csrf
    @method("PUT")
    <div class="form-group">
        <div class="row">
            <div class="col-md-2">
                <label for="name">ID</label>
            </div>
            <div class="col-md-10">
                {{$detail->id}}
            </div>
        </div>
        @include('admin.author.form')
    </div>
    <button class="btn btn-primary">Обновить</button>
</form>
@endsection
