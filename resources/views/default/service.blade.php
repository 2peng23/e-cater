<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container" id="cake-section">
        <h1 class="text-center wow fadeInDown" data-wow-delay="0.5s" style="font-family: 'Josefin Sans', sans-serif;">Savor
            Sweet Bliss, Your Cake
            Paradise!</h1>
        <div class=" d-flex justify-content-end mb-3">
            {{-- <h1 class="display-5">Cakes</h1> --}}
            <div class="d-flex align-items-center justify-content-between gap-1 ">
                <select name="cake_category" class="form-select"
                    @if (Auth::check()) id="filter-cake-category-user" 
                @else
                id="filter-cake-category" @endif>
                    <option value="">All Cakes</option>
                    @foreach ($category as $item)
                        <option value="{{ $item->category_name }}"
                            {{ $cake_category == $item->category_name ? 'selected' : '' }}>{{ $item->category_name }}
                        </option>
                    @endforeach
                </select>
                <img src="content/logo/b-logo.png" style="width: 60px; opactity: 1" alt="">
            </div>
        </div>
        <div class="row g-4">
            @foreach ($cakes as $cake)
                <div class="col-6 col-md-3 wow fadeIn" data-wow-delay="0.5s">
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
                                <form action="{{ route('add-cart') }}" method="POST" id="add-cart-form">
                                    @csrf
                                    <div class="d-flex justify-content-end gap-2 mb-2 me-2">
                                        @if ($cake->stock > 0)
                                            <input type="hidden" name="cart_id" value="{{ Auth::user()->id }}">
                                            <input type="hidden" name="item_id" value="{{ $cake->id }}">
                                            <input type="number" class="form-control" min="1" name="quantity"
                                                value="1" style="max-width: 50px">
                                            <button class="btn btn-sm btn-primary " type="submit"
                                                style="max-width: 95px">Add
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
        @if ($allCakes->count() >= 9)
            <button class="mt-5 btn btn-primary">More Cakes </button>
        @endif
    </div>
</div>
<!-- Service End -->
