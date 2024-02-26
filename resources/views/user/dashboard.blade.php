<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bootstrap Tutorial</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    @include('user.components._head')
</head>

<body>
    {{-- @include('user.components._app_toast')
    @include('user.components._body')
    @include('user.components.vertical-nav') --}}
    <h1>Welcome to Bootstrap</h1>
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            select Test
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            @foreach ($tests as $test)
                <a class="dropdown-item" href="{{ route('user.test', ['id' => $test->id]) }}"
                    onclick="return confirm('Are you sure You want to give test')">{{ $test->test_name }} (
                    {{ $test->level }} )</a>
            @endforeach
        </div>
    </div>


    {{-- @include('user.components._body_footer')
    @include('user.components._scripts') --}}
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
