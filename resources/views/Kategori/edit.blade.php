@extends('layouts.master')


@section('sidebar')
    @include('part.sidebar')
@endsection

@section('topbar')
    @include('part.topbar')
@endsection

@section('judul')
    <h2 class="text-dark">Edit Kategori</h2>
@endsection

@section('content')
    <div class="card px-4 pt-3 pb-5">
        <form action="/kategori/{{ $kategori->id }}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="formGroupExampleInput" class="text-secondary font-weight-bold">Category Name</label>
                <input name="nama" type="text" value="{{ old('nama', $kategori->nama) }}" class="form-control"
                    id="formGroupExampleInput">
            </div>
            @error('nama')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label class="text-secondary font-weight-bold">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" cols="30" rows="3">{{ old('deskripsi', $kategori->deskripsi) }}</textarea>

                @error('deskripsi')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="d-flex justify-content-end">
                <a href="/kategori" class="btn btn-secondary mx-2 px-3">Cancel</a>
                <button class="btn btn-primary px-4">Save</button>
            </div>
        </form>
    </div>
@endsection