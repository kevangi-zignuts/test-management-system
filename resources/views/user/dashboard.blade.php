<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bootstrap Tutorial</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <x-app-layout>
        <div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="dashboard w-75 text-center mx-auto bg-white p-5 w-100 rounded">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        select Test
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        @foreach ($tests as $test)
                                            <a class="dropdown-item"
                                                href="{{ route('user.test', ['id' => $test->id]) }}"
                                                onclick="return confirm('Are you sure You want to give test')">{{ $test->test_name }}
                                                ({{ $test->level }})
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                                @php
                                    $i = 1;
                                @endphp
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Total Test :- {{ $total_test }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Average Percentage :- {{ $percentage }}
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <form method="GET" action="{{ route('user.index') }}">
                                    <div class="form-row w-100">
                                        <div class="col-md-3 d-flex">
                                            <label for="start_date">Start Date:</label>
                                            <input type="date" class="form-control" name="start_date"
                                                id="start_date">
                                        </div>
                                        <div class="col-md-3 d-flex">
                                            <label for="end_date">End Date:</label>
                                            <input type="date" class="form-control" name="end_date" id="end_date">
                                        </div>
                                        <div class="col-md-2">
                                            <button type="submit" class="btn btn-primary">Filter</button>
                                        </div>
                                    </div>
                                </form>

                                <table class="table text-center">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Sr. No.</th>
                                            <th scope="col">Test Name</th>
                                            <th scope="col">Percentage</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($results as $result)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $result->test->test_name }}</td>
                                                <td>{{ $result->percentage }}</td>
                                                <td><a href="{{ route('user.view', ['id' => $result->id]) }}"><i
                                                            class="fa fa-eye text-success" aria-hidden="true"
                                                            style="font-size: 25px"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- {{ $results->links() }} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </x-app-layout>


    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
