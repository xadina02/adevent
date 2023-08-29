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
                <!--  -->
                <h1 id="no-edit">SORRY!! YOU CAN NO LONGER VIEW PARTICIPANTS FOR THIS EVENT.</h1>
                <img src="{{ asset('images/error.svg') }}" alt="error" id="edit-error">
            </div>

            <div id="participant-content2" class="participant-content" style="display: none;">
                <div id="underline2"></div>
                <!--  -->
                <h1 id="no-edit">SORRY!! YOU CAN NO LONGER MANAGE PARTICIPANTS FOR THIS EVENT.</h1>
                <img src="{{ asset('images/error.svg') }}" alt="error" id="edit-error">
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

    </script>
@endsection