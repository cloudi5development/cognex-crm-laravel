@extends('template.layouts.template-base')
@section('title', 'Dashboard')

@section('content')
    <section>
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="tab-container mb-3">
                            <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#employee-details"
                                        type="button" role="tab" aria-controls="employee-details" aria-selected="true">
                                        <i class="fa-solid fa-user"></i>Employee
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#client-details"
                                        type="button" role="tab" aria-controls="client-details" aria-selected="false">
                                        <i class="fas fa-chart-pie fa-fw me-2"></i>Customers
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#company-details"
                                        type="button" role="tab" aria-controls="company-details" aria-selected="false">
                                        <i class="fas fa-chart-pie fa-fw me-2"></i>Company
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="tab-content">
                        <div class="tab-pane active" id="employee-details" role="tabpanel">
                            <div class="row">
                                <div class="col-xl-3 col-md-6">
                                    <!-- card -->
                                    <div class="card card-animate">
                                        <div class="card-body card-bg-1">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p
                                                        class="text-uppercase fw-semibold dashboard-heading text-truncate mb-0">
                                                        Total
                                                        Employees
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-end justify-content-between mt-4">
                                                <div>
                                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span>50</span></h4>
                                                </div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-success-subtle rounded fs-3">
                                                        <i class="bx bx-group text-success"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->

                                <div class="col-xl-3 col-md-6">
                                    <!-- card -->
                                    <div class="card card-animate">
                                        <div class="card-body card-bg-2">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p
                                                        class="text-uppercase fw-semibold dashboard-heading text-truncate mb-0">
                                                        Present Today
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-end justify-content-between mt-4">
                                                <div>
                                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span>40</span></h4>
                                                </div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-info-subtle rounded fs-3">
                                                        <i class="bx bx-calendar-check text-info"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->

                                <div class="col-xl-3 col-md-6">
                                    <!-- card -->
                                    <div class="card card-animate">
                                        <div class="card-body card-bg-3">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p
                                                        class="text-uppercase fw-semibold dashboard-heading text-truncate mb-0">
                                                        Absent Today
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-end justify-content-between mt-4">
                                                <div>
                                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span>10</span></h4>
                                                </div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-warning-subtle rounded fs-3">
                                                        <i class="bx bx-calendar-x text-danger"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->

                                <div class="col-xl-3 col-md-6">
                                    <!-- card -->
                                    <div class="card card-animate">
                                        <div class="card-body card-bg-4">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p
                                                        class="text-uppercase fw-semibold dashboard-heading text-truncate mb-0">
                                                        Late
                                                        Log In
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-end justify-content-between mt-4">
                                                <div>
                                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span>05</span> </h4>
                                                </div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span
                                                        class="avatar-title bg-primary-subtle rounded fs-3 late-login-icon-bg">
                                                        <i class="bx bx-time text-primary"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->
                                <div class="col-xl-3 col-md-6">
                                    <!-- card -->
                                    <div class="card card-animate">
                                        <div class="card-body card-bg-4">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p
                                                        class="text-uppercase fw-semibold dashboard-heading text-truncate mb-0">
                                                        Late
                                                        Log In
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-end justify-content-between mt-4">
                                                <div>
                                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span>05</span> </h4>
                                                </div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span
                                                        class="avatar-title bg-primary-subtle rounded fs-3 late-login-icon-bg">
                                                        <i class="bx bx-time text-primary"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->
                            </div> <!-- end row-->
                        </div>
                        <div class="tab-pane" id="client-details" role="tabpanel">
                            <div class="row">
                                <div class="col-xl-3 col-md-6">
                                    <!-- card -->
                                    <div class="card card-animate">
                                        <div class="card-body card-bg-1">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p
                                                        class="text-uppercase fw-semibold dashboard-heading text-truncate mb-0">
                                                        Total Customers
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-end justify-content-between mt-4">
                                                <div>
                                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span>250</span>+</h4>
                                                </div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-success-subtle rounded fs-3">
                                                        <i class="bx bx-group text-success"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->

                                <div class="col-xl-3 col-md-6">
                                    <!-- card -->
                                    <div class="card card-animate">
                                        <div class="card-body card-bg-2">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p
                                                        class="text-uppercase fw-semibold dashboard-heading text-truncate mb-0">
                                                        Today's Customer
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-end justify-content-between mt-4">
                                                <div>
                                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span>10</span>+</h4>
                                                </div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-info-subtle rounded fs-3">
                                                        <i class="bx bx-user-circle text-info"></i>

                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->

                                <div class="col-xl-3 col-md-6">
                                    <!-- card -->
                                    <div class="card card-animate">
                                        <div class="card-body card-bg-3">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p
                                                        class="text-uppercase fw-semibold dashboard-heading text-truncate mb-0">
                                                        Today's Direct Visit
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-end justify-content-between mt-4">
                                                <div>
                                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span>5</span>+ </h4>
                                                </div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-warning-subtle rounded fs-3">
                                                        <i class="bx bx-map-pin text-warning"></i>

                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->

                                <div class="col-xl-3 col-md-6">
                                    <!-- card -->
                                    <div class="card card-animate">
                                        <div class="card-body card-bg-4">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p
                                                        class="text-uppercase fw-semibold dashboard-heading text-truncate mb-0">
                                                        Today's Appointment
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-end justify-content-between mt-4">
                                                <div>
                                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span>20</span>+ </h4>
                                                </div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-primary-subtle rounded fs-3">
                                                        <i class="bx bx-time text-primary"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->
                            </div> <!-- end row-->
                        </div>
                        <div class="tab-pane" id="company-details" role="tabpanel">
                            <div class="row">
                                <div class="col-xl-3 col-md-6">
                                    <!-- card -->
                                    <div class="card card-animate">
                                        <div class="card-body card-bg-1">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p
                                                        class="text-uppercase fw-semibold dashboard-heading text-truncate mb-0">
                                                        Total Blogs
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-end justify-content-between mt-4">
                                                <div>
                                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span>300</span>+</h4>
                                                </div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-success-subtle rounded fs-3">
                                                        <i class="bx bx-file text-success"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->

                                <div class="col-xl-3 col-md-6">
                                    <!-- card -->
                                    <div class="card card-animate">
                                        <div class="card-body card-bg-2">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p
                                                        class="text-uppercase fw-semibold dashboard-heading text-truncate mb-0">
                                                        Careers
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-end justify-content-between mt-4">
                                                <div>
                                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span>5</span>+</h4>
                                                </div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-info-subtle rounded fs-3">
                                                        <i class="bx bx-search-alt text-info"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->

                                <div class="col-xl-3 col-md-6">
                                    <!-- card -->
                                    <div class="card card-animate">
                                        <div class="card-body card-bg-3">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p
                                                        class="text-uppercase fw-semibold dashboard-heading text-truncate mb-0">
                                                        Contact Form Enquiries
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-end justify-content-between mt-4">
                                                <div>
                                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span>5</span>+ </h4>
                                                </div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-warning-subtle rounded fs-3">
                                                        <i class="bx bx-clipboard text-warning"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->

                                <div class="col-xl-3 col-md-6">
                                    <!-- card -->
                                    <div class="card card-animate">
                                        <div class="card-body card-bg-4">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <p
                                                        class="text-uppercase fw-semibold dashboard-heading text-truncate mb-0">
                                                        Form Enquiry
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-end justify-content-between mt-4">
                                                <div>
                                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span>50</span>+ </h4>
                                                </div>
                                                <div class="avatar-sm flex-shrink-0">
                                                    <span class="avatar-title bg-primary-subtle rounded fs-3">
                                                        <i class="bx bx-clipboard text-primary"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div><!-- end card -->
                                </div><!-- end col -->
                            </div> <!-- end row-->
                        </div>

                    </div>
                </div><!-- end card -->
            </div><!-- end col -->
        </div><!-- end row -->

        <div class="row">
            <div class="col-xl-7">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Total Customers</h4>
                        <div class="flex-shrink-0">
                            <div class="dropdown card-header-dropdown">
                                <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <span class="text-muted">02 Nov 2021 to 31 Dec 2021<i
                                            class="bx bx-chevron-down ms-1"></i></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Today</a>
                                    <a class="dropdown-item" href="#">Last Week</a>
                                    <a class="dropdown-item" href="#">Last Month</a>
                                    <a class="dropdown-item" href="#">Current Year</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="table-responsive table-card">
                            <table class="table table-borderless table-hover table-nowrap align-middle mb-0">
                                <thead class="table-light">
                                    <tr class="text-muted">
                                        <th scope="col">Name</th>
                                        <th scope="col" style="width: 20%;">Last Contacted</th>
                                        <th scope="col">Sales Representative</th>
                                        <th scope="col" style="width: 16%;">Status</th>
                                        <th scope="col" style="width: 12%;">Deal Value</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>Absternet LLC</td>
                                        <td>Sep 20, 2021</td>
                                        <td><img src="{{ asset('assets/template/images/users/avatar-1.jpg') }}"
                                                alt="" class="avatar-xs rounded-circle me-2 material-shadow">
                                            <a href="#javascript: void(0);" class="text-body fw-medium">Donald Risher</a>
                                        </td>
                                        <td><span class="badge bg-success-subtle text-success p-2">Deal Won</span></td>
                                        <td>
                                            <div class="text-nowrap">$100.1K</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Raitech Soft</td>
                                        <td>Sep 23, 2021</td>
                                        <td><img src="{{ asset('assets/template/images/users/avatar-2.jpg') }}"
                                                alt="" class="avatar-xs rounded-circle me-2 material-shadow">
                                            <a href="#javascript: void(0);" class="text-body fw-medium">Sofia Cunha</a>
                                        </td>
                                        <td><span class="badge bg-warning-subtle text-warning p-2">Intro Call</span></td>
                                        <td>
                                            <div class="text-nowrap">$150K</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>William PVT</td>
                                        <td>Sep 27, 2021</td>
                                        <td><img src="{{ asset('assets/template/images/users/avatar-1.jpg') }}"
                                                alt="" class="avatar-xs rounded-circle me-2 material-shadow">
                                            <a href="#javascript: void(0);" class="text-body fw-medium">Luis Rocha</a>
                                        </td>
                                        <td><span class="badge bg-danger-subtle text-danger p-2">Stuck</span></td>
                                        <td>
                                            <div class="text-nowrap">$78.18K</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Loiusee LLP</td>
                                        <td>Sep 30, 2021</td>
                                        <td><img src="{{ asset('assets/template/images/users/avatar-2.jpg') }}"
                                                alt="" class="avatar-xs rounded-circle me-2 material-shadow">
                                            <a href="#javascript: void(0);" class="text-body fw-medium">Vitoria
                                                Rodrigues</a>
                                        </td>
                                        <td><span class="badge bg-success-subtle text-success p-2">Deal Won</span></td>
                                        <td>
                                            <div class="text-nowrap">$180K</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Apple Inc.</td>
                                        <td>Sep 30, 2021</td>
                                        <td><img src="{{ asset('assets/template/images/users/avatar-1.jpg') }}"
                                                alt="" class="avatar-xs rounded-circle me-2 material-shadow">
                                            <a href="#javascript: void(0);" class="text-body fw-medium">Vitoria
                                                Rodrigues</a>
                                        </td>
                                        <td><span class="badge bg-info-subtle text-info p-2">New Lead</span></td>
                                        <td>
                                            <div class="text-nowrap">$78.9K</div>
                                        </td>
                                    </tr>
                                </tbody><!-- end tbody -->
                            </table><!-- end table -->
                        </div><!-- end table responsive -->
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->

            <div class="col-xl-5">
                <div class="card card-height-100">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">My Tasks</h4>
                        <div class="flex-shrink-0">
                            <div class="dropdown card-header-dropdown">
                                <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <span class="text-muted"><i
                                            class="bx bx-cog align-bottom me-1 fs-15"></i>Settings</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- end card header -->

                    <div class="card-body p-0">

                        <div class="align-items-center p-3 justify-content-between d-flex">
                            <div class="flex-shrink-0">
                                <div class="text-muted"><span class="fw-semibold">4</span> of <span
                                        class="fw-semibold">10</span> remaining</div>
                            </div>
                            <button type="button" class="btn btn-sm btn-success"><i
                                    class="bx bx-plus align-middle me-1"></i> Add Task</button>
                        </div><!-- end card header -->

                        <div data-simplebar style="max-height: 219px;">
                            <ul class="list-group list-group-flush border-dashed px-3">
                                <li class="list-group-item ps-0">
                                    <div class="d-flex align-items-start">
                                        <div class="form-check ps-0 flex-sharink-0">
                                            <input type="checkbox" class="form-check-input ms-0" id="task_one">
                                        </div>
                                        <div class="flex-grow-1">
                                            <label class="form-check-label mb-0 ps-2" for="task_one">Review and make sure
                                                nothing slips through cracks</label>
                                        </div>
                                        <div class="flex-shrink-0 ms-2">
                                            <p class="text-muted fs-12 mb-0">15 Sep, 2021</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item ps-0">
                                    <div class="d-flex align-items-start">
                                        <div class="form-check ps-0 flex-sharink-0">
                                            <input type="checkbox" class="form-check-input ms-0" id="task_two">
                                        </div>
                                        <div class="flex-grow-1">
                                            <label class="form-check-label mb-0 ps-2" for="task_two">Send meeting invites
                                                for sales upcampaign</label>
                                        </div>
                                        <div class="flex-shrink-0 ms-2">
                                            <p class="text-muted fs-12 mb-0">20 Sep, 2021</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item ps-0">
                                    <div class="d-flex align-items-start">
                                        <div class="form-check flex-sharink-0 ps-0">
                                            <input type="checkbox" class="form-check-input ms-0" id="task_three">
                                        </div>
                                        <div class="flex-grow-1">
                                            <label class="form-check-label mb-0 ps-2" for="task_three">Weekly closed sales
                                                won checking with sales team</label>
                                        </div>
                                        <div class="flex-shrink-0 ms-2">
                                            <p class="text-muted fs-12 mb-0">24 Sep, 2021</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item ps-0">
                                    <div class="d-flex align-items-start">
                                        <div class="form-check ps-0 flex-sharink-0">
                                            <input type="checkbox" class="form-check-input ms-0" id="task_four">
                                        </div>
                                        <div class="flex-grow-1">
                                            <label class="form-check-label mb-0 ps-2" for="task_four">Add notes that can
                                                be viewed from the individual view</label>
                                        </div>
                                        <div class="flex-shrink-0 ms-2">
                                            <p class="text-muted fs-12 mb-0">27 Sep, 2021</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item ps-0">
                                    <div class="d-flex align-items-start">
                                        <div class="form-check ps-0 flex-sharink-0">
                                            <input type="checkbox" class="form-check-input ms-0" id="task_five">
                                        </div>
                                        <div class="flex-grow-1">
                                            <label class="form-check-label mb-0 ps-2" for="task_five">Move stuff to
                                                another page</label>
                                        </div>
                                        <div class="flex-shrink-0 ms-2">
                                            <p class="text-muted fs-12 mb-0">27 Sep, 2021</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item ps-0">
                                    <div class="d-flex align-items-start">
                                        <div class="form-check ps-0 flex-sharink-0">
                                            <input type="checkbox" class="form-check-input ms-0" id="task_six">
                                        </div>
                                        <div class="flex-grow-1">
                                            <label class="form-check-label mb-0 ps-2" for="task_six">Styling wireframe
                                                design and documentation for velzon admin</label>
                                        </div>
                                        <div class="flex-shrink-0 ms-2">
                                            <p class="text-muted fs-12 mb-0">27 Sep, 2021</p>
                                        </div>
                                    </div>
                                </li>
                            </ul><!-- end ul -->
                        </div>
                        <div class="p-3 pt-2">
                            <a href="javascript:void(0);" class="text-muted text-decoration-underline">Show more...</a>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div><!-- end row -->
    </section>
@endsection
