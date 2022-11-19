<nav class="navbar navbar-dark justify-content-between">
    <a class="navbar-brand" href="{{url("/")}}">
        <img src="{{asset("assets/images/ebook.png")}}" width="30" height="30" class="d-inline-block align-top" alt="">
        E-Book Prodavnica
    </a>

    <div class="right-menu">
        <a href="#" id="cart"><span><img id="cart-image" src="{{asset("assets/images/cart-64.png")}}"></span></a>
        @if (Auth::check())
                <a id="add-book" class="d-flex align-items-center" href="#">
                    Dodaj Knjigu
                    <img style="margin-left: 2px;" src="{{asset("assets/images/plus-sign.png")}}" width="25" height="25" class="d-inline-block align-top" alt="">
                </a>

            <a id="add-book" class="d-flex align-items-center" href="#">
                Kategorije
                <img style="margin-left: 2px;" src="{{asset("assets/images/list.png")}}" width="22" height="22" class="d-inline-block align-top" alt="">
            </a>

            <div id="logout">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="route('logout')"
                    onclick="event.preventDefault();
                    this.closest('form').submit();">Odjava</a>
                </form>
                <img style="margin-left: 2px;" src="{{asset("assets/images/power.png")}}" width="25" height="25" class="d-inline-block align-top" alt="">
            </div>
        @endif
    </div>
</nav>
