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

</html>

<x-app-layout :assets="$assets ?? []">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title mb-0">Edit Test</h4>
                        </div>
                        <div class="text-center ms-3 ms-lg-0 ms-md-0">
                            <a href="{{ route('test.index') }}"
                                class="mt-lg-0 mt-md-0 mt-3 btn btn-primary btn-icon rounded-circle"
                                data-bs-toggle="tooltip" title="View Test">
                                <span><i class="fa-solid fa-arrow-left"></i></span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mx-auto w-75 text-black">
                            <form action="{{ route('test.update', ['id' => $test->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                {{-- {{ dd($test) }} --}}

                                <input type="hidden" value="{{ $test->id }}" name="tasks_id">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" id="" placeholder=""
                                        name="test_name" value="{{ $test->test_name }}">
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" id="" rows="3" name="description">{{ $test->description }}</textarea>
                                </div>
                                <select class="form-control" name="level">
                                    <option value="High">High</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Low">Low</option>
                                </select>
                                <button type="submit" class="btn btn-primary mt-3" name="create">Update Test</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
