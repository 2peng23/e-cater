@extends('layouts.user')
@section('content')
    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container" id="cart-section">
            <h1 class="text-center wow fadeInDown" data-wow-delay="0.5s" style="font-family: 'Josefin Sans', sans-serif;">Rent
                a Package Now!
            </h1>
            <div class="row g-4 mt-5">
                @foreach ($carts as $cart)
                    @php
                        $caters = App\Models\Package::where('id', $cart->item_id)->get();
                    @endphp
                    @foreach ($caters as $cater)
                        <div class="col-6 col-md-4 col-lg-2">
                            <div class="card" style="width: 200px">
                                <img src="{{ $cater->image }}" class="card-img-top" alt="Item 1">
                                <p class="text-center fw-bolder">{{ $cater->name }}</p>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between p-2 ">
                                        <div class="rounded-circle border align-items-center ">
                                            <p style="" class="mb-3 fw-bold px-3 pt-3">P<span
                                                    class="text-warning">{{ number_format($cater->price) }}</span>
                                            </p>
                                        </div>
                                        <button class="btn btn-sm cater-info-btn" value="{{ $cater->id }}"><i
                                                class="fa fa-info-circle text-primary fs-4"></i></button>
                                    </div>
                                    <button value="{{ $cater->id }}" class="btn btn-primary remove-cater-cart">
                                        Remove Package
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
                @if ($carts->isEmpty())
                    No items in rental.
                @else
                    <div class="mt-5">
                        <div class="d-flex justify-content-end">
                            <div>

                                <p>Total Price: <span class="fw-bold" id="total-price">P60000</span></p>
                                <button class="btn btn-primary">Place Order <i class="fa fa-shopping-cart"></i></button>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <x-cater-info />
    <!-- Service End -->
@endsection
