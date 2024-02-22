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
                            <a href="{{ route('questions.show') }}" class="mt-lg-0 mt-md-0 mt-3 btn btn-primary btn-icon"
                                data-bs-toggle="tooltip" title="View All Questions">
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
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">level</th>
                                    <th class="text-center"></th>
                                </thead>
                                <tbody>
                                    @foreach ($tests as $test)
                                        <tr>
                                            <td> {{ $test->test_name }} </td>
                                            <td> {{ $test->level }} </td>
                                            <td><a href="{{ route('questions.create', ['id' => $test->id]) }} "
                                                    class="mt-lg-0 mt-md-0 mt-3 btn btn-primary btn-icon">
                                                    <i class="btn-inner">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                                        </svg>
                                                    </i><span>Add Question</span> </a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
