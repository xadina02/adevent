@extends('layouts.member')

@section('content')

    <section id="section3">
        <div id="carrier">
            <div id="parent">
                <form action="">
                        <h2 id="form-head2">TEAM MEMBERS LIST</h2>
                        <div id="search">
                            <div id="search-bar">
                                <img src="" alt="" id="search-image">
                                <input type="text" placeholder="Name" id="search-input">
                            </div>
                            <a href=""><button id="search-button">Search</button></a>
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
                                <a href="{{ route('members/edit') }}"><button id="update">Update</button></a>
                            </div>
                            <div>
                                <a href=""><button id="delete">Delete</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                @endforeach
            </div>
        </div>
    </section>

@endsection