<!doctype html>
<html>
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
    @foreach($image as $img)
        <img src="{{asset('images/' . $img->path)}}" alt="Image" style="max-width: 200px">
    @endforeach
</body>
</html>
