@extends('admin.layout.app')
@section('content')
<div class="row">
    <div class="col-3"></div>
    <div class="col-9">
    <div class="card">
        
        @if (session('success'))
            <div class="alert alert-success">
                <p>{{ session('success') }}</p>
            </div>
        @endif
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">cấp độ</th>
                        <th scope="col">số điện thoại</th>
                        <th scope="col">địa chỉ</th>
                        <th scope="col">xóa</th>
                        <th scope="col">gửi cảnh báo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $value) 
                    <tr class="table-active">
                        <th scope="row">{{$value->id}}</th>
                        <td>{{$value->name}}</td>
                        <td>{{$value->email}}</td>
                        @if ($value->capdo == 0)
                            <td>member</td>
                        @else
                            <td>admin</td>
                        @endif

                        
                        <td>{{$value->sdt}}</td>
                        <td>{{$value->diachi}}</td>
                        
                        <td  class="delete"><a  class="btn btn-primary delete" id="{{$value->id}}">Delete</a></td>
                        <td><a  class="btn btn-danger" href="{{url('admin/qluser/warning/'.$value->id)}}">Warning</a></td>
                    </tr>
                    @endforeach 
                </tbody>
                
            </table>
             
        </div>
    </div>
</div>

@endsection

@section('script')
<script>

    $(document).ready(function(){
    
    
        $('a.delete').click(function(){
            
            var id = $(this).attr('id');
            
            console.log(id);
            $.ajax({
    
                method: "POST",
                url: 'deleteuser',
                data:{
                    _token: '{{csrf_token()}}',               
                    id_user: id,                               
                },
                success:function(data){
                    alert(data);
    
                }    
            });
    
            $(this).closest('td.delete').closest('tr').remove();
            
            
    
        })
    
    
    
    
    
    
    })
    
    
    </script>
@endsection