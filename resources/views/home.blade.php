<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Single Page Fourm</title>
    <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet" />
</head>
<body>

    <div id="app">
        <v-app>
            <home></home>
        </v-app>
    </div>

    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
</body>
</html>