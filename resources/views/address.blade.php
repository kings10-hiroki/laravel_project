<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ContactStore</title>
    <link rel="stylesheet" href="/css/app.css">
</head>

<body>
    @include('includes.navbar')
    <div class="container">
        <div id="app">
            <contacts></contacts>
        </div>
    </div>

    <script src="/js/app.js"></script>
</body>

</html>