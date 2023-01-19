<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/style/reservation.css" />
    <title>Reservation</title>
</head>

<body>
    <x-navbar />
    <div class="container">
        <h1>Book a Table Easily</h1>
        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <form action="/reservation/store" method="post">
                @csrf
                <input type="text" name="name" id="name" placeholder="Name" value="{{ old('name') }}" />
                <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}" />
                <input type="tel" name="phone" id="phone" placeholder="Phone" value="{{ old('phone') }}" />
                <label for="date">Date</label>
                <input type="date" name="date" id="date" value="{{ old('date') }}"
                    onfocus="dateValidation()" />
                <label for="time">Time</label>
                <input type="time" name="time" id="time" value="{{ old('time') }}" min="09:00"
                    max="22:00" />
                <label for="people">Number of guests</label>
                <select name="guests_number" id="people">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <label for="table">Table (Capacity)</label>
                <select name="table_id" id="table">
                    @foreach ($tables as $table)
                        <option value="{{ $table->id }}">Table {{ $table->id }} ({{ $table->capacity }})</option>
                    @endforeach
                </select>
                <textarea name="message" id="" placeholder="Any notes?">{{ old('message') }}</textarea>
                <input type="submit" value="Book" />
            </form>
        </div>
    </div>
    <script src="script/main.js"></script>

</body>

</html>
