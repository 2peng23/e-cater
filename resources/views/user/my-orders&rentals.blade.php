@extends('layouts.user')
@section('content')
    <div class="my-5 container">
        <div class="row">
            @if ($cake_orders->isEmpty())
            @else
                <div class="col-12 shadow p-5">
                    <h3 class="mb-3 text-center">Cake Orders</h3>
                    <div class="table-responsive">
                        <table class="table table-hover ">
                            <thead>
                                <tr class="text-center">
                                    {{-- <th>Name</th> --}}
                                    <th>Date</th>
                                    <th>Cake</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Downpayment</th>
                                    <th>Customization</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cake_orders as $cake)
                                    <tr class="text-center">
                                        {{-- <td>{{ $cake->name }}</td> --}}
                                        <td>{{ \Carbon\Carbon::parse($cake->date)->format('F j, Y') }}</td>
                                        <td>
                                            @php
                                                $item = App\Models\Cake::where('id', $cake->item_id)->first();
                                            @endphp
                                            {{ $item->category }}
                                        </td>
                                        <td>{{ $cake->quantity }}</td>
                                        <td>P{{ number_format($item->price, 2) }}</td>
                                        <td>P{{ number_format($cake->downpayment, 2) }}</td>
                                        <td>{{ $cake->customize }}</td>
                                        <td>{{ $cake->status }}</td>
                                        @if ($cake->status == 'approved' && $cake->downpayment == 0)
                                            <td>
                                                <a class="btn btn-primary"
                                                    href="{{ route('cake-payment', $cake->id) }}">Proceed
                                                    Payment</a>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
            @if ($rentals->isEmpty())
            @else
                <div class="col-12 shadow p-5 mt-5">
                    <h3 class="mb-3 text-center">Rental Packages</h3>
                    <div class="table-responsive">
                        <table class="table table-hover ">
                            <thead>
                                <tr class="text-center">
                                    {{-- <th>Name</th> --}}
                                    <th>Date</th>
                                    <th>Package</th>
                                    <th>Price</th>
                                    <th>Downpayment</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rentals as $rental)
                                    <tr class="text-center">
                                        {{-- <td>{{ $cake->name }}</td> --}}
                                        <td>{{ \Carbon\Carbon::parse($rental->date)->format('F j, Y') }}</td>
                                        <td>
                                            @php
                                                $item = App\Models\Package::where('id', $rental->item_id)->first();
                                            @endphp
                                            <button value="{{ $item->id }}"
                                                class="btn text-primary cater-info-btn">{{ $item->name }}</button>
                                        </td>
                                        <td>P{{ number_format($item->price, 2) }}</td>
                                        <td>P{{ number_format($rental->downpayment, 2) }}</td>
                                        <td>{{ $rental->status }}</td>
                                        @if ($rental->status == 'approved' && $rental->downpayment == 0)
                                            <td>
                                                <a class="btn btn-primary"
                                                    href="{{ route('rental-payment', $rental->id) }}">Proceed
                                                    Payment</a>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <x-cater-info />
@endsection
