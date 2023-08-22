@extends('layouts.member')

@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <section id="section3">
        <div id="carrier">
            <div id="parent">
                <form action="">
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
                                <button class="delete" id="delete1" value="$member['id']">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
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
        function copyButtonValue() {
            var button2 = document.getElementById("delete-member-yes");
            var button1 = document.getElementById("delete1");
            button2.value = button1.value;
        }
    </script>
    <script>
        $(document).ready(function() {
            // Button click event
            $('.delete').on('click', function() {
            // Show the modal and backdrop
            $('#modalBackdrop').show();
            });

            // Close modal when the close button is clicked
            $('#delete-member-no').on('click', function() {
            $('#modalBackdrop').hide();
            });

            var buttonValue;
            $('#delete-member-yes').on('click', function() {
                var clickedButton = event.target;
                buttonValue = clickedButton.value;
                var url = "{{ route('members/delete', ['id' => buttonValue]) }}";
                $('#modalBackdrop').hide();
                window.location.href = url;
            });
        });
    </script>

@endsection