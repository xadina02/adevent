@extends('layouts.event')

@section('content')

    <section id="section3">
    <div id="carrier">
            <div id="parent">
                <form action="">
                        <h2 id="form-head2">EVENTS LIST</h2>
                        <div id="search">
                            <div id="search-bar">
                                <input type="text" placeholder="Title" id="search-input">
                            </div>
                            <button id="search-button">Search</button>
                        </div>
                </form>
                <br><hr>
            </div>

            <div id="members">
                @foreach($events as $event)
                <div class="events-vals">
                    <div class="ev">
                        <div class="ev-first">
                           <img src="{{ asset('images/event.png') }}" alt="icon" class="ev-icon">
                           <div class="ev-first2">
                                <div class="top">
                                    <h2 class="top1">{{ strtoupper($event['title']) }}</h2>

                                    <div class="top2">
                                        <a href="{{ route('events/edit', ['id' => $event['id']]) }}" class="top2-sub">Edit</a>
                                        <a href="" class="top2-sub">Delete</a>
                                    </div>
                                </div>

                                <div class="middle">
                                    <p>{{ $event['description'] }}</p>
                                </div>

                                <div class="bottom">
                                    <p>Date: {{ $event['startdate'] }}</p>
                                    <p>Time: {{ $event['starttime'] }}</p>
                                </div>
                           </div>
                        </div>

                        <div class="ev-second">
                            <div>
                                <a href="{{ route('events/participants', ['id' => $event['id']]) }}"><button class="ev-button">View Participants</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                @endforeach
            </div>
        </div>
    </section>

@endsection