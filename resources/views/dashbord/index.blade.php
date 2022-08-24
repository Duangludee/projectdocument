@extends('layouts.app')

@section('content-header')
<x-content-header title="Dashboard" titleLink2="Dashboard"/>
@endsection

@section('content')
    <div>
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3">
                <!-- small box -->
                <div class="small-box card-success">
                    <div class="inner text-center">
                        <div class="d-none d-sm-flex justify-content-center mb-3">
                            <img src="{{asset('assets/icons/success.png')}}" alt="SUCCESS" width="150px">

                            <div class="d-flex align-items-center px-3">
                                <h3 class="m-0">{{ $success }}</h3>
                            </div>
                        </div>

                        <p>จำนวนเอกสารที่ดำเนินการสำเร็จ</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3">
                <!-- small box -->
                <div class="small-box card-waiting">
                    <div class="inner text-center">
                        <div class="d-none d-sm-flex justify-content-center mb-3">
                            <img src="{{asset('assets/icons/waiting.png')}}" alt="WAITING" width="150px">

                            <div class="d-flex align-items-center px-3">
                                <h3 class="m-0">{{ $process }}</h3>
                            </div>
                        </div>

                        <p>จำนวนเอกสารที่รอดำเนินการ</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3">
                <!-- small box -->
                <div class="small-box card-cancel">
                    <div class="inner text-center">
                        <div class="d-none d-sm-flex justify-content-center mb-3">
                            <img src="{{asset('assets/icons/cancel.png')}}" alt="CANCEL" width="150px">

                            <div class="d-flex align-items-center px-3">
                                <h3 class="m-0">{{ $cancel }}</h3>
                            </div>
                        </div>

                        <p>จำนวนเอกสารที่ยกเลิก</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3">
                <!-- small box -->
                <div class="small-box card-total">
                    <div class="inner text-center">
                        <div class="d-none d-sm-flex justify-content-center mb-3">
                            <img src="{{asset('assets/icons/total.png')}}" alt="TOTAL" width="150px">

                            <div class="d-flex align-items-center px-3">
                                <h3 class="m-0">{{ $total }}</h3>
                            </div>
                        </div>

                        <p>จำนวนเอกสารทั้งหมด</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body d-flex justify-content-center">
                            <canvas id="docChart" class="w-50 h-auto"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body d-flex justify-content-center">
                            <canvas id="teachChart" class="w-50 h-auto"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(function () {
        const data = {
            labels: ['สำเร็จ', 'รอดำเนินการ', 'ยกเลิก'],
            datasets: [
                {
                    label: 'Dataset 1',
                    data: [55, 49, 44],
                    backgroundColor: ['green', 'yellow', 'red'],
                },
            ]
        }

        var docChart = new Chart("docChart", {
            type: "pie",
            data: data,
            options: {
                // responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Document Charts'
                    }
                }
            },
        });
    });
        $(function () {
        const data = {
            labels: ['สำเร็จ', 'รอดำเนินการ', 'ยกเลิก'],
            datasets: [
                {
                    label: 'Teachset 1',
                    data: [300, 50, 100],
                    backgroundColor: ['green', 'yellow', 'red'],
                    hoverOffset: 3
                },
            ]
        }
        var teachChart = new Chart("teachChart", {
            type: 'doughnut',
            data: data,
            options: {
                // responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Teach Chart'
                    }
                }
            },
        });
    });
</script>
@endpush

@push('css')
<style>
    .card-success {
        background-color: #D998EC
    }
    .card-waiting {
        background-color: #99F66A
    }
    .card-cancel {
        background-color: #FF3030
    }
    .card-total {
        background-color: #68A5F6
    }
    .card-out {
        background-color: #F1F73C
    }
    .card-in {
        background-color: #F97FF1
    }
    .card-teach {
        background-color: #FFA952
    }
</style>
@endpush
