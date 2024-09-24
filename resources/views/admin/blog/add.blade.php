<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">

                @if (isset($blog))
                    <form action="/admin/posts/blog/{{ $blog->id }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                @else
                    <form action="/admin/posts/blog" method="POST" enctype="multipart/form-data">
                @endif
                    @csrf

                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror"
                                 placeholder="title" value="{{ isset($blog) ? $blog->title : old('title') }}">
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Kategori</label>
                                <select name="kategori_id" class="form-control" id="">
                                    <option value="">-- KATEGORI --</option>
                                    @foreach ($kategori as $item)
                                        <option value="{{ $item->id }}"  
                                        {{ (isset($blog) && $item->id == $blog->kategori_id) ? 'selected' : '' }}>
                                        {{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('kategori_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Cover</label>
                                <input type="file" id="cover" name="cover" class="form-control @error('cover') is-invalid @enderror">
                                @error('cover')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                @if (isset($blog))
                                    <img src="/{{ $blog->cover }}" width="100%" class="mt-4" alt="">
                                @endif      
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Body</label>
                                <textarea type="text" id="summernote" name="body" class="form-control @error('body') is-invalid @enderror" cols="30" rows="10"
                                 placeholder="Body">{{ isset($blog) ? $blog->body : old('body') }}</textarea>
                                @error('body')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
