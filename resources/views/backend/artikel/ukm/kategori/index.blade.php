@extends('backend.main')
@section('container')
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css"> --}}
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


<div class="d-flex justify-content-end mb-3">
    <a href="/sahabat"><button type="button" class="btn btn-dark">
        Sahabat Kemasan
    </button></a>
    <a href="{{ route('artikel.index') }}"><button type="button" class="btn btn-success">
        Produk UKM
    </button></a>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
        Kategori
    </button>

    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambahkan Kategori</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <!--  -->

                    <form action="{{ route('kategoriukm.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Nama Kategori</label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan nama produk"
                                required>
                        </div>

                        <div class="form-group">
                            <label>Nama URL</label>
                            <input type="text" name="slug" class="form-control"
                                placeholder="Tanpa Spasi EX : keripik_enak" required>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control"
                                placeholder="Masukkan deskripsi kategori(Optional)">
                        </div>

                        <label for="formFile" class="form-label">Unggah Foto</label>
                        <input class="form-control" name="foto" type="file" id="formFile" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" value="Tambah" name="simpan" class="btn btn-primary">

                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
                </form>

            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if (session('sukses'))
    <div class="alert alert-success">
        {{ session('sukses') }}
    </div>
@endif


    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="datatable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Kategori</th>
                            <th scope="col">URL</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($kategori->count() > 0)
                        @foreach($kategori as $kategoris)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td class="text-break">{{ $kategoris->nama }}</td>
                            <td class="text-break">{{ $kategoris->slug }}</td>
                            <td class="text-break">{{ $kategoris->deskripsi }}</td>
                            <td class="text-break">{{ $kategoris->created_at }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <form action="{{ route('kategoriukm.destroy',$kategoris->id) }}" onsubmit="return confirm('Yakin ingin menghapus?')" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger text-white show-modal mr-2">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td class="text-center" colspan="6">Tidak Ada Data Yang Tersimpan</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function () {
        $('#datatable').DataTable({
            "paging": true,
            "searching": true,
            "lengthChange": false,
            "pageLength": 10
        });
    });

</script>
@endsection
