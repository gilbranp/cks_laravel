{{-- @include('frontend.partials.navbar') --}}

@extends('frontend.main')
@section('konten')
<br><br><br><br><br><br><br>
<style>
    body {
        background-color: #f8f9fa;
    }
    .article-content {
        background-color: #ffffff;
        padding: 30px;
        margin-top: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .article-img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin-bottom: 20px;
    }
    .whatsapp-link {
        margin-top: 20px;
    }
    h1 {
        font-size: 2.5rem;
        font-weight: bold;
        color: #333333;
    }
    p {
        font-size: 1.1rem;
        line-height: 1.6;
        color: #666666;
    }
    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
        padding: 10px 20px;
        font-size: 1.2rem;
        border-radius: 50px;
    }
</style>
</head>
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="article-content">
                <h1 class="text-center">{{ $title }}</h1>
                <p class="text-break">{{ $deskripsi }}</p>
                <div class="text-center">
                    <img src="{{ asset('images/ukm/' . $foto) }}" alt="hoaxx" class="article-img img-fluid">
                </div>
                <div class="text-center whatsapp-link">
                    <a href="{{ $url }}" class="btn btn-success btn-lg">Chat via WhatsApp</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.min.js"></script>
</body>
@endsection
{{-- @include('frontend.partials.footer') --}}