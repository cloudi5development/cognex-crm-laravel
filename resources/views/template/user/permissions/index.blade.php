@extends('template.layouts.template-base')
@section('title', 'User Permissions')
@section('content')
    <section>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Permissions</h4>
                        <div class="flex-shrink-0">
                            <a href="{{ route('backend.users.index') }}"
                                class="btn btn-sm btn-outline-secondary waves-effect waves-light"><i
                                    class="bx bx-arrow-back label-icon align-middle fs-16"></i> Back</a>
                        </div>
                    </div><!-- end card header -->
                    <form action="{{ route('backend.permissions.update', $user->id) }}" method="POST" id="form-validate"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row gy-4">
                                <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="width: 10px;">
                                                <div class="form-check">
                                                    <input class="form-check-input fs-15" type="checkbox" id="checkAll">
                                                </div>
                                            </th>
                                            <th>S.No</th>
                                            <th>Module</th>
                                            <th>Permission</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $modules = $permissions->unique('page')->pluck('page');
                                        @endphp

                                        @foreach ($modules as $module)
                                            <tr>
                                                <th scope="row">
                                                    <div class="form-check">
                                                        <input class="form-check-input fs-15 module-checkbox"
                                                            type="checkbox" data-module="{{ $module }}">
                                                    </div>
                                                </th>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><label>{{ ucwords(str_replace('_', ' ', $module)) }}</label></td>
                                                <td class="permission-group">
                                                    @foreach ($permissions->where('page', $module) as $permission)
                                                        <label class="d-inline-block me-3 mb-2">
                                                            <input name="permissions[]" type="checkbox"
                                                                value="{{ $permission->id }}" class="permission-checkbox"
                                                                data-module="{{ $module }}"
                                                                @if (in_array($permission->id, $user->permissions->pluck('id')->toArray())) checked @endif>
                                                            <strong>{{ $permission->name }}</strong>
                                                        </label>
                                                    @endforeach
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!--end col-->

                            </div>
                            <!--end row-->

                            <div class="row mt-4">
                                <div class="col-xxl-3 col-md-6">
                                    <button type="submit" class="btn btn-success btn-label right ms-auto"><i
                                            class="bx bx-right-arrow-alt label-icon align-middle fs-16 ms-2"></i>Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--end col-->
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        // Check all permissions when module checkbox is clicked
        document.querySelectorAll('.module-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const module = this.dataset.module;
                document.querySelectorAll(`.permission-checkbox[data-module="${module}"]`).forEach(perm => {
                    perm.checked = this.checked;
                });
            });
        });

        // Master checkbox functionality
        document.getElementById('checkAll').addEventListener('change', function() {
            const isChecked = this.checked;
            document.querySelectorAll('.module-checkbox, .permission-checkbox').forEach(checkbox => {
                checkbox.checked = isChecked;
            });
        });
    </script>
@endsection
