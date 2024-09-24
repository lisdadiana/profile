<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td widht="100px">#</td>
                        <td widht="250px">Name</td>
                        <td>Massage</td>
                        <td>Action</td>
                    </tr>

                    @foreach ($pesan as $item)

                    <tr style="{{ $item->is_read == 1 ? 'background-color: #f0f0f0' : ''}}">
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <a href="/admin/pesan/{{ $item->id }}"><b>{{ $item->name }}</b></a>
                        </td>
                        <td>{!! Illuminate\Support\Str::limit($item->desc, 100) !!}</td>
                        <td>
                        <form action="/admin/pesan/{{ $item->id }}" method="POST" onsubmit="return confirmDelete()">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                        </td>
                    </tr>
                    
                    @endforeach

                </table>
            </div>
        </div>
    </div>
</div>