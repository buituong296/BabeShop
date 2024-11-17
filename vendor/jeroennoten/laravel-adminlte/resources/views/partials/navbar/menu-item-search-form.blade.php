<li class="nav-item">
    {{-- Search toggle button --}}
    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
        <i class="fas fa-search"></i>
    </a>

    {{-- Search bar --}}
    <div class="navbar-search-block">
        <form class="form-inline" action="{{ url()->current() }}" method="GET">
            <div class="input-group">
                {{-- Search input --}}
                <input class="form-control form-control-navbar"
                    type="search"
                    name="query"
                    placeholder="Tìm kiếm..."
                    aria-label="Search"
                    value="{{ request()->query('query') }}">

                {{-- Search buttons --}}
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</li>
