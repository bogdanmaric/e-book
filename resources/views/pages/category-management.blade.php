@extends("pages.layouts.layout")

@section("title", "E-book")

@section("style")
    <link rel="stylesheet" href="{{asset("assets/css/book.css")}}">
@endsection

@section("main")
    <h1 style="display: flex;justify-content: center; color: #024499;">Lista Kategorija</h1>
    <div class="ui placeholder segment inline-block">
        <div class="column">
            <!-- Tabela korisnici -->
            <div style="display: flex; justify-content: center; margin-bottom: 3px;">
                <form class="kreiranje-kategorije"
                      action="{{ action("\App\Http\Controllers\CategoryControllerR@store") }}"
                      method="post">
                    @csrf
                    <input type="text" name="category_name" placeholder="Kreiraj novu kategorija" required>
                    <input type="submit" value="Kreiraj kategoriju">
                </form>
            </div>
            <table>
                <tr>
                    <th>Naziv kategorije</th>
                    <th>Promena naziv kategorije</th>
                    <th>Izbriši kategoriju</th>
                </tr>

                @foreach($categories as $category)
                    <tr>
                        <td id="naziv_kategorije">{{ $category->name }}</td>

                        <td>
                            <form class="promena-kategorije"
                                  action="{{ action("\App\Http\Controllers\CategoryControllerR@update", [$category->id]) }}"
                                  method="post">
                                <input type="text" name = "category_name" placeholder="Naziv" required>
                                @csrf
                                @method("PUT")
                                <input type="submit" value="Promeni">
                            </form>
                        </td>


                        <td>
                            <form class="brisanje-kategorije"
                                  action="{{ action("\App\Http\Controllers\CategoryControllerR@destroy", [$category->id]) }}"
                                  method="post">
                                @csrf
                                @method("DELETE")
                                <input type="submit" value="Izbriši">
                            </form>
                        </td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>
@endsection
