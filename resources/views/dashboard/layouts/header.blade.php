<header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="/dashboard">iNovel</a>
    <input class="form-control form-control-dark w-100 border-0" type="text" placeholder="Search" aria-label="Search">
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <form action="/logout" method="post">
                @csrf
                <button type='submit' class="nav-link px-3 border-0">Logout <i class="bi bi-box-arrow-right"></i> </a></button>
            </form>
        </div>
    </div>
</header>