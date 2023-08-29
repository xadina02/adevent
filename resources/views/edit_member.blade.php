@extends('layouts.member')

@section('content')

    <section id="section1">
        <div id="add-member-sect">
            <h2 id="add-member-head">{{ strtoupper($data['name']) }}</h2>
            
            <div id="add-member-box">
                <form action="{{ route('members/update', ['id' => $data['id']]) }}" method="POST">
                    @csrf
                    <div id="add-member-input-block">
                        <br><br>
                        <div class="add-member-field">
                            <label for="" class="add-member-label">Name: </label>
                            <input type="text" class="add-member-input" placeholder="{{ $data['name'] }}" name="name">
                        </div>
                        <br><br><br>
                        <div class="add-member-field">
                            <label for="" class="add-member-label">Email: </label>
                            <input type="text" class="add-member-input" placeholder="{{ $data['email'] }}" name="email">
                        </div>
                        <br><br><br>
                        <div class="add-member-field">
                            <label for="" class="add-member-label">Phone: </label>
                            <input type="text" class="add-member-input" placeholder="{{ $data['phone'] }}" name="phone">
                        </div>
                        <br><br><br>
                    <button id="search-button" type="submit">Update</button>
                </form>
            </div>
        </div>
    </section>

@endsection