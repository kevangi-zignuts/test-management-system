<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Test</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

</html>



<x-app-layout :assets="$assets ?? []">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title mb-0">View Question:- </h4>
                        </div>
                        <div class="text-center ms-3 ms-lg-0 ms-md-0 d-flex">
                            {{-- <a href="{{ route('questions.show', ['id' => $question->test_id]) }}"
                                class="btn btn-outline-primary ml-3" data-bs-toggle="tooltip"
                                title="View all Questions">
                                <span>Back</span>
                            </a> --}}
                            <a href="{{ route('questions.index', ['id' => $question->test_id]) }}"
                                class="btn btn-outline-primary rounded-circle" data-bs-toggle="tooltip"
                                title="Back"><i class="fa-solid fa-arrow-left"></i></a>

                            <a href="{{ route('questions.edit', ['id' => $question->id]) }}"
                                class=" btn btn-outline-primary ml-3" data-bs-toggle="tooltip" title="Edit This Test">
                                <i class="fa-solid fa-pen-to-square"></i>
                                <span>Edit</span>
                            </a>
                            <form action="{{ route('questions.delete', ['id' => $question->id]) }}" method="post"
                                class="ml-3">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-primary"
                                    onclick="return confirm('Are you sure You want to delete')"><i
                                        class="fa-solid fa-trash"></i> Delete</button>
                            </form>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="mx-auto w-75">
                            <div class="card shadow-lg p-3 mb-5 rounded ">
                                <p class="h4"> Q. {{ $question->question_name }}</p>
                                {{-- <div class="card"> --}}
                                <div class="card-body border border-dark rounded p-0 m-4 mb-0">
                                    {{-- This is some text within a card body. --}}
                                    <p class="m-2 text-dark h5"> A.{{ $question->option1 }}</p>
                                </div>
                                <div class="card-body border border-dark rounded p-0 m-4 mb-0">
                                    {{-- This is some text within a card body. --}}
                                    <p class="m-2 text-dark h5"> B. {{ $question->option2 }}</p>
                                </div>
                                <div class="card-body border border-dark rounded p-0 m-4 mb-0">
                                    {{-- This is some text within a card body. --}}
                                    <p class="m-2 text-dark h5"> C. {{ $question->option3 }}</p>
                                </div>
                                <div class="card-body border border-success rounded p-0 m-4 bg-success">
                                    {{-- This is some text within a card body. --}}
                                    @if ($question->answer === 'A')
                                        <p class=" m-2 text-white h5"> Answer :-
                                            {{ $question->answer . ') ' . $question->option1 }} </p>
                                    @elseif ($question->answer === 'B')
                                        <p class=" m-2 text-white h5"> Answer :-
                                            {{ $question->answer . ') ' . $question->option2 }} </p>
                                    @elseif ($question->answer === 'C')
                                        <p class=" m-2 text-white h5"> Answer :-
                                            {{ $question->answer . ') ' . $question->option1 }} </p>
                                    @endif

                                </div>
                                {{-- </div> --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
