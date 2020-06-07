<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vue Router</title>
</head>

<body>
    <div id="app">
        <router-link to="/hello">Hello</router-link>
        <router-link to="/ExampleComponent">Example</router-link>
        <router-view></router-view>
    </div>
    <script src="{{ mix('/js/app.js') }}"></script>
</body>

</html>
