<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>E-Cater</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/vendors/feather/feather.css">
    <link rel="stylesheet" href="admin/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="admin/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="admin/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="admin/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="admin/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="admin/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="admin/images/favicon.png" />
    {{-- fa --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="with-welcome-text">
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('admin.nav')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            {{-- theme changer --}}
            <div class="theme-setting-wrapper">
                <div id="settings-trigger"><i class="ti-settings"></i></div>
                <div id="theme-settings" class="settings-panel">
                    <i class="settings-close ti-close"></i>
                    <p class="settings-heading">SIDEBAR SKINS</p>
                    <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                        <div class="img-ss rounded-circle bg-light border me-3"></div>Light
                    </div>
                    <div class="sidebar-bg-options" id="sidebar-dark-theme">
                        <div class="img-ss rounded-circle bg-dark border me-3"></div>Dark
                    </div>
                    <p class="settings-heading mt-2">HEADER SKINS</p>
                    <div class="color-tiles mx-0 px-4">
                        <div class="tiles success"></div>
                        <div class="tiles warning"></div>
                        <div class="tiles danger"></div>
                        <div class="tiles info"></div>
                        <div class="tiles dark"></div>
                        <div class="tiles default"></div>
                    </div>
                </div>
            </div>
            {{-- end theme changer --}}
            {{-- <div id="right-sidebar" class="settings-panel">
                <i class="settings-close ti-close"></i>
                <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="todo-tab" data-bs-toggle="tab" href="#todo-section"
                            role="tab" aria-controls="todo-section" aria-expanded="true">Te DO LIST</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="chats-tab" data-bs-toggle="tab" href="#chats-section" role="tab"
                            aria-controls="chats-section">CHATS</a>
                    </li>
                </ul>
                <div class="tab-content" id="setting-content">
                    <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel"
                        aria-labelledby="todo-section">
                        <div class="add-items d-flex px-3 mb-0">
                            <form class="form w-100">
                                <div class="form-group d-flex">
                                    <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                                    <button type="submit" class="add btn btn-primary todo-list-add-btn"
                                        id="add-task">Add</button>
                                </div>
                            </form>
                        </div>
                        <div class="list-wrapper px-3">
                            <ul class="d-flex flex-column-reverse todo-list">
                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox">
                                            Team review meeting at 3.00 PM
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox">
                                            Prepare for presentation
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox">
                                            Resolve all the low priority tickets due today
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li class="completed">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox" checked>
                                            Schedule meeting for next week
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                                <li class="completed">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="checkbox" type="checkbox" checked>
                                            Project review
                                        </label>
                                    </div>
                                    <i class="remove ti-close"></i>
                                </li>
                            </ul>
                        </div>
                        <h4 class="px-3 text-muted mt-5 fw-light mb-0">Events</h4>
                        <div class="events pt-4 px-3">
                            <div class="wrapper d-flex mb-2">
                                <i class="ti-control-record text-primary me-2"></i>
                                <span>Feb 11 2018</span>
                            </div>
                            <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
                            <p class="text-gray mb-0">The total number of sessions</p>
                        </div>
                        <div class="events pt-4 px-3">
                            <div class="wrapper d-flex mb-2">
                                <i class="ti-control-record text-primary me-2"></i>
                                <span>Feb 7 2018</span>
                            </div>
                            <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
                            <p class="text-gray mb-0 ">Call Sarah Graves</p>
                        </div>
                    </div>
                    <!-- To do section tab ends -->
                    <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
                        <div class="d-flex align-items-center justify-content-between border-bottom">
                            <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
                            <small
                                class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 fw-normal">See
                                All</small>
                        </div>
                        <ul class="chat-list">
                            <li class="list active">
                                <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span
                                        class="online"></span></div>
                                <div class="info">
                                    <p>Thomas Douglas</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">19 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span
                                        class="offline"></span></div>
                                <div class="info">
                                    <div class="wrapper d-flex">
                                        <p>Catherine</p>
                                    </div>
                                    <p>Away</p>
                                </div>
                                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                                <small class="text-muted my-auto">23 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span
                                        class="online"></span></div>
                                <div class="info">
                                    <p>Daniel Russell</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">14 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span
                                        class="offline"></span></div>
                                <div class="info">
                                    <p>James Richardson</p>
                                    <p>Away</p>
                                </div>
                                <small class="text-muted my-auto">2 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span
                                        class="online"></span></div>
                                <div class="info">
                                    <p>Madeline Kennedy</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">5 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span
                                        class="online"></span></div>
                                <div class="info">
                                    <p>Sarah Graves</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">47 min</small>
                            </li>
                        </ul>
                    </div>
                    <!-- chat tab ends -->
                </div>
            </div> --}}
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            @include('admin.sidebar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="home-tab">
                                <div class="d-sm-flex align-items-center justify-content-start border-bottom">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link ps-0" href="/">Admin >
                                                <span class="text-primary">Dashboard</span></a>
                                        </li>
                                    </ul>

                                </div>
                                {{-- buttons --}}
                                {{-- <div class="my-2 d-flex justify-content-end">
                                    <div class="btn-wrapper">
                                        <a href="#" class="btn btn-otline-dark align-items-center"><i
                                                class="icon-share"></i> Share</a>
                                        <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i>
                                            Print</a>
                                        <a href="#" class="btn btn-primary text-white me-0"><i
                                                class="icon-download"></i> Export</a>
                                    </div>
                                </div> --}}
                                @yield('content')
                                {{-- table --}}
                                {{-- <div class="tab-content tab-content-basic">
                                    <div class="tab-pane fade show active" id="overview" role="tabpanel"
                                        aria-labelledby="overview">
                                        <div class="row">
                                            <div class="col-lg-12 d-flex flex-column">
                                                <div class="row flex-grow">
                                                    <div class="col-12 grid-margin stretch-card">
                                                        <div class="card card-rounded">
                                                            <div class="card-body">
                                                                <div
                                                                    class="d-sm-flex justify-content-between align-items-start">
                                                                    <div>
                                                                        <h4 class="card-title card-title-dash">Pending
                                                                            Requests</h4>
                                                                        <p class="card-subtitle card-subtitle-dash">You
                                                                            have 50+ new requests</p>
                                                                    </div>
                                                                    <div>
                                                                        <button
                                                                            class="btn btn-primary btn-lg text-white mb-0 me-0"
                                                                            type="button"><i
                                                                                class="mdi mdi-account-plus"></i>Add
                                                                            new member</button>
                                                                    </div>
                                                                </div>
                                                                <div class="table-responsive  mt-1">
                                                                    <table class="table select-table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>
                                                                                    <div
                                                                                        class="form-check form-check-flat mt-0">
                                                                                        <label
                                                                                            class="form-check-label">
                                                                                            <input type="checkbox"
                                                                                                class="form-check-input"
                                                                                                aria-checked="false"><i
                                                                                                class="input-helper"></i></label>
                                                                                    </div>
                                                                                </th>
                                                                                <th>Customer</th>
                                                                                <th>Company</th>
                                                                                <th>Progress</th>
                                                                                <th>Status</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    <div
                                                                                        class="form-check form-check-flat mt-0">
                                                                                        <label
                                                                                            class="form-check-label">
                                                                                            <input type="checkbox"
                                                                                                class="form-check-input"
                                                                                                aria-checked="false"><i
                                                                                                class="input-helper"></i></label>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="d-flex ">
                                                                                        <img src="../../images/faces/face1.jpg"
                                                                                            alt="">
                                                                                        <div>
                                                                                            <h6>Brandon Washington</h6>
                                                                                            <p>Head admin</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <h6>Company name 1</h6>
                                                                                    <p>company type</p>
                                                                                </td>
                                                                                <td>
                                                                                    <div>
                                                                                        <div
                                                                                            class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                                                                            <p class="text-success">79%
                                                                                            </p>
                                                                                            <p>85/162</p>
                                                                                        </div>
                                                                                        <div
                                                                                            class="progress progress-md">
                                                                                            <div class="progress-bar bg-success"
                                                                                                role="progressbar"
                                                                                                style="width: 85%"
                                                                                                aria-valuenow="25"
                                                                                                aria-valuemin="0"
                                                                                                aria-valuemax="100">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div
                                                                                        class="badge badge-opacity-warning">
                                                                                        In progress</div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <div
                                                                                        class="form-check form-check-flat mt-0">
                                                                                        <label
                                                                                            class="form-check-label">
                                                                                            <input type="checkbox"
                                                                                                class="form-check-input"
                                                                                                aria-checked="false"><i
                                                                                                class="input-helper"></i></label>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="d-flex">
                                                                                        <img src="../../images/faces/face2.jpg"
                                                                                            alt="">
                                                                                        <div>
                                                                                            <h6>Laura Brooks</h6>
                                                                                            <p>Head admin</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <h6>Company name 1</h6>
                                                                                    <p>company type</p>
                                                                                </td>
                                                                                <td>
                                                                                    <div>
                                                                                        <div
                                                                                            class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                                                                            <p class="text-success">65%
                                                                                            </p>
                                                                                            <p>85/162</p>
                                                                                        </div>
                                                                                        <div
                                                                                            class="progress progress-md">
                                                                                            <div class="progress-bar bg-success"
                                                                                                role="progressbar"
                                                                                                style="width: 65%"
                                                                                                aria-valuenow="65"
                                                                                                aria-valuemin="0"
                                                                                                aria-valuemax="100">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div
                                                                                        class="badge badge-opacity-warning">
                                                                                        In progress</div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <div
                                                                                        class="form-check form-check-flat mt-0">
                                                                                        <label
                                                                                            class="form-check-label">
                                                                                            <input type="checkbox"
                                                                                                class="form-check-input"
                                                                                                aria-checked="false"><i
                                                                                                class="input-helper"></i></label>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="d-flex">
                                                                                        <img src="../../images/faces/face3.jpg"
                                                                                            alt="">
                                                                                        <div>
                                                                                            <h6>Wayne Murphy</h6>
                                                                                            <p>Head admin</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <h6>Company name 1</h6>
                                                                                    <p>company type</p>
                                                                                </td>
                                                                                <td>
                                                                                    <div>
                                                                                        <div
                                                                                            class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                                                                            <p class="text-success">65%
                                                                                            </p>
                                                                                            <p>85/162</p>
                                                                                        </div>
                                                                                        <div
                                                                                            class="progress progress-md">
                                                                                            <div class="progress-bar bg-warning"
                                                                                                role="progressbar"
                                                                                                style="width: 38%"
                                                                                                aria-valuenow="38"
                                                                                                aria-valuemin="0"
                                                                                                aria-valuemax="100">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div
                                                                                        class="badge badge-opacity-warning">
                                                                                        In progress</div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <div
                                                                                        class="form-check form-check-flat mt-0">
                                                                                        <label
                                                                                            class="form-check-label">
                                                                                            <input type="checkbox"
                                                                                                class="form-check-input"
                                                                                                aria-checked="false"><i
                                                                                                class="input-helper"></i></label>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="d-flex">
                                                                                        <img src="../../images/faces/face4.jpg"
                                                                                            alt="">
                                                                                        <div>
                                                                                            <h6>Matthew Bailey</h6>
                                                                                            <p>Head admin</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <h6>Company name 1</h6>
                                                                                    <p>company type</p>
                                                                                </td>
                                                                                <td>
                                                                                    <div>
                                                                                        <div
                                                                                            class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                                                                            <p class="text-success">65%
                                                                                            </p>
                                                                                            <p>85/162</p>
                                                                                        </div>
                                                                                        <div
                                                                                            class="progress progress-md">
                                                                                            <div class="progress-bar bg-danger"
                                                                                                role="progressbar"
                                                                                                style="width: 15%"
                                                                                                aria-valuenow="15"
                                                                                                aria-valuemin="0"
                                                                                                aria-valuemax="100">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div
                                                                                        class="badge badge-opacity-danger">
                                                                                        Pending</div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <div
                                                                                        class="form-check form-check-flat mt-0">
                                                                                        <label
                                                                                            class="form-check-label">
                                                                                            <input type="checkbox"
                                                                                                class="form-check-input"
                                                                                                aria-checked="false"><i
                                                                                                class="input-helper"></i></label>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div class="d-flex">
                                                                                        <img src="../../images/faces/face5.jpg"
                                                                                            alt="">
                                                                                        <div>
                                                                                            <h6>Katherine Butler</h6>
                                                                                            <p>Head admin</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <h6>Company name 1</h6>
                                                                                    <p>company type</p>
                                                                                </td>
                                                                                <td>
                                                                                    <div>
                                                                                        <div
                                                                                            class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                                                                            <p class="text-success">65%
                                                                                            </p>
                                                                                            <p>85/162</p>
                                                                                        </div>
                                                                                        <div
                                                                                            class="progress progress-md">
                                                                                            <div class="progress-bar bg-success"
                                                                                                role="progressbar"
                                                                                                style="width: 65%"
                                                                                                aria-valuenow="65"
                                                                                                aria-valuemin="0"
                                                                                                aria-valuemax="100">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                                <td>
                                                                                    <div
                                                                                        class="badge badge-opacity-success">
                                                                                        Completed</div>
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
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-flex justify-content-center align-items-center">

                        <span class="fw-bolder fs-6 text-center">Copyright © PUP
                            E-Cater. All
                            rights reserved.</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="admin/vendors/js/vendor.bundle.base.js"></script>
    <script src="admin/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="admin/vendors/chart.js/chart.min.js"></script>
    <script src="admin/vendors/progressbar.js/progressbar.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="admin/js/off-canvas.js"></script>
    <script src="admin/js/hoverable-collapse.js"></script>
    <script src="admin/js/template.js"></script>
    <script src="admin/js/settings.js"></script>
    <script src="admin/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="admin/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="admin/js/dashboard.js"></script>
    <!-- <script src="../../js/Chart.roundedBarCharts.js"></script> -->
    <!-- End custom js for this page-->
</body>

</html>
