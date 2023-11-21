@extends('layouts.admin')
@section('content')
    {{-- buttons --}}
    <div class="my-2 d-flex justify-content-end">
        <div class="btn-wrapper">
            <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> Share</a>
            <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i>
                Print</a>
            <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a>
        </div>
    </div>
    <div class="tab-content tab-content-basic">
        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
            <div class="row">
                {{-- Add Cake --}}
                <div class="col-lg-8 d-flex flex-column">
                    <div class="row flex-grow">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                                <div class="card-body">
                                    <div class="d-sm-flex justify-content-between align-items-start">
                                        <div class="d-flex justify-content-between ">
                                            <h4 class="card-title card-title-dash">Cake</h4>
                                        </div>
                                        <button id="add-cake-btn" class="rounded-circle bg-primary text-white"><i
                                                class="fa fa-plus "></i></button>
                                    </div>
                                    <div class="table-responsive  mt-1" id="cake-list">
                                        <table class="table select-table">
                                            <thead>
                                                <tr>
                                                    <th>Cake</th>
                                                    <th>Category</th>
                                                    <th>Stock</th>
                                                    <th>Price</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($cakes as $cake)
                                                    <tr>
                                                        <td>
                                                            <img src="images/{{ $cake->image }}" alt="">
                                                        </td>
                                                        <td>{{ $cake->category }}</td>
                                                        <td>{{ $cake->stock }}</td>
                                                        <td>{{ $cake->price }}</td>
                                                        <td>
                                                            <div class="badge badge-opacity-warning">
                                                                Unavailable</div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{ $cakes->links('vendor.pagination.bootstrap-5') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Add Category --}}
                <div class="col-lg-4 d-flex flex-column">
                    <div class="row flex-grow">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                                <div class="card-body">
                                    <div class="d-sm-flex justify-content-between align-items-start">
                                        <div>
                                            <h4 class="card-title card-title-dash">Cake Category</h4>
                                        </div>
                                        <button id="add-category-btn" class="rounded-circle bg-primary text-white"><i
                                                class="fa fa-plus "></i></button>
                                    </div>
                                    <div class="table-responsive  mt-1">
                                        <table class="table select-table" id="cake-category">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($category as $item)
                                                    <tr>
                                                        <td class="d-flex justify-content-between">
                                                            <button class="btn"
                                                                value="{{ $item->category_name }}">{{ $item->category_name }}</button>
                                                            <i class="mdi mdi-cake"></i>
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
    <x-add-category />
    <x-ajax-message />
    <x-add-cake :category=$category />
@endsection
