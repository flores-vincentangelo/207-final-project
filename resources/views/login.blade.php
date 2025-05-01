@extends('layouts.app')
@section('content')

    <div class="bg-lightgreen flex flex-col items-center justify-center px-6 py-8 mx-auto h-screen lg:py-0">
        <div class="p-auto flex flex-col items-center justify-center mb-2">
            <svg fill="#0e2c08" width="200px" height="200px" viewBox="0 0 14 14" role="img" focusable="false"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="m 1,1 c 12.792857,0 9.819643,8.49911 9.833036,9.81161 L 13,13 12.303571,13 10.417857,11.09286 C 9.3732143,11.20536 7.0857143,12.01696 4.675,10.10179 2.2589286,8.18661 2.3928571,5.89375 1,1 Z M 3.1348214,2.23214 C 1.8035714,1.60268 2.9955357,2.47857 2.9955357,2.47857 4.20625,3.31429 4.7633929,4.45268 5.4116071,5.69018 c 0.84375,1.6125 2.1160715,3.74196 3.8625,4.49196 1.7410719,0.75 0.9160719,0.33482 0.1607143,-0.22768 C 8.6794643,9.38661 7.6080357,7.62411 6.9973214,6.46696 6.1482143,4.85982 5.3633929,3.29018 3.1348214,2.23214 Z" />
            </svg>
            <p class="text-2xl text-dark-green font-bold">Eco Products</p>
        </div>
        <div class="form-container">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-dark-green md:text-2xl">
                    Log in
                </h1>
                <form class="space-y-4 md:space-y-6" action="/login" method="POST">
                    @csrf
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-dark-green ">Your email</label>
                        <input type="text" name="email" id="email" class="form-input" placeholder="name@company.com"
                            required="">
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-dark-green ">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="form-input"
                            required="">
                    </div>
                    <button class="form-button w-full">Log in</button>
                </form>
            </div>
        </div>
    </div>
@endsection