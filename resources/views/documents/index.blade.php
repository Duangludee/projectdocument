@extends('layouts.app')

@section('content-header')
<x-content-header title="เอกสาร" titleLink2="เอกสาร"/>
@endsection

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
            <div class="d-flex">
                <i class="fas fa-check-circle p-1" style='color:#28a745'></i>
                <p class="m-0">= ลงนามแล้ว</p>

                <i class="fas fa-times-circle p-1 ms-3" style='color:#dc3545'></i>
                <p class="m-0">= ยังไม่ลงนาม</p>
            </div>

            <table class="table doc-datatable table-responsive-md">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">ลำดับ</th>
                        <th scope="col" class="text-center">เลขที่</th>
                        <th scope="col" class="text-center">ชื่อเรื่อง</th>
                        <th scope="col">ผู้ดำเนินการ</th>
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
                        <td>
                            @foreach ($item->handlers as $index => $handler)
                            <div class="d-flex align-items-center">
                                @if (isset($handler->image_name))
                                <a href="#" data-fancybox data-src="{{ url($handler->getFullImagePath()) }}" data-caption="{{$handler->image_name}}">
                                    {{ $index + 1 }}. {{ $handler->user->getFullName() }}
                                </a>
                                @else
                                <p class="text-secondary m-0">{{$index + 1}}. {{$handler->user->getFullName()}}</p>
                                @endif

                                @if ($handler->status == 1)
                                <i class="fas fa-check-circle p-1" style='color:#28a745'></i>
                                @else
                                <i class="fas fa-times-circle p-1" style='color:#dc3545'></i>
                                @endif
                            </div>
                            @endforeach
                        </td>
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

@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <script>
        $(function() {
            $(".doc-datatable").DataTable({
                "responsive": false,
                "lengthChange": false,
                "autoWidth": false,
                columnDefs: [
                    {orderable: false, targets: [4,5]}
                ]
            })

            $('#btnSubmit').on('click', function () {
                showAlertWithCallBack('warning', 'คุณต้องการเพิ่มเอกสาร?').then(
                    (ok) => {
                        if (!ok) return;

                        $('#docCreateForm').submit();
                    }
                );
            });
        });
    </script>
@endpush
