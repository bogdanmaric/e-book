@extends("pages.layouts.layout")

@section("title", "E-book")

@section("style")
    <link rel="stylesheet" href="{{asset("assets/css/index.css")}}">
@endsection

@section("main")
    <div class="container">
        <div class="row books">
        @foreach ($books as $book)
            <div class="col-12 col-md-4">
                <div class="m-4 book">
                <p>{{$book->title}}</p>
                <p>{{$book->description}}</p>
                <p>{{$book->author}}</p>
                <p>{{$book->publisher}}</p>
                <p>{{$book->link}}</p>
                <p>{{$book->price}}</p>
                <p>{{$book->category->name}}</p>
                </div>
            </div>
        @endforeach
        </div>
    </div>
@endsection
