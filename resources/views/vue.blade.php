<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vue Router</title>
</head>

<body>
    <div id="app">
        <router-link to="/ExampleComponent">Example</router-link>
    <router-link to="/Hello">Hello</router-link>
        <router-view></router-view>
        <!-- <app/> -->
    </div>
    <script src="{{ mix('/js/app.js') }}"></script>
</body>

</html>