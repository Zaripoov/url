<!doctype html>
<html>
<head>
    <title>Our Funky HTML Page</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <form method="POST">
        @csrf
        <div class="form-group">
            <label for="url">Url</label>
            <input type="text" class="form-control" id="url" aria-describedby="emailHelp" placeholder="https://">
        </div>
        <button id="save_url"  type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

<script>
    console.log($('meta[name="csrf-token"]').attr('content'));

    $( document ).ready(function() {
        $("#save_url").click(function(e){
                e.preventDefault()
                var url = $('#url').val();

                $.ajax({
                    method: 'POST',
                    url: '{{ url('/store') }}',
                    data: {url:url},
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        alert('Успешно добавлено. Ссылка: '+ data)
                    },
                    error: function (msg) {
                        alert('Что-то пошло не так');
                    }
                });
                return false;
            }
        );
    });
</script>
</body>
</html>
