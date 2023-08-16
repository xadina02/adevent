@extends('layouts.event')

@section('content')
    <section id="section3">
        <div class="participant-house">
            <div class="participant-title">
                <h1>VIEW PARTICIPANTS</h1>

                <h1>MANAGE PARTICIPANTS</h1>
            </div>
            
            <hr>

            <div class="participant-content1">
                <div>
                    <img src="" alt="">
                    <h2></h2>
                </div>
                <hr>
                <div></div>
            </div>

            <div class="participant-content2">
                <div class="content2-first">
                    <div>
                        <img src="" alt="">
                        <h2></h2>
                    </div>
                    <hr>
                    <div></div>
                    <hr>
                    <a href=""><button>Remove</button></a>
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

                    <a href=""><button>Add</button></a>
                </div>
            </div>
        </div>
    </section>
@endsection