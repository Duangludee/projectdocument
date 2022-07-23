@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>รายการเอกสาร
                <span class="float-end">
                    <a href="{{route('document.create')}}" class="btn btn-primary">เพิ่มเอกสาร</a>
                </span>
            </h5>
        </div>

        <div class="card-body">
            <table class="table doc-datatable table-responsive-md">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">เลขที่</th>
                        <th scope="col">ชื่อเรื่อง</th>
                        <th scope="col">วันที่รับ / วันที่ออก</th>
                        <th scope="col">จาก</th>
                        <th scope="col">ถึง</th>
                        <th scope="col">ผู้ดำเนินงาน</th>
                        <th scope="col">สถานะ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            $(".doc-datatable").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            })
        });
    </script>
@endpush
