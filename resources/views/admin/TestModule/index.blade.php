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
                                <h4 class="card-title mb-0">All Tests</h4>
                            </div>
                            <div class="text-center ms-3 ms-lg-0 ms-md-0">
                                <a href="{{ route('test.create') }}"
                                    class="mt-lg-0 mt-md-0 mt-3 btn btn-primary btn-icon" data-bs-toggle="tooltip"
                                    title="New Test">
                                    <i class="btn-inner">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                    </i>
                                    <span>Create Test</span>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">level</th>
                                        <th class="text-center">Actions</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($tests as $test)
                                            <tr>
                                                <td> {{ $test->test_name }} </td>
                                                <td> {{ $test->level }} </td>
                                                <td>
                                                    <div class=" gap-2">
                                                        <a href="{{ route('test.view', ['id' => $test->id]) }} "
                                                            data-bs-toggle="tooltip" title="View Test"><i
                                                                class="fa-solid fa-clipboard-question"></i></a>
                                                        <a href="{{ route('test.edit', ['id' => $test->id]) }}"
                                                            data-bs-toggle="tooltip" title="Edit Test Details"><i
                                                                class="fa-solid fa-pen-to-square"></i></a>
                                                        <form action="{{ route('test.delete', ['id' => $test->id]) }}"
                                                            method="post" class="d-inline pl-0">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn-link"
                                                                style="border: none; background: none;"
                                                                onclick="return confirm('Are you sure You want to delete')"
                                                                data-bs-toggle="tooltip" title="Delete Test"><i
                                                                    class="fa-solid fa-trash"></i></button>
                                                        </form>
                                                        {{-- <a href="{{ route('questions.create', ['id' => $test->id]) }}"
                                                            class="btn btn-primary btn-sm ml-1">Add Question</a> --}}
                                                        <a href="{{ route('questions.index', ['id' => $test->id]) }}"
                                                            class="mt-lg-0 mt-md-0 mt-3 btn btn-primary btn-icon"
                                                            data-bs-toggle="tooltip" title="View All Questions">
                                                            <i class="btn-inner">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                                    fill="none" viewBox="0 0 24 24"
                                                                    stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                                                </svg>
                                                            </i>
                                                            <span>View Questions</span>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- {{ $tests->links() }} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
