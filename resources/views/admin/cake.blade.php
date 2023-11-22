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
                <div class="col-lg-9 d-flex flex-column">
                    <div class="row flex-grow">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                                <div class="card-body">
                                    <div class="d-sm-flex justify-content-between align-items-start">
                                        <div class="d-flex justify-content-between align-items-center  gap-2 ">
                                            <h4 class="card-title card-title-dash">Cake</h4>
                                            {{-- <div>
                                                <select class="form-select" name="cake_page" id="cake_page">
                                                    <option value="5" {{ $page == 5 ? 'selected' : '' }}>5</option>
                                                    <option value="10" {{ $page == 10 ? 'selected' : '' }}>10</option>
                                                    <option value="15" {{ $page == 15 ? 'selected' : '' }}>15</option>
                                                    <option value="20" {{ $page == 20 ? 'selected' : '' }}>20</option>
                                                </select>
                                            </div> --}}
                                        </div>
                                        <button id="add-cake-btn" class="rounded-circle bg-primary text-white"><i
                                                class="fa fa-plus "></i></button>
                                    </div>
                                    <div class="table-responsive  mt-1" id="cake-list">
                                        @if ($cakes->isEmpty())
                                            <p class="text-danger">No cakes available.</p>
                                        @else
                                            <table class="table select-table table-hover ">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>Cake</th>
                                                        <th>Category</th>
                                                        <th>Stock</th>
                                                        <th>Price</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($cakes as $cake)
                                                        <tr class="text-center">
                                                            <td>
                                                                <img src="{{ $cake->image }}" alt="">
                                                            </td>
                                                            <td>{{ $cake->category }}</td>
                                                            <td>
                                                                <button class="btn btn-stock"
                                                                    value="{{ $cake->id }}">{{ $cake->stock }}</button>
                                                            </td>
                                                            <td>{{ $cake->price }}</td>
                                                            <td>
                                                                @if ($cake->stock > 0)
                                                                    <div class="badge badge-opacity-success">
                                                                        Available</div>
                                                                @else
                                                                    <div class="badge badge-opacity-warning">
                                                                        Unavailable</div>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <button class="btn info-cake-btn"
                                                                    value="{{ $cake->id }}">
                                                                    <i class="mdi mdi-information text-info fs-6"></i>
                                                                </button>
                                                                <button class="btn edit-cake-btn"
                                                                    value="{{ $cake->id }}">
                                                                    <i
                                                                        class="mdi mdi-circle-edit-outline text-success fs-6"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            {{ $cakes->links('vendor.pagination.bootstrap-5') }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Add Category --}}
                <div class="col-lg-3 d-flex flex-column">
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
                                        <table class="table select-table table-hover " id="cake-category">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td
                                                        class="d-flex justify-content-between {{ $category_name == '' ? 'bg-secondary' : '' }}">
                                                        <p data-value="" id="category_select" style="cursor: pointer">
                                                            All Category</p>
                                                        <p>
                                                            @php
                                                                $all_cake = App\Models\Cake::count();
                                                            @endphp
                                                            {{ $all_cake }}
                                                            <i class="mdi mdi-cake"></i>
                                                        </p>
                                                    </td>
                                                </tr>
                                                @foreach ($category as $item)
                                                    @php
                                                        $cake_count = App\Models\Cake::where('category', $item->category_name)->count();
                                                    @endphp
                                                    <tr>
                                                        <td
                                                            class="d-flex justify-content-between {{ $category_name == $item->category_name ? 'bg-secondary' : '' }}">
                                                            <p data-value="{{ $item->category_name }}" id="category_select"
                                                                style="cursor: pointer">
                                                                {{ $item->category_name }}</p>
                                                            <p>
                                                                {{ $cake_count }}
                                                                <i class="mdi mdi-cake"></i>
                                                            </p>
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
        <x-add-category />
        <x-ajax-message />
        <x-add-cake :category=$category />
        <x-add-stock />
        <x-info-cake />
        <x-edit-cake :category=$category />
    </div>
@endsection
