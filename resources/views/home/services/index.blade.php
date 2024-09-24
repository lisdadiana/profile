<div class="container">

    <div class="text-center mt-5">
      <h4 class="text-center">Services</h4>
      <p>Apa yang kami lakukan? Kami Akan Beri Tahu Anda</p>
    </div>

    <div class="row">

      @foreach ($services as $item)

      <div class="col-md-3 my-3">
        <div class="text-center">
          <i class="{{ $item->icon }} fa-3x text-success"></i>
          <h5><b>{{ $item->title }}</b></h5>
          {!! Illuminate\Support\Str::limit($item->desc, 100) !!}
        </div>
      </div>
      
      @endforeach
    
    </div>
</div>
