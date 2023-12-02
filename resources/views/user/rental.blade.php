@extends('layouts.user')
@section('content')
    <div class="row my-5 container mx-auto ">
        <div class="col-12 col-lg-6 shadow">
            @php
                $cater_package = App\Models\Package::where('id', $package->item_id)->first();
            @endphp
            <div class="p-5">
                <h5 class="text-uppercase mb-5 text-center">{{ $cater_package->name }}</h5>
                <h6>Inclusion:</h6>
                <ul class="row list-unstyled ">
                    @foreach ($cater_package->inclusion as $inc)
                        <li class="col-6 mb-1">{{ $inc }} <i class="fa fa-check-circle text-success"></i></li>
                    @endforeach
                </ul>
                <h6>Price: P {{ number_format($cater_package->price, 2) }}</h6>
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
            <form action="{{ route('rental-order') }}" method="POST" id="rental-order-form" enctype="multipart/form-data"
                class="p-5">
                @csrf
                <h5 class="text-center my-3">Customer Information</h5>
                <input type="hidden" name="item_id" value="{{ $cater_package->id }}">
                <div class="mb-2">
                    <label class="form-label fw-bold" for="name">Full Name <span class="text-danger">*</span></label>
                    <input class="form-control" placeholder="Customer's Full Name" type="text" name="name" required
                        id="name">
                </div>
                <div class="mb-2">
                    <label class="form-label fw-bold" for="phone">Phone <span class="text-danger">*</span></label>
                    <input class="form-control" placeholder="Contact Number" type="text" name="phone" id="phone"
                        required>
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
                    <input class="form-control" placeholder="Downpayment Amount" required type="number" name="downpayment"
                        id="downpayment">
                </div>
                <div class="mb-2">
                    <label class="form-label fw-bold" for="image">Proof of Payment <span
                            class="text-danger">*</span></label>
                    <input class="form-control" type="file" name="image" required id="image" accept="image/*">
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <button class="btn btn-primary">Rent Package</button>
                </div>
            </form>
        </div>
    </div>
@endsection
