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
                                            <h4 class="card-title card-title-dash">Gcash Account Information</h4>
                                        </div>
                                        <button id="add-billing-btn" class="rounded-circle bg-primary text-white"><i
                                                class="fa fa-plus "></i>
                                        </button>
                                    </div>
                                    <div class="row mt-4">
                                        @foreach ($billing as $item)
                                            <div class="col-12 col-md-6 col-lg-4 cater-data">
                                                <div class="card">
                                                    <img src="{{ $item->image }}" class="card-img-top" alt="Catering Image"
                                                        style="height: 250px">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ $item->name }}</h5>
                                                        <p class="card-text">{{ $item->number }}</p>
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
    <x-add-billing />
@endsection
