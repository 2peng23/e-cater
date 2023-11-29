<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container" id="cater-section">
        <div class=" d-flex justify-content-center mb-3">
            <h1 class="display-5" style="font-family: 'Josefin Sans', sans-serif;">Catering Service</h1>
        </div>
        <div class="row g-4">
            @php
                $cater = App\Models\Package::all();
            @endphp
            @foreach ($cater as $item)
                <div class="col-6 col-md-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ $item->image }}" alt="">
                        </div>
                        <div class="border border-5 border-light border-top-0">
                            <div class="d-flex justify-content-between p-2 ">
                                <div class="rounded-circle border align-items-center ">
                                    <p style="" class="mb-3 fw-bold px-3 pt-3">P<span
                                            class="text-warning">{{ number_format($item->price) }}</span>
                                    </p>
                                </div>
                                <button class="btn btn-sm cater-info-btn" value="{{ $item->id }}"><i
                                        class="fa fa-info-circle text-primary fs-4"></i></button>
                            </div>
                            @if (Auth::check())
                                <form action="">
                                    @csrf
                                    <div class="d-flex justify-content-end gap-2 mb-2 me-2">
                                        <input type="number" class="form-control" min="0" name="quantity"
                                            value="0" style="max-width: 50px">
                                        <button class="btn btn-sm btn-primary " style="max-width: 95px">Rent</button>
                                    </div>
                                </form>
                            @else
                                <div class="d-flex justify-content-end me-2 mb-2 rounded">
                                    <button class="btn btn-primary">
                                        <a href="/login" class="text-white">Rent Package</a>
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
<x-cater-info />
<!-- Service End -->
