@extends('admin.layouts.admin')
@section('content')
<h1>
    Автор <u>{{$detail->name}}</u>
</h1>
<hr>
<form method="POST" action="{{route('admin.author.update',['author'=>($detail)])}}">

    {{-- @csrf --}}
    {{csrf_field()}}
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
        <div class="row">
            <div class="col-md-2">
                <label for="name">Имя</label>
            </div>
            <div class="col-md-10">
                <input name="name" type="text" class="form-control" id="name" value="{{$detail->name}}">
            </div>
        </div>
    </div>
    <button class="btn btn-primary">Обновить</button>
</form>
@endsection
