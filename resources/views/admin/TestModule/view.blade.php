<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Test</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
                            <a href="{{ route('show') }}" class="btn btn-outline-primary ml-3" data-bs-toggle="tooltip"
                                title="View all Tests">
                                <span>View</span>
                            </a>
                            <a href="{{ route('edit', ['id' => $test->id]) }}" class=" btn btn-outline-primary ml-3"
                                data-bs-toggle="tooltip" title="Edit This Test">
                                <i class="btn-inner">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                </i>
                                <span>Edit</span>
                            </a>
                            <form action="{{ route('delete', ['id' => $test->id]) }}" method="post" class="ml-3">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-primary"
                                    onclick="return confirm('Are you sure You want to delete')">Delete</button>
                            </form>
                            {{-- <a href="#" class="mt-lg-0 mt-md-0 mt-3 btn btn-primary btn-icon"
                                data-bs-toggle="tooltip" title="Delete This Test">
                                <span>Delete</span>
                            </a> --}}
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

                        <a href="{{ route('questions.show', ['id' => $test->id]) }}"
                            class=" btn btn-outline-primary ml-3" data-bs-toggle="tooltip" title="New Questions Add">
                            <i class="btn-inner">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                            </i>
                            <span>View Questions</span>
                        </a>

                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</x-app-layout>
