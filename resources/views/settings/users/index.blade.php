@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>บัญชีผู้ใช้งาน
                <span class="float-end">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUserModal">เพิ่มผู้ใช้งาน</button>

                    <!-- Modal -->
                    <div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="createUserModal">เพิ่มผู้ใช้งาน</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="createUserForm" action="{{ route('setting.user.store') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="{{ old('password') }}">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="firstname">ชื่อ</label>
                                            <input type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" id="firstname" value="{{ old('firstname') }}">

                                            @error('firstname')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="lastname">นามสกุล</label>
                                            <input type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" id="lastname" value="{{ old('lastname') }}">

                                            @error('lastname')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="phone">เบอร์โทรศัพท์</label>
                                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ old('phone') }}">

                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="role" class="text-danger">*</label><label for="role">ระดับ</label>
                                            <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
                                                <option value="default" selected disabled>กรุณาเลือกระดับ</option>
                                                @foreach ($roles as $item)
                                                <option value="{{$item->id}}" {{ old('role') == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                                                @endforeach
                                            </select>

                                            @error('role')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                    <button type="button" class="btn btn-primary" id="submitBtn">เพิ่ม</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </span>
            </h5>
        </div>
        <div class="card-body">
            <table class="table table-responsive-md users-datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th class="text-center">อีเมล์</th>
                        <th class="text-center">ชื่อ-นามสกุล</th>
                        <th>เบอร์โทรศัพท์</th>
                        <th>ระดับ</th>
                        <th>จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->getFullName() }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->role->name }}</td>
                        <td>
                            {{-- <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#showUserModal-{{ $index }}">
                                <i class="fas fa-search-plus"></i>
                            </button>
                            @include('settings.users.modal.show') --}}

                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal-{{ $index }}">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                            @include('settings.users.modal.edit')

                            @if ($user->role_id != 1)
                            <button type="button" class="btn btn-danger btn-sm delete-btn">
                                <i class="fas fa-trash-alt"></i>
                            </button>

                            <form action="{{route('setting.user.destroy', ['userId' => $user->id])}}" method="post">
                                @csrf
                                @method('DELETE')
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            @if (count($errors) > 0)
                $('#createUserModal').modal('show')
            @endif

            $(".users-datatable").DataTable({
                responsive: false,
                lengthChange: false,
                autoWidth: true,
                columnDefs: [
                    { className: "text-center", targets: [0,3,4,5] },
                    { orderable: false, targets: [5] }
                ]
            })

            //CREATE
            $('#submitBtn').on('click', function () {
                showAlertWithCallBack('warning', 'คุณต้องการเพิ่มผู้ใช้งาน?')
                .then(
                    (ok) => {
                        if (!ok) return;

                        $('#createUserForm').submit();
                    }
                );
            });

            //EDIT
            $(document).on('click', '#editBtn', function () {
                showAlertWithCallBack('warning', 'กรุณาตรวจสอบข้อมูลให้ถูกต้อง')
                .then(
                    (ok) => {
                        if (!ok) return;

                        const id = $('.createUserForm input[name=user_id]').val();
                        const firstname = $('.createUserForm input[name=firstname]').val();
                        const lastname = $('.createUserForm input[name=lastname]').val();
                        const phone = $('.createUserForm input[name=phone]').val();
                        const role = $('.createUserForm #role').val();

                        $.ajax({
                            type: "PUT",
                            url: `/setting/user/${id}/update`,
                            data: {
                                _token: "{{ csrf_token() }}",
                                firstname,
                                lastname,
                                phone,
                                role
                            },
                            success: function (response) {
                                const {status} = response
                                if (status) {
                                    showAlert('success', 'สำเร็จ')
                                    .then(ok => {
                                        if (ok) {
                                            window.location.reload();
                                        }
                                    })
                                }
                            }
                        });
                    }
                );
            });

            // DELETE
            $(document).on('click', '.delete-btn', function () {
                showAlertWithCallBack('warning', 'กรุณาตรวจสอบข้อมูลให้ถูกต้อง')
                .then(
                    (ok) => {
                        if (!ok) return

                        const form = $(this).closest('td').find('form');
                        form.submit();
                    }
                );
            });
        });
    </script>
@endpush
