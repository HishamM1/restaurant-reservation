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
                        <h1>Edit Food</h1>
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
                            <form action="/admin/categories/{{ $food->id }}/update" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="Name">Name</label>
                                    <input type="text" name="name" placeholder="Category Name"
                                        value="{{ $food->name }}" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" name="description" value="{{ $food->description }}"
                                        placeholder="food description" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <img src="{{ asset('storage/' . $food->image) }}" alt="not found" height="90"
                                        width="90">
                                    <input type="file" name="image">
                                </div>
                                <div class="form-group">
                                    <label for="Category">Category</label>
                                    <select name="category_id" class="form-control">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $food->category->id == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" name="price" placeholder="Food price"
                                        value="{{ $food->price }}" required class="form-control">
                                </div>
                                <input class="subscribe btn btn-primary btn-block rounded-pill shadow-sm" type="submit"
                                    value="Edit">
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
