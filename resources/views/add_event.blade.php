@extends('layouts.event')

@section('content')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <section id="section1">
        <div class="add-event-main">
            <h2 class="add-event-head">CREATE EVENT</h2>
            <div class="add-event-house">
                <form action="{{ route('events/create') }}" method="POST">
                    @csrf
                    <div class="add-event-top">
                        <div class="add-event-top1">
                            <div class="add-event-field">
                                <label for="" class="add-member-label">Event Title: </label>
                                <input type="text" class="add-member-input" placeholder="Type Here..." name="title">
                            </div>
                            <br><br>
                            <div class="add-event-field">
                                <label for="" class="add-member-label">Description: </label>
                                <textarea cols="70" rows="10" class="add-member-input1" name="description"></textarea>
                            </div>
                        </div>
                        <div class="add-event-top2">
                            <div class="add-event-part">
                                <div class="add-event-part-top">
                                    <div>
                                        <img src="{{ asset('images/add.png') }}" alt="add" id="add" class="adding">
                                    </div>
                                    <div>
                                        <p class="ding">Add Participants</p>
                                    </div>
                                </div>
                                <hr id="hr1">
                                <div id="parts-addin1" style="display: none;">
                                    <div id="search1">
                                        <div id="search-bar1">
                                            <input type="text" placeholder="Name" id="search-input1">
                                        </div>

                                        <button id="search-button1">Search</button>
                                    </div>
                                    <div>
                                        <hr id="hr2">
                                        <div id="scroll-minii">
                                            @foreach($members as $member)
                                                <div class="member-vals3">
                                                    <div class="mv3">
                                                        <input type="checkbox" value="{{$member['id']}}" name="participants[]">
                                                        <img src="data:image/svg+xml;base64,{{ base64_encode($member['avatar']) }}" alt="" id="icon3">
                                                        <div class="name3">
                                                            <p class="p13">{{ strtoupper($member['name']) }}</p>
                                                            <p class="p23">{{ $member['email'] }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div id="scroll-mini-butt" class="adding"><p id="down">Select</p></div>
                                    </div>
                                </div>
                                <div id="parts-addin2" style="display: block;">
                                    <div id="takecare">
                                        <p id="participant_emails"></p>
                                    </div>
                                    <br>
                                    <div class="add-event-field1">
                                        <label for="" class="add-event-label">Start Date: </label>
                                        <input type="date" class="add-event-input" name="startdate">
                                    </div>
                                    <br>
                                    <div class="add-event-field1">
                                        <label for="" class="add-event-label">Start Time: </label>
                                        <input type="time" class="add-event-input" name="starttime">
                                    </div>
                                    <br>
                                    <div class="add-event-field1">
                                        <label for="" class="add-event-label">End Date: </label>
                                        <input type="date" class="add-event-input" name="enddate">
                                    </div>
                                    <br>
                                    <div class="add-event-field1">
                                        <label for="" class="add-event-label">End Time: </label>
                                        <input type="time" class="add-event-input" name="endtime">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div id="errr">
                        @foreach ($errors->all() as $error)
                            <li class="err">{{ $error }}</li>
                        @endforeach
                    </div>
                    <button id="search-button" class="alone" type="submit">Register</button>
                </form>
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

        $("#search-button1").click(function() {
            var searchKeyword= $("#search-input1").val().toLowerCase();
            $(".member-vals3").each(function() {
                var memberName = $(this).find(".p13").text().toLowerCase();
                if (memberName.includes(searchKeyword)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });

        $("#scroll-mini-butt").click(function() {
            var selectedEmails = [];

            // Find all the selected checkboxes
            $("input[name='participants[]']:checked").each(function() {
                // Get the value of the selected checkbox (participant ID)
                var participantId = $(this).val();

                // Find the corresponding email using the data attribute
                var email = $(".member-vals3 input[value='" + participantId + "']").siblings(".name3").find(".p23").text();

                // Add the email to the selectedEmails array
                selectedEmails.push(email);
            });

            // Display the selected emails in the participant_emails element
            $("#participant_emails").text(selectedEmails.join(" | "));
        });
    });


    $(document).ready(function() {
        var addFormSubmitted = false;

        $("form").submit(function() {
        // Set the flag to indicate form submission
        addFormSubmitted = true;
        });

        $("#search-button").click(function() {
        // Disable the button
        $(this).prop("disabled", true);

        // Show a loading message
        // $(this).text("Registering...");

        // Optional: You can also show a loader or spinner if desired
        $(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Registering...');

        // Submit the form if it hasn't been submitted already
        if (!addFormSubmitted) {
            $(this).closest("form").submit();
        }
        });
    });

    </script>

@endsection