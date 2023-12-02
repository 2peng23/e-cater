@extends('layouts.admin')
@section('content')
    <div class="tab-content tab-content-basic">
        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
            <div class="row" id="all-data">
                {{-- Add Cake --}}
                <div class="col-lg-12 d-flex flex-column" style="min-height: 60vh;">
                    <div class="row flex-grow">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                                <div class="card-body">
                                    <div class="d-sm-flex justify-content-between align-items-start">
                                        <div class="d-flex justify-content-between align-items-center  gap-2 ">
                                            <h4 class="card-title card-title-dash">Cake Orders</h4>
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
                                                    <th>Address</th>
                                                    <th>Event Date</th>
                                                    <th>Cake Type</th>
                                                    <th>Downpayment</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($cakes as $cake)
                                                    <tr class="text-center">
                                                        <td>{{ $cake->name }}</td>
                                                        <td>{{ $cake->address }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($cake->date)->format('F j, Y') }}
                                                        </td>
                                                        <td>
                                                            @php
                                                                $cake_item = App\Models\Cake::where('id', $cake->item_id)->first();
                                                            @endphp
                                                            <button class="btn cake-message-btn"
                                                                value="{{ $cake->id }}">
                                                                {{ $cake_item->category }}
                                                            </button>
                                                        </td>
                                                        <td>
                                                            <button class="btn view-cake-down" value="{{ $cake->id }}">
                                                                {{ $cake->downpayment }}
                                                            </button>
                                                        </td>
                                                        <td>
                                                            @if ($cake->status == 'approved')
                                                                <div class="badge badge-opacity-success">
                                                                    {{ $cake->status }}</div>
                                                            @elseif ($cake->status == 'declined')
                                                                <div class="badge badge-opacity-danger">
                                                                    {{ $cake->status }}</div>
                                                            @else
                                                                <div class="badge badge-opacity-warning">
                                                                    {{ $cake->status }}</div>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($cake->status != 'pending')
                                                                <button class="btn info-cake-btn" disabled>
                                                                    <i class="mdi mdi-thumb-up-outline text-dark fs-6"></i>
                                                                </button>
                                                                <button class="btn info-cake-btn" disabled>
                                                                    <i
                                                                        class="mdi mdi-thumb-down-outline text-dark fs-6"></i>
                                                                </button>
                                                            @else
                                                                <button class="btn approve-cake-btn"
                                                                    value="{{ $cake->id }}">
                                                                    <i
                                                                        class="mdi mdi-thumb-up-outline text-success fs-6"></i>
                                                                </button>
                                                                <button class="btn  decline-cake-btn"
                                                                    value="{{ $cake->id }}">
                                                                    <i
                                                                        class="mdi mdi-thumb-down-outline text-danger fs-6"></i>
                                                                </button>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{ $cakes->links('vendor.pagination.bootstrap-5') }}
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
    <x-view-downpayment />
    <x-cake-message />
@endsection
