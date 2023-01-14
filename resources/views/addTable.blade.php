<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="/style/dashboard.css">
    <title>Dashboard</title>
</head>

<body>
    <div class="container py-5">

        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="bg-white rounded-lg shadow-sm p-5">
                    <div class="tab-content">
                        <h1>Add Table</h1>
                        <div id="nav-tab-card" class="tab-pane fade show active">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form role="form" action="/admin/addtable/store" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="capacity">Capacity</label>
                                    <input type="number" name="capacity" placeholder="Table Capacity"
                                        value="{{ old('capacity') }}" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input type="text" name="location" value="{{ old('location') }}"
                                        placeholder="Table Location" required class="form-control">
                                </div>
                                <input class="subscribe btn btn-primary btn-block rounded-pill shadow-sm" type="submit"
                                    value="Confirm">
                            </form>
                        </div>
                        <!-- End -->
                    </div>
                    <!-- End -->

                </div>
            </div>
        </div>
    </div>
</body>
