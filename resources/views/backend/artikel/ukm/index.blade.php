@extends('backend.main')
@section('container')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

            <div class="d-flex justify-content-end mb-3">
            <a href="/sahabat"><button type="button" class="btn btn-dark">
                Sahabat Kemasan
            </button></a>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                UKM
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambahkan Produk</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <!--  -->

                            <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Nama Produk</label>
                                    <input type="text" name="nama" class="form-control" placeholder="Masukkan nama produk"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label>Link wa</label>
                                    <input type="url" name="url" class="form-control" placeholder="https://wa.me/+628xxxx"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea type="text" name="deskripsi" class="form-control"
                                        placeholder="Masukkan deskripsi barang" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <input type="date" name="tanggal" class="form-control" required>
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

            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="datatable">
            
                            @if (Session::has('sukses'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('sukses') }}
                            </div>
                            @endif
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Produk</th>
                                    {{-- <th scope="col">Username</th> --}}
                                    <th scope="col">Link Wa</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Tanggal</th>
                                    {{-- <th scope="col">Tanggal Ditambahkan</th> --}}
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($artikel->count() > 0)
                                @foreach($artikel as $artikels)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $artikels->nama }}</td>
                                    <td>{{ $artikels->url }}</td>
                                    <td>{{ $artikels->deskripsi }}</td>
                                    <td>{{ $artikels->tanggal }}</td>
                                   
                                    
                                    {{-- <td>{{ $user->created_at }}</td> --}}
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a data-id="" href="{{ route('artikel.show',$artikels->id) }}"
                                                class="btn btn-sm btn-info text-white show-modal mr-2" data-toggle="modal"
                                                data-target="#show_user">
                                                <i class="fas fa-fw fa-search"></i>
                                            </a>
                                        </div>
                                        <div class="btn-group">
                                            <a data-id="" href="{{ route('artikel.edit',$artikels->id) }}"
                                                class="btn btn-sm btn-info text-white show-modal mr-2" data-toggle="modal"
                                                data-target="#show_user">
                                                <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                        <div class="btn-group">
                                            <form action="{{ route('artikel.destroy',$artikels->id) }}"
                                                onsubmit="return confirm('Yakin ingin menghapus?')" method="POST">
                                                @csrf
                                                @method( 'DELETE')
                                                <button class="btn btn-sm btn-danger text-white show-modal mr-2">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
            
                                        {{-- <div class="btn-group">
                                        <form action="{{ route('datauser.destroy', $users->id) }}" method="POST" type="button"
                                        class="btn btn-danger p-0 mr-2" onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger m-0"><i class="fa fa-trash"></i></button>
                                        </form>
                    </div>
                    --}}
            
                    </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td class="text-center" colspan="7">Tidak Ada Data Yang Tersimpan</td>
                    </tr>
                    @endif
                    </tbody>
                    </table>
                </div>
            </div>
  
@endsection
