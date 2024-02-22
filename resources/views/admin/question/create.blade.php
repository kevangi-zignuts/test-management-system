<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
                            <h4 class="card-title mb-0">Add New Question</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mx-auto w-75">
                            <form method="post" action="{{ route('questions.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Add Question :- </label>
                                    <input type="text" class="form-control" id="" name="question_name">
                                </div>
                                <div class="form-group">
                                    <label>Add Option 1:-</label>
                                    <input type="text" class="form-control" name="option1">
                                </div>
                                <div class="form-group">
                                    <label>Add Option 2:-</label>
                                    <input type="text" class="form-control" name="option2">
                                </div>
                                <div class="form-group">
                                    <label>Add Option 3:-</label>
                                    <input type="text" class="form-control" name="option3">
                                </div>
                                <label>Add Answer</label>
                                <select class="form-control" name="answer">
                                    <option value="A">Option 1</option>
                                    <option value="B">Option 2</option>
                                    <option value="C">Option 3</option>
                                </select>
                                <input type="hidden" name="test_id" value="{{ $id }}">
                                <button type="submit" class="btn btn-primary margin-top mt-3" name="add">Add
                                    Question</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
