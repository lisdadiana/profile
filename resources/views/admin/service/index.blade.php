<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <!-- Memuat Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <a href="/admin/service/create" class="btn btn-primary mb-3">
                        <i class="fas fa-plus"></i> Tambah
                    </a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Icon</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->title }}</td>
                                <td>
                                    <!-- Menampilkan icon, jika tidak ada icon, tampilkan default icon -->
                                    <i class="{{ $item->icon ? $item->icon : 'fas fa-question-circle' }}"></i>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="/admin/service/{{ $item->id }}/edit" class="btn btn-success mx-2">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        
                                        <form action="/admin/service/{{ $item->id }}" method="POST" onsubmit="return confirmDelete()">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Script konfirmasi penghapusan -->
    <script>
        function confirmDelete() {
            return confirm('Apakah Anda yakin ingin menghapus data ini?');
        }
    </script>
</body>
</html>
