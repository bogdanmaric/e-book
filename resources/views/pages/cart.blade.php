@extends("pages.layouts.layout")

@section("title", "E-book")

@section("style")
    <link rel="stylesheet" href="{{asset("assets/css/category-management.css")}}">
@endsection

@section("js")
    <script src="{{asset("assets/js/category_management.js")}}"></script>
@endsection

@section("main")
    <table class="table table-bordered mt-5">
        <thead>
        <tr>
            <th scope="col" colspan="3">Knjiga</th>
            <th scope="col">Cena</th>
            <th scope="col">Izbriši</th>
        </tr>
        </thead>
        <tbody>
        <!--foreach()-->
            <tr>
                <td colspan="3">Larry the Bird</td>
                <th>3</th>
                <td>@twitter</td>
            </tr>
        <!-- endforeach -->>
        </tbody>
    </table>
@endsection
