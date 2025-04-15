@extends('layouts.app')
@section('content')
    <div class="bg-light-green flex flex-col items-center justify-center px-6 py-8 mx-auto h-screen lg:py-0">
        <div class="form-container">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-dark-green md:text-2xl">
                    Create an account
                </h1>
                <form class="space-y-4 md:space-y-6" action="/register" method="POST">
                    @csrf
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-dark-green ">Your email</label>
                        <input type="text" name="email" id="email" class="form-input" placeholder="name@company.com"
                            required="">
                    </div>
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-dark-green ">Your name</label>
                        <input type="text" name="name" id="name" class="form-input" placeholder="Any name you want"
                            required="">
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-dark-green ">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="form-input"
                            required="">
                    </div>
                    <div>
                        <label for="confirm-password" class="block mb-2 text-sm font-medium text-dark-green ">Confirm
                            password</label>
                        <input type="password" name="confirm-password" id="confirm-password" placeholder="••••••••"
                            class="form-input" required="">
                    </div>
                    <button class="form-button">Create an account</button>
                    <p class="text-sm font-light text-gray-600">
                        Already have an account? <a href="/login" class="font-medium text-primary-600 hover:underline">Login
                            here</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
@endsection