@extends('layouts.app')


@section('content')

<section id="section2">
   <div class="log-pass">
        <form action="{{ route('password.change') }}" method="POST" class="form-pass">
        @csrf
            <h1 id="form-head">NEW PASSWORD</h1>
            
            <div class="log-div1">
                <label for="" class="lab">Email:</label><br>
                <div class="form-input" id="arrange1">
                    <input type="text" placeholder="email@example.com" class="input-local" name="email" value="{{ old('email') }}">
                    <img src="{{ asset('images/email.png') }}" alt="" id="email">
                </div>
            </div>
            
            <div class="log-div1">
                <label for="" class="lab">Password:</label><br>
                <div class="form-input" id="arrange2">
                    <input type="password" placeholder="••••••••••••••••••" class="input-local" name="password" id="password">
                    <img src="{{ asset('images/eye.png') }}" alt="" style="display: block" id="pass">
                    <img src="{{ asset('images/eye_off.png') }}" alt="" style="display: none" id="pass2">
                </div>
            </div>
            
            <div class="log-div1">
                <label for="" class="lab">Confirm Password:</label><br>
                <div class="form-input" id="arrange2">
                    <input type="password" placeholder="••••••••••••••••••" class="input-local" name="cpassword" id="password1">
                    <img src="{{ asset('images/eye.png') }}" alt="" style="display: block" id="passs">
                    <img src="{{ asset('images/eye_off.png') }}" alt="" style="display: none" id="passs2">
                </div>
            </div><br>
            <div id="errr">
                @foreach ($errors->all() as $error)
                    <li class="err">{{ $error }}</li>
                @endforeach
            </div>
            <br>
            <div>
                <button type="submit" id="sect-button">CONFIRM</button>
            </div>
        </form>
   </div><br>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var passImg = document.getElementById('pass');
        var passImg2 = document.getElementById('pass2');
        var passsImg = document.getElementById('passs');
        var passsImg2 = document.getElementById('passs2');
        var passwordInput = document.getElementById('password');
        var passwordInput1 = document.getElementById('password1');

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

        passsImg.addEventListener('click', function() {
            passsImg.style.display = 'none';
            passsImg2.style.display = 'block';
            passwordInput1.type = 'text';
        });

        passsImg2.addEventListener('click', function() {
            passsImg2.style.display = 'none';
            passsImg.style.display = 'block';
            passwordInput1.type = 'password';
        });
    });
</script>
@endsection