@extends('layouts.master')


@section('sidebar')
    @include('part.sidebar')
@endsection

@section('topbar')
    @include('part.topbar')
@endsection

@section('judul')
    <h1 class="text-dark">Add Category</h1>
@endsection

@section('content')
    <div class="card px-4 pt-3 pb-5">

        <form action="/kategori" method="post">
            @csrf
            <div class="form-group">
                <label for="formGroupExampleInput" class="text-secondary font-weight-bold">Category Name</label>
                <input name="nama" type="text" class="form-control" id="formGroupExampleInput">
            </div>
            @error('nama')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="exampleFormControlTextarea1" class="text-secondary font-weight-bold">Description</label>
                <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1" rows="3"></textarea>

            </div>

            <div class="d-flex justify-content-end">
                <a href="/kategori" class="btn btn-secondary mx-2">Cancel</a>
                <button class="btn btn-primary px-4">Add</button>
            </div>

        </form>
    </div>
@endsection