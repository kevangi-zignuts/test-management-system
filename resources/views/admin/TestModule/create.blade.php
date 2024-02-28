<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Test</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

</body>


<x-app-layout :assets="$assets ?? []">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title mb-0">Create New Test</h4>
                        </div>
                        <div class="text-center ms-3 ms-lg-0 ms-md-0 d-flex">
                            <a href="{{ route('test.index') }}" class="btn btn-outline-primary ml-3"
                                data-bs-toggle="tooltip" title="View all Tests">
                                <span>View</span>
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="mx-auto w-75 mt-4">
                            <form method="post" action="{{ route('test.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" id="" placeholder=""
                                        name="test_name">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" id="" rows="3" name="description"></textarea>
                                </div>
                                <select class="form-control" name="level">
                                    <option value="High">High</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Low">Low</option>
                                </select>
                                <button type="submit" class="btn btn-primary mt-3" name="create">Create Test</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</x-app-layout>
