@extends('template.layouts.template-base')
@section('title', 'Users')
@section('content')
    <section>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center gy-3">
                            <div class="col-sm">
                                <h5 class="card-title mb-0">Users</h5>
                            </div>
                            <div class="col-sm-auto">
                                <div class="d-flex gap-1 flex-wrap">
                                    @can('create', \App\Models\User::class)
                                        <a href="{{ route('backend.users.create') }}"
                                            class="btn btn-sm btn-outline-secondary waves-effect waves-light"><i
                                                class="bx bx-plus align-middle me-1"></i> Create</a>
                                    @endcan
                                    <button type="button" class="btn btn-sm btn-primary waves-effect waves-light"
                                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasFilter"
                                        aria-controls="offcanvasFilter"><i class="bx bx-filter-alt align-middle me-1"></i>
                                        Filters</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="ajax-datatables" class="display table table-bordered dt-responsive" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>E-mail</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasFilter"
                            aria-labelledby="offcanvasFilterLabel">
                            <div class="offcanvas-header">
                                <h5 id="offcanvasFilterLabel">Filter</h5>
                                <button type="button" id="offcanvas-filter-close" class="btn-close text-reset"
                                    data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body p-0">
                                <form id="daily-payout-report-form" action="#"
                                    class="d-flex flex-column justify-content-end h-100">
                                    <div class="offcanvas-body">
                                        <div class="mb-3">
                                            <label for="name" class="form-label mb-2">Name</label>
                                            <div class="row g-2 align-items-center">
                                                <div class="col-lg">
                                                    <input type="text" name="name" class="form-control" id="name"
                                                        placeholder="Enter name" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end offcanvas-body-->
                                    <div class="offcanvas-footer border-top p-3 text-center hstack gap-2">
                                        <button class="btn btn-light w-100" type="reset">Clear Filter</button>
                                        <button type="button" id="applyFilter"
                                            class="btn btn-success w-100">Filters</button>
                                    </div>
                                    <!--end offcanvas-footer-->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(function() {
            var table = $('#ajax-datatables').DataTable({
                processing: true,
                ordering: false,
                searching: true,
                serverSide: true,
                responsive: true,
                pageLength: 10,
                language: {
                    paginate: {
                        next: '<i class="bx bx-skip-next" aria-hidden="true"></i>',
                        previous: '<i class="bx bx-skip-previous" aria-hidden="true"></i>'
                    }
                },
                ajax: {
                    url: "{{ route('backend.users.index') }}",
                    data: function(d) {
                        d.name = $('input[name=name]').val(),
                            d.search = $('input[type="search"]').val()
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'mobile',
                        name: 'mobile'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action'

                    }
                ]
            });

            $('input[type="search"]').keyup(function(e) {
                table.draw();
                e.preventDefault();
            });

            $("#applyFilter").click(function(e) {
                table.draw();
                e.preventDefault();
            });
        });
    </script>
@endsection
