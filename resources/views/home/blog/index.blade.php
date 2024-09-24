<style>
    .img-card-blog {
        width: 100%; /* Agar gambar memenuhi lebar kartu */
        height: 200px; /* Atur tinggi yang sama untuk semua gambar */
        object-fit: cover; /* Agar gambar tidak terdistorsi */
    }
</style>

<div class="container my-5">
    <div class="text-center">
        <h4 class="text-center">Blog</h4>
        <p>Apa Saja Kabar Hari Ini? Kami Akan Beri Tahu Anda</p>
    </div>

    <div class="row">
        @foreach($blog as $item)
            <div class="col-md-3 my-3">
                <div class="card shadow-sm h-100">
                    <img src="/{{ $item->cover }}" class="img-card-blog" alt="">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="/blog/show/{{ $item->id }}">{{ $item->title }}</a>
                        </h5>
                        <p class="card-text">{!! Illuminate\Support\Str::limit($item->body, 100) !!}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
