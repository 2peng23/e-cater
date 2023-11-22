@extends('layouts.user')
@section('content')
    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container" id="cart-section">
            <h1 class="text-center wow fadeInDown" data-wow-delay="0.5s" style="font-family: 'Josefin Sans', sans-serif;">Place
                an Order Now!
            </h1>
            <div class="row g-4">
                @foreach ($carts as $cart)
                    {{-- <div class="col-6 col-md-3 wow fadeIn" data-wow-delay="0.5s">
                        <div class="service-item">
                            <div class="overflow-hidden">
                                @php
                                    $cake = App\Models\Cake::where('id', $cart->item_id);
                                @endphp
                                <img class="img-fluid" src="{{ $cake->image }}" alt="">
                            </div>
                            <div class="border border-5 border-light border-top-0">
                                <div class="d-flex justify-content-start p-2 ">
                                    <div class="rounded-circle border align-items-center ">
                                        <p style="" class="mb-3 fw-bold px-3 pt-3">P<span
                                                class="text-warning">{{ $cake->price }}</span>
                                        </p>
                                    </div>
                                </div>
                                <form action="{{ route('add-cart') }}" method="POST" id="add-cart-form">
                                    @csrf
                                    <div class="d-flex justify-content-end gap-2 mb-2 me-2">
                                        @if ($cake->stock > 0)
                                            <input type="hidden" name="cart_id" value="{{ Auth::user()->id }}">
                                            <input type="hidden" name="item_id" value="{{ $cake->id }}">
                                            <input type="number" class="form-control" min="1" name="quantity"
                                                value="1" style="max-width: 50px">
                                            <button class="btn btn-sm btn-primary " type="submit"
                                                style="max-width: 95px">Add
                                                order</button>
                                        @else
                                            <button class="btn btn-sm btn-danger " style="max-width: 95px">Out of
                                                stock</button>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> --}}
                    <p>Cart: {{ $cart->item_id }}</p>
                    <p>Cart: {{ $cart->cart_id }}</p>
                    <p>Cart: {{ $cart->quantity }}</p>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Service End -->
@endsection
