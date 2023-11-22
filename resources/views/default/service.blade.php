<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class=" d-flex justify-content-between mb-3">
            <h1 class="display-5">Cakes</h1>
            <div class="d-flex align-items-center justify-content-between gap-1 ">
                @php
                    $category = App\Models\Category::all();
                @endphp
                <select name="cake_category" class="form-select" id="cake_category">
                    <option value="">All Cakes</option>
                    @foreach ($category as $item)
                        <option value="{{ $item->category_name }}">{{ $item->category_name }}</option>
                    @endforeach
                </select>
                <img src="content/logo/b-logo.png" style="width: 60px; opactity: 1" alt="">
            </div>
        </div>
        <div class="row g-4">
            @php
                $cakes = App\Models\Cake::take(8)->get();
            @endphp
            @foreach ($cakes as $cake)
                <div class="col-6 col-md-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ $cake->image }}" alt="">
                        </div>
                        <div class="border border-5 border-light border-top-0">
                            <div class="d-flex justify-content-start p-2 ">
                                <div class="rounded-circle border align-items-center ">
                                    <p style="" class="mb-3 fw-bold px-3 pt-3">P<span
                                            class="text-warning">{{ $cake->price }}</span>
                                    </p>
                                </div>
                            </div>
                            @if (Auth::check())
                                <form action="">
                                    @csrf
                                    <div class="d-flex justify-content-end gap-2 mb-2 me-2">
                                        @if ($cake->stock > 0)
                                            <input type="number" class="form-control" min="0" name="quantity"
                                                value="0" style="max-width: 50px">
                                            <button class="btn btn-sm btn-primary " style="max-width: 95px">Add
                                                order</button>
                                        @else
                                            <button class="btn btn-sm btn-danger " style="max-width: 95px">Out of
                                                stock</button>
                                        @endif
                                    </div>
                                </form>
                            @else
                                <div class="d-flex justify-content-end me-2 mb-2 rounded">
                                    <button class="btn btn-primary">
                                        <a href="/login" class="text-white">Order</a>
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Service End -->
