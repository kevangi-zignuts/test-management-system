<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>

<body>
    <x-app-layout :assets="$assets ?? []">
        <div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                        </div>
                        <div class="card-body d-flex">
                            <div class="card w-50">
                                <div class="card-body">
                                    <h3>Total Users :- {{ $totalUsers }}</h3>
                                </div>
                            </div>
                            <div class="card w-50">
                                <div class="card-body">
                                    <h3>Total Tests :- {{ $totalTests }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>

</html>
