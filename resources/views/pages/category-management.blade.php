@extends("pages.layouts.layout")

@section("title", "Upravljanje kategorijama")

@section("style")
    <link rel="stylesheet" href="{{asset("assets/css/category-management.css")}}">
@endsection

@section("js")
    <script src="{{asset("assets/js/category_management.js")}}"></script>
@endsection

@section("main")
    <table class="table mt-5">
        <thead class="thead-dark">
        <tr>
            <th scope="row" colspan="3">
                <form class="create-category"
                      action="{{route("category.store")}}"
                      method="post">
                    @csrf
                    @method("POST")
                    <input type="text" name="category_name" placeholder="Naziv kategorije" required>
                    <input class="btn btn-primary" type="submit" value="Kreiraj novu kategoriju">
                </form>
            </th>
        </tr>
        <tr>
            <th scope="col">Naziv kategorije</th>
            <th scope="col">Promena naziva kategorije</th>
            <th scope="col">Izbriši kategoriju</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td class="category-name">{{$category->name}}</td>
                <td>
                    <form class="change-category"
                          action="{{route("category.update", $category->id)}}"
                          method="post">
                        <input type="text" name="category_name" placeholder="Novi naziv kategorije" required>
                        @csrf
                        @method("PUT")
                        <input class="btn btn-warning" type="submit" value="Izmeni">
                    </form>
                </td>
                <td>
                    <form class="delete-category"
                          action="{{route("category.destroy", $category->id)}}"
                          method="post">
                        @csrf
                        @method("DELETE")
                        <input class="btn btn-danger" type="submit" value="Izbriši">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
