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
                        <h2 class="finale">DEMO TIME</h2>
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
                            <h2 class="finale">DEMO TIME</h2>
                        </div>
                    </div>
                    <div class="down-box">

                        <form action="">
                            <hr>
                            <div id="parts2">
                                    @foreach($participants as $particip)
                                        <div class="participant-info">
                                            <div class="participant-info-box2">
                                                <input type="checkbox" name="participant_id" value="{{ $particip['id'] }}" class="checkbox">
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
                    <form action="">
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
                                    </div>
                                    <button id="scroll-mini-butt" class="adding">Select</button>
                                </form>
                            </div>
                            <div id="parts-add2" class="parts-adding" style="display: block;">
                                <div id="takecare">
                                    <p>amosongodina@gmail.com | formasitf@gmail.com | ndaleghnoela@gmail.com | stayuptodate237@gmail.com | fongohmartin@gmail.com | billyhans90@gmail.com</p>
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
        let activeContentId = '';

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
            var content1 = $("#parts-add2");
            var content2 = $("#parts-add");

            if (content1.is(":visible")) {
            content1.slideUp();
            content2.slideDown();
            } else {
            content2.slideUp();
            content1.slideDown();
            }
        });

        // $(".addingg").click(function() {
        //     var content2 = $("#parts-add");

        //     content2.slideUp();
        //     content1.slideDown();
        // });
        });

        // document.getElementById("scroll-mini-butt").addEventListener("click", function() {
        //     var parentDiv = document.getElementById("parts-add");
        //     parentDiv.style.display = "none";
        //     });
    
    </script>

@endsection