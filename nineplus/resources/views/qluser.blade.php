@extends('layout.app')


@section('content')
<table>
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>email</th>
            <th>phone</th>
            <th>address</th>
            <th>update</th>
            <th>delete</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($data as $vl)
            <tr>
                <td class="boder">{{$vl->id}}</td>
                <td class="boder">{{$vl->name}}</td>
                <td class="boder">{{$vl->email}}</td>
                <td class="boder">{{$vl->phone}}</td>
                <td class="boder">{{$vl->address}}</td>
                <td class="boder"><button class="update"><a href="{{url('edituser/'.$vl->id)}}">update</a></button></td>
                <td class="boder"><button class="delete" id="{{$vl->id}}">delete</button></td>
            </tr>
        @endforeach

    </tbody>

</table>

@endsection

@section('script')

<script>

$(document).ready(function(){


    $('button.delete').click(function(){
        
        var id = $(this).attr('id');
        

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

        $(this).closest('td.boder').closest('tr').remove();
        
        

    })






})


</script>
    
@endsection
    