@extends("pages.layouts.layout")

@section("title", "E-book")

@section("style")
    <link rel="stylesheet" href="{{asset("assets/css/cart.css")}}">
@endsection

@section("main")
{{--    @if($cart->isEmpty())--}}
{{--        <div class="col">--}}
{{--            <p id="text-prazna-korpa" class="text-center mt-5">Vaša korpa je prazna</p>--}}
{{--        </div>--}}
{{--        <div class="col text-center mt-5">--}}
{{--            <img id="slika-prazna-korpa" class="book-cart mt-5" src="{{asset("assets/images/cart-empty.png")}}">--}}
{{--        </div>--}}
{{--    @else--}}
    <table class="table table-bordered mt-5">
        <thead>
        <tr>
            <th scope="col" class="text-center">Knjiga</th>
            <th scope="col" class="text-center">Cena</th>
            <th scope="col" class="text-center">Izbriši</th>
        </tr>
        </thead>
        <tbody>
        @foreach($books as $book)
            <tr>
                <th scope="row" class="d-flex justify-content-around">
                    <div class="d-flex flex-column">
                        <p>Naslov: {{$book->title}}</p>
                        <p>Autor: {{$book->author}}</p>
                        <p>Izdavač: {{$book->publisher}}</p>
                    </div>
                    <img style="border: solid;border-radius: 20px;" width="200" src="{{$book->image_link}}">
                </th>
                <td>{{$book->price}}</td>
                <td>
                    <form action="$" method="post">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger">Ukloni iz korpe</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
{{--    @endif--}}
@endsection
