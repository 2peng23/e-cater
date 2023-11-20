<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class=" d-flex justify-content-between mb-3">
            <h1 class="display-5">Catering Service</h1>
            <div class="d-flex align-items-center justify-content-between gap-1 ">
                <select name="cake_category" class="form-select" id="cake_category">
                    <option value="">All Services</option>
                    <option value="">Option 1</option>
                    <option value="">Option 2</option>
                    <option value="">Option 3</option>
                    <option value="">Option 4</option>
                </select>
                <img src="content/logo/b-logo.png" style="width: 60px; opactity: 1" alt="">
            </div>
        </div>
        <div class="row g-4">
            <div class="col-6 col-md-3 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="user/img/service-1.jpg" alt="">
                    </div>
                    <div class="border border-5 border-light border-top-0">
                        <div class="d-flex justify-content-between p-2 ">
                            <div class="rounded-circle border align-items-center ">
                                <p style="" class="mb-3 fw-bold px-3 pt-3">P<span class="text-warning">500</span>
                                </p>
                            </div>
                            <button class="btn btn-sm"><i class="fa fa-info-circle text-primary fs-4"></i></button>
                        </div>
                        @if (Auth::check())
                            <form action="">
                                @csrf
                                <div class="d-flex justify-content-end gap-2 mb-2 me-2">
                                    <input type="number" class="form-control" min="0" name="quantity"
                                        value="0" style="max-width: 50px">
                                    <button class="btn btn-sm btn-primary " style="max-width: 95px">Add order</button>
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
            <div class="col-6 col-md-3 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="user/img/service-2.jpg" alt="">
                    </div>
                    <div class="p-4 text-center border border-5 border-light border-top-0">
                        <p class="mb-3">Furniture Manufacturing</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="user/img/service-3.jpg" alt="">
                    </div>
                    <div class="p-4 text-center border border-5 border-light border-top-0">
                        <p class="mb-3">Furniture Remodeling</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="user/img/service-4.jpg" alt="">
                    </div>
                    <div class="p-4 text-center border border-5 border-light border-top-0">
                        <p class="mb-3">Wooden Floor</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="user/img/service-5.jpg" alt="">
                    </div>
                    <div class="p-4 text-center border border-5 border-light border-top-0">
                        <p class="mb-3">Wooden Furniture</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item">
                    <div class="overflow-hidden">
                        <img class="img-fluid" src="user/img/service-6.jpg" alt="">
                    </div>
                    <div class="p-4 text-center border border-5 border-light border-top-0">
                        <p class="mb-3">Custom Work</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->
