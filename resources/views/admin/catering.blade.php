@extends('layouts.admin')
@section('content')
    {{-- buttons --}}
    {{-- <div class="my-2 d-flex justify-content-end">
        <div class="btn-wrapper">
            <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> Share</a>
            <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i>
                Print</a>
            <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a>
        </div>
    </div> --}}
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
                                            <h4 class="card-title card-title-dash">Catering Package</h4>
                                            {{-- <div>
                                                <select class="form-select" name="cake_page" id="cake_page">
                                                    <option value="5" {{ $page == 5 ? 'selected' : '' }}>5</option>
                                                    <option value="10" {{ $page == 10 ? 'selected' : '' }}>10</option>
                                                    <option value="15" {{ $page == 15 ? 'selected' : '' }}>15</option>
                                                    <option value="20" {{ $page == 20 ? 'selected' : '' }}>20</option>
                                                </select>
                                            </div> --}}
                                        </div>
                                        <button id="add-package-btn" class="rounded-circle bg-primary text-white"><i
                                                class="fa fa-plus "></i></button>
                                    </div>
                                    <div class="row mt-4">
                                        @foreach ($packages as $package)
                                            <div class="col-12 col-md-6 col-lg-4 cater-data">
                                                <div class="card">
                                                    <img src="{{ $package->image }}" class="card-img-top"
                                                        alt="Catering Image" style="height: 250px">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ $package->name }}</h5>
                                                        <p class="card-text fw-bold">Inclusions: <button
                                                                class="rounded bg-success cater-edit-inclusion"
                                                                value="{{ $package->id }}"
                                                                style="border: 1px solid transparent;">
                                                                <i class="mdi mdi-pencil text-white"></i>
                                                            </button></p>
                                                        <ul class="row list-unstyled ">
                                                            @foreach ($package->inclusion as $index => $inc)
                                                                <li class="col-4 mb-1">
                                                                    <p class="card-text">{{ $inc }}
                                                                        <button class="rounded cater-delete-inclusion"
                                                                            value="{{ $package->id }}"
                                                                            data-index="{{ $index }}"
                                                                            style="border: 1px solid transparent;display:none">
                                                                            <i class="fa fa-times-circle text-danger"></i>
                                                                        </button>
                                                                    </p>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div>
                                                                <h5>
                                                                    Quantity:
                                                                    <button
                                                                        class="btn add-cater-stock">{{ $package->quantity }}</button>
                                                                </h5>
                                                                <h5 class="card-text fw-bolder">Price:
                                                                    P{{ number_format($package->price, 2) }}
                                                                </h5>
                                                            </div>
                                                            <div class=" gap-1 cater-button" style="display: none;">
                                                                <button class="rounded bg-success cater-edit"
                                                                    value="{{ $package->id }}"
                                                                    style="border: 1px solid transparent;">
                                                                    <i class="mdi mdi-pencil text-white"></i>
                                                                </button>

                                                                <button class="rounded bg-danger cater-delete"
                                                                    value="{{ $package->id }}"
                                                                    style="border: 1px solid transparent;">
                                                                    <i class="mdi mdi-delete text-white"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <x-add-package />
    <x-update-package />
@endsection
