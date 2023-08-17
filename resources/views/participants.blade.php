@extends('layouts.event')

@section('content')
    <section id="section3">
        <div class="participant-house">
            <div class="participant-title">
                <h1 class="headingf" data-content="participant-content1" onclick="toggleContent(this)">VIEW PARTICIPANTS</h1>

                <h1 class="headingf" data-content="participant-content2" onclick="toggleContent(this)">MANAGE PARTICIPANTS</h1>
            </div>
            
            <hr id="scroll-line">

            <div id="participant-content1" class="participant-content" style="display: block;">
                <div class="up-box">
                    <div class="box-up">
                        <img src="{{ asset('images/event.png') }}" alt="" class="parti">
                        <h2 class="finale">DEMO TIME</h2>
                    </div>
                </div>
                <div class="down-box">
                    <hr>
                    @foreach($participants as $particip)
                    <div class="participant-info">
                        <div class="participant-info-box">
                            <img src="" alt="" class="icon-parti">
                            <div class="participant-name">
                                <h3>{{ strtoupper($particip['name']) }}</h3>
                                <p>{{ $particip['email'] }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    </div>
            </div>

            <div id="participant-content2" class="participant-content" style="display: none;">
                <div class="content2-first">
                    <div class="up-box">
                        <div class="box-up">
                            <img src="{{ asset('images/event.png') }}" alt="" class="parti">
                            <h2 class="finale">DEMO TIME</h2>
                        </div>
                    </div>
                    <div class="down-box">
                        <hr>
                        <div class="participant-info">
                            <div class="participant-info-box2">
                                <img src="" alt="" class="icon-parti">
                                <div class="participant-name">
                                    <h3></h3>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <a href=""><button id="remove-butt">Remove</button></a>
                </div>

                <div class="content2-second">
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

                    <a href=""><button id="add-butt">Add</button></a>
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
    </script>
@endsection