@extends('layouts.event')

@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <section id="section3">
        <div class="participant-house">
            <div class="participant-title">
                <h1 class="headingf" data-content="participant-content1" onclick="toggleContent(this)">VIEW PARTICIPANTS</h1>

                <h1 class="headingf" data-content="participant-content2" onclick="toggleContent(this)">MANAGE PARTICIPANTS</h1>
            </div>
            
            <hr id="scroll-line">

            <div id="participant-content1" class="participant-content" style="display: block;">
                <div id="underline1"></div>
                <br>
                <div class="up-box">
                    <div class="box-up">
                        <img src="{{ asset('images/event.png') }}" alt="" class="parti">
                        <h2 class="finale">{{ strtoupper($event['title']) }}</h2>
                    </div>
                </div>
                <div class="down-box">
                    <hr>
                    <div id="parts">
                        @foreach($participants as $particip)
                            <div class="participant-info">
                                <div class="participant-info-box">
                                    <img src="data:image/svg+xml;base64,{{ base64_encode($particip['avatar']) }}" alt="" class="icon-parti">
                                    <div class="participant-name">
                                        <h3 class="part-name">{{ strtoupper($particip['name']) }}</h3>
                                        <p class="part-email">{{ $particip['email'] }}</p>
                                    </div>
                                </div>
                            </div>
                            <br>
                        @endforeach
                    </div>
                    </div>
            </div>

            <div id="participant-content2" class="participant-content" style="display: none;">
                <div id="underline2"></div>
                <div id="participant-content2b">
                <div class="content2-first">
                    <div class="up-box">
                        <div class="box-up">
                            <img src="{{ asset('images/event.png') }}" alt="" class="parti">
                            <h2 class="finale">{{ strtoupper($event['title']) }}</h2>
                        </div>
                    </div>
                    <div class="down-box">

                        <form action="{{ route('events/participants/remove', ['id' => $event['id']]) }}" method="POST">
                            @csrf
                            <hr>
                            <div id="parts2">
                                    @foreach($participants as $particip)
                                        <div class="participant-info">
                                            <div class="participant-info-box2">
                                                <input type="checkbox" name="participants1[]" value="{{ $particip['id'] }}" class="checkbox">
                                                <img src="data:image/svg+xml;base64,{{ base64_encode($particip['avatar']) }}" alt="" class="icon-parti">
                                                <div class="participant-name">
                                                    <h3 class="part-name">{{ strtoupper($particip['name']) }}</h3>
                                                    <p class="part-email">{{ $particip['email'] }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <p></p>
                                    @endforeach
                            </div>
                            <hr>
                            <button id="remove-butt">Remove</button>
                        </form>
                    </div>
                </div>

                <div class="content2-second">
                    <form action="{{ route('events/participants/add', ['id' => $event['id']]) }}" method="POST">
                        @csrf
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
                            <div id="parts-add" class="parts-adding" style="display: none;">
                                <div id="search1">
                                    <div id="search-bar1">
                                        <input type="text" placeholder="Name" id="search-input1">
                                    </div>

                                    <a href=""><button id="search-button1">Search</button></a>
                                </div>
                                <div>
                                    <hr id="hr2">
                                    <div id="scroll-mini">
                                        @foreach($members as $member)
                                            <div class="member-vals3">
                                                <div class="mv3">
                                                    <input type="checkbox" value="{{$member['id']}}" name="participants2[]">
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
                            <div id="parts-add2" class="parts-adding" style="display: block;">
                                <div id="takecare">
                                    <p id="participant_emails"></p>
                                </div>
                                <br><br><br><br><br>
                                <button id="add-butt">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        let activeContentId = 'participant-content1';

        function toggleContent(heading) {
        const contentId = heading.getAttribute('data-content');
        
        if (activeContentId !== contentId) {
            hideActiveContent();
            showContent(contentId);
        }

        const container = document.querySelector('.container');
        container.scrollLeft = heading.offsetLeft - (container.offsetWidth - heading.offsetWidth) / 2;
        }

        function showContent(contentId) {
        const content = document.getElementById(contentId);
        content.style.display = 'block';
        activeContentId = contentId;

        const headings = document.querySelectorAll('.heading');
        headings.forEach((h) => h.classList.remove('selected'));
        document.querySelector(`[data-content="${contentId}"]`).classList.add('selected');
        }

        function hideActiveContent() {
        if (activeContentId) {
            const activeContent = document.getElementById(activeContentId);
            activeContent.style.display = 'none';
        }
        }

        $(document).ready(function() {
        $(".adding").click(function() {
            var content1 = $("#parts-add");
            var content2 = $("#parts-add2");

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
            $("input[name='participants2[]']:checked").each(function() {
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

        $(document).ready(function() {
        var addFormSubmitted = false;

        $("form").submit(function() {
        // Set the flag to indicate form submission
        addFormSubmitted = true;
        });

        $("#add-butt").click(function() {
        // Disable the button
        $(this).prop("disabled", true);

        // Show a loading message
        $(this).text("Adding...");

        // Optional: You can also show a loader or spinner if desired
        // For example: $(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Adding...');

        // Submit the form if it hasn't been submitted already
        if (!addFormSubmitted) {
            $(this).closest("form").submit();
        }
        });
        });
    });
    </script>
@endsection