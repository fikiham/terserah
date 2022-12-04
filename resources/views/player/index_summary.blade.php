@extends('player.layout')
@section('content')
<a href="{{ route('player.index_summary') }}" type="button" class="btn btn-success rounded-3">Summary</a>
<a href="{{ route('player.index') }}" type="button" class="btn btn-success rounded-3">Player</a>
<a href="{{ route('player.item_index') }}" type="button" class="btn btn-success rounded-3">Item</a>
<a href="{{ route('player.index_benefit') }}" type="button" class="btn btn-success rounded-3">Benefit</a>
<h4 class="mt-5">Data Semua</h4>
<form action="{{ route('player.search_summary') }}" method="post">
    @csrf
    <div class="mb-3">

        <label for="name" class="form-label">Search Name</label>

        <input type="text" class="form-control" id="name" name="name">
    </div>

    <div class="text-center">
        <input type="submit" class="btn btn-primary" value="Cari" />

    </div>
</form>

<table class="table table-hover mt-2">
    <thead>
        <tr>
            <th>Username</th>
            <th>Nama</th>
            <th>Level</th>
            <th>Item</th>
            <th>Benefit</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)

        <tr>
            <td>{{ $data->username }}</td>
            <td>{{ $data->name }}</td>
            <td>{{ $data->level }}</td>
            <td>{{ $data->item_name }}</td>
            <td>{{ $data->benefit }}</td>
        </tr>
        @endforeach


    </tbody>
</table>
@stop