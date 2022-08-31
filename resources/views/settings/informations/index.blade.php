@extends('layouts.app')

@section('content-header')
<x-content-header title="ข้อมูลพื้นฐาน" titleLink2="ข้อมูลพื้นฐาน"/>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>หน่วยงาน
                        <span class="float-end">
                            <button class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#createOrganizationModal">เพิ่มหน่วยงาน</button>

                            <!-- Modal -->
                            <div class="modal fade" id="createOrganizationModal" tabindex="-1" role="dialog"
                                aria-labelledby="createOrganizationModal" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">เพิ่มหน่วยงาน</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('setting.information.store') }}" method="post"
                                                id="createOrganizationForm">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="organization_name">ชื่อหน่วยงาน</label>
                                                    <input type="text" class="form-control" name="organization_name"
                                                        id="organization_name" placeholder="กรอกชื่อหน่วยงาน">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">ยกเลิก</button>
                                            <button type="button" class="btn btn-primary create-submit-btn">บันทึก</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </span>
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table organizations-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-center">ชื่อ</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($organizations as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#editOrganizationModal-{{ $index }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                        @include('settings.informations.modal.edit')

                                        <button type="button" class="btn btn-danger btn-sm delete-btn">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>

                                        <form action="{{ route('setting.information.destroy', ['orId' => $item->id]) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- PREFIX --}}
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5>คำนำหน้า
                        <span class="float-end">
                            <button class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#createPrefixModal">เพิ่มคำนำหน้า</button>

                            <!-- Modal -->
                            <div class="modal fade" id="createPrefixModal" tabindex="-1" role="dialog"
                                aria-labelledby="createPrefixModal" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">เพิ่มคำนำหน้า</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('setting.information.storePrefix') }}" method="post"
                                                id="createPrefixForm">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="prefix_name">คำนำหน้า</label>
                                                    <input type="text" class="form-control" name="prefix_name"
                                                        id="prefix_name" placeholder="กรอกคำนำหน้า">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">ยกเลิก</button>
                                            <button type="button" class="btn btn-primary create-prefix-btn">บันทึก</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </span>
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table organizations-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-center">ชื่อ</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prefixes as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->name_th }}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#editPrefixModal-{{ $index }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="editPrefixModal-{{ $index }}" tabindex="-1" role="dialog" aria-labelledby="editPrefixModal" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">แก้ไขคำนำหน้า</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                    </div>
                                                    <div class="modal-body text-left update-prefix-form">
                                                        <input type="hidden" name="prefix_id" class="prefix_id" value="{{$item->id}}">
                                                        <div class="form-group">
                                                            <label for="prefix_name">คำนำหน้า</label>
                                                            <input type="text" class="form-control prefix_name" name="prefix_name" id="prefix_name" placeholder="กรอกคำนำหน้า" value="{{ $item->name_th }}">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                                        <button type="button" class="btn btn-primary update-prefix-btn">บันทึก</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <button type="button" class="btn btn-danger btn-sm delete-prefix-btn">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>

                                        <form action="{{ route('setting.information.destroyPrefix', ['prefixId' => $item->id]) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            $('.organizations-table').DataTable({
                responsive: false,
                lengthChange: false,
                autoWidth: true,
                columnDefs: [{
                        className: "text-center",
                        targets: [0, 2]
                    },
                    {
                        orderable: false,
                        targets: [2]
                    },
                    {
                        width: '10%',
                        targets: [0]
                    }
                ]
            })

            //CREATE
            $('.create-submit-btn').on('click', function() {
                showAlertWithCallBack('warning', 'คุณต้องการเพิ่มหน่วยงาน?')
                    .then(
                        (ok) => {
                            if (!ok) return;

                            $('#createOrganizationForm').submit();
                        }
                    );
            });

            //EDIT
            $(document).on('click', '.update-submit-btn', function() {
                showAlertWithCallBack('warning', 'กรุณาตรวจสอบข้อมูลให้ถูกต้อง')
                    .then(
                        (ok) => {
                            if (!ok) return;

                            let modalBody = $(this).closest('div').parent()
                            const id = modalBody.find('input[name=organization_id]').val();
                            const name = modalBody.find('input[name=organization_name]').val();

                            $.ajax({
                                type: "PUT",
                                url: `/setting/information/${id}/update`,
                                data: {
                                    _token: "{{ csrf_token() }}",
                                    organization_name: name
                                },
                                success: function(response) {
                                    const {
                                        status
                                    } = response
                                    if (status) {
                                        showAlert('success', 'สำเร็จ')
                                            .then(ok => {
                                                if (ok) {
                                                    window.location.reload();
                                                }
                                            })
                                    }
                                },
                                error: function (error) {
                                    let errors = error.responseJSON.errors
                                    Object.keys(errors).forEach((key) => {
                                        modalBody.find(`.${key}`).addClass('is-invalid')
                                    });
                                }
                            });
                        }
                    );
            });

            // DELETE
            $(document).on('click', '.delete-btn', function() {
                showAlertWithCallBack('warning', 'กรุณาตรวจสอบข้อมูลให้ถูกต้อง')
                    .then(
                        (ok) => {
                            if (!ok) return

                            const form = $(this).closest('td').find('form');
                            form.submit();
                        }
                    );
            });

            //CREATE PREFIX
            $('.create-prefix-btn').on('click', function() {
                showAlertWithCallBack('warning', 'คุณต้องการเพิ่มคำนำหน้า?')
                    .then(
                        (ok) => {
                            if (!ok) return;

                            $('#createPrefixForm').submit();
                        }
                    );
            });

            //EDIT PREFIX
            $(document).on('click', '.update-prefix-btn', function() {
                showAlertWithCallBack('warning', 'กรุณาตรวจสอบข้อมูลให้ถูกต้อง')
                    .then(
                        (ok) => {
                            if (!ok) return;

                            let modalBody = $(this).closest('div').parent()
                            const id = modalBody.find('.prefix_id').val();
                            const name = modalBody.find('.prefix_name').val();

                            $.ajax({
                                type: "PUT",
                                url: `/setting/information/prefix/${id}/update`,
                                data: {
                                    _token: "{{ csrf_token() }}",
                                    prefix_name: name
                                },
                                success: function(response) {
                                    const {
                                        status
                                    } = response
                                    if (status) {
                                        showAlert('success', 'สำเร็จ')
                                            .then(ok => {
                                                if (ok) {
                                                    window.location.reload();
                                                }
                                            })
                                    }
                                },
                                error: function (error) {
                                    let errors = error.responseJSON.errors
                                    Object.keys(errors).forEach((key) => {
                                        modalBody.find(`.${key}`).addClass('is-invalid')
                                    });
                                }
                            });
                        }
                    );
            });

            // DELETE PREFIX
            $(document).on('click', '.delete-prefix-btn', function() {
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
