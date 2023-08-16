@extends('layouts.app')


@section('content')

<section id="section1">
    <div id="sect-sep">
        <div id="sect1">
            <h1 id="heading">ADEVENT</h1>
            <p id="desc">CREATE AND MANAGE YOUR EVENTS<br> AND TEAM MEMBERS EASILY WITH<br> <span>ADEVENT</span>. WE HELP ENSURE AN<br> EFFICIENT AND AUTOMATED CONTROL<br> OVER SCHEDULES, ENFORCING<br> MAXIMUM WORK PERFORMANCE.</p>
            <a href="{{ route('signup') }}"><button id="sect-button">GET STARTED</button></a>
        </div>

        <div id="sect2">
            <br><br><br>
            <img src="{{ asset('images/image1.png') }}" alt="image" id="image">
        </div>
    </div>
</section>

@endsection