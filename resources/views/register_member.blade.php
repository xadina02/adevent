@extends('layouts.member')

@section('content')

    <section id="section1">
        <div id="add-member-sect">
            <h2 id="add-member-head">ADD MEMBER</h2>

            <div id="add-member-box">
                <form action="{{ route('members/create') }}" method="POST">
                    @csrf
                    <div id="add-member-input-block">
                        <div class="add-member-field">
                            <label for="" class="add-member-label">Name: </label>
                            <input type="text" class="add-member-input" name="name">
                        </div>
                        <br>
                        <div class="add-member-field">
                            <label for="" class="add-member-label">Email: </label>
                            <input type="text" class="add-member-input" name="email">
                        </div>
                        <br>
                        <div class="add-member-field">
                            <label for="" class="add-member-label">Phone: </label>
                            <input type="text" class="add-member-input" name="phone">
                        </div>
                        <br>
                        <div id="add-member-field-avatar">
                            <label for="" class="add-member-label">Avatar: </label>
                            <div id="add-member-image">
                                <input type="file" id="add-member-input-avatar" name="avatar">
                            </div>
                        </div>
                        <br>
                    </div>

                    <button id="search-button" type="submit">Register</button>
                </form>
            </div>
        </div>
    </section>

@endsection