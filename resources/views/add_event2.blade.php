@extends('layouts.event')

@section('content')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                            <div id="add-event-part" class="parts-adding" style="display: none;">
                                <div class="add-event-part-top">
                                    <div>
                                        <img src="{{ asset('images/add.png') }}" alt="add" id="add" class="adding">
                                    </div>
                                    <div>
                                        <p class="ding">App Participants</p>
                                    </div>
                                </div>
                                <hr id="hr1">
                                <!--Added-->
                                <div id="parts-addin1" style="display: block;">
                                    <div id="search1">
                                        <div id="search-bar1">
                                            <img src="" alt="">
                                            <input type="text" placeholder="Name" id="search-input1">
                                        </div>

                                        <a href=""><button id="search-button1">Search</button></a>
                                    </div>
                                    <form action="">
                                        <hr id="hr2">
                                        <div id="scroll-mini">
                                            @foreach($members as $member)
                                                <div class="member-vals3">
                                                    <div class="mv3">
                                                        <input type="checkbox" value="$member['id']">
                                                        <img src="data:image/svg+xml;base64,{{ base64_encode($member['avatar']) }}" alt="" id="icon3">
                                                        <div class="name3">
                                                            <p class="p13">{{ strtoupper($member['name']) }}</p>
                                                            <p class="p23">{{ $member['email'] }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                            @endforeach
                                        </div><p></p>
                                        <button id="scroll-mini-butt" class="adding">Select</button>
                                    </form>
                                </div>
                                <!--Added-->

                                <div id="parts-addin2" style="display: block;">
                                    <!-- <p>amosongodina@gmail.com | formasitf@gmail.com | ndaleghnoela@gmail.com | stayuptodate237@gmail.com | fongohmartin@gmail.com | billyhans90@gmail.com</p> -->
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

    <script>

    $(document).ready(function() {
        $(".adding").click(function() {
            var content1 = $("#parts-addin1");
            var content2 = $("#parts-addin2");

            if (content1.is(":visible")) {
            content1.slideUp();
            content2.slideDown();
            } else {
            content2.slideUp();
            content1.slideDown();
            }
        });
        });
    
    </script>

@endsection