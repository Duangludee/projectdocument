@extends('layouts.app')

@section('content-header')
<x-content-header title="เพิ่มเอกสาร" titleLink1="เอกสาร" link1="/document" titleLink2="เพิ่มเอกสาร"/>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>เพิ่มเอกสาร
                <span class="float-end">
                    <button type="button" class="btn btn-success" id="btnSubmit">บันทึก</button>
                </span>
            </h5>
        </div>
        <div class="card-body">
            <form action="{{route('document.store')}}" method="post" enctype="multipart/form-data" id="docCreateForm">
                <div class="form-group row px-2">
                    <label for="no" class="col-sm-auto col-form-label ps-0">เลขที่</label>
                    <div class="col-sm-6 px-0">
                        <input type="text" class="form-control @error('no') is-invalid @enderror" id="no" name="no" placeholder="เลขที่" value="{{ old('no') }}">

                        @error('no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row px-2">
                    <label for="topic" class="col-sm-auto col-form-label ps-0">เรื่อง</label>
                    <div class="col-sm-6 px-0">
                        <input type="text" class="form-control @error('topic') is-invalid @enderror" id="topic" name="topic" placeholder="ชื่อเรื่อง" value="{{ old('topic') }}">

                        @error('topic')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>

                <div class="row my-3">
                    <div class="col-12 col-lg-6">
                        <div class="form-group m-0">
                            <label for="date_in">วันที่รับ</label>
                            <input type="text" class="form-control date-in-picker" id="date_in" name="date_in" placeholder="วันที่รับ">
                        </div>
                    </div>

                    <div class="col-12 col-lg-6">
                        <div class="form-group m-0">
                            <label for="time_in">เวลา</label>
                            <input type="text" class="form-control timepicker-in" id="time_in" name="time_in" placeholder="เวลา">
                        </div>
                    </div>
                </div>

                <div class="row my-3">
                    <div class="col-12 col-lg-6">
                        <div class="form-group m-0">
                            <label for="date_out">วันที่ออก</label>
                            <input type="text" class="form-control date-out-picker" id="date_out" name="date_out" placeholder="วันที่ออก">
                        </div>
                    </div>

                    <div class="col-12 col-lg-6">
                        <div class="form-group m-0">
                            <label for="time_out">เวลา</label>
                            <input type="text" class="form-control timepicker-out" id="time_out" name="time_out" placeholder="เวลา">
                        </div>
                    </div>
                </div>

                <div class="row my-3">
                    <div class="col-lg-6">
                        <div class="form-group m-0">
                            <label for="from" class="col-sm-auto col-form-label ps-0">จาก</label>
                            <select class="form-control select-from @error('from') is-invalid @enderror" name="from">
                                <option value="" selected disabled>กรุณาเลือกหน่วยงาน</option>
                                @foreach ($organizations as $item)
                                <option value="{{$item->name}}" {{ old('from' == $item->name ? 'selected' : '') }}>{{$item->name}}</option>
                                @endforeach
                            </select>

                            @error('from')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                             @enderror
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group m-0">
                            <label for="for" class="col-sm-auto col-form-label ps-0">ถึง</label>
                            <select class="form-control select-for @error('for') is-invalid @enderror" name="for">
                                <option value="" selected disabled>กรุณาเลือกหน่วยงาน</option>
                                @foreach ($organizations as $item)
                                <option value="{{$item->name}}" {{ old('for' == $item->name ? 'selected' : '') }}>{{$item->name}}</option>
                                @endforeach
                            </select>

                            @error('for')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                             @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group row px-2">
                    <label for="users" class="col-sm-auto col-form-label ps-0">ผู้ดำเนินงาน</label>
                    <div class="col-sm-6 px-0">
                        <select class="form-control select-users @error('users') is-invalid @enderror" name="users[]" multiple="multiple">
                            <option value="" disabled>กรุณาเลือกผู้รับผิดชอบ</option>
                            @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->getFullName()}}</option>
                            @endforeach
                        </select>

                        @error('users')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>

                <div class="form-group row px-2">
                    <label class="col-sm-auto col-form-label ps-0" for="formFile">แนบไฟล์</label>
                    <div class="col-sm-6 px-0">
                        <input class="form-control @error('file') is-invalid @enderror" type="file" id="formFile" name="file" accept="image/*" value="{{ old('file') }}">

                        @error('file')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .form-inline {
            display: flex;
        }
    </style>
@endpush

@push('scripts')
    <script>
        $(document).ready(function () {

            $('.date-in-picker').datepicker({
                format: 'dd/mm/yyyy',
                todayBtn: true,
                todayHighlight: true
            }).datepicker("setDate", "0");

            $('.date-out-picker').datepicker({
                format: 'dd/mm/yyyy',
                todayBtn: true,
                todayHighlight: true
            }).datepicker("setDate", "0");
            $('.timepicker-in').timepicker({
                timeFormat: 'HH:mm',
                interval: 1,
                minTime: '08',
                maxTime: '17',
                defaultTime: '08',
                startTime: '08:00',
                dynamic: false,
                dropdown: true,
                scrollbar: true
            });
            $('.timepicker-out').timepicker({
                timeFormat: 'HH:mm',
                interval: 1,
                minTime: '08',
                maxTime: '17',
                defaultTime: '08',
                startTime: '08:00',
                dynamic: false,
                dropdown: true,
                scrollbar: true
            });
            $('.select-users').select2();
            $('.select-from').select2();
            $('.select-for').select2();

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
