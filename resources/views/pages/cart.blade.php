@extends("pages.layouts.layout")

@section("title", "Korpa")

@section("style")
    <link rel="stylesheet" href="{{asset("assets/css/cart.css")}}">
@endsection

@section("main")
    @if($books->isEmpty())
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
            <th scope="col" class="text-center">Knjiga</th>
            <th scope="col" class="text-center">Cena</th>
            <th scope="col" class="text-center">Izbriši</th>
        </tr>
        </thead>
        <tbody>
        @foreach($books as $book)
            <tr>
                <th scope="row" class="d-flex justify-content-center">
                    <div class="d-flex row align-items-center">
                        <div class="col">
                            <img class="image-link" width="200" src="{{$book->image_link}}" alt="book-image">
                        </div>
                        <div class="col d-flex flex-column">
                            <p>Naslov: {{$book->title}}</p>
                            <p>Autor: {{$book->author}}</p>
                            <p>Izdavač: {{$book->publisher}}</p>
                        </div>
                    </div>
                </th>
                <td class="align-middle text-center">
                    {{$book->price}}
                </td>
                <td class="align-middle text-center">
                    <form action="{{route("removeBookFromCart", $book->id)}}" method="post">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger">Ukloni iz korpe</button>
                    </form>
                </td>
            </tr>
        @endforeach
        <tr>
            <td class="text-center align-middle" id="total-price-text">Ukupna cena svih knjiga</td>
            <td colspan="3">
                <hr>
                <div class="d-flex justify-content-center">
                    <p class="book-author-publisher m-0" id="total-price-number">{{$total_price . " RSD"}} </p>
                </div>
                <hr>
            </td>
        </tr>
        <tr>
            <td colspan="3" class="justify-content-center">
                <form id="buy-book-form" classs="d-flex" method="POST" action="{{route("purchaseBook")}}">
                    <h4>Unesite vaše podatke za kupovinu knjiga</h4>
                    @csrf
                    @method("POST")
                    <div class="col-sm-6">
                        <div class="col">
                            <label for="name">Ime</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Unesite vaše ime" required>
                        </div>
                        <div class="col">
                            <label for="email">Imejl</label>
                            <input name="email" type="text" class="form-control" id="email" placeholder="Unesite vaš imejl" required>
                            <small id="process-info">*Proces kupovine može potrajati malo duže</small>
                            <hr>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center form-group col-sm-6">
                        <button type="submit" class="btn btn-primary" class="">Kupi</button>
                    </div>
                </form>
            </td>
        </tr>
        </tbody>
    </table>
    @endif
@endsection
