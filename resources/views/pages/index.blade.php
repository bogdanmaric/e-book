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
                    <a style="text-decoration: none; color: black;" href="{{route("ebook.show", $book->id)}}">
                    <img class="card-img-top book-image" src="{{asset("assets/images/cover.jpg")}}" alt="book-image">
                    <div class="card-body book-body">
                        <h5 class="card-title book-title">{{$book->title}}</h5>
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
                    </a>
                </div>

{{--            <div class="col-12 col-md-4">
                <div class="m-4 book">
                <p>{{$book->title}}</p>
                <p>{{$book->description}}</p>
                <p>{{$book->author}}</p>
                <p>{{$book->publisher}}</p>
                <p>{{$book->link}}</p>
                <p>{{$book->price}}</p>
                <p>{{$book->category->name}}</p>
                </div>
            </div>--}}
        @endforeach
        </div>
    </div>
@endsection
