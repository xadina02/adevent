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
                    <input type="text" placeholder="email@example.com" class="input-local" name="email">
                </div>
            </div>
            
            <div class="log-div1">
                <label for="" class="lab">Password:</label><br>
                <div class="form-input" id="arrange2">
                    <input type="password" placeholder="••••••••••••••••••" class="input-local" name="password">
                </div>
            </div>
            
            <div class="log-div1">
                <label for="" class="lab">Confirm Password:</label><br>
                <div class="form-input" id="arrange2">
                    <input type="password" placeholder="••••••••••••••••••" class="input-local" name="cpassword">
                </div>
            </div>
            <br>
            <div>
                <button type="submit" id="sect-button">CONFIRM</button>
            </div>
        </form>
   </div><br>
</section>

@endsection