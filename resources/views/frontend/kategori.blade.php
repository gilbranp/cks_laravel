 @extends('frontend.main')
 @section('konten')
<br><br><br><br><br><br>

<style>
        /* body {
            background-color: #f8f9fa;
            padding: 20px;
        } */
        .category-title {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 30px;
            color: #333333;
        }
        .card {
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-img-top {
            max-height: 200px;
            object-fit: cover;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #007bff;
        }
        .card-text {
            color: #666666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="category-title text-center">Kategori produk UKM : {{ $kategori }}</h1>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($ukm as $ukms)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ asset('images/ukm/'. $ukms->foto) }}" alt="{{ $ukms->nama }}" class="card-img-top">
                        <div class="card-body">
                            <h2 class="card-title"><a href="/ukm/{{ $ukms->slug }}" class="stretched-link">{{ $ukms->nama }}</a></h2>
                            <p class="card-text">{{ $ukms->deskripsi }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
</body>

@endsection