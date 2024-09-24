<div class="container my-5">

    <div class="text-center mb-4">
        <h4 class="font-weight-bold">Kontak Kami</h4>
        <p class="text-muted">Berikan Saran dan Masukan Untuk Kami</p>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="/contact/send" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="Nama">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Masukkan nama Anda" required>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <label for="desc">Isi Pesan</label>
                            <textarea name="desc" id="" cols="30" rows="5" class="form-control @error('desc') is-invalid @enderror" placeholder="Masukkan pesan Anda" required></textarea>
                            @error('desc')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success mt-3 w-100">Kirim</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h5 class="font-weight-bold">Informasi Kontak</h5>
                    <div class="d-flex align-items-center mt-3">
                        <i class="fas fa-phone fa-2x px-3"></i>
                        <h6>+62</h6>
                    </div>

                    <div class="d-flex align-items-center mt-3">
                        <i class="fas fa-envelope fa-2x px-3"></i>
                        <h6>pdamgarut@tirtaintan.co.id</h6>
                    </div>

                    <div class="d-flex align-items-center mt-3">
                        <i class="fas fa-map-marker-alt fa-2x px-3"></i>
                        <h6>Jln. Cipanas Ruko Graha Praja Indah No. 9A, Lengensari, Kec. Tarogong Kaler, Kab. Garut</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
