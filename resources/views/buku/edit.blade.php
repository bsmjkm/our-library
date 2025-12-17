@extends('layouts.master')

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('topbar')
    @include('part.topbar')
@endsection

@section('judul')
    <h1 class="text-dark">Edit Book</h1>
@endsection

@section('content')
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Book Edit Form</h6>
        </div>
        <div class="card-body">
            <form action="/buku/{{ $buku->id }}" method="post"enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group mb-3">
                    <label for="Judul"class="text-secondary font-weight-bold">Book title</label>
                    <input type="text" name="judul" class="form-control" value="{{ old('judul', $buku->judul) }}">
                </div>

                @error('judul')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group mb-3">
                    <label for="kode_buku"class="text-secondary font-weight-bold">Book Code</label>
                    <input type="text" name="kode_buku" class="form-control" value="{{ old('kode_buku',$buku->kode_buku) }}">
                </div>

                @error('kode_buku')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group mb-3">
                    <label for="kategori" class="text-secondary font-weight-bold">Category</label>
                    <select class="form-control" name="kategori_buku[]" id="multiselect" multiple="multiple">
                        @forelse ($kategori as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @empty
                            no categories
                        @endforelse

                    </select>
                </div>

                @error('kategori')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group mb-3">
                    <label for="pengarang" class="text-secondary font-weight-bold">Author</label>
                    <input type="text" name="pengarang" class="form-control"
                        value="{{ old('pengarang', $buku->pengarang) }}">
                </div>

                @error('pengarang')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group mb-3">
                    <label for="penerbit" class="text-secondary font-weight-bold">Publisher</label>
                    <input type="text" name="penerbit" class="form-control"
                        value="{{ old('penerbit', $buku->penerbit) }}">
                </div>

                @error('penerbit')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group mb-3">
                    <label for="tahun_terbit"class="text-secondary font-weight-bold">Publication Year</label>
                    <input type="text" name="tahun_terbit"
                        value="{{ old('tahun_terbit', $buku->tahun_terbit) }}"class="form-control">
                </div>

                @error('tahun_terbit')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group mb-3">
                    <label for="deskripsi"class="text-secondary font-weight-bold">Description</label>
                    <textarea class="form-control" name="deskripsi" rows="2">{{ old('deskripsi', $buku->deskripsi) }}</textarea>
                </div>

                @error('deskripsi')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="photoProfile" class="text-md text-secondary font-weight-bold">Add Book Cover</label>
                    <div class="custom-file">
                        <input type="file" name="gambar" id="gambar"
                            value="{{ old('gambar') }}">{{ old('gambar') }}
                    </div>
                </div>

                @error('gambar')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="d-flex justify-content-end">
                    <a href="/buku" class="btn btn-secondary mx-2">Back</a>
                    <button type="submit" class="btn btn-primary px-3">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        $('#multiselect').select2({
            allowClear: true
        });
    </script>
@endsection