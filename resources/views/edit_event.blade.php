@extends('layouts.event')

@section('content')

    <section id="section1">
        <div class="add-event-main">
            <h2 class="add-event-head">EDIT - {{ strtoupper($data['title']) }}</h2>
            <div class="add-event-house">
                <form action="{{ route('events/update', ['id' => $data['id']]) }}" method="POST">
                    @csrf
                    <div class="add-event-top">
                        <div class="add-event-top1">
                            <div class="add-event-field">
                                <label for="" class="add-member-label">Event Title: </label>
                                <input type="text" class="add-member-input" placeholder="{{ strtoupper($data['title']) }}" name="title">
                            </div>
                            <br>
                            <div class="add-event-field">
                                <label for="" class="add-member-label">Description: </label>
                                <textarea cols="70" rows="10" class="add-member-input1" placeholder="{{ $data['description'] }}" name="description"></textarea>
                            </div>
                        </div>
                        <div class="add-event-top2">
                            
                            <div class="add-event-field1">
                                <label for="" class="add-event-label">Start Date: </label>
                                <input type="date" class="add-event-input" placeholder="{{ $data['start date'] }}" name="startdate">
                            </div>
                            <br><br><br>
                            <div class="add-event-field1">
                                <label for="" class="add-event-label">Start Time: </label>
                                <input type="time" class="add-event-input" placeholder="{{ $data['start time'] }}" name="starttime">
                            </div>
                            <br><br><br>
                            <div class="add-event-field1">
                                <label for="" class="add-event-label">End Date: </label>
                                <input type="date" class="add-event-input" placeholder="{{ $data['end date'] }}" name="enddate">
                            </div>
                            <br><br><br>
                            <div class="add-event-field1">
                                <label for="" class="add-event-label">End Time: </label>
                                <input type="time" class="add-event-input" placeholder="{{ $data['end time'] }}" name="endtime">
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <button id="search-button" type="submit">Update</button>
                </form>
            </div>
        </div>
    </section>

@endsection