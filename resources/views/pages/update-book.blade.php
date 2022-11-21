@extends("pages.layouts.layout")

@section("title", "E-book")

@section("style")
    <link rel="stylesheet" href="{{asset("assets/css/add-book.css")}}">
@endsection

@section("main")
    <div class="h-100 d-flex align-items-center justify-content-center mb-5">
        <div id="form-wrapper">
            <h1 id="page-title">Ažuriranje knjige</h1>
            <form id="add-book-form" method="POST"
                  action="{{action("\App\Http\Controllers\BookControllerR@update", [$book->id])}}">
                @csrf
                @method("PUT")
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="title">Naslov</label>
                        <input name="title" type="text" class="form-control" id="title"
                               placeholder="Naslov knjige (max: 50 karaktera)" value="{{$book->title}}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="description">Opis</label>
                        <input name="description" type="text" class="form-control" id="description"
                               placeholder="Opis knjige (max: 200 karaktera)" value="{{$book->description}}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="image-link">Link slike</label>
                    <input name="image_link" type="text" class="form-control" id="image-link"
                           placeholder="Link slike koji će biti prikazana na knjizi" value="{{$book->image_link}}" required>
                </div>
                <div class="form-group">
                    <label for="book-link">Link knjige</label>
                    <input name="book_link" type="text" class="form-control" id="book-link"
                           placeholder="Link knjige koji će bit poslat na mejl kupca" value="{{$book->book_link}}" required>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="author">Autor</label>
                        <input name="author" type="text" class="form-control" id="author"
                               placeholder="Autor knjige (max: 30 karaktera)" value="{{$book->author}}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="publisher">Izdavač</label>
                        <input name="publisher" type="text" class="form-control" id="publisher"
                               placeholder="Izdavač knjige (max: 40 karaktera)" value="{{$book->publisher}}" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="category_id">Kategorija</label>
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach($categories as $category)
                                @if ($category === $book->category->id)
                                    <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                @endif
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="price">Cena</label>
                        <input name="price" type="number" class="form-control" id="price" value="{{$book->price}}"  required>
                    </div>
                </div>
                <hr>
                <div class="d-flex align-items-center justify-content-center">
                    <button type="submit" class="btn btn-primary" class="">Ažuriraj knjigu</button>
                </div>
            </form>
        </div>
    </div>
@endsection
