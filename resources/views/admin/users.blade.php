@extends('layouts.admin_index')

@section('admin-content')


    @csrf
    <table class="table table-hover table-dark">
        <thead>
        <tr>
            <th scope="col">ردیف</th>
            <th scope="col">نام</th>
            <th scope="col">کد ملی</th>
            <th scope="col">ویرایش</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name.' '.$user->lastName}}</td>
                <td>{{$user->nationalCode}}</td>
                <td class="edit">
                    <i class="fa fa-edit ml-2" onclick="editUser()">

                    </i>
                    <i class="fa fa-close mr-2" onclick="deleteUser('{{$user->name.' '.$user->lastName}}','{{$user->id}}')">

                    </i>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $users->links('vendor.pagination.bootstrap-4') }}

    <div class="ajax-loader"></div>
    <div class="resolve-delete-user col-12 col-md-5">
        <h4 data-id=""></h4>
        <button class="btn btn-success" onclick="deleteUserOk()">بله</button>
        <button class="btn btn-danger" onclick="notDelete('.resolve-delete-user')">
            خیر
        </button>
    </div>


@endsection



