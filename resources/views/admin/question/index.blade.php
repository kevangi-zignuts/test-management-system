<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <x-app-layout :assets="$assets ?? []">
        <div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title mb-0">All Questions</h4>
                            </div>
                            <div class="text-center ms-3 ms-lg-0 ms-md-0">
                                <a href="{{ route('test.index') }}" class="btn btn-primary btn-sm rounded-circle"
                                    data-bs-toggle="tooltip" title="Back"><i class="fa-solid fa-arrow-left"></i></a>
                                {{-- {{ $questions[0]['test_id'] }} --}}
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <th class="text-center">Question Name</th>
                                        <th class="text-center">Option 1</th>
                                        <th class="text-center">Option 2</th>
                                        <th class="text-center">Option 3</th>
                                        <th class="text-center">Answer</th>
                                        <th class="text-center">Actions</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($questions as $question)
                                            <tr class="text-center">
                                                <td>{{ $question->question_name }}</td>
                                                <td>{{ $question->option1 }}</td>
                                                <td>{{ $question->option2 }}</td>
                                                <td>{{ $question->option3 }}</td>
                                                <td>
                                                    @if ($question->answer === 'A')
                                                        A. {{ $question->option1 }}
                                                    @elseif ($question->answer === 'B')
                                                        B. {{ $question->option2 }}
                                                    @else
                                                        C. {{ $question->option3 }}
                                                    @endif
                                                </td>
                                                <td>
                                                    <div>
                                                        <a href="{{ route('questions.view', ['id' => $question->id]) }}"
                                                            class="ml-3" data-bs-toggle="tooltip"
                                                            title="View Question"><i
                                                                class="fa-solid fa-clipboard-question"></i></a>
                                                        <a href="{{ route('questions.edit', ['id' => $question->id]) }}"
                                                            data-bs-toggle="tooltip" title="Edit Question"><i
                                                                class="fa-solid fa-pen-to-square"></i></a>
                                                        <form
                                                            action="{{ route('questions.delete', ['id' => $question->id]) }}"
                                                            method="post" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn-link"
                                                                onclick="return confirm('Are you sure You want to delete Question')"
                                                                style="border: none; background: none;"
                                                                data-bs-toggle="tooltip" title="Delete Question"><i
                                                                    class="fa-solid fa-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @php
                                                $test_id = $question->id;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                                <a href="{{ route('questions.create', ['id' => $test_id]) }}"
                                    class="mt-lg-0 mt-md-0 mt-3 btn btn-primary btn-icon" data-bs-toggle="tooltip"
                                    title="Add New Question">
                                    <i class="btn-inner">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                    </i>
                                    <span>Add Questions</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
