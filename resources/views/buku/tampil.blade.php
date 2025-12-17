@extends('layouts.master')

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('topbar')
    @include('part.topbar')
@endsection

@section('judul')
    <h1 class="text-dark">Book List</h1>
@endsection

@section('content')
    @if (Auth::user()->isAdmin == 1)
        <a href="/buku/create" class="btn btn-primary mb-3">Add Book</a>
    @endif

    <form class="navbar-search mb-3" action="/buku" method="GET">
        <div class="input-group">
            <input type="search" name="search" class="form-control bg-light border-1 small" placeholder="Search for Book Title"
                aria-label="Search" aria-describedby="basic-addon2" style="border-color: #0d6efd;">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>

    <div class="card container-fluid mb-3">

        <div class="row d-flex flex-wrap justify-content-center">

            @forelse ($buku as $item)
                <div class="col-auto my-2" style="width:18rem;">
                    <div class="card mx-2 my-2" style="min-height:28rem;">
                        @if ($item->gambar != null)
                            <img class="card-img-top" style="max-height:180px;" src="{{ asset('/images/' . $item->gambar) }}">
                        @else
                            <img class="card-img-top" style="height:200px;" src="{{ asset('/images/noImage.jpg') }}">
                        @endif
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div class="detai-buku">
                                <h5 class="card-title text-dark"><a
                                        href="/buku/{{ $item->id }}"style="text-decoration: none; font-size:1rem;font-weight:bold; color: inherit;">
                                        {{ $item->judul }}</a></h5>
                                
                                <p class = "cart-text m-0 text-secondary">Book Code: <span class="text-dark">{{ $item->kode_buku }}</span></p>
                                
                                <p class="card-text m-0 text-secondary">Author: <a href="#" class="text-primary"
                                        style="text-decoration: none;">{{ $item->pengarang }}</a></p>
                                
                                <p class="card-text m-0 text-secondary">Category: </p>
                                <p class="text-dark">
                                    @foreach ($item->kategori_buku as $kategori )
                                    {{ $kategori->nama, }},
                                    @endforeach
                                </p>
                                <p class="card-text m-0 text-secondary">Status : <span class="text-dark">{{$item->status  }}</span></p>
                            </div>
                            @if (Auth::user()->isAdmin == 1)
                                <div class="button-area mt-2">
                                    <button class="btn-sm btn-primary px-2"><a href="/buku/{{ $item->id }}"
                                            style="text-decoration: none; color:white;">Detail</a></button>
                                    
                                    <button class="btn-sm btn-warning px-2"><a href="/buku/{{ $item->id }}/edit"
                                            style="text-decoration: none;color:white">Edit</a></button>
                                    
                                    <button class="btn-sm btn-danger px-3"><a data-toggle="modal"
                                            data-target="#DeleteModal{{ $item->id }}">Delete</a></button>
                                </div>
                            @endif

                            @if (Auth::user()->isAdmin == 0)
                                <div class="button-area mt-2">
                                    <button class="btn-sm btn-primary px-2"> <a href="/buku/{{ $item->id }}"
                                    style="text-decoration: none; color:white;">Detail</a></button>
                                    <button class="btn-sm btn-success px-4"><a a href="/peminjaman/create"
                                    style="text-decoration: none; color:white;">Borrow Books</a></button>
                                </div>
                            @endif

                            <div class="modal fade" id="DeleteModal{{ $item->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="ModalLabelDelete" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ModalLabelDelete">Ohh No!</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancel</button>
                                            <form action="/buku/{{ $item->id }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger px-4" type="submit"
                                                    value="delete">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <h1 class="text-secondary mt-3">No books</h1>
            @endforelse

        </div>

        <div class="d-flex justify-content-between mx-2 my-2">
            <p class="text-secondary my-2">Displaying {{ $buku->currentPage() }} from {{ $buku->lastPage() }} Page</p>

            {{ $buku->links() }}
        </div>

    </div>
@endsection