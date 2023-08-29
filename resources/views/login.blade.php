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
                <div class="form-input" id="email">
                    <input type="text" placeholder="email@example.com" class="input-local" name="email">
                </div>
            </div>
            <br><br>
            <div class="log-div">
                <label for="" class="lab">Password:</label>
                <div class="form-input" id="pass">
                    <input type="password" placeholder="••••••••••••••••••" class="input-local" name="password">
                </div>
            </div>
            <br><br>
            <div class="log-div">
                <a href="{{ route('forgotpasswd') }}" class="form-link">Forgot Password</a>
                <a href="{{ route('homepage') }}" class="form-link">Don't have an account</a>
            </div>
            <div id="errr">
                @foreach ($errors->all() as $error)
                    <li class="err">{{ $error }}</li>
                @endforeach
            </div>
            <br>
            <button type="submit" id="sect-button">CONFIRM</button>
            
        </form>
   </div><br>
</section>

@endsection