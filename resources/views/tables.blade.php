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

    <!-- Sidebar -->
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
        <div class="position-sticky">
            <div class="list-group list-group-flush mx-3 mt-4">
                <a href="/admin/dashboard" class="list-group-item list-group-item-action py-2 ripple"
                    aria-current="true">
                    <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Main dashboard</span>
                </a>
                <a href="/admin/reservations" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-chart-area fa-fw me-3"></i><span>Reservations</span>
                </a>
                <a href="/admin/tables" class="list-group-item list-group-item-action py-2 ripple active"><i
                        class="fas fa-lock fa-fw me-3"></i><span>Tables</span></a>
                <a href="/admin/menu" class="list-group-item list-group-item-action py-2 ripple"><i
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
        <div class="row">
            {{-- add table button --}}
            <div class="col-12">
                <div class="col-12">
                    <h1>Tables</h1>
                    <a href="/admin/addtable">
                        <button type="button" class="btn btn-primary">
                            Add table
                        </button>
                    </a>
                    <table class="table align-middle mb-0 mt-4 bg-white">
                        <thead class="bg-light">
                            <tr>
                                <th>Table id</th>
                                <th>Capacity</th>
                                <th>Status</th>
                                <th>Location</th>
                                <th>Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tables as $table)
                                <tr>
                                    {{-- Table id --}}
                                    <td>
                                        <p class="fw-normal mb-1">{{ $table->id }}</p>
                                    </td>
                                    {{-- Table Capacity --}}
                                    <td>{{ $table->capacity }}</td>
                                    {{-- Table Status --}}
                                    @if ($table->status == 'available')
                                        <td>
                                            <span class="badge badge-success rounded-pill d-inline">Available</span>
                                        </td>
                                    @else
                                        <td>
                                            <span class="badge badge-danger rounded-pill d-inline">Reserved</span>
                                        </td>
                                    @endif
                                    {{-- Table Location --}}
                                    <td>{{ $table->location }}</td>
                                    {{-- Edit and Delete buttons --}}
                                    <td>
                                        <a href="/admin/tables/{{ $table->id }}/edit" class="btn btn-sm btn-primary">
                                            Edit
                                        </a>
                                        <a href="/admin/tables/{{ $table->id }}/delete"
                                            class="btn btn-danger btn-sm btn-rounded">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
    </main>


</body>
