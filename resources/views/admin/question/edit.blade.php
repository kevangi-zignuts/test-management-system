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
                            <h4 class="card-title mb-0">Edit Question</h4>
                        </div>
                        <div class="text-center ms-3 ms-lg-0 ms-md-0">
                            {{-- <a href="{{ route('questions.show', ['id' => $question->test_id]) }}"
                                class="mt-lg-0 mt-md-0 mt-3 btn btn-primary btn-icon" data-bs-toggle="tooltip"
                                title="View Questions">
                                <span>Back</span>
                            </a> --}}
                            <a href="{{ route('questions.index', ['id' => $question->test_id]) }}"
                                class="btn btn-primary btn-sm rounded-circle" data-bs-toggle="tooltip" title="Back"><i
                                    class="fa-solid fa-arrow-left"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mx-auto w-75">
                            <form action="{{ route('questions.update', ['id' => $question->id]) }}" method="POST"
                                class="text-black">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label>Add Question :- </label>
                                    <input type="text" class="form-control" id="" name="question_name"
                                        value="{{ $question->question_name }}">
                                </div>
                                <div class="form-group">
                                    <label>Add Option 1:-</label>
                                    <input type="text" class="form-control" name="option1"
                                        value="{{ $question->option1 }}">
                                </div>
                                <div class="form-group">
                                    <label>Add Option 2:-</label>
                                    <input type="text" class="form-control" name="option2"
                                        value="{{ $question->option2 }}">
                                </div>
                                <div class="form-group">
                                    <label>Add Option 3:-</label>
                                    <input type="text" class="form-control" name="option3"
                                        value="{{ $question->option3 }}">
                                </div>
                                <label>Add Answer</label>
                                <select class="form-control" name="answer">
                                    <option value="A">Option 1</option>
                                    <option value="B">Option 2</option>
                                    <option value="C">Option 3</option>
                                </select>
                                {{-- <input type="hidden" name="test_id" value="{{ $id }}"> --}}
                                <button type="submit" class="btn btn-primary margin-top mt-3" name="add">
                                    <i class="fa-solid fa-plus"></i> Update Question</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
