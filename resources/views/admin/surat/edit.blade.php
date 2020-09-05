@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/body.css')}}">
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card shadow">
                <div class="card-header"><h4>Edit Surat</h4>
                    <div class="float-right">
                        <a href="{{ route("surat-disposisi.index") }}" class="btn btn-primary sm">kembali</a>
                    </div>
                </div>
                <div class="card-body">

                    <form action="{{ route("surat-disposisi.update", $mailList->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="tanggal_masuk" value="{{ $mailList->tanggal_masuk }}">

                        <div class="form-group">
                            <label>Asal Surat</label>
                            <input autocomplete="off" type="text" name="asal" class="form-control" value="{{ $mailList->asal }}" required>
                        </div>

                        <div class="form-group">
                            <label>No Surat</label>
                            <input autocomplete="off" type="text" name="no_surat" class="form-control" value="{{ $mailList->no_surat }}" required>
                        </div>

                        <div class="form-group">
                            <label>Tingkat Keamanan</label>
                            <select name="tingkat_keamanan" class="form-control" required>
                                <option value="">--pilih--</option>
                                <option value="SR" {{ ($mailList->tingkat_keamanan == "SR") ? 'selected' : ''  }}>SR</option>
                                <option value="R" {{ ($mailList->tingkat_keamanan == "R") ? 'selected' : ''  }}>R</option>
                                <option value="K" {{ ($mailList->tingkat_keamanan == "K") ? 'selected' : ''  }}>K</option>
                                <option value="B" {{ ($mailList->tingkat_keamanan == "B") ? 'selected' : ''  }}>B</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Perihal</label>
                            <input autocomplete="off" type="text" name="perihal" class="form-control" value="{{ $mailList->perihal }}" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
