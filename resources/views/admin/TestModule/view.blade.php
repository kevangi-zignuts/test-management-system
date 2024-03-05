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
                            <h4 class="card-title mb-0">View Test</h4>
                        </div>
                        <div class="text-center ms-3 ms-lg-0 ms-md-0 d-flex">
                            <a href="{{ route('test.index') }}" class="btn btn-primary rounded-circle ml-3"
                                data-bs-toggle="tooltip" title="View all Tests">
                                <i class="fa-solid fa-arrow-left"></i>
                            </a>
                            <a href="{{ route('test.edit', ['id' => $test->id]) }}" class=" btn btn-outline-info ml-3"
                                data-bs-toggle="tooltip" title="Edit This Test">
                                <i class="fa-solid fa-pen-to-square"></i> Edit
                            </a>
                            <form action="{{ route('test.delete', ['id' => $test->id]) }}" method="post"
                                class="ml-3">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger"
                                    onclick="return confirm('Are you sure You want to delete')" data-bs-toggle="tooltip"
                                    title="Delete This Test"><i class="fa-solid fa-trash"></i>
                                    Delete</button>
                            </form>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="mx-auto w-75">
                            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                                <div class="card-header">
                                    <h3 class="h3"> Test Name :- {{ $test->test_name }}</h3>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Description :- </h5>
                                    <p class="card-text">{{ $test->description }}</p>
                                    <h5 class="card-title">Level</h5>
                                    <p class="card-text">{{ $test->level }}</p>

                                </div>
                            </div>
                        </div>

                        <a href="{{ route('questions.index', ['id' => $test->id]) }}"
                            class=" btn btn-outline-primary ml-3" data-bs-toggle="tooltip" title="View All Questions">
                            <i class="fa-solid fa-clipboard-question"></i>
                            <span>View Questions</span>
                        </a>
                        <a href="{{ route('questions.create', ['id' => $test->id]) }}"
                            class=" btn btn-outline-primary ml-3" data-bs-toggle="tooltip" title="New Questions Add">
                            <i class="fa-solid fa-plus"></i>
                            <span>Add Question</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</x-app-layout>
