<!DOCTYPE html>
<html>
<head>
    <title>
        @yield('title', 'Foobooks')
    </title>

    <meta charset="UTF-8">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    @stack('head')

</head>
<body>
    
    <div class="container">
        <div class="page-header">
            <h1>Foobooks</h1> 
        </div>

        @yield('content')
    </div>

    @stack('body')
</body>
</html>