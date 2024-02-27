<div class="dashboard w-75 text-center mx-auto bg-white p-5 w-100">
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            select Test
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            @foreach ($tests as $test)
                <a class="dropdown-item" href="{{ route('user.test', ['id' => $test->id]) }}"
                    onclick="return confirm('Are you sure You want to give test')">{{ $test->test_name }} (
                    {{ $test->level }} )</a>
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
                    <h5 class="card-title">Average Percentage :- {{ $percentage }}</h5>
                </div>
            </div>
        </div>
    </div>

    <table class="table text-center">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Sr. No.</th>
                <th scope="col">Test Name</th>
                <th scope="col">Percentage</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($result_table as $key => $values)
                @foreach ($values as $value)
                    <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td>{{ $key }}</td>
                        <td>{{ $value }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
    {{-- {{ $results->onEachSide(10)->links() }} --}}
    {{-- <div class="pagination-container">
            {{ $results->links() }}
        </div> --}}
</div>
