<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="/style/dashboard.css">
    <title>Dashboard</title>
</head>

<body>


    <!-- Sidebar -->
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
        <div class="position-sticky">
            <div class="list-group list-group-flush mx-3 mt-4">
                <a href="/admin/dashboard" class="list-group-item list-group-item-action py-2 ripple"
                    aria-current="true">
                    <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Main dashboard</span>
                </a>
                <a href="/admin/reservations" class="list-group-item list-group-item-action py-2 ripple active">
                    <i class="fas fa-chart-area fa-fw me-3"></i><span>Reservations</span>
                </a>
                <a href="/admin/tables" class="list-group-item list-group-item-action py-2 ripple"><i
                        class="fas fa-lock fa-fw me-3"></i><span>Tables</span></a>
                <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
                        class="fas fa-chart-line fa-fw me-3"></i><span>Menu</span></a>
                <a href="/admin/categories" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-chart-pie fa-fw me-3"></i><span>Categories</span>
                </a>
                <a href="/logout" class="list-group-item list-group-item-action py-2 ripple"><i
                        class="fas fa-money-bill fa-fw me-3"></i><span>Log out</span></a>
            </div>
        </div>
    </nav>
    <!-- Sidebar -->


    <main>
        {{-- @dd($reservations); --}}

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1>Reservations</h1>
                    <table class="table align-middle mb-0 mt-4 bg-white">
                        <thead class="bg-light">
                            <tr>
                                <th>Name & Email</th>
                                <th>Phone</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Table</th>
                                <th># of Guests</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservations as $reservation)
                                <tr>
                                    {{-- Name and Email --}}
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="ms-3">
                                                <p class="fw-bold mb-1">{{ $reservation->name }}</p>
                                                <p class="text-muted mb-0">{{ $reservation->email }} </p>
                                            </div>
                                        </div>
                                    </td>
                                    {{-- Phone --}}
                                    <td>
                                        <p class="fw-normal mb-1">{{ $reservation->phone }}</p>
                                    </td>
                                    {{-- Date --}}
                                    <td>{{ $reservation->date }}</td>
                                    {{-- Time --}}
                                    <td>{{ $reservation->time }}</td>
                                    {{-- Table --}}
                                    <td>{{ $reservation->table_id }}</td>
                                    {{-- # of Guests --}}
                                    <td>{{ $reservation->guests_number }}</td>
                                    {{-- Message --}}
                                    <td>{{ $reservation->message }}</td>
                                    {{-- Status --}}
                                    @if ($reservation->status == 'pending')
                                        <td>
                                            <span class="badge badge-success rounded-pill d-inline">Pending</span>
                                        </td>
                                    @else
                                        <td>
                                            <span class="badge badge-danger rounded-pill d-inline">Ended</span>
                                        </td>
                                    @endif
                                    {{-- Actions --}}
                                    <td>
                                        {{-- show delete button if status is ended --}}
                                        @if ($reservation->status == 'ended')
                                            {{-- delete button --}}
                                            <form action="/admin/reservations/{{ $reservation->id }}/delete"
                                                method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        @endif
                                        {{-- change status button --}}
                                        @if ($reservation->status == 'pending')
                                            <form action="/admin/reservations/{{ $reservation->id }}/status"
                                                method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-sm">Change
                                                    status</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

</body>

</html>
