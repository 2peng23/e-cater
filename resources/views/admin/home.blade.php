@extends('layouts.admin')
@section('content')
    <div class="tab-content tab-content-basic">
        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
            <div class="row">
                {{-- 4 buttons --}}
                <div class="col-lg-6 d-flex flex-column">
                    <div class="row mt-3">
                        <div class="col-6 mb-3">
                            <div class="card bg-success text-white">
                                <div class="card-header d-flex justify-content-evenly ">
                                    <h5>Cakes</h5>
                                    <i class="fa fa-cake"></i>
                                </div>
                                <div class="card-body ">
                                    <p class="fw-bold fs-3 text-white">0</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="card bg-success text-white">
                                <div class="card-header d-flex justify-content-evenly ">
                                    <h5>Catering Package(s)</h5>
                                    <i class="fa fa-cake"></i>
                                </div>
                                <div class="card-body ">
                                    <p class="fw-bold fs-3 text-white">0</p>
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
                                    <p class="fw-bold fs-3 text-white">0</p>
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
                                    <p class="fw-bold fs-3 text-white">0</p>
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
                                                    <td>Joel Rioflorido</td>
                                                    <td>Proper Bansud</td>
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
                                    <div class="d-sm-flex justify-content-between align-items-start">
                                        <div>
                                            <h4 class="card-title card-title-dash">Unavailable Cake</h4>
                                            <p class="card-subtitle card-subtitle-dash">0</p>
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
                                                <tr>
                                                    <td>
                                                        <img src="content/Cakes/Drip/1.png" alt="">
                                                    </td>
                                                    <td>0</td>
                                                    <td>
                                                        <div class="badge badge-opacity-warning">
                                                            Unavailable</div>
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
                {{-- Unavailable Catering Service --}}
                <div class="col-lg-6 d-flex flex-column">
                    <div class="row flex-grow">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                                <div class="card-body">
                                    <div class="d-sm-flex justify-content-between align-items-start">
                                        <div>
                                            <h4 class="card-title card-title-dash">Unavailable Catering Service</h4>
                                            <p class="card-subtitle card-subtitle-dash">0</p>
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
                                                <tr>
                                                    <td>Joel Rioflorido</td>
                                                    <td>0</td>
                                                    <td>
                                                        <div class="badge badge-opacity-warning">
                                                            Unavailable</div>
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
@endsection
