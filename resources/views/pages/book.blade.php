@extends("pages.layouts.layout")

@section("title", "{$book->title}")

@section("style")
    <link rel="stylesheet" href="{{asset("assets/css/book.css")}}">
@endsection

@section("main")
    <div class="container mb">
        <div class="row book mt-4 justify-content-center">
            <div class="col-4 d-flex flex-column align-items-center p-3">
                @if (Auth::check())
                    <div class="d-flex">
                        <form id="delete-form" action="{{action("\App\Http\Controllers\BookControllerR@destroy", [$book->id])}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger">Izbrši</button>
                        </form>
                        <form id="update-form" action="{{action("\App\Http\Controllers\BookControllerR@edit", [$book->id])}}" method="post">
                            @csrf
                            @method("GET")
                            <input type="submit"value="Izmeni" class="btn btn-warning">
                        </form>
                    </div>
                    <hr>
                @endif
                <div class="d-flex justify-content-center div-author-publisher">
                    <pre class="book-author-publisher">{{$book->author}} - {{$book->publisher}}</pre>
                </div>
                <img class="card-img-top book-image" src="{{$book->image_link}}" alt="book-image" >
                    @if(!Session::get("cart")->has($book->id))
                        <form class="mt-3" action="{{route("addBookToCart", [$book->id])}}" method="post">
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
                        <p class="mt-3">Knjiga se već nalazi u korpi</p>
                    @endif
            </div>
            <div class="row justify-content-center mb-5">
                <div class="card-body book-body col px-3">
                    <h5 class="card-title book-title mb-3 mt-3">{{$book->title}}</h5>
                    <p class="card-text book-text">{{$book->description}}</p>
                    <small class="card-category book-category">{{$book->category->name}}</small>
                    <hr>
                    <div class="d-flex justify-content-center">
                        <p class="book-author-publisher m-0">{{"Cena " . $book->price . " RSD"}} </p>
                    </div>
                    <hr>
                    <hr>
                </div>
            </div>
        </div>
    </div>
@endsection
