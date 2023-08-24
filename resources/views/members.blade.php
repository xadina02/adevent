@extends('layouts.member')

@section('content')
    <section id="section3">
        <div id="carrier">
            <div id="parent">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                        <h2 id="form-head2">TEAM MEMBERS LIST</h2>
                        <div id="search">
                            <div id="search-bar">
                                <input type="text" placeholder="Name" id="search-input">
                            </div>
                            <button id="search-button">Search</button>
                        </div>
                </form>
                <br><hr>
            </div>

            <div id="members">
                @foreach($members as $member)
                <div class="member-vals">
                    <div class="mv">
                        <div class="first">
                            <img src="data:image/svg+xml;base64,{{ base64_encode($member['avatar']) }}" alt="avatar" id="avatar">
                            <div class="name">
                                <p class="p1">{{ strtoupper($member['name']) }}</p>
                                <p class="p2">{{ $member['email'] }}</p>
                            </div>
                        </div>

                        <div class="second">
                            <div>
                                <a href="{{ route('members/edit', ['id' => $member['id']]) }}"><button id="update">Update</button></a>
                            </div>
                            <div>
                                <button class="delete" id="delete1" value="{{ $member['id'] }}">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <br> -->
                @endforeach
            </div>
            <div id="modalBackdrop" style="display: none;">
                <div id="myModal">
                    <div id="modal-content">
                        <h2>Are you sure you want to delete this member?</h2>
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
            var deleteButtons = document.querySelectorAll('.delete');
            var modalBackdrop = document.getElementById('modalBackdrop');
            var deleteMemberNoButton = document.getElementById('delete-member-no');
            var deleteMemberYesButton = document.getElementById('delete-member-yes');
            var searchInput = document.getElementById('search-input');
            var searchButton = document.getElementById('search-button');
            var membersContainer = document.getElementById('members');
            var searchTerm = '';

            searchButton.addEventListener('click', function(e) {
                e.preventDefault();
                searchTerm = searchInput.value.trim().toLowerCase();

                var memberVals = document.querySelectorAll('.member-vals');
                memberVals.forEach(function(member) {
                    var memberName = member.querySelector('.p1').textContent.toLowerCase();
                    if (memberName.includes(searchTerm)) {
                        member.style.display = 'block';
                    } else {
                        member.style.display = 'none';
                    }
                });
            });

            // Preserve the search keyword in the input field after search
            searchInput.addEventListener('input', function() {
                searchTerm = this.value.trim().toLowerCase();
            });

            // Show the filtered members on page load if a search keyword is present
            if (searchTerm !== '') {
                var memberVals = document.querySelectorAll('.member-vals');
                memberVals.forEach(function(member) {
                    var memberName = member.querySelector('.p1').textContent.toLowerCase();
                    if (memberName.includes(searchTerm)) {
                        member.style.display = 'block';
                    } else {
                        member.style.display = 'none';
                    }
                });

                // Set the search keyword back in the input field
                searchInput.value = searchTerm;
            }

            deleteButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var buttonValue = button.value;
                    deleteMemberYesButton.value = buttonValue;
                    modalBackdrop.style.display = 'block';
                    var newElement = document.createElement('span');
                    newElement.textContent = buttonValue;
                    var parentElement = button.parentElement;
                    deleteMemberNoButton.addEventListener('click', function() {
                        modalBackdrop.style.display = 'none';
                        // parentElement.appendChild(newElement);
                    });
                    deleteMemberYesButton.addEventListener('click', function() {
                        var url = "{{ route('members/delete', ['id' => ':buttonValue']) }}";
                        url = url.replace(':buttonValue', buttonValue);
                        //   url = url + buttonValue ;
                        modalBackdrop.style.display = 'none';
                        window.location.href = url;
                    });
                });
            });
        });
        </script>

@endsection
