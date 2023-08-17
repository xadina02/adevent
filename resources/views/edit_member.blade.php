@extends('layouts.member')

@section('content')

    <section id="section1">
        <div id="add-member-sect">
            <h2 id="add-member-head">EDIT - [MEMBER NAME]</h2>
            
            <div id="add-member-box">
                <form action="">
                    <div id="add-member-input-block">
                        <br><br>
                        <div class="add-member-field">
                            <label for="" class="add-member-label">Name: </label>
                            <input type="text" class="add-member-input" placeholder="{{ $data['name'] }}">
                        </div>
                        <br><br><br>
                        <div class="add-member-field">
                            <label for="" class="add-member-label">Email: </label>
                            <input type="text" class="add-member-input" placeholder="{{ $data['email'] }}">
                        </div>
                        <br><br><br>
                        <div class="add-member-field">
                            <label for="" class="add-member-label">Phone: </label>
                            <input type="text" class="add-member-input">
                        </div>
                        <br><br><br>
                    <button id="search-button">Update</button>
                </form>
            </div>
        </div>
    </section>

@endsection