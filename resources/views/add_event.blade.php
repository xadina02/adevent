@extends('layouts.event')

@section('content')

    <section id="section1">
        <div class="add-event-main">
            <h2 class="add-event-head">CREATE EVENT</h2>
            <div class="add-event-house">
                <form action="">
                    <div class="add-event-top">
                        <div class="add-event-top1">
                            <div class="add-event-field">
                                <label for="" class="add-member-label">Event Title: </label>
                                <input type="text" class="add-member-input" placeholder="Type Here...">
                            </div>
                            <br><br>
                            <div class="add-event-field">
                                <label for="" class="add-member-label">Description: </label>
                                <textarea name="" id="" cols="70" rows="10" class="add-member-input1"></textarea>
                            </div>
                        </div>
                        <div class="add-event-top2">
                            <div class="add-event-part">
                                <div class="add-event-part-top">
                                    <div>
                                        <img src="{{ asset('images/add.png') }}" alt="add" id="add">
                                    </div>
                                    <div>
                                        <p class="ding">App Participants</p>
                                    </div>
                                </div>
                                <hr id="hr1">
                                <div>
                                    <p>amosongodina@gmail.com | formasitf@gmail.com | ndaleghnoela@gmail.com | stayuptodate237@gmail.com | fongohmartin@gmail.com | billyhans90@gmail.com</p>
                                </div>
                            </div>
                            <br>
                            <div class="add-event-field1">
                                <label for="" class="add-event-label">Start Date: </label>
                                <input type="date" class="add-event-input">
                            </div>
                            <br>
                            <div class="add-event-field1">
                                <label for="" class="add-event-label">Start Time: </label>
                                <input type="time" class="add-event-input">
                            </div>
                            <br>
                            <div class="add-event-field1">
                                <label for="" class="add-event-label">End Date: </label>
                                <input type="date" class="add-event-input">
                            </div>
                            <br>
                            <div class="add-event-field1">
                                <label for="" class="add-event-label">End Time: </label>
                                <input type="time" class="add-event-input">
                            </div>
                        </div>
                    </div>
                </form>
                <br>
                <button id="search-button">Register</button>
            </div>
        </div>
    </section>

@endsection