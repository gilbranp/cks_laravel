@extends('backend.main')

@section('container')

<div class="row">
    <div class="col-md-4">
        <img src="/images/ukm/{{ $artikel->foto }}" class="img-fluid  mt-4" style="width: 440px; height: 220px"
            alt="Foto Konten">
    </div>
    <div class="col-md-8 mt-1">

        <div class="form-group">
            <label>Nama produk</label>
            <input type="text" name="judul" class="form-control" value="{{ $artikel->nama }}" readonly disabled>
        </div>
        <div class="form-group">
            <label>Link whatshapp</label>
            <input type="text" name="namaacara" class="form-control" value="{{ $artikel->url }}" readonly
                disabled>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" name="tempat" class="form-control" value="{{ $artikel->deskripsi }}" readonly disabled>
        </div>
        <div class="form-group">
            <label>Kategori</label>
            <input type="text" name="kategori_id" class="form-control" value="{{ $artikel->kategori->nama }}" readonly disabled>
        </div>
        <div class="form-group">
            <label>Tanggal ditambahkan</label>
            <input type="text" name="url" class="form-control" value="{{ $artikel->tanggal }}" readonly disabled>
        </div>
        {{-- <div class="form-group">
        <label>Deskripsi</label>
        <textarea type="text" name="deskripsi" class="form-control"  readonly disabled>{{ $artikel->deskripsi }}</textarea>
    </div> --}}

</div>
</div>
<br>
<a href="/artikel">
    <div class="btn btn-secondary">Kembali</div>
</a>
<br><br><br><br>
@endsection