<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <!-- <title>Home</title> -->

</head>
<body>
    
<nav>
    <div id="nav-sep">
        <div id="nav1">
            <img src="{{ asset('images/logo.png') }}" alt="logo" id="logo">
            <p id="nav-name">ADEVENT</p>
        </div>

        <div id="nav2">
            <ul class="nav-ul">
                <li>
                    <a href="{{ route('members/all') }}" class="nav-list">MEMBERS</a>
                </li>

                <li>
                    <a href="{{ route('members/add') }}" class="nav-list">NEW MEMBER</a>
                </li>

                <li>
                    <a href="{{ route('events/all') }}" class="nav-list">EVENTS</a>
                </li>
            </ul>
        </div>
        <div id="nav3">
            <a href="{{ route('logout') }}"><button id="nav-button">LOGOUT</button></a>
        </div>
    </div>
</nav>

@yield('content')

<footer>
    <div id="foot-sep">
        <div id="foot1">
            <p>© 2023 Adevent. All rights reserved.</p>
        </div>

        <div id="foot2">
            <p><a href="" id="priv">Privacy Policy</a></p>
        </div>

        <div id="foot3">
            <img src="{{ asset('images/linkedin.png') }}" alt="linkedin" class="icon">
            <img src="{{ asset('images/twitter.png') }}" alt="twitter" class="icon">
            <img src="{{ asset('images/facebook.png') }}" alt="facebook" class="icon">
            <img src="{{ asset('images/github.png') }}" alt="github" class="icon">
        </div>
    </div>
</footer>

</body>
</html>
