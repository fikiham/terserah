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
        <h5 class="card-title fw-bolder mb-3">Tambah Benefit</h5>

        <form method="post" action="{{route('player.store_benefit') }}">
            @csrf

            <div class="mb-3">

                <label for="name" class="form-label">Nama Benefit</label>

                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">

                <label for="benefit" class="form-label">The Benefit</label>

                <input type="text" class="form-control" id="benefit" name="benefit">
            </div>

            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Tambah" />

            </div>
        </form>
    </div>
</div>
@stop