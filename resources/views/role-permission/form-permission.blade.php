{{-- {{ Form::open(['url' => '#', 'method' => 'post']) }}
<div class="form-group">
    <label class="form-label">permission title</label>
    {{ Form::text('title', old('title'), ['class' => 'form-control', 'id' => 'permission-title', 'placeholder' => 'Permission Title', 'required']) }}
</div>
<button type="button" class="btn btn-primary mt-3" data-bs-dismiss="modal">Save</button>
<button type="button" class="btn btn-danger mt-3" data-bs-dismiss="modal">Cancel</button>
{{ Form::close() }} --}}


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
    <div class="mx-auto w-75 mt-4">
        <h1 class="text-center h1">Create New Test</h1>
        <form method="post" action="{{ route('store') }}">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" id="" placeholder="" name="test_name">
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
</body>

</html>
