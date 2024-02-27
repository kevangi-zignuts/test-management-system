<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1>Result</h1>
    <h3>Total Question in the test :- {{ $result['total_question'] }}</h3>
    <h3>Correct Answer :- {{ $result['correct_answer'] }}</h3>
    <h3>Wrong Answer :- {{ $result['wrong_answer'] }}</h3>
    <h3>Percentage :- {{ $result['percentage'] }}</h3>
    <a href="{{ route('user.index') }}" class="btn btn-outline-primary">Back</a>
</body>

</html>
