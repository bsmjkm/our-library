@extends('layouts.master')

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('topbar')
    @include('part.topbar')
@endsection

@section('judul')
    <h1 class="text-dark">Book Return Form</h1>
@endsection

@section('content')
    <div class="card">

        <div class="card-body">

            <form action="/pengembalian" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="nama" class="text-secondary font-weight-bold">Borrower Name</label>
                    <select name="users_id" id="" class="form-control">
                        <option value=""></option>
                        @forelse ($peminjam as $item)
                                <option value="{{ $item->id }}">{{ $item->user->name}} ( {{ $item->npm }} )</option>
                            @empty
                                there are no users
                            @endforelse
                    </select>
                </div> 
                <div class="form-group mb-3">
                    <label for="buku" class="text-secondary font-weight-bold">Books to be borrowed</label>
                    <select name="buku_id" id="" class="form-control">
                        <option value=""></option>
                        @forelse ($buku as $item)
                                <option value="{{ $item->id }}">{{ $item->judul}} ( {{ $item->kode_buku }} ) - {{ $item->status }}</option>
                            @empty
                                no books available
                            @endforelse
                    </select>
                </div>

                @error('buku_id')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror

                <div class="d-flex justify-content-end mt-5">
                    <a href="/peminjaman" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary mx-1 px-4">Submit</button>
                </div>


            </form>

        </div>
    </div>
@endsection