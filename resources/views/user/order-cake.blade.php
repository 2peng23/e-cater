@extends('layouts.user')
@section('content')
    <div class="row my-5 container mx-auto ">
        <div class="col-12 col-lg-6 shadow">
            @php
                $cake_data = App\Models\Cake::where('id', $cake->item_id)->first();
            @endphp
            <div class="p-5">
                <div class="row">
                    <div class="col-6">
                        <p>Category: <span class="fw-bold">{{ $cake_data->category }}</span></p>
                        <p>Quantity: <span class="fw-bold">{{ $cake->quantity }}</span></p>
                        <p>Price: <span class="fw-bold">P{{ number_format($cake_data->price, 2) }}</span>
                        <p>Total Price: <span
                                class="fw-bold">P{{ number_format($cake_data->price * $cake->quantity, 2) }}</span>
                        </p>
                    </div>
                    <div class="col-6 ">
                        <img class="rounded-circle" src="{{ $cake_data->image }}" alt=""
                            style="height: 200px; width:250px;">
                    </div>
                </div>

                <div class="text-center mt-5">
                    <h5>We Accept Payment Through GCash</h5>

                </div>
                <div class="row align-items-center  mt-5">
                    <div class="col-6">
                        <h6>Payment Information</h6>
                        @php
                            $billing = App\Models\BillingInformation::all();
                        @endphp
                        @foreach ($billing as $bill)
                            <p data-id="{{ $bill->id }}" style="cursor: pointer;" class="billing-info-btn">
                                {{ $bill->name }}- {{ $bill->number }}
                            </p>
                        @endforeach
                    </div>
                    <div class="col-6">
                        @php
                            $first = $billing->first();
                        @endphp
                        <img src="{{ $first->image }}" alt="" id="billing-image"
                            style="height: 200px; width:250px;">
                        <p class="text-center fw-bold">Scan Me</p>
                    </div>
                </div>
                <p style="font-style: italic" class="fw-bold text-center mt-2">Don't forget to take screenshot for proof of
                    payment. <span class="text-danger">*</span></p>
            </div>

        </div>
        <div class="col-12 col-lg-6">
            <form action="{{ route('avail-cake') }}" method="POST" id="avail-cake-form" enctype="multipart/form-data"
                class="p-5">
                @csrf
                <h5 class="text-center my-3">Customer Information</h5>
                <input type="hidden" name="item_id" value="{{ $cake_data->id }}">
                <input type="hidden" name="quantity" value="{{ $cake->quantity }}" id="">
                <div class="mb-2">
                    <label class="form-label fw-bold" for="name">Full Name <span class="text-danger">*</span></label>
                    <input class="form-control" placeholder="Customer's Full Name" type="text" name="name" required
                        id="name">
                </div>
                <div class="mb-2">
                    <label class="form-label fw-bold" for="address">Address <span class="text-danger">*</span></label>
                    <input class="form-control" placeholder="Event Address" type="text" name="address" id="address"
                        required>
                </div>
                <div class="mb-2">
                    <label class="form-label fw-bold" for="date">Event Date <span class="text-danger">*</span></label>
                    <input class="form-control" placeholder="Event Date" type="date" name="date" id="date"
                        required min="{{ now()->format('Y-m-d') }}">

                </div>
                <div class="mb-2">
                    <label class="form-label fw-bold" for="downpayment">Downpayment <span
                            class="text-danger">*</span></label>
                    <input class="form-control" placeholder="Downpayment Amount" type="number" name="downpayment"
                        id="downpayment" required>
                </div>
                <div class="mb-2">
                    <label class="form-label fw-bold" for="image">Proof of Payment <span
                            class="text-danger">*</span></label>
                    <input class="form-control" type="file" name="image" id="image" required accept="image/*">
                </div>
                <div class="mb-2">
                    <label class="form-label fw-bold" for="customize">Cake Customization <span
                            class="text-danger">*</span></label>
                    <textarea name="customize" class="form-control" required placeholder="Provide Cake Customzation..." id="customize"
                        cols="30" rows="4"></textarea>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <button class="btn btn-primary">Order Cake</button>
                </div>
            </form>
        </div>
    </div>
@endsection
