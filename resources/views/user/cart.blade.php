@extends('layouts.user')
@section('content')
    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container" id="cart-section">
            <h1 class="text-center wow fadeInDown" data-wow-delay="0.5s" style="font-family: 'Josefin Sans', sans-serif;">Place
                an Order Now!
            </h1>
            <div class="row g-4 mt-5">
                @foreach ($carts as $cart)
                    @php
                        $cake = App\Models\Cake::where('id', $cart->item_id)->get();
                    @endphp
                    @foreach ($cake as $cake)
                        <div class="col-6 col-md-4 col-lg-2">
                            <div class="card" style="width: 200px">
                                <img src="{{ $cake->image }}" class="card-img-top" alt="Item 1">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between py-3">
                                        <p>Quantity:</p>
                                        <input type="number" class="p-2" style="width:60px"
                                            value="{{ $cart->quantity }}" min="1" max="{{ $cake->stock }}"
                                            id="cart-quantity" data-id="{{ $cart->id }}">
                                    </div>
                                    <p class="card-text" id="cart-price">P{{ $cart->quantity * $cake->price }}</p>
                                    <div class="d-flex gap-2">
                                        <button value="{{ $cart->id }}" class="btn btn-primary order-cake">
                                            Order
                                        </button>
                                        <button value="{{ $cart->id }}" class="btn btn-primary remove-cart">
                                            Remove
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
                @if ($carts->isEmpty())
                    No items in your cart.
                    {{-- @else
                    <div class="mt-5">
                        <div class="d-flex justify-content-end">
                            <div>

                                <p>Total Price: <span class="fw-bold" id="total-price">P{{ $totalPrice }}</span></p>
                                <button class="btn btn-primary">Place Order <i class="fa fa-shopping-cart"></i></button>
                            </div>
                        </div>
                    </div> --}}
                @endif
            </div>
        </div>
    </div>
    <!-- Service End -->
    <x-order-cake />
@endsection
