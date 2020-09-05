@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/body.css')}}">
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card shadow">
                <div class="card-header"><h4>Tambah surat</h4>
                    <div class="float-right">
                        <a href="{{ route("surat-disposisi.index") }}" class="btn btn-primary sm">kembali</a>
                    </div>
                </div>
                <div class="card-body">

                    <form action="{{ route("surat-disposisi.store") }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Asal Surat</label>
                            <input autocomplete="off" type="text" name="asal" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>No Surat</label>
                            <input autocomplete="off" type="text" name="no_surat" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Tingkat Keamanan</label>
                            <select name="tingkat_keamanan" class="form-control" required>
                                <option value="">--pilih--</option>
                                <option value="SR">SR</option>
                                <option value="R">R</option>
                                <option value="K">K</option>
                                <option value="B">B</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Perihal</label>
                            <input autocomplete="off" type="text" name="perihal" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
