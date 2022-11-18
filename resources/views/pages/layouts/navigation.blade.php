<nav class="navbar navbar-dark justify-content-between">
    <a class="navbar-brand" href="{{url("/")}}">
        <img src="{{asset("assets/images/ebook.png")}}" width="30" height="30" class="d-inline-block align-top" alt="">
        E-Book Prodavnica
    </a>

    <div class="right-menu">
        <a href="#" id="cart"><span><img id="cart-image" src="{{asset("assets/images/cart-64.png")}}"></span></a>
        @if (Auth::check())
            <a class="nav-link" id="add-book" href="#">Dodaj Knjigu</a>

            <!-- Authentication -->
            <form id="logout" method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="route('logout')"
                onclick="event.preventDefault();
                this.closest('form').submit();">Odjava</a>
            </form>
        @endif


    </div>
</nav>
