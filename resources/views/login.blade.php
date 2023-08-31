@extends('layouts.app')


@section('content')

<section id="section2">
   <div class="log-pass">
        <form action="{{ route('login') }}" method="POST">
        @csrf
            <h1 id="form-head">SIGN IN</h1>
            <br>
            <div class="log-div">
                <label for="" class="lab">Email:</label>
                <div class="form-input">
                    <input type="text" placeholder="email@example.com" class="input-local" name="email" value="{{ old('email', Session::get('failure') ? old('email') : '') }}">
                    <img src="{{ asset('images/email.png') }}" alt="" id="email">
                </div>
            </div>
            <br><br>
            <div class="log-div">
                <label for="" class="lab">Password:</label>
                <div class="form-input">
                    <input type="password" placeholder="••••••••••••••••••" class="input-local" name="password" id="password">
                    <img src="{{ asset('images/eye.png') }}" alt="" style="display: block" id="pass">
                    <img src="{{ asset('images/eye_off.png') }}" alt="" style="display: none" id="pass2">
                </div>
            </div>
            <br><br>
            <div class="log-div">
                <a href="{{ route('forgotpasswd') }}" class="form-link">Forgot Password</a>
                <a href="{{ route('homepage') }}" class="form-link">Don't have an account</a>
            </div>
            <br>
            <div id="errr">
                @if(Session::has('failure'))
                    <li class="err">{{ Session::get('failure') }}</li>
                    <?php Session::forget('failure');?>
                @endif
                @foreach ($errors->all() as $error)
                    <li class="err">{{ $error }}</li>
                @endforeach
            </div>
            <br>
            <button type="submit" id="sect-button">CONFIRM</button>
            
        </form>
   </div><br>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var passImg = document.getElementById('pass');
        var passImg2 = document.getElementById('pass2');
        var passwordInput = document.getElementById('password');

        passImg.addEventListener('click', function() {
            passImg.style.display = 'none';
            passImg2.style.display = 'block';
            passwordInput.type = 'text';
        });

        passImg2.addEventListener('click', function() {
            passImg2.style.display = 'none';
            passImg.style.display = 'block';
            passwordInput.type = 'password';
        });
    });
</script>

@endsection