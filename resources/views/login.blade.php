@extends('layouts.app')


@section('content')

<section id="section2">
   <div class="log-pass">
        <form action="">
            <h1 id="form-head">SIGN IN</h1>
            <br>
            <div class="log-div">
                <label for="" class="lab">Email:</label>
                <input type="text" placeholder="email@example.com" class="form-input" id="email">
            </div>
            <br><br>
            <div class="log-div">
                <label for="" class="lab">Password:</label>
                <input type="password" placeholder="••••••••••••••••••" class="form-input" id="pass">
            </div>
            <br><br>
            <div class="log-div">
                <a href="{{ route('forgotpasswd') }}" class="form-link">Forgot Password</a>
                <a href="{{ route('homepage') }}" class="form-link">Don't have an account</a>
            </div>
            <br>
            <div>
                <a href="{{ route('signup') }}"><button id="sect-button">CONFIRM</button></a>
            </div>
        </form>
   </div><br>
</section>

@endsection