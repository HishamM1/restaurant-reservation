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
                <a href="/admin/tables" class="list-group-item list-group-item-action py-2 ripple"><i
                        class="fas fa-lock fa-fw me-3"></i><span>Tables</span></a>
                <a href="/admin/menu" class="list-group-item list-group-item-action py-2 ripple active"><i
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
                    <h1>Menu</h1>
                    <a href="/admin/addmenu">
                        <button type="button" class="btn btn-primary">
                            Add Food
                        </button>
                    </a>
                    <table class="table align-middle mb-0 mt-4 bg-white">
                        <thead class="bg-light">
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menu as $food)
                                <tr>
                                    {{-- food Name --}}
                                    <td>{{ $food->name }}</td>
                                    {{-- food Description --}}
                                    <td class="col-md-5">{{ $food->description }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $food->image) }}" alt="not found" height="90"
                                            width="90">
                                    </td>
                                    <td>{{ $food->category->name }}</td>
                                    <td>{{ $food->price }}</td>
                                    {{-- Edit and Delete buttons --}}
                                    <td>
                                        <a href="/admin/menu/{{ $food->id }}/edit" class="btn btn-sm btn-primary">
                                            Edit
                                        </a>
                                        <form action="/admin/menu/{{ $food->id }}/delete" method="POST"
                                            class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
    </main>

</body>
