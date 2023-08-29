@extends('layouts.event')

@section('content')

    <section id="section1">
        <div class="add-event-main">
            <h2 class="add-event-head">{{ strtoupper($data['title']) }}</h2>
            <div class="add-event-house">
                <br><br>
                <h1 id="no-edit">SORRY!! YOU CAN NO LONGER EDIT THIS EVENT.</h1>
                <img src="{{ asset('images/error.svg') }}" alt="error" id="edit-error">
            </div>
        </div>
    </section>

@endsection