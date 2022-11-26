@extends("pages.layouts.layout")

@section("title", "E-book")

@section("style")
    <link rel="stylesheet" href="{{asset("assets/css/cart.css")}}">
@endsection

@section("main")
    @if($cart->isEmpty())
        <div class="col">
            <p id="text-prazna-korpa" class="text-center mt-5">Vaša korpa je prazna</p>
        </div>
        <div class="col text-center mt-5">
            <img id="slika-prazna-korpa" class="book-cart mt-5" src="{{asset("assets/images/cart-empty.png")}}">
        </div>
    @else
    <table class="table table-bordered mt-5">
        <thead>
        <tr>
            <th scope="col" colspan="3">Knjiga</th>
            <th scope="col">Cena</th>
            <th scope="col">Izbriši</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cart as $book)
            <tr>
                <td colspan="3">Larry the Bird</td>
                <th>3</th>
                <td>@twitter</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @endif
@endsection
