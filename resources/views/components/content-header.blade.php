<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $title }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    @if(isset($link1) && isset($titleLink1))
                        <li class="breadcrumb-item"><a href="{{ $link1 }}">{{ $titleLink1 }}</a></li>
                    @endif
                    @if(isset($titleLink2))
                        <li class="breadcrumb-item active">{{ $titleLink2 }}</li>
                    @endif
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
