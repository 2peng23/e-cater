@extends('layouts.admin')
@section('content')
    <div class="tab-content tab-content-basic">
        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
            <div class="row">
                {{-- 4 buttons --}}
                <div class="col-lg-6 d-flex flex-column">
                    <div class="row mt-3">
                        <div class="col-6 mb-3">
                            <a href="/cake" class="text-decoration-none">
                                <div class="card bg-success text-white">
                                    <div class="card-header d-flex justify-content-evenly ">
                                        <h5>Cakes</h5>
                                    </div>
                                    <div class="card-body ">
                                        <div class="d-flex justify-content-between ">
                                            <p class="fw-bold fs-3 text-white">
                                                @php
                                                    $cake = App\Models\Cake::count();
                                                @endphp
                                                {{ $cake }}
                                            </p>

                                            <img src="content/logo/cake.svg" alt=""
                                                style="max-width: 100px; height: 100px;">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="card bg-success text-white">
                                <div class="card-header d-flex justify-content-evenly ">
                                    <h5>Catering Package(s)</h5>
                                    <i class="fa fa-cake"></i>
                                </div>
                                <div class="card-body ">
                                    <div class="d-flex justify-content-between ">
                                        <p class="fw-bold fs-3 text-white">
                                            @php
                                                $package = App\Models\Package::count();
                                            @endphp
                                            {{ $package }}
                                        </p>

                                        <img src="content/logo/decor.svg" alt=""
                                            style="max-width: 100px; height: 100px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="card bg-success text-white">
                                <div class="card-header d-flex justify-content-evenly ">
                                    <h5>Order(Cakes)</h5>
                                    <i class="fa fa-cake"></i>
                                </div>
                                <div class="card-body ">
                                    <div class="d-flex justify-content-between ">
                                        <p class="fw-bold fs-3 text-white">
                                            @php
                                                $cake_order = App\Models\CakeOrder::count();
                                            @endphp
                                            {{ $cake_order }}
                                        </p>

                                        <img src="content/logo/arrow.svg" alt=""
                                            style="max-width: 100px; height: 100px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="card bg-success text-white">
                                <div class="card-header d-flex justify-content-evenly ">
                                    <h5>Rentals(Catering)</h5>
                                    <i class="fa fa-cake"></i>
                                </div>
                                <div class="card-body ">
                                    <div class="d-flex justify-content-between ">
                                        <p class="fw-bold fs-3 text-white">
                                            @php
                                                $package_rental = App\Models\Rental::count();
                                            @endphp
                                            {{ $package_rental }}
                                        </p>

                                        <img src="content/logo/arrow2.svg" alt=""
                                            style="max-width: 100px; height: 100px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Ongoing --}}
                <div class="col-lg-6 d-flex flex-column">
                    <div class="row flex-grow">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                                <div class="card-body">
                                    <div class="d-sm-flex justify-content-between align-items-start">
                                        <div>
                                            <h4 class="card-title card-title-dash">Ongoing Catering Service</h4>
                                            <p class="card-subtitle card-subtitle-dash">0</p>
                                        </div>
                                    </div>
                                    <div class="table-responsive  mt-1" style="max-height: 300px">
                                        <table class="table select-table">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Address</th>
                                                    <th>Package</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Juan Dela Cruz</td>
                                                    <td>Banus Gloria</td>
                                                    <td>Package 1</td>
                                                    <td>
                                                        <div class="badge badge-opacity-success">
                                                            Ongoing</div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="tab-content tab-content-basic">
        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
            <div class="row">
                {{-- Unavailable Cake --}}
                <div class="col-lg-6 d-flex flex-column">
                    <div class="row flex-grow">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                                <div class="card-body">
                                    @php
                                        $cakes = App\Models\Cake::where('stock', '<=', 0)->get();
                                    @endphp
                                    <div class="d-sm-flex justify-content-between align-items-start">
                                        <div>
                                            <h4 class="card-title card-title-dash">Unavailable Cake</h4>
                                            <p class="card-subtitle card-subtitle-dash">{{ $cakes->count() }}</p>
                                        </div>
                                    </div>
                                    <div class="table-responsive  mt-1" style="max-height: 300px">

                                        <table class="table select-table">
                                            <thead>
                                                <tr>
                                                    <th>Cake</th>
                                                    <th>Quantity</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($cakes as $cake)
                                                    <tr>
                                                        <td>
                                                            <img src="{{ $cake->image }}" alt="">
                                                        </td>
                                                        <td>{{ $cake->stock }}</td>
                                                        <td>
                                                            <div class="badge badge-opacity-warning">
                                                                Unavailable</div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Unavailable Catering Service --}}
                <div class="col-lg-6 d-flex flex-column">
                    <div class="row flex-grow">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                                <div class="card-body">
                                    @php
                                        $package = App\Models\Package::where('quantity', 0)->get();
                                        $package_count = $package->count();
                                    @endphp
                                    <div class="d-sm-flex justify-content-between align-items-start">
                                        <div>
                                            <h4 class="card-title card-title-dash">Unavailable Catering Service</h4>
                                            <p class="card-subtitle card-subtitle-dash">{{ $package_count }} </p>
                                        </div>
                                    </div>
                                    <div class="table-responsive  mt-1" style="max-height: 300px">
                                        <table class="table select-table">
                                            <thead>
                                                <tr>
                                                    <th>Package</th>
                                                    <th>Quantity</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($package as $item)
                                                    <tr>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->quantity }}</td>
                                                        <td>
                                                            <div class="badge badge-opacity-warning">
                                                                Unavailable</div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
