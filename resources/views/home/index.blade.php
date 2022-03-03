<!doctype html>
<html>
<head>
    <title>Our Funky HTML Page</title>
    <meta name="description" content="Our first page">
    <meta name="keywords" content="html tutorial template">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset("bootstrap/css/bootstrap.css") }}" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="{{ asset("bootstrap/css/sticky-footer-navbar.css") }}" rel="stylesheet" />

    <!-- Optional theme -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap-theme.min.css')}}">
</head>
<body>
<div class="container">
    <form>
        <div class="form-group">
            <label for="url">Url</label>
            <input type="text" class="form-control" id="url" aria-describedby="emailHelp" placeholder="https://">
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</div>
</body>
</html>
