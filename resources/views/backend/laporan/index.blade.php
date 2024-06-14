@extends('backend.main')

@section('container')

<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

<div class="d-flex justify-content-end mb-3">
    <!-- Button trigger modal -->
    @can('posisi-ketua')
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fas fa-fw fa-plus"></i>
        Tambahkan Data
    </button>
    @endcan
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah data Laporan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="{{ route('laporan.store') }}" method="post">
                        @csrf
                        <div class="form-floating">
                            <input type="text" name="nama"
                                class="form-control @error('nama') is-invalid @enderror" id="nama"
                                placeholder="Masukka Nama" required value="{{ old('nama') }}">
                            <label for="nama">Nama Anggota</label>
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                        </div>
                       
                        <div class="form-floating">
                            <input type="number" name="pokok"
                                class="form-control @error('pokok') is-invalid @enderror" id="pokok"
                                placeholder="Setor simpanan pokok" required value="{{ old('pokok') }}">
                            <label for="pokok">Simpanan Pokok Rp :</label>
                            @error('pokok')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input type="number" name="sukarela"
                                class="form-control @error('sukarela') is-invalid @enderror" id="sukarela"
                                placeholder="Setor simpanan suka rela" required value="{{ old('sukarela') }}">
                            <label for="sukarela">Simpanan Sukarela Rp :</label>
                            @error('sukarela')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input type="number" name="wajib"
                                class="form-control @error('wajib') is-invalid @enderror" id="wajib"
                                placeholder="Setor simpanan wajib" required value="{{ old('wajib') }}">
                            <label for="wajib">Simpanan Wajib Rp :</label>
                            @error('wajib')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                       
                        <div class="form-floating">
                            <input type="text" name="deskripsi"
                                class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"
                                placeholder="Masukkan Deskripsi" value="{{ old('deskripsi') }}">
                            <label for="deskripsi">Deskripsi (Optional)</label>
                            @error('deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-floating">
                            <input type="date" name="tanggal"
                                class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                               placeholder="Masukkan tanggal" required value="{{ old('tanggal') }}">
                            <label for="tanggal">Tanggal</label>
                            @error('tanggal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                      
                        <button class="btn btn-primary w-100 py-2" type="submit">Tambahkan</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    
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
            <form method="GET" action="{{ route('laporan.index') }}">
                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <label class="sr-only" for="inlineFormInput">Bulan</label>
                        <select class="form-control mb-2" name="bulan" id="bulan">
                            <option value="">Pilih Bulan</option>
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}" {{ request('bulan') == $i ? 'selected' : '' }}>
                                    {{ date('F', mktime(0, 0, 0, $i, 1)) }}
                                </option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-auto">
                        <label class="sr-only" for="inlineFormInput">Tahun</label>
                        <select class="form-control mb-2" name="tahun" id="tahun">
                            <option value="">Pilih Tahun</option>
                            @for ($i = date('Y'); $i >= date('Y') - 10; $i--)
                                <option value="{{ $i }}" {{ request('tahun') == $i ? 'selected' : '' }}>
                                    {{ $i }}
                                </option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-2">Filter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="datatable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Anggota</th>
                            {{-- <th scope="col">Alamat</th> --}}
                            <th scope="col">Simpanan Pokok</th>
                            <th scope="col">Simpanan Sukarela</th>
                            <th scope="col">Simpanan Wajib</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($laporan->count() > 0)
                        @foreach($laporan as $laporans)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td class="text-break">{{ $laporans->nama }}</td>
                            <td class="text-break">Rp{{ $laporans->pokok }}</td>
                            <td class="text-break">Rp{{ $laporans->sukarela }}</td>
                            <td class="text-break">Rp{{ $laporans->wajib }}</td>
                            <td class="text-break">{{ $laporans->deskripsi }}</td>
                            <td class="text-break">{{ $laporans->tanggal }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <form action="{{ route('laporan.destroy',$laporans->id) }}"
                                        onsubmit="return confirm('Yakin ingin menghapus?')" method="POST">
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
                            <td class="text-center" colspan="8">Tidak Ada Data Yang Tersimpan</td>
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