@extends('layouts.app')
@section('content')
    <div>
        This is the home page
    </div>

    @auth
        this is for logged in user
        <form action="/logout" method="POST">
            @csrf
            <button>Log out</button>
        </form>

        <x-product-list :products="$products"/>
    @endauth

    @guest
        this is for guest
    @endguest
@endsection