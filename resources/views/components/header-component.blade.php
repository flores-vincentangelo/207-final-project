<div class="bg-white shadowing header-container flex flex-row justify-between">
    <a href="/home">
        <div class="flex flex-col items-center">
            <div>
                <svg fill="#0e2c08" width="80px" height="80px" viewBox="0 0 14 14" role="img" focusable="false"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="m 1,1 c 12.792857,0 9.819643,8.49911 9.833036,9.81161 L 13,13 12.303571,13 10.417857,11.09286 C 9.3732143,11.20536 7.0857143,12.01696 4.675,10.10179 2.2589286,8.18661 2.3928571,5.89375 1,1 Z M 3.1348214,2.23214 C 1.8035714,1.60268 2.9955357,2.47857 2.9955357,2.47857 4.20625,3.31429 4.7633929,4.45268 5.4116071,5.69018 c 0.84375,1.6125 2.1160715,3.74196 3.8625,4.49196 1.7410719,0.75 0.9160719,0.33482 0.1607143,-0.22768 C 8.6794643,9.38661 7.6080357,7.62411 6.9973214,6.46696 6.1482143,4.85982 5.3633929,3.29018 3.1348214,2.23214 Z" />
                </svg>
            </div>
            <p class="text-xl text-dark-green font-bold">Eco Products</p>
        </div>
    </a>

    <div class="flex flex-row items-center">
        <div class="cart-icon-container">
            <button @click="cartOpen = !cartOpen">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M6.29977 5H21L19 12H7.37671M20 16H8L6 3H3M9 20C9 20.5523 8.55228 21 8 21C7.44772 21 7 20.5523 7 20C7 19.4477 7.44772 19 8 19C8.55228 19 9 19.4477 9 20ZM20 20C20 20.5523 19.5523 21 19 21C18.4477 21 18 20.5523 18 20C18 19.4477 18.4477 19 19 19C19.5523 19 20 19.4477 20 20Z"
                        stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
        </div>
        <div class="flex flex-col items-center justify-center">

            <div class="text-xl mb-3">
                Welcome {{ Auth::user()->name }}
            </div>
            <div>
                <form action="/logout" method="POST">
                    @csrf
                    <button class="form-button">Log out</button>
                </form>
            </div>
        </div>
    </div>

</div>