@extends('backend.main')

@section('container')
<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

<div class="d-flex justify-content-end mb-3">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fas fa-fw fa-plus"></i>
        Tambahkan Data
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah data anggota</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="{{ route('anggota.store') }}" method="post">
                        @csrf
                        <div class="form-floating">
                            <input type="text" name="nama"
                                class="form-control @error('nama') is-invalid @enderror" id="nama"
                                placeholder="Masukka Nama" required value="{{ old('nama') }}">
                            <label for="nama">Nama Langkap</label>
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>
                        {{-- <div class="form-floating">
                            <input type="text" name="username"
                                class="form-control @error('username') is-invalid @enderror" id="username"
                                placeholder="Username" required value="{{ old('username') }}">
                            <label for="username">Username</label>
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                        </div> --}}
                        <div class="form-floating">
                            <input type="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" id="email"
                                placeholder="name@example.com" required value="{{ old('email') }}">
                            <label for="email">Email address</label>
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input type="text" name="alamat"
                                class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                placeholder="Masukkan alamat" required value="{{ old('alamat') }}">
                            <label for="alamat">Alamat</label>
                            @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input type="text" name="posisi"
                                class="form-control @error('posisi') is-invalid @enderror" id="posisi"
                                placeholder="ex:Ketua,TimIT,dll" required value="{{ old('posisi') }}">
                            <label for="posisi">Posisi</label>
                            @error('posisi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" id="password"
                               placeholder="Masukkan password" required value="{{ old('password') }}">
                            <label for="password">Password</label>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input type="deskripsi" name="deskripsi"
                                class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"
                                placeholder="Masukkan Deskripsi" required value="{{ old('deskripsi') }}">
                            <label for="deskripsi">Deskripsi</label>
                            @error('deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        {{-- <div class="form-floating">
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" id="password"
                                placeholder="Password" required>
                            <label for="password">Password</label>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div> --}}
                        {{-- <div class="dropdown-center">
                            <select name="level" class="dropdown-toggle w-100" required>
                                <option value="" disabled selected>== SILAHKAN PILIH SALAH SATU ==</option>
                                <option value="administrator">Administrator</option>
                                <option value="operator">Operator</option>
                                <option value="kepalagudang">Kepala Gudang</option>
                            </select>
                        </div> --}}
                        <button class="btn btn-primary w-100 py-2" type="submit">Tambahkan</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    {{-- <input type="submit" value="Tambah" name="simpan" class="btn btn-primary"> --}}

                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
                </form>


            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    @if (Session::has('sukses'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('sukses') }}
    </div>
    @endif

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="datatable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Email</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Posisi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($user->count() > 0)
                        @foreach($user as $users)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $users->nama }}</td>
                            <td>{{ $users->email }}</td>
                            <td>{{ $users->alamat }}</td>
                            <td>{{ $users->posisi }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a data-id="" href="{{ route('anggota.show',$users->id) }}"
                                        class="btn btn-sm btn-info text-white show-modal mr-2" data-toggle="modal"
                                        data-target="#show_user">
                                        <i class="fas fa-fw fa-search"></i>
                                    </a>
                                </div>
                                <div class="btn-group">
                                    <a data-id="" href="{{ route('anggota.edit',$users->id) }}"
                                        class="btn btn-sm btn-info text-white show-modal mr-2" data-toggle="modal"
                                        data-target="#show_user">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="btn-group">
                                    <form action="{{ route('anggota.destroy',$users->id) }}"
                                        onsubmit="return confirm('Yakin ingin menghapus?')" method="POST">
                                        @csrf
                                        @method( 'DELETE')
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
    $(document).ready(function() {
        $('#datatable').DataTable({
            "paging": true,
            "searching": true,
            "lengthChange": true,
            "pageLength": 10
        });
    });
</script>
@endsection