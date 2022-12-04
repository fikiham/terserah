@extends('player.layout')
@section('content')

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="card mt-4">
    <div class="card-body">
        <h5 class="card-title fw-bolder mb-3">Tambah Player</h5>

        <form method="post" action="{{route('player.store') }}">
            @csrf
            <div class="mb-3">

                <label for="username" class="form-label">Username</label>

                <input type="text" class="form-control" id="username" name="username">
            </div>

            <div class="mb-3">

                <label for="name" class="form-label">Nama Player</label>

                <input type="text" class="form-control" id="name" name="name">
            </div>

            <div class="mb-3">
            
                <label for="level" class="form-label">Level Player</label>
            
                <input type="text" class="form-control" id="level" name="level">
            </div>

            <div class="mb-3">

                <label for="id_item" class="form-label">ID Item</label>

                <input type="text" class="form-control" id="id_item" name="id_item">
            </div>

            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Tambah" />

            </div>
        </form>
    </div>
</div>
@stop