@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div>
            <button type="button" class="btn btn-primary create_button" style="margin-bottom: 20px;">Create New Admin</button>
            <table class="table">
                <thead>
                    <tr>
                        <td>
                            Username
                        </td>
                        <td>
                            Full Name
                        </td>
                        <td>
                            Email
                        </td>
                        <td>
                            Address
                        </td>
                        <td>
                            Phone
                        </td>
                        <td align="center">
                            Action
                        </td>
                    </tr>
                </thead>
                <tbody>
                @foreach($admins as $admin)
                    <tr>
                        <td>{{ $admin->username }}</td>
                        <td>{{ $admin->full_name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>{{ $admin->address }}</td>
                        <td>{{ $admin->phone }}</td>
                        <td>
                            <button type="button" data-info="{{$admin->username}}" class="btn btn-success detail_button">Detail</button>
                            <button type="button" data-info="{{$admin->username}}" class="btn btn-primary edit_button">Edit</button>
                            <button type="button" data-info="{{$admin->username}}" class="btn btn-danger delete_button">Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>

<div class="modal fade" id="modal_detail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="username_input">Username</label>
                    <input type="text" class="form-control" id="username_input" disabled>
                </div>
                <div class="form-group">
                    <label for="full_name_input">Full Name</label>
                    <input type="text" class="form-control" id="full_name_input" disabled>
                </div>
                <div class="form-group">
                    <label for="email_input">Email</label>
                    <input type="email" class="form-control" id="email_input" disabled>
                </div>
                <div class="form-group">
                    <label for="address_input">Address</label>
                    <input type="text" class="form-control" id="address_input" disabled>
                </div>
                <div class="form-group">
                    <label for="phone_input">Phone</label>
                    <input type="text" class="form-control" id="phone_input" disabled>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal_edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="username_input_edit">Username</label>
                    <input type="text" class="form-control" id="username_input_edit">
                </div>
                <div class="form-group">
                    <label for="full_name_input_edit">Full Name</label>
                    <input type="text" class="form-control" id="full_name_input_edit">
                </div>
                <div class="form-group">
                    <label for="email_input_edit">Email</label>
                    <input type="email" class="form-control" id="email_input_edit">
                </div>
                <div class="form-group">
                    <label for="address_input_edit">Address</label>
                    <input type="text" class="form-control" id="address_input_edit">
                </div>
                <div class="form-group">
                    <label for="phone_input_edit">Phone</label>
                    <input type="text" class="form-control" id="phone_input_edit">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal_create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="username_input_create">Username</label>
                    <input type="text" class="form-control" id="username_input_create">
                </div>
                <div class="form-group">
                    <label for="full_name_input_create">Full Name</label>
                    <input type="text" class="form-control" id="full_name_input_create">
                </div>
                <div class="form-group">
                    <label for="email_input_create">Email</label>
                    <input type="email" class="form-control" id="email_input_create">
                </div>
                <div class="form-group">
                    <label for="address_input_create">Address</label>
                    <input type="text" class="form-control" id="address_input_create">
                </div>
                <div class="form-group">
                    <label for="phone_input_create">Phone</label>
                    <input type="text" class="form-control" id="phone_input_create">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" id="store_button" class="btn btn-primary">Insert</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<script>
$(document).ready(function(){
    $(".create_button").click(function(){
        $("#modal_create").modal();
    })

    $(".detail_button").click(function(){
        var username = $(this).attr("data-info") 
        console.log(username) 
        $.ajax({
            method: 'GET',
            url: '{{ url("/") }}/detail',
            data: {
                username: username,
            },
            headers:{ 'Content-Type': 'application/json' },
            success: function(response)
            {
                console.log(response)
                $('#username_input').val(response.username)
                $('#full_name_input').val(response.full_name)
                $('#email_input').val(response.email)
                $('#address_input').val(response.address)
                $('#phone_input').val(response.phone)
            }
        })

        $("#modal_detail").modal();
    })

    $(".edit_button").click(function(){
        var username = $(this).attr("data-info") 
        console.log(username) 
        $.ajax({
            method: 'GET',
            url: '{{ url("/") }}/detail',
            data: {
                username: username,
            },
            headers:{ 'Content-Type': 'application/json' },
            success: function(response)
            {
                console.log(response)
                $('#username_input_edit').val(response.username)
                $('#full_name_input_edit').val(response.full_name)
                $('#email_input_edit').val(response.email)
                $('#address_input_edit').val(response.address)
                $('#phone_input_edit').val(response.phone)
            }
        })

        $("#modal_edit").modal();
    })
})
</script>
@endsection

