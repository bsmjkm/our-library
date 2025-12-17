<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #0f172a !important; background-image: none;">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/home">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('/img/logo.png') }}">
        </div>
        <div class="sidebar-brand-text mx-3">OUR-Library</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link" href="/home">
            <i class="fa-solid fa-house"></i>
            <span>Home</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Features

    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
            aria-expanded="true" aria-controls="collapseBootstrap">
            <i class="fa-solid fa-book"></i>
            <span>Book</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Book</h6>
                <a class="collapse-item" href="/buku">View All Books</a>

                @if (Auth::user()->isAdmin == 1)
                    <a class="collapse-item" href="/buku/create">Add Book</a>
                @endif

            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm"
            aria-expanded="true" aria-controls="collapseForm">
            <i class="fa-solid fa-book-open"></i>
            <span>Category</span>
        </a>
        <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Category</h6>
                <a class="collapse-item" href="/kategori">View Categories</a>

                @if (Auth::user()->isAdmin == 1)
                    <a class="collapse-item" href="/kategori/create">Add Category</a>
                @endif

            </div>
        </div>
    </li>

    @if (Auth::user()->isAdmin == 1)
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable"
                aria-expanded="true" aria-controls="collapseTable">
                <i class="fa-solid fa-users"></i>
                <span>Member</span>
            </a>
            <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Member</h6>
                    <a class="collapse-item" href="/anggota">See Members</a>
                    <a class="collapse-item" href="/anggota/create">Add Member</a>
                </div>
            </div>
        </li>
    @endif

    @if (Auth::user()->isAdmin == 1)
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePeminjam"
                aria-expanded="true" aria-controls="collapsePeminjam">
                <i class="fa-solid fa-user-pen"></i>
                <span>Borrowing</span>
            </a>
            <div id="collapsePeminjam" class="collapse" aria-labelledby="headingPeminjam"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Borrowing</h6>
                    <a class="collapse-item" href="/peminjaman">Loan History</a>
                    <a class="collapse-item" href="/peminjaman/create">Add Loan</a>
                    <a class="collapse-item" href="/pengembalian">Return Books</a>
                </div>
            </div>
        </li>
    @endif

    @if (Auth::user()->isAdmin == 0)
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePeminjam"
                aria-expanded="true" aria-controls="collapsePeminjam">
                <i class="fas fa-fw fa-table"></i>
                <span>Borrow Books</span>
            </a>
            <div id="collapsePeminjam" class="collapse" aria-labelledby="headingPeminjam"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Borrow Books</h6>
                    <a class="collapse-item" href="/peminjaman/create">Borrow Books</a>
                    <a class="collapse-item" href="/peminjaman">My Loans</a>
                </div>
            </div>
        </li>
    @endif

</ul>