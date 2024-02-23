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
                            <a href="{{ route('show') }}">Back</a>
                            {{-- {{ $questions[0]['test_id'] }} --}}
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
                                                <div class="d-flex gap-2">
                                                    <a href="{{ route('questions.view', ['id' => $question->id]) }}"
                                                        class="btn btn-primary btn-sm ml-3">View</a>
                                                    <a href="{{ route('questions.edit', ['id' => $question->id]) }}"
                                                        class="btn btn-primary btn-sm ml-3">Edit</a>
                                                    <form
                                                        action="{{ route('questions.delete', ['id' => $question->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-primary btn-sm ml-3"
                                                            onclick="return confirm('Are you sure You want to delete Question')">Delete</button>
                                                    </form>
                                                </div>
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
