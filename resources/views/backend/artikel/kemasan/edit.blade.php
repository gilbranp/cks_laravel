@extends('backend.main')

@section('container')

<form action="{{ route('sahabat.update',$artikel->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <label for="inputEmail3" class="col-1 col-form-label">Nama</label>
        <div class="col-11">
            <input type="text" name="nama" class="form-control" required placeholder="Masukkan Nama Produk"
                value="{{ $artikel->nama }}">
        </div>
    </div>
    <div class="row mt-1">
        <label for="inputEmail3" class="col-1 col-form-label">Link wa</label>
        <div class="col-11">
            <input type="text" name="url" class="form-control" required placeholder="Contoh: https://wa.me/+628xxx"
                value="{{ $artikel->url }}">
        </div>
    </div>

    <div class="row mt-1">
        <label for="inputEmail3" class="col-1 col-form-label">Deskripsi</label>
        <div class="col-11">
            <input type="text" name="deskripsi" class="form-control" required placeholder="Masukkan  Deskripsi"
                value="{{ $artikel->deskripsi }}">
        </div>
    </div>

    {{-- <div class="form-group mt-1" style="display: flex; align-items: center;">
    <label style="margin-right: 58px;">Detail</label>
    <textarea type="text" name="detail" class="form-control" required placeholder="Masukkan Detail" value="{{ $artikel->detail }}"></textarea>
    </div> --}}

    <div class="row mt-1">
        <label for="inputEmail3" class="col-1 col-form-label">Tanggal</label>
        <div class="col-11">
            <input type="text" name="tanggal"  class="form-control" value="{{ $artikel->tanggal }}" readonly disabled>

        </div>
    </div>
    <div class="row mt-1">
        <label for="inputEmail3" class="col-1 col-form-label">Foto</label>
        <div class="col-11">
            <input type="file" name="foto" class="form-control"
         value=" {{ $artikel->foto }}" >
        </div>
    </div>

    {{-- 
  <div class="form-group" style="display: flex; align-items: center;">
    <label for="formFile" style="margin-right: 3px" class="form-label">Ganti Foto</label>
  <input class="form-control" name="img" type="file" id="formFile">
  </div> --}}
    <div class="modal-footer mt-5">
        <a href="/sahabat"><button type="button"
                class="btn btn-secondary btn-separator">Batal</button></a>
        <input type="submit" value="Simpan" name="edit" class="btn btn-warning">
    </div>
</form>

@endsection