@extends('layouts.event')

@section('content')

    <section id="section1">
        <div class="add-event-main">
            <h2 class="add-event-head">{{ strtoupper($data['title']) }}</h2>
            <div class="add-event-house">
                <br><br><br>
                <h1 id="no-edit">SORRY!! YOU CANNOT EDIT THIS EVENT BECAUSE IT IS DUE TO BEGIN SOON.</h1>
            </div>
        </div>
    </section>

@endsection