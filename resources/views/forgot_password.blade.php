@extends('layouts.app')


@section('content')

<section id="section2">
   <div class="log-pass">
        <form action="" class="form-pass">
            <h1 id="form-head">NEW PASSWORD</h1>
            
            <div class="log-div1">
                <label for="" class="lab">Email:</label><br>
                <input type="text" placeholder="email@example.com" class="form-input" id="email">
            </div>
            
            <div class="log-div1">
                <label for="" class="lab">Password:</label><br>
                <input type="password" placeholder="••••••••••••••••••" class="form-input" id="pass">
            </div>
            
            <div class="log-div1">
                <label for="" class="lab">Confirm Password:</label><br>
                <input type="password" placeholder="••••••••••••••••••" class="form-input" id="pass">
            </div>
            <br>
            <div>
                <a href="{{ route('signup') }}"><button id="sect-button">CONFIRM</button></a>
            </div>
        </form>
   </div><br>
</section>

@endsection