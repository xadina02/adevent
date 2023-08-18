@extends('layouts.event')

@section('content')

    <section id="section1">
        <div class="add-event-main">
            <h2 class="add-event-head">EDIT - [EVENT NAME]</h2>
            <div class="add-event-house">
                <form action="">
                    <div class="add-event-top">
                        <div class="add-event-top1">
                            <div class="add-event-field">
                                <label for="" class="add-member-label">Event Title: </label>
                                <input type="text" class="add-member-input" placeholder="{{ $data['title'] }}">
                            </div>
                            <br>
                            <div class="add-event-field">
                                <label for="" class="add-member-label">Description: </label>
                                <textarea name="" id="" cols="70" rows="10" class="add-member-input1" placeholder="{{ $data['description'] }}"></textarea>
                            </div>
                        </div>
                        <div class="add-event-top2">
                            
                            <div class="add-event-field1">
                                <label for="" class="add-event-label">Start Date: </label>
                                <input type="date" class="add-event-input">
                            </div>
                            <br><br><br>
                            <div class="add-event-field1">
                                <label for="" class="add-event-label">Start Time: </label>
                                <input type="time" class="add-event-input">
                            </div>
                            <br><br><br>
                            <div class="add-event-field1">
                                <label for="" class="add-event-label">End Date: </label>
                                <input type="date" class="add-event-input">
                            </div>
                            <br><br><br>
                            <div class="add-event-field1">
                                <label for="" class="add-event-label">End Time: </label>
                                <input type="time" class="add-event-input">
                            </div>
                        </div>
                    </div>
                </form>
                <br><br>
                <button id="search-button">Update</button>
            </div>
        </div>
    </section>

@endsection