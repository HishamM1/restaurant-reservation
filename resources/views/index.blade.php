<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="style/home.css" />
    <title>Nightcap</title>
</head>

<body>
    <x-navbar />
    @if (session()->has('success'))
        <div class="success" id="success">
            {{ session()->get('success') }}
        </div>
    @endif

    <section class="mainpage">
        <h2>Welcome</h2>
        <h2>To Our Nightcap</h2>
        <h2>Restaurant</h2>
        <div class="reservation">
            <a class="button" href="/reservation">Make a Reservation!</a>
        </div>
        <div class="icons">
            <span>
                <i class="fa-brands fa-facebook-f"></i>
                <span class="count">252k</span>
            </span>
            <span>
                <i class="fa-brands fa-instagram"></i>
                <span class="count">64k</span>
            </span>
            <span>
                <i class="fa-brands fa-twitter"></i>
                <span class="count">25k</span>
            </span>
        </div>
    </section>
    <section class="aboutus" id="about">
        <div>
            <p>About us</p>

            <h1>Discover Our</h1>
            <h1>Restaurant Story</h1>

            <p class="about">
                Cuisine is a team work of Cuisine Restaurant Cafe, we aim at
                promoting the foodstuff in dustry through the branches, we
                establish and through the new dishes. and integrate between
                different cultures. Nullam quis ante. Etiam sit amet orci
                eget eros faucibus tin cidunt. Duis leo. Sed fringilla
                mauris sit amet nibh. Donec sodales sagittis magna. Aenean
                commodo ligula. Sed fringilla mauris sit amet nibh. Donec
                sodales sagittis magna. Aenean commodo ligula.
            </p>
            <p class="about">
                Nullam quis ante. Etiam sit amet orci eget eros faucibus
                tincidunt. Duis leo. Sed fringilla mauris sit amet nibh.
                Donec sodales sagittis magna. Aenean commodo ligula.
            </p>

            <a class="button" href="">Discover Menu</a>
        </div>
    </section>
    <section class="menu" id="menu">
        <h1>Our Speciliaty Cuisine</h1>
        <ul>
            @foreach ($categories as $category)
                <li data-cont=".{{ $category->name }}">{{ $category->name }}</li>
            @endforeach
        </ul>
        <div class="content">
            @foreach ($categories as $category)
                <div class="{{ $category->name }}">
                    @foreach ($menu as $food)
                        @if ($food->category->name == $category->name)
                            <article>
                                <img src="{{ asset('storage/' . $food->image) }}" alt="{{ $food->name }}" />
                                <h3>{{ $food->name }}</h3>
                                <!-- price -->
                                <span class="price"> ${{ $food->price }} </span>
                            </article>
                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>
    </section>
    <section class="book-table">
        <div class="book">
            <p>Book Table</p>
            <h1>Opening Hours</h1>
            <i class="fa-solid fa-phone"></i>
            <p class="callNow">Call Now</p>
            <h2>+012345678910</h2>
        </div>
        <div class="hours">
            <div class="monday">
                <span>Monday to Tuesday</span>
                <h3>11:00 am - 20:00 pm</h3>
            </div>
            <div class="friday">
                <span>Friday to Sunday</span>
                <h3>09:00 am - 22:00 pm</h3>
            </div>
        </div>
    </section>
    <footer id="footer">
        <div class="container">
            <div class="brief">
                <h1>Nightcap</h1>
                <p>
                    Just like the name, we are a restaurant that serves food
                    and drinks
                </p>
            </div>
            <div class="openHours">
                <h1>Opening Hours</h1>
                <p>Mon-Fri: 9 AM - 6PM</p>
                <p>Saturday: 9 AM - 4 PM</p>
                <p>Sunday: Closed</p>
            </div>
            <div class="contactUs">
                <h1>Contact Us</h1>
                <p>176 W street name, New York, NY 10014</p>
                <p>Email: info@nightcap.com</p>
                <p>Phone: +1 212-226-3123</p>
            </div>
            <div class="newsletter">
                <h1>Newsletter</h1>
                <input type="email" placeholder="Email Address" />
            </div>
        </div>
    </footer>
</body>
<script src="script/main.js"></script>

</html>
