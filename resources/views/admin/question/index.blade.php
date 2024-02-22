<x-app-layout :assets="$assets ?? []">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title mb-0">All Questions</h4>
                        </div>
                        <div class="text-center ms-3 ms-lg-0 ms-md-0">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <th class="text-center">Question Name</th>
                                    <th class="text-center">Option 1</th>
                                    <th class="text-center">Option 2</th>
                                    <th class="text-center">Option 3</th>
                                    <th class="text-center">Answer</th>
                                    <th class="text-center"></th>
                                </thead>
                                <tbody>
                                    @foreach ($questions as $question)
                                        <tr class="text-center">
                                            <td>{{ $question->question_name }}</td>
                                            <td>{{ $question->option1 }}</td>
                                            <td>{{ $question->option2 }}</td>
                                            <td>{{ $question->option3 }}</td>
                                            <td>
                                                @if ($question->answer === 'A')
                                                    A. {{ $question->option1 }}
                                                @elseif ($question->answer === 'B')
                                                    B. {{ $question->option2 }}
                                                @else
                                                    C. {{ $question->option3 }}
                                                @endif
                                            </td>
                                            <td>
                                                <a
                                                    href="{{ route('questions.view', ['id' => $question->id]) }}">View</a>
                                                <a href="">Edit</a>
                                                <a href="">Delete</a>
                                            </td>
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
