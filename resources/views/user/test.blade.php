<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Javascript Quiz</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<style>
    .test {
        margin: 160px;
    }

    input[type=radio] {
        width: 15px;
        height: 15px;
        margin: auto 10px;
    }
</style>

<body>
    @include('user.components._app_toast')
    <header class="mb-5">
        <nav class="header bg-dark d-flex justify-content-between">
            <h4 class="text-start text-white">Test</h4>
            <h4 class="text-end text-white">Total Question :- {{ $questions->count() }}</h4>
        </nav>
    </header>
    <section class="test">
        <div class="card">
            <div class="card-body">
                <div class="instruction border-bottom">
                    <p class="h4 p-2">*All the questions are compulsory to attempt</p>
                </div>
                @php
                    $id = $questions->first()->test_id;
                    $i = 1;
                @endphp
                <form action="{{ route('user.result', ['id' => $id]) }}" method="POST" id="questionForm">
                    @csrf

                    <div class="questions m-3">
                        <div class="question m-2">
                            @foreach ($questions as $question)
                                <fieldset class="form-group">
                                    <input type="hidden" name="test[{{ $question->id }}][question]"
                                        value="{{ $question->id }}">
                                    <div class="options">
                                        <p class="h4"> {{ $i++ . '. ' . $question->question_name }}</p>
                                        <div class="card-body border border-secondary rounded p-0 d-flex mb-2">
                                            <input type="radio" name="test[{{ $question->id }}][answer]"
                                                id="" value="A">
                                            <p class="m-2 text-secondary h5"> {{ 'A) ' . $question->option1 }}</p>
                                        </div>
                                        <div class="card-body border border-secondary rounded p-0 d-flex mb-2">
                                            <input type="radio" name="test[{{ $question->id }}][answer]"
                                                id="" value="B">
                                            <p class="m-2 text-secondary h5"> {{ 'B) ' . $question->option2 }}</p>
                                        </div>
                                        <div class="card-body border border-secondary rounded p-0 d-flex">
                                            <input type="radio" name="test[{{ $question->id }}][answer]"
                                                id="" value="C">
                                            <p class="m-2 text-secondary h5"> {{ 'C) ' . $question->option3 }}</p>
                                        </div>
                                    </div>
                                </fieldset>
                            @endforeach
                        </div>
                    </div>
                    @if (session('error-question'))
                        <div id="error-alert" class="alert alert-danger">
                            {{ session('error-question') }}
                        </div>
                    @endif
                    <button type="submit" class="btn btn-success btn-lg ml-4">Submit</button>
                </form>
                <button onclick="previousQuestion()">Previous</button>
                <button onclick="nextQuestion()">Next</button>
            </div>
        </div>
    </section>

    <script>
        setTimeout(function() {
            document.getElementById('error-alert').style.display = 'none';
        }, 3000);



        const form = document.getElementById('questionForm');
        const fieldsets = form.querySelectorAll('fieldset');
        let currentQuestionIndex = 0;
        fieldsets.style, display = 0 ? 'block' : 'none';

        function showQuestion(index) {
            fieldsets.forEach((fieldset, i) => {
                fieldset.style.display = i === index ? 'block' : 'none';
            });
        }

        function previousQuestion() {
            currentQuestionIndex = (currentQuestionIndex - 1 + fieldsets.length) % fieldsets.length;
            showQuestion(currentQuestionIndex);
        }

        function nextQuestion() {
            currentQuestionIndex = (currentQuestionIndex + 1 + fieldsets.length) % fieldsets.length;
            showQuestion(currentQuestionIndex);
        }
    </script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
    <script src="app.js"></script>
    <script src="{{ asset('js/script.js') }}"></script> --}}
</body>

</html>
