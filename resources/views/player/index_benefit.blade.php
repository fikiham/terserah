@extends('player.layout')
@section('content')
<a href="{{ route('player.index_summary') }}" type="button" class="btn btn-success rounded-3">Summary</a>
<a href="{{ route('player.index') }}" type="button" class="btn btn-success rounded-3">Player</a>
<a href="{{ route('player.item_index') }}" type="button" class="btn btn-success rounded-3">Item</a>
<a href="{{ route('player.index_benefit') }}" type="button" class="btn btn-success rounded-3">Benefit</a>

<h4 class="mt-5">Data Benefit</h4>
<a href="{{ route('player.create_benefit') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>

@if($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">
    {{ $message }}
</div>
@endif
<table class="table table-hover mt-2">
    <thead>
        <tr>
            <th>ID Benefit</th>
            <th>Nama</th>
            <th>The Benefit</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)

        <tr>
            <td>{{ $data->id_benefit }}</td>
            <td>{{ $data->name }}</td>
            <td>{{ $data->benefit }}</td>
            <td>
                <a href="{{ route('player.edit_benefit',$data->id_benefit) }}" type="button" class="btn btn-warning rounded-3">
                    Ubah
                </a>

                <!-- TAMBAHKAN KODE DELETE DIBAWAH BARIS INI -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->id_benefit }}">
                    Hapus
                </button>
                <!-- Modal -->
                <div class="modal fade" id="hapusModal{{ $data->id_benefit }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">

                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>

                                <buttontype="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                            </div>

                            <form method="POST" action="{{ route('player.delete_benefit', $data->id_benefit) }}">
                                @csrf

                                <div class="modal-body">

                                    Apakah anda
                                    yakin ingin menghapus data ini?
                                </div>

                                <div class="modal-footer">

                                    <buttontype="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>

                                        <button type="submit" class="btn btn-primary">Ya</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- TAMBAHKAN KODE DELETE DIBAWAH BARIS INI -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->id_benefit }}">
                    Hapus Beneran
                </button>
                <!-- Modal -->
                <div class="modal fade" id="hapusModal{{ $data->id_benefit }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">

                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>

                                <buttontype="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                            </div>

                            <form method="POST" action="{{ route('player.hdelete_benefit', $data->id_benefit) }}">
                                @csrf

                                <div class="modal-body">

                                    Apakah anda
                                    yakin ingin menghapus data ini?
                                </div>

                                <div class="modal-footer">

                                    <buttontype="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>

                                        <button type="submit" class="btn btn-primary">Ya</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop