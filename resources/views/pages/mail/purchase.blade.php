<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ebook.herokuapp.com</title>
</head>
<body>
    <h1>{{$title}}</h1>
    <p>Poštovani {{$name}}, u prilogu vam šaljemo linkove knjige koje ste kupili</p>
    @foreach($books as $book)
        {{$book}}
    @endforeach
    <p>Hvala vam na vašem poverenju</p>
</body>
</html>
