@extends('layouts.master')

@section('topbar')
    @include('part.topbar')
@endsection

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('judul')
   <h2 class="text-dark"> Welcome, {{ Auth::user()->name }}</h2>
@endsection

@section('content')
<div class="row mb-3">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100 bg-gradient-primary">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-sm font-weight-bold text-uppercase mb-1 text-light">Number of Books</div>
                        <div class="text-sm text-light h5 mb-0 font-weight-bold">{{ $buku }}</div>
                        <div class="button mt-2"><a href="/buku" class="text-light">Details</a></div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-book fa-3x text-light"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100 bg-gradient-info">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-sm text-light font-weight-bold text-uppercase mb-1">Category</div>
                        <div class="text-sm text-light h5 mb-0 font-weight-bold">{{ $kategori }}</div>
                        <div class="button mt-2"><a href="/kategori" class="text-light">Details</a></div>
                    </div>
                    <div class="col-auto">
                        <i class="fa-solid fa-bookmark fa-3x text-light"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100 bg-gradient-success">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-sm text-light font-weight-bold text-uppercase mb-1">Member</div>
                        <div class="h5 mb-0 mr-3 font-weight-bold text-light">{{ $user }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-3x text-light"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100 bg-gradient-danger">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-sm text-light font-weight-bold text-uppercase mb-1" style="font-size:.8rem;">Current Loans</div>
                        <div class="h5 mb-0 mr-3 font-weight-bold text-light">{{ $pinjamanUser }}</div>
                        <div class="button mt-2"><a href="/peminjaman" class="text-light">Details</a></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-tie fa-3x text-light"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card bg-gradient-secondary">
    <div class="container pb-3">
        <h3 class="text-light"> <i class="fa-solid fa-circle-info text-light my-3"></i> Loan Rules Information</h3>
        <ol class="text-light">
            <li class="text-light">Maximum loan period is 1 week</li>
            <li class="text-light">Each member can only borrow a maximum of 3 books.</li>
            <li class="text-light">If the book is returned later than the specified time, a fine of Rp. 15,000/week will be imposed for each book.</li>
            <li class="text-light">If you have borrowed a book, please go to the clerk's office to confirm.</li>
            <li class="text-light">If you return a book late and receive a fine, you must pay it directly to the officer when returning the book.</li>
        </ol>
    </div>
</div>
@endsection