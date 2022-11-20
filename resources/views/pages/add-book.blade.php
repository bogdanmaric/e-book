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
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Naslov knjige (max: 50 karaktera)" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Opis</label>
                    <input type="password" class="form-control" id="inputPassword4" placeholder="Opis knjige (max: 200 karaktera)" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Link slike</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="Link slike koji će biti prikazana na knjizi" required>
            </div>
            <div class="form-group">
                <label for="inputAddress2">Link knjige</label>
                <input type="text" class="form-control" id="inputAddress2"
                       placeholder="Link knjige koji će bit poslat na mejl kupca" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">Autor</label>
                    <input type="text" class="form-control" id="inputCity" placeholder="Autor knjige (max: 30 karaktera)" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputCity">Izdavač</label>
                    <input type="text" class="form-control" id="inputCity" placeholder="Izdavač knjige (max: 40 karaktera)" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">Kategorija</label>
                    <select id="inputState" class="form-control">
                        @foreach($categories as $category)
                            <option>{{$category->name}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">Cena</label>
                    <input type="text" class="form-control" id="inputZip" required>
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
