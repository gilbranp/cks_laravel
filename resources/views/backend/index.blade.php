@extends('backend.main')

@section('container')
<div class="col-xl-12 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="font-weight-bold text-primary text-uppercase mb-1">
                        {{-- @foreach ($user as $users) --}}
                        Selamat Datang {{ $users->nama }}, di Sistem Informasi Pengelola
                        {{-- @endforeach --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection