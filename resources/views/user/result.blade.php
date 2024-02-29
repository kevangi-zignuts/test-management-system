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
<style>
    p {
        padding: 7px;
        font-size: 21px;
    }
</style>

<body>

    <x-app-layout :assets="$assets ?? []">
        <div>
            <div class="row">
                <div class="card shadow p-3 mb-5 text-center">
                    <div class="card-body">
                        <h1 class="text-success p-2 border-bottom border-success">Result</h1>
                        <p class="text-dark">Total Question in the test :- {{ $result['total_question'] }}</p>
                        <p class="text-dark">Correct Answer :- {{ $result['correct_answer'] }}</p>
                        <p class="text-dark">Wrong Answer :- {{ $result['wrong_answer'] }}</p>
                        <p class="text-dark">Percentage :- {{ $result['percentage'] }}%</p>
                        <a href="{{ route('user.index') }}" class="btn btn-outline-success">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>






</body>

</html>
