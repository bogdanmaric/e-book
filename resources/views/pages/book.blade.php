@extends("pages.layouts.layout")

@section("title", "E-book")

@section("style")
    <link rel="stylesheet" href="{{asset("assets/css/book.css")}}">
@endsection

@section("main")
    <div class="container mb">
        <div class="row book mt-4 justify-content-center">
            <div class="col-4 d-flex justify-content-center p-3">
                <img class="card-img-top book-image" src="{{asset("assets/images/cover.jpg")}}" alt="book-image">
            </div>
            <div class="row justify-content-center mb-5">
                <div class="card-body book-body col px-3">
                    <h5 class="card-title book-title mb-3 mt-3">{{$book->title}}</h5>
                    <p class="card-text book-text">{{$book->description}}</p>
                    <small class="card-category book-category">{{$book->category->name}}</small>
                    <hr>
                    <form action="">
                        <button href="#" class="btn btn-primary">
                                <span>
                                <img class="book-cart" src="{{asset("assets/images/cart-64.png")}}">
                                </span>
                            Dodaj u korpu
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
