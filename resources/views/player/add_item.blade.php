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
        <h5 class="card-title fw-bolder mb-3">Tambah Item</h5>

        <form method="post" action="{{route('player.store_item') }}">
            @csrf
            <div class="mb-3">

                <label for="item_name" class="form-label">Nama Item</label>

                <input type="text" class="form-control" id="item_name" name="item_name">
            </div>
            <div class="mb-3">

                <label for="icon_source" class="form-label">Source Icon</label>

                <input type="text" class="form-control" id="icon_source" name="icon_source">
            </div>
            <div class="mb-3">

                <label for="id_benefit" class="form-label">ID Benefit</label>

                <input type="text" class="form-control" id="id_benefit" name="id_benefit">
            </div>

            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Tambah" />

            </div>
        </form>
    </div>
</div>
@stop