<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Basic website</title>
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js"></script>
</head>

<body>
    @include('includes.navbar')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-8">
                <h1>Photoshow</h1>
                @include('includes.messages')
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>