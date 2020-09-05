@extends('layouts.app')


@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.21/datatables.min.css" />
<link rel="stylesheet" href="{{asset('css/body.css')}}">

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.21/datatables.min.js"></script>

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card shadow">
                <div class="card-header"><h2>Dashboard</h2>
                    <div class="header_two"><h5><img src="{{asset('img/dashboard.png')}}" width="30">Home / Dashboard</h5></div>
                    <div class="text-left">
                        <a href="{{ route("surat-disposisi.create") }}" class="btn btn-primary sm">Tambah Surat</a>
                    </div>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-sm" id="data">
                        <thead>
                            <th>No</th>
                            <th>Tanggal Masuk</th>
                            <th width="150">Asal</th>
                            <th>No Surat</th>
                            <th width="150">Perihal</th>
                            <th>Tanggal Masuk</th>
                            <th width="120">Aksi</th>
                        </thead>
                        <tbody>
                            @foreach($data as $surat)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ date('d M Y', $surat->tanggal_masuk) }}</td>
                                <td>{{ $surat->asal }}</td>
                                <td>{{ $surat->no_surat }}</td>
                                <td>{{ $surat->perihal }}</td>
                                {{-- <th><span class="badge badge-success">{{ $surat->tingkat_keamanan }}</span></th> --}}
                                <td>{{ $surat->created_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route("surat-disposisi.edit", $surat->id) }}"
                                        class="btn btn-warning btn-sm d-inline">edit</a>
                                    <a href="{{ route("mail.print", $surat->id) }}"
                                        class="btn btn-secondary btn-sm d-inline">print</a>
                                    <form action="{{ route("surat-disposisi.destroy", $surat->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Hapus data ini?')"
                                            class="btn btn-danger btn-sm">hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $.noConflict();
        var table = $('#data').DataTable();
    });

</script>
@endsection
