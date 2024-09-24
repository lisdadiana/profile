<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .wrapper-img-banner {
      max-width: 100%;
      max-height: 600px;
      overflow: hidden;
    }

    .img-banner {
      width: 100%;
      object-fit: cover;
    }
  </style>
</head>
<body>
  <!-- Carousel Section -->
  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="carousel-inner">

      @foreach ($banner as $key => $item)

      <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
        <div class="wrapper-img-banner">
          <img src="{{ $item->gambar }}" class="img-banner" alt="">
        </div>

          <div class="container">
            <div class="carousel-caption text-start" style="color: black;">
              <h1>{{ $item->headline }}</h1>
              <p>{{ $item->desc }}</p>
            </div>
          </div>
      </div>

      @endforeach
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- About Section -->
  <div class="container mt-5">
    <div class="text-center">
      <h4 class="text-center">About</h4>
    </div>
    <div class="row">
      <div class="col-md-6">
      <img src="{{ $about->cover }}" class="img-fluid" alt="About Image">

      </div>
      <div class="col-md-6">
        {{ $about->desc }}
      </div>
    </div>
  </div>

  <!-- Services Section -->
  <div class="container my-4">
    <div class="text-center">
      <h4 class="text-center">Services</h4>
      <p>Apa yang kami lakukan? Kami Akan Beri Tahu Anda</p>
    </div>

    <div class="row">

      @foreach ($services as $item)

      <div class="col-md-3">
        <div class="text-center">
        <i class="{{ $item->icon }} fa-3x text-success"></i>
          <h5><b>{{ $item->title }}</b></h5>
          <p>{{ $item->desc }}</p>
        </div>
      </div>

      @endforeach

    </div>
    <div class="text-center mt-3">
        <a href="/services" class="btn btn-success px-5">selengkapnya <i class="fas fa-arrow-right"></i></a>
    </div>
  </div>


  <div class="container my-2">
  <div class="text-center">
    <h4 class="text-center">Blog</h4>
    <p>Apa Saja Kabar Hari Ini? Kami Akan Beri Tahu Anda</p>
  </div>

      <div class="row">
        @foreach($blog as $item)
          <div class="col-md-3 my-3">
            <div class="card shadow-sm h-100 d-flex flex-column">
              <!-- Wrapper for image and content -->
              <img src="/{{ $item->cover }}" class="img-fluid" alt="" style="height: 200px; object-fit: cover;">

              <div class="card-body d-flex flex-column justify-content-between">
                <div>
                  <a href="/blog/show/{{ $item->id }}" class="text-decoration-none">
                    <h5>{{ $item->title }}</h5>
                  </a>
                  <p>{!! Illuminate\Support\Str::limit($item->body, 100) !!}</p>
                </div>
                <div class="mt-auto">
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
  </div>


      <div class="text-center mt-3">
        <a href="" class="btn btn-success px-5">selengkapnya <i class="fas fa-arrow-right"></i></a>
    </div>

    </div>

    <div class="bg-light my-5">
    <div class="container">
      <div class="text-dark text-center">
        <h5>Pelajari Tentang Kami</h5>
        <p>"Kami terus berinovasi untuk menghadirkan solusi yang lebih baik dan ramah lingkungan dalam penyediaan air bersih."</p>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>