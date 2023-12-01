@extends('layouts.admin')
@section('content')
    <div class="tab-content tab-content-basic">
        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
            <div class="row" id="all-data">
                {{-- Add Cake --}}
                <div class="col-lg-12 d-flex flex-column">
                    <div class="row flex-grow">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                                <div class="card-body">
                                    <div class="d-sm-flex justify-content-between align-items-start">
                                        <div class="d-flex justify-content-between align-items-center  gap-2 ">
                                            <h4 class="card-title card-title-dash">Rentals</h4>
                                        </div>
                                    </div>
                                    <div class="table-responsive  mt-1" id="cake-list">
                                        {{-- @if ($cakes->isEmpty())
                                            <p class="text-danger">No cakes available.</p>
                                        @else --}}
                                        <table class="table select-table table-hover ">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Name</th>
                                                    <th>Event Address</th>
                                                    <th>Event Date</th>
                                                    <th>Package</th>
                                                    <th>Downpayment</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($rentals as $rental)
                                                    <tr class="text-center">
                                                        <td>{{ $rental->name }}</td>
                                                        <td>{{ $rental->address }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($rental->date)->format('F j, Y') }}
                                                        </td>
                                                        <td>
                                                            @php
                                                                $package = App\Models\Package::where('id', $rental->item_id)->first();
                                                            @endphp
                                                            <button class="btn cater-info-btn" value="{{ $package->id }}">
                                                                {{ $package->name }}
                                                            </button>
                                                        </td>
                                                        <td>
                                                            <button class="btn view-down-btn" value="{{ $rental->id }}">
                                                                {{ $rental->downpayment }}
                                                            </button>
                                                            <x-view-downpayment :rental="$rental->image" />
                                                        </td>
                                                        <td>
                                                            @if ($rental->status == 'approved')
                                                                <div class="badge badge-opacity-success">
                                                                    {{ $rental->status }}</div>
                                                            @elseif ($rental->status == 'declined')
                                                                <div class="badge badge-opacity-danger">
                                                                    {{ $rental->status }}</div>
                                                            @else
                                                                <div class="badge badge-opacity-warning">
                                                                    {{ $rental->status }}</div>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($rental->status != 'pending')
                                                                <button class="btn info-cake-btn" disabled>
                                                                    <i class="mdi mdi-thumb-up-outline text-dark fs-6"></i>
                                                                </button>
                                                                <button class="btn info-cake-btn" disabled>
                                                                    <i
                                                                        class="mdi mdi-thumb-down-outline text-dark fs-6"></i>
                                                                </button>
                                                            @else
                                                                <button class="btn approve-rent-btn"
                                                                    value="{{ $rental->id }}">
                                                                    <i
                                                                        class="mdi mdi-thumb-up-outline text-success fs-6"></i>
                                                                </button>
                                                                <button class="btn  decline-rent-btn"
                                                                    value="{{ $rental->id }}">
                                                                    <i
                                                                        class="mdi mdi-thumb-down-outline text-danger fs-6"></i>
                                                                </button>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{ $rentals->links('vendor.pagination.bootstrap-5') }}
                                        {{-- @endif --}}
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <x-cater-info />
@endsection
