@extends('layouts.event')

@section('content')

    <section id="section3">
    <div id="carrier">
            <div id="parent">
                <form action="">
                        <h2 id="form-head2">EVENTS LIST</h2>
                        <div id="search">
                            <div id="search-bar">
                                <img src="" alt="" id="search-image">
                                <input type="text" placeholder="Name" id="search-input">
                            </div>
                            <a href=""><button id="search-button">Search</button></a>
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
                                        <a href="" class="top2-sub">Edit</a>
                                        <a href="" class="top2-sub">Delete</a>
                                    </div>
                                </div>

                                <div class="middle">
                                    <p>{{ $event['description'] }}</p>
                                </div>

                                <div class="bottom">
                                    <p>Date: {{ $event['start date'] }}</p>
                                    <p>Time: {{ $event['start time'] }}</p>
                                </div>
                           </div>
                        </div>

                        <div class="ev-second">
                            <div>
                                <a href=""><button class="ev-button">View Participants</button></a>
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