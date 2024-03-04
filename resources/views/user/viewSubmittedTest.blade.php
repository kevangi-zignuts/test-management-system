<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <x-app-layout>
        <div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body ">
                                <a href="{{ route('user.index') }}" class="btn btn-primary btn-sm rounded-circle"
                                    data-bs-toggle="tooltip" title="Back"><i class="fa-solid fa-arrow-left"></i></a>
                                <h2 class="text-center">Submitted Test</h2>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($submittedTests as $key => $submittedTest)
                                    <div class="question" style="display: {{ $key === 0 ? 'block' : 'none' }}">
                                        <p class="h3 p-1">{{ $i++ . ') ' . $submittedTest->question->question_name }}
                                        </p>
                                        @if ($submittedTest->question->answer === 'A')
                                            <div
                                                class="card-body border border-secondary rounded p-0 d-flex mb-2 bg-soft-success">
                                                <p class="m-2 text-secondary h5">
                                                    {{ 'A) ' . $submittedTest->question->option1 }}</p>
                                            </div>
                                        @else
                                            <div class="card-body border border-secondary rounded p-0 d-flex mb-2">
                                                <p class="m-2 text-secondary h5">
                                                    {{ 'A) ' . $submittedTest->question->option1 }}</p>
                                            </div>
                                        @endif

                                        @if ($submittedTest->question->answer === 'B')
                                            <div
                                                class="card-body border border-secondary rounded p-0 d-flex mb-2 bg-soft-success">
                                                <p class="m-2 text-secondary h5 ">
                                                    {{ 'B) ' . $submittedTest->question->option2 }}</p>
                                            </div>
                                        @else
                                            <div class="card-body border border-secondary rounded p-0 d-flex mb-2 ">
                                                <p class="m-2 text-secondary h5">
                                                    {{ 'B) ' . $submittedTest->question->option2 }}</p>
                                            </div>
                                        @endif

                                        @if ($submittedTest->question->answer === 'C')
                                            <div
                                                class="card-body border border-secondary rounded p-0 d-flex mb-2 bg-soft-success">
                                                <p class="m-2 text-secondary h5">
                                                    {{ 'C) ' . $submittedTest->question->option3 }}</p>
                                            </div>
                                        @else
                                            <div class="card-body border border-secondary rounded p-0 d-flex mb-2">
                                                <p class="m-2 text-secondary h5">
                                                    {{ 'C) ' . $submittedTest->question->option3 }}</p>
                                            </div>
                                        @endif
                                        <div
                                            class="card-body border border-secondary rounded p-0 d-flex mb-2 bg-soft-info">
                                            <p class="m-2 text-secondary h5">Your Answer :-
                                                {{ $submittedTest->option }} </p>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="d-flex">
                                    <button type="button" class="btn btn-primary btn-prev ml-3"
                                        style="display: none">Previous</button>
                                    <button type="button" class="btn btn-primary btn-next ml-3">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fieldsets = document.querySelectorAll('.question');
            const btnPrev = document.querySelector('.btn-prev');
            const btnNext = document.querySelector('.btn-next');
            let currentQuestionIndex = 0;

            // Check if fieldsets exist and are not empty
            if (fieldsets.length > 0) {
                fieldsets[currentQuestionIndex].style.display = 'block';
            } else {
                console.error('No elements with class "form-group" found.');
                return; // Stop execution if no elements are found
            }

            function toggleButtons() {
                if (currentQuestionIndex === 0) {
                    btnPrev.style.display = 'none';
                } else {
                    btnPrev.style.display = 'block';
                }

                if (currentQuestionIndex === fieldsets.length - 1) {
                    btnNext.style.display = 'none';
                    btnSubmit.style.display = 'block';
                } else {
                    btnNext.style.display = 'block';
                    btnSubmit.style.display = 'none';
                }
            }

            btnNext.addEventListener('click', function() {
                if (fieldsets[currentQuestionIndex]) {
                    fieldsets[currentQuestionIndex].style.display = 'none';
                    currentQuestionIndex++;
                    if (fieldsets[currentQuestionIndex]) {
                        fieldsets[currentQuestionIndex].style.display = 'block';
                    }
                    toggleButtons();
                } else {
                    console.error('Element at index ' + currentQuestionIndex + ' not found.');
                }
            });

            btnPrev.addEventListener('click', function() {
                if (fieldsets[currentQuestionIndex]) {
                    fieldsets[currentQuestionIndex].style.display = 'none';
                    currentQuestionIndex--;
                    if (fieldsets[currentQuestionIndex]) {
                        fieldsets[currentQuestionIndex].style.display = 'block';
                    }
                    toggleButtons();
                } else {
                    console.error('Element at index ' + currentQuestionIndex + ' not found.');
                }
            });
        });
    </script>
</body>

</html>
