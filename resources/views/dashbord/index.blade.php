@extends('layouts.app')

@section('content')
    <div>
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-4">
                <!-- small box -->
                <div class="small-box card-success">
                    <div class="inner text-center">
                        <div class="d-none d-sm-flex justify-content-center mb-3">
                            <img src="{{asset('assets/icons/success.png')}}" alt="SUCCESS" width="150px">

                            <div class="d-flex align-items-center px-3">
                                <h3 class="m-0">150</h3>
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
            <div class="col-lg-4">
                <!-- small box -->
                <div class="small-box card-waiting">
                    <div class="inner text-center">
                        <div class="d-none d-sm-flex justify-content-center mb-3">
                            <img src="{{asset('assets/icons/waiting.png')}}" alt="WAITING" width="150px">

                            <div class="d-flex align-items-center px-3">
                                <h3 class="m-0">150</h3>
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
            <div class="col-lg-4">
                <!-- small box -->
                <div class="small-box card-total">
                    <div class="inner text-center">
                        <div class="d-none d-sm-flex justify-content-center mb-3">
                            <img src="{{asset('assets/icons/total.png')}}" alt="TOTAL" width="150px">

                            <div class="d-flex align-items-center px-3">
                                <h3 class="m-0">150</h3>
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
        </div>
        <!-- /.row -->

        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-4">
                <!-- small box -->
                <div class="small-box card-out">
                    <div class="inner text-center">
                        <div class="d-none d-sm-flex justify-content-center mb-3">
                            <img src="{{asset('assets/icons/out.png')}}" alt="OUT" width="150px">

                            <div class="d-flex align-items-center px-3">
                                <h3 class="m-0">150</h3>
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
            <div class="col-lg-4">
                <!-- small box -->
                <div class="small-box card-in">
                    <div class="inner text-center">
                        <div class="d-none d-sm-flex justify-content-center mb-3">
                            <img src="{{asset('assets/icons/in.png')}}" alt="IN" width="150px">

                            <div class="d-flex align-items-center px-3">
                                <h3 class="m-0">150</h3>
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
            <div class="col-lg-4">
                <!-- small box -->
                <div class="small-box card-teach">
                    <div class="inner text-center">
                        <div class="d-none d-sm-flex justify-content-center mb-3">
                            <img src="{{asset('assets/icons/teach.png')}}" alt="TEACH" width="150px">

                            <div class="d-flex align-items-center px-3">
                                <h3 class="m-0">150</h3>
                            </div>
                        </div>

                        <div class="d-flex d-sm-none justify-content-center align-items-center px-3">
                            <h3 class="m-0">150</h3>
                        </div>

                        <p>จำนวนเอกสารที่ดำเนินการสำเร็จ</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
    </div>
@endsection

@push('css')
<style>
    .card-success {
        background-color: #D998EC
    }
    .card-waiting {
        background-color: #99F66A
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
