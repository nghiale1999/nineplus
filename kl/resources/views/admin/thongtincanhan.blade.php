


@extends('admin.layout.app')
@section('content')

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Profile</h4>
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex align-items-center justify-content-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="#">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <center class="m-t-30"> <img src="{{asset('admin/assets/images/users/'.$data->anh)}}" class="rounded-circle" width="150" />
                            <h4 class="card-title m-t-10">{{$data->name}}</h4>
                            <h6 class="card-subtitle">Accoubts Manager Amix corp</h6>
                            <div class="row text-center justify-content-md-center">
                                <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                                <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
                            </div>
                        </center>
                    </div>
                    <div>
                        <hr> </div>
                    <div class="card-body"> <small class="text-muted">Email  </small>
                        <h6>{{$data->email}}</h6> <small class="text-muted p-t-30 db">Số Điện Thoại:</small>
                        <h6>{{$data->sdt}}</h6> <small class="text-muted p-t-30 db">Địa Chỉ:</small>
                        <h6>{{$data->diachi}}</h6>
                        <div class="map-box">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247804.18476742908!2d107.82984758526436!3d13.962154000042457!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x316c1f82022f81a3%3A0x2234918a6e4ab03a!2sTp.%20Pleiku%2C%20Gia%20Lai%2C%20Vi%E1%BB%87t%20Nam!5e0!3m2!1svi!2sin!4v1647152054879!5m2!1svi!2sin" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div> <small class="text-muted p-t-30 db">Social Profile</small>
                        <br/>
                        <button class="btn btn-circle btn-secondary"><i class="mdi mdi-facebook"></i></button>
                        <button class="btn btn-circle btn-secondary"><i class="mdi mdi-twitter"></i></button>
                        <button class="btn btn-circle btn-secondary"><i class="mdi mdi-youtube-play"></i></button>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <div class="card-body">
                        @if (session('success'))
                        <div class="alert alert-success">
                            <p>{{ session('success') }}</p>
                        </div>
                        @endif
                        <form  class="form-horizontal form-material" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="col-md-12">Tên</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Johnathan Doe" class="form-control form-control-line" value="{{$data->name}}" name="name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Ảnh Đại Diện</label>
                                <div class="col-md-12">
                                    <input type="file"  class="form-control form-control-line" value="{{$data->anh}}" name="anh">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Email</label>
                                <div class="col-md-12">
                                    <input type="email" placeholder="johnathan@admin.com" class="form-control form-control-line" id="example-email" value="{{$data->email}}" name="email" readonly>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Địa Chỉ</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="danang-vietnam" class="form-control form-control-line" id="example-email" value="{{$data->diachi}}" name="diachi" >
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Password</label>
                                <div class="col-md-12">
                                    <input type="password" value="{{$data->password}}" class="form-control form-control-line" name="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Số Điện Thoại</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="123 456 7890" class="form-control form-control-line" value="{{$data->sdt}}" name="sdt">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Ghi chú</label>
                                <div class="col-md-12">
                                    <textarea rows="5" class="form-control form-control-line"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12">Quốc Tịch</label>
                                <div class="col-sm-12">
                                    <select class="form-control form-control-line" name="quocgia" >
                                       
                                        @foreach ($dataquocgia as $value)
                                            <option value={{$value->id}} <?php echo Auth::user()->id_quocgia == $value['id'] ? 'selected':''; ?>>{{$value->tenqg}}</option>
                                            
                                        @endforeach
                                        
                                      
                                       
                                    </select>
                                </div>
                            </div>
                            <ul class="alert text-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success" type="submit">Update Profile</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- Row -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer text-center">
        All Rights Reserved by Nice admin. Designed and Developed by
        <a href="https://wrappixel.com">WrapPixel</a>.
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>
    
@endsection