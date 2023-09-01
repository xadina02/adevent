@extends('layouts.event')

@section('content')

    <section id="section1">
        <div class="add-event-main">
            <h2 class="add-event-head">{{ strtoupper($data['title']) }}</h2>
            <div class="add-event-housee">
                <form action="{{ route('events/update', ['id' => $data['id']]) }}" method="POST">
                    @csrf
                    <div class="add-event-topp">
                        <div class="add-event-top1">
                            <div class="add-event-field">
                                <label for="" class="add-member-label">Event Title: </label>
                                <input type="text" class="add-member-input" value="{{ $data['title'] }}" name="title">
                            </div>
                            <br>
                            <div class="add-event-field">
                                <label for="" class="add-member-label">Description: </label>
                                <textarea cols="70" rows="10" class="add-member-input1" name="description">{{ $data['description'] }}</textarea>
                            </div>
                        </div>
                        <!-- <div class="add-event-top2">
                            
                            <div class="add-event-field1">
                                <label for="" class="add-event-label">Start Date: </label>
                                <input type="date" class="add-event-input" value="{{ $data['start date'] }}" name="startdate">
                            </div>
                            <br><br><br>
                            <div class="add-event-field1">
                                <label for="" class="add-event-label">Start Time: </label>
                                <input type="time" class="add-event-input" value="{{ $data['start time'] }}" name="starttime">
                            </div>
                            <br><br><br>
                            <div class="add-event-field1">
                                <label for="" class="add-event-label">End Date: </label>
                                <input type="date" class="add-event-input" value="{{ $data['end date'] }}" name="enddate">
                            </div>
                            <br><br><br>
                            <div class="add-event-field1">
                                <label for="" class="add-event-label">End Time: </label>
                                <input type="time" class="add-event-input" value="{{ $data['end time'] }}" name="endtime">
                            </div>
                        </div> -->
                    </div>
                    <br>
                    <div id="errr">
                        @if(Session::has('failure'))
                            <li class="err">{{ Session::get('failure') }}</li>
                            <?php Session::forget('failure');?>
                        @endif
                    </div>
                    <br>
                    <button id="search-button" type="submit">Update</button>
                </form>
            </div>
        </div>
    </section>

@endsection