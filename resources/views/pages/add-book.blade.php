@extends("pages.layouts.layout")

@section("title", "E-book")

@section("style")
    <link rel="stylesheet" href="{{asset("assets/css/index.css")}}">
@endsection

@section("main")
<div class="h-100 d-flex align-items-center justify-content-center">
    <div class="" style="margin-top: 3rem; width: 60%;">
        <h1 style="text-align: center;">Dodavanje knjige</h1>
        <form method="POST"  style="border: solid; padding: 20px; border-radius: 20px;">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Naslov</label>
                    <input type="email" class="form-control" id="inputEmail4">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Opis</label>
                    <input type="password" class="form-control" id="inputPassword4">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Link slike</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
            </div>
            <div class="form-group">
                <label for="inputAddress2">Link knjige</label>
                <input type="text" class="form-control" id="inputAddress2"
                       placeholder="Apartment, studio, or floor">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">Autor</label>
                    <input type="text" class="form-control" id="inputCity">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputCity">Izdavač</label>
                    <input type="text" class="form-control" id="inputCity">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">Kategorija</label>
                    <select id="inputState" class="form-control">
                        <option selected>Choose...</option>
                        <option>...</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">Cena</label>
                    <input type="text" class="form-control" id="inputZip">
                </div>
            </div>
            <hr>
            <div class="d-flex align-items-center justify-content-center">
                <button type="submit" class="btn btn-primary" class="">Dodaj knjigu</button>
            </div>
        </form>
    </div>
</div>
@endsection
