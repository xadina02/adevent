@extends('layouts.event')

@section('content')

    <section id="section3">
    <div id="carrier">
            <div id="parent">
                <form action="">
                        <h2 id="form-head2">EVENTS LIST</h2>
                        <div id="search">
                            <div id="search-bar">
                                <input type="text" placeholder="Title" id="search-input">
                            </div>
                            <button id="search-button">Search</button>
                        </div>
                </form>
                <br><hr>
            </div>

            <div id="members">
                @foreach($events as $event)
                <div class="events-vals">
                    <div class="ev">
                        <div class="ev-first">
                           <img src="{{ asset('images/event.png') }}" alt="icon" class="ev-icon">
                           <div class="ev-first2">
                                <div class="top">
                                    <h2 class="top1">{{ strtoupper($event['title']) }}</h2>

                                    <div class="top2">
                                        <a href="{{ route('events/edit', ['id' => $event['id']]) }}" class="top2-sub">Edit</a>
                                        <div class="top22" value="{{ $event['id'] }}">Delete</div>
                                    </div>
                                </div>

                                <div class="middle">
                                    <p>{{ $event['description'] }}</p>
                                </div>

                                <div class="bottom">
                                    <p>Date: {{ $event['startdate'] }}</p>
                                    <p>Time: {{ $event['starttime'] }}</p>
                                </div>
                           </div>
                        </div>

                        <div class="ev-second">
                            <div>
                                <a href="{{ route('events/participants', ['id' => $event['id']]) }}"><button class="ev-button">Participants</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <br class="event-br"> -->
                @endforeach
            </div>
            <div id="modalBackdrop" style="display: none;">
                <div id="myModal">
                    <div id="modal-content">
                        <h2>Are you sure you want to delete this event?</h2>
                        <div id="modal-butt-div">
                            <button class="modal-butt" id="delete-member-yes">YES</button>
                            <button class="modal-butt" id="delete-member-no">NO</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            var deleteButtons = document.querySelectorAll('.top22');
            var modalBackdrop = document.getElementById('modalBackdrop');
            var deleteMemberNoButton = document.getElementById('delete-member-no');
            var deleteMemberYesButton = document.getElementById('delete-member-yes');
            var searchInput = document.getElementById('search-input');
            var searchButton = document.getElementById('search-button');
            var eventsContainer = document.getElementById('members');
            var searchTerm = '';
            var noEventsText = document.createElement('h1');
            noEventsText.id = 'no-events-text';
            noEventsText.textContent = 'No events match your search!';


            searchButton.addEventListener('click', function(e) {
                e.preventDefault();
                searchTerm = searchInput.value.trim().toLowerCase();

                var eventVals = document.querySelectorAll('.events-vals');
                var hasMatchingEvents = false;

                eventVals.forEach(function(event) {
                    var eventName = event.querySelector('.top1').textContent.toLowerCase();
                    if (eventName.includes(searchTerm)) {
                        event.style.display = 'block';
                        hasMatchingEvents = true;
                    } else {
                        event.style.display = 'none';
                    }
                });

                if (!hasMatchingEvents) {
                    eventsContainer.appendChild(noEventsText);
                } else {
                    eventsContainer.removeChild(noEventsText);
                }
            });
            
            // searchButton.addEventListener('click', function(e) {
            //     e.preventDefault();
            //     searchTerm = searchInput.value.trim().toLowerCase();

            //     var eventVals = document.querySelectorAll('.events-vals');
            //     eventVals.forEach(function(event) {
            //         var eventName = event.querySelector('.top1').textContent.toLowerCase();
            //         if (eventName.includes(searchTerm)) {
            //             event.style.display = 'block';
            //         } else {
            //             event.style.display = 'none';
            //         }
            //     });
            // });

            // Preserve the search keyword in the input field after search
            searchInput.addEventListener('input', function() {
                searchTerm = this.value.trim().toLowerCase();
            });

            // Show the filtered events on page load if a search keyword is present
            if (searchTerm !== '') {
                var eventVals = document.querySelectorAll('.events-vals');
                eventVals.forEach(function(event) {
                    var eventName = event.querySelector('.top1').textContent.toLowerCase();
                    if (eventName.includes(searchTerm)) {
                        event.style.display = 'block';
                    } else {
                        event.style.display = 'none';
                    }
                });
                // Set the search keyword back in the input field
                searchInput.value = searchTerm;
            }

            deleteButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var buttonValue = button.getAttribute('value');
                    deleteMemberYesButton.value = buttonValue;
                    modalBackdrop.style.display = 'block';

                    deleteMemberNoButton.addEventListener('click', function() {
                        modalBackdrop.style.display = 'none';
                    });

                    deleteMemberYesButton.addEventListener('click', function() {
                        var url = "{{ route('events/delete', ['id' => ':buttonValue']) }}";
                        url = url.replace(':buttonValue', buttonValue);

                        modalBackdrop.style.display = 'none';
                        window.location.href = url;
                    });
                });
            });
        });
    </script>

@endsection