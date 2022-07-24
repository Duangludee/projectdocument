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
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">เลขที่</th>
                        <th scope="col" class="text-center">ชื่อเรื่อง</th>
                        <th scope="col">ผู้ดำเนินงาน</th>
                        <th scope="col" class="text-center">สถานะ</th>
                        <th scope="col" class="text-center">จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($documents as $index => $item)
                    <tr>
                        <td class="text-center">{{$index + 1}}</td>
                        <td class="text-center">{{$item->no}}</td>
                        <td>{{$item->topic}}</td>
                        <td>{{$item->users}}</td>
                        <td class="text-center">
                            @if ($item->status == 1)
                            <span class="badge text-bg-warning">{{$item->docStatus->name}}</span>
                            @elseif ($item->status == 2)
                            <span class="badge text-bg-success">{{$item->docStatus->name}}</span>
                            @else
                            <span class="badge text-bg-danger">{{$item->docStatus->name}}</span>
                            @endif
                        </td>
                        <th scope="col" class="text-center">
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#showDocModal-{{$item->id}}"><i class="fas fa-search-plus"></i></button>
                            @include('documents.modal.show')

                            <a href="{{route('document.edit', ['id' => $item->id])}}" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                        </th>
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
            $(".doc-datatable").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                columnDefs: [
                    {orderable: false, targets: [4,5]}
                ]
            })
        });
    </script>
@endpush
