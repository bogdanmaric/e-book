@extends("pages.layouts.layout")

@section("title", "E-book")

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
                <th scope="row" class="d-flex justify-content-around">
                    <div class="d-flex flex-row row">
                        <div class="col">
                            <img class="image-link" width="200" src="{{$book->image_link}}">
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
            <td colspan="3" class="justify-content-center">
                <form id="buy-book-form" classs="d-flex" method="POST" action="#">
                    <h4>Unesite vaše podatke za kreiranje porudzbine</h4>
                    @csrf
                    <div class="col-sm-6">
                        <div class="col">
                            <label for="name">Ime</label>
                            <input name="name" type="text" class="form-control" id="name" placeholder="Unesite vaše ime" required>
                        </div>
                        <div class="col">
                            <label for="mail">Mejl</label>
                            <input name="mail" type="text" class="form-control" id="mail" placeholder="Unesite vaš mejl" required>
                            <hr>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center form-group col-sm-6">
                        <button type="submit" class="btn btn-primary" class="">Naruči</button>
                    </div>
                </form>
            </td>
        </tr>
        </tbody>
    </table>
    @endif
@endsection
