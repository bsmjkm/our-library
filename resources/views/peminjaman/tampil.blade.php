@extends('layouts.master')

@section('sidebar')
    @include('part.sidebar')
@endsection

@section('topbar')
    @include('part.topbar')
@endsection

@section('judul')
    <h1 class="text-dark">Loan History List</h1>
@endsection


@push('styles')
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/dt-1.12.1/date-1.1.2/fc-4.1.0/r-2.3.0/sc-2.0.7/datatables.min.css" />
@endpush


@push('scripts')
    <script src="{{ '/template/vendor/datatables/jquery.dataTables.min.js' }}"></script>
    <script src="{{ '/template/vendor/datatables/dataTables.bootstrap4.min.js' }}"></script>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable(); 
            $('#dataTableHover').DataTable(); 
        });
    </script>
@endpush

@section('content')
    @if (Auth::user()->isAdmin == 1)
    <div class="container">
        <a href="/peminjaman/create" class="btn btn-primary mb-3 "><i class="fa-solid fa-plus"></i>Add</a>
        <a href="/cetaklaporan" class="btn btn-secondary mb-3 mx-2"><i class="fa-solid fa-print"></i>Print</a>
    </div>
    <div class="col-lg-auto">
        <div class="card mb-4">
            <div class="table-responsive p-3">
                <table class="table align-items-center justify-content-center table-flush table-hover" id="dataTableHover" style="font-size: .7rem">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Book title</th>
                            <th scope="col">Book Code</th>
                            <th scope="col">Borrow Date</th>
                            <th scope="col">Mandatory Return Date</th>
                            <th scope="col">Return Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($peminjam as $item )
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->buku->judul }}</td>
                            <td>{{ $item->buku->kode_buku }}</td>
                            <td>{{ $item->tanggal_pinjam }}</td>
                            <td>{{ $item->tanggal_wajib_kembali }}</td>
                            <td>{{ $item->tanggal_pengembalian }}</td>
                        </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif

    @if(Auth::user()->isAdmin == 0)
    <div class="col-lg-auto">
        <div class="card mb-4">
            <div class="table-responsive p-3">
                <table class="table align-items-center justify-content-center table-flush table-hover" id="dataTableHover" style="font-size: .7rem">
                    <thead class="thead-dark">
                        <tr class="">
                            <th scope="col">No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Book title</th>
                            <th scope="col">Book Code</th>
                            <th scope="col">Borrow Date</th>
                            <th scope="col">Mandatory Return Date</th>
                            <th scope="col">Return Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pinjamanUser as $item )
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->buku->judul }}</td>
                            <td>{{ $item->buku->kode_buku }}</td>
                            <td>{{ $item->tanggal_pinjam }}</td>
                            <td>{{ $item->tanggal_wajib_kembali }}</td>
                            <td>{{ $item->tanggal_pengembalian }}</td>
                        </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif

    @endsection