@extends("pages.layouts.layout")

@section("title", "E-book")

@section("style")
    <link rel="stylesheet" href="{{asset("assets/css/index.css")}}">
@endsection

@section("main")
    <div class="container">
        <div class="row books text-center justify-content-center">
        @foreach ($books as $book)
                <div class="book card col-12 col-md-4 p-3 m-5">
                    @if (Auth::check())
                        <div class="d-flex justify-content-around">
                            <form action="{{action("\App\Http\Controllers\BookControllerR@destroy", [$book->id])}}" method="post">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-danger">Izbrši</button>
                            </form>
                            <form action="{{action("\App\Http\Controllers\BookControllerR@edit", [$book->id])}}" method="post">
                                @csrf
                                @method("GET")
                                <input type="submit"value="Izmeni" class="btn btn-warning">
                            </form>
                        </div>
                        <hr>
                    @endif
                    <a class="book-clickable" href="{{route("ebook.show", $book->id)}}">
                    <div class="d-flex justify-content-center div-author-publisher">
                        <pre class="book-author-publisher">{{$book->author}} - {{$book->publisher}}</pre>
                    </div>
                    <img class="card-img-top book-image" src="{{$book->image_link}}" alt="book-image">
                    <div class="card-body book-body">
                        <h5 class="card-title book-title">{{$book->title}}</h5>
                        <small class="card-category book-category">{{$book->category->name}}</small>
                        <hr>
                        @if(!Session::get("cart", $book->id))
                        <form action="{{route("addBookToCart", [$book->id])}}" method="post">
                            @csrf
                            @method("POST")
                            <button class="btn btn-primary">
                                <span>
                                <img class="book-cart" src="{{asset("assets/images/cart-64.png")}}">
                                </span>
                                Dodaj u korpu
                            </button>
                        </form>
                        @else
                            <p>Knjiga se već nalazi u korpi</p>
                        @endif
                    </div>
                    </a>
                </div>
        @endforeach
        </div>
    </div>
@endsection
