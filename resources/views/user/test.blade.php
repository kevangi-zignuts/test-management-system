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
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <header class="header bg-primary">
        <div class="left-title">JS Quiz</div>
        <div class="right-title">Total Questions: <span id="tque"></span></div>
        <div class="clearfix"></div>
    </header>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div id="result" class="quiz-body">
                        @php
                            $id = $questions->first()->test_id;
                            $i = 1;
                        @endphp
                        <form action="{{ route('user.result', ['id' => $id]) }}" method="POST">
                            @csrf
                            @foreach ($questions as $question)
                                <fieldset class="form-group">
                                    <input type="hidden" name="question_id{{ $i }}"
                                        value="{{ $question->id }}">

                                    <h4><span id="qid">{{ $i }}.</span> <span
                                            id="question{{ $i }}">{{ $question->question_name }}</span></h4>

                                    <div class="option-block-container" id="question-options">
                                        <input type="radio" name="option{{ $i }}" id=""
                                            value="A">{{ 'A) ' . $question->option1 }}
                                        <input type="radio" name="option{{ $i }}" id=""
                                            value="B">{{ 'B) ' . $question->option2 }}
                                        <input type="radio" name="option{{ $i }}" id=""
                                            value="C">{{ 'C) ' . $question->option3 }}
                                    </div> <!-- End of option block -->

                                    @php
                                        $i++;
                                    @endphp
                                </fieldset>
                            @endforeach
                            {{-- <button name="previous" id="previous" class="btn btn-success">Previous</button>
                            &nbsp;
                            <button name="next" id="next" class="btn btn-success">Next</button> --}}
                            <button type="submit">Submit</button>
                        </form>
                    </div>
                </div> <!-- End of col-sm-12 -->
            </div> <!-- End of row -->
        </div> <!-- ENd of container fluid -->
    </div> <!-- End of content -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
    <script src="app.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>
