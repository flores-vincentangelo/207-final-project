@extends('layouts.app')
@section('content')
    <x-header-component :displaycart="$displayCart" />

    <div class="checkout h-screen w-screen flex flex-col items-center justify-center">
        @php
            $totalCost = 0
        @endphp
        <div class="home-button-container">
            <a href="/">
                < Back to Home</a>
        </div>
        <div class="table-container shadowing curve-edge bg-white flex flex-col items-center p-3 mb-4">
            <h1 class="text-dark-green">Products</h1>
            <table class="">
                <tr class="header-row">
                    <th></th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Unit price</th>
                    <th>Total price</th>
                </tr>
                @foreach ($cartproducts as $product)
                    @php
                        $totalCost += $product->price * $product->pivot->quantity
                    @endphp
                    <tr>
                        <td>
                            <img class="image-styling" src="{{ $product->image }}" alt="">
                        </td>
                        <td>{{ $product->name}}</td>
                        <td>{{ $product->pivot->quantity}}</td>
                        <td>{{ number_format($product->price, 2)}}</td>
                        <td>{{ number_format($product->price * $product->pivot->quantity, 2) }}</td>
                    </tr>
                @endforeach
            </table>
            <div class="total-row flex flex-row items-center justify-between text-dark-green">
                <h2>Total</h2>
                <h2>{{ number_format($totalCost, 2) }}</h2>
            </div>
        </div>

        <div class="deliver-container shadowing curve-edge bg-white flex flex-col items-center p-3">
            <form action="" class="w-full flex flex-col items-baseline">
                <h2 class="text-dark-green">Customer Info</h2>
                @csrf
                <div class="customer-info-container w-full">
                    <div class="flex flex-row items-center">
                        <label for="name" class="block text-sm font-medium text-dark-green ">Name: </label>
                        <input type="text" name="name" id="name" class="form-input" value={{ $user->name }}>
                    </div>
                    <div class="flex flex-row items-center">
                        <label for="email" class="block text-sm font-medium text-dark-green ">Email: </label>
                        <input type="text" name="email" id="email" class="form-input" value="{{ $user->email }}">
                    </div>
                </div>

                <h2 class="text-dark-green">Address</h2>

                <script>

                    document.addEventListener('alpine:init', () => {
                        Alpine.data('address', () => ({
                            regionCode: 'none',
                            provinceCode: 'none',
                            cityCode: 'none',
                            barangayCode: 'none',
                            sortingFunction(a, b) {
                                let x = a.toLowerCase();
                                let y = b.toLowerCase();
                                if (x < y) { return -1; }
                                if (x > y) { return 1; }
                                return 0;
                            },
                            filteredProvinces() {
                                return provinces.filter(p => p.region_code === this.regionCode).sort((a, b) => this.sortingFunction(a.province_name, b.province_name));
                            },
                            filteredCities() {
                                return cities.filter(c => c.province_code === this.provinceCode).sort((a, b) => this.sortingFunction(a.city_name, b.city_name));
                            },
                            filteredBarangays() {
                                return barangays.filter(c => c.city_code === this.cityCode).sort((a, b) => this.sortingFunction(a.brgy_name, b.brgy_name));
                            },
                        }))
                    })
                    const provinces = {{ Js::from($provinceData) }}
                            const cities = {{ Js::from($cityData) }}
                            const barangays = {{ Js::from($barangayData) }}

                        function resetProvince() { document.getElementById("province-none").selected = true };
                    function resetCity() { document.getElementById("city-none").selected = true };
                    function resetBarangay() { document.getElementById("barangay-none").selected = true };

                </script>
                <div class="flex flex-row items-center flex-wrap justify-between w-full" x-data="address">

                    <div class="flex flex-row items-center">
                        <label for="region" class="block text-sm font-medium text-dark-green ">Region: </label>
                        <select name="region" id="region" x-model="regionCode"
                            x-on:change="resetProvince();resetCity();resetBarangay();">
                            <option value="none" selected disabled hidden>Region</option>
                            @foreach ($regionData as $region)
                                <option value="{{ $region->region_code }}">{{ $region->region_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex flex-row items-center">
                        <label for="province" class="block text-sm font-medium text-dark-green ">Province: </label>
                        <select name="province" id="province" x-model="provinceCode"
                            x-on:change="resetCity();resetBarangay();">
                            <option id="province-none" value="none" selected disabled hidden>Province</option>
                            <template x-for="p in filteredProvinces()" :key="p . province_code">
                                <option :value="p . province_code" x-text="p.province_name"></option>
                            </template>
                        </select>
                    </div>



                    <div class="flex flex-row items-center">
                        <label for="city" class="block text-sm font-medium text-dark-green ">City: </label>
                        <select name="city" id="city" x-model="cityCode" x-on:change="resetBarangay();">
                            <option id="city-none" value="none" selected disabled hidden>City</option>
                            <template x-for="c in filteredCities()" :key="c . city_code">
                                <option :value="c . city_code" x-text="c.city_name"></option>
                            </template>
                        </select>
                    </div>


                    <div class="flex flex-row items-center">
                        <label for="barangay" class="block text-sm font-medium text-dark-green ">Barangay: </label>
                        <select name="barangay" id="barangay" x-model="barangayCode">
                            <option id="barangay-none" value="none" selected disabled hidden>barangay</option>
                            <template x-for="b in filteredBarangays()" :key="b . brgy_code">
                                <option :value="b . brgy_code" x-text="b.brgy_name"></option>
                            </template>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection