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
                    <i class="fa fa-edit ml-2" onclick="editUser('{{$user->name.' '.$user->lastName}}',{{$user->id}})">

                    </i>
                    <i class="fa fa-close mr-2"
                       onclick="deleteUser('{{$user->name.' '.$user->lastName}}','{{$user->id}}')">

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

    <div class="col-12 col-md-6 edit-user-section">
        <i class="fa fa-close" onclick="closeItem('.edit-user-section')"></i>
        <form class="edit-form" method="post">
            @csrf
            <h4 class="text-center m-2 text-header-edit"></h4>
            <br>
            <div class="col-12 d-block d-md-flex justify-content-around">
                <input class="form-control col-12 col-md-5" type="text" name="name" placeholder="نام">
                <input class="form-control col-12 col-md-5" type="text" name="lastName" placeholder="نام خانوادگی">
            </div>
            <br>
            <div class="col-12 d-block d-md-flex justify-content-around">

                <input class="form-control col-12 col-md-5" type="number" name="nationalCode" placeholder="کد ملی">
                <input class="form-control col-12 col-md-5" type="text" name="birthDate" placeholder="تاریخ تولد">
            </div>
            <br>
            <div class="col-12 d-block d-md-flex justify-content-around">

                <input class="form-control col-12 col-md-5" type="number" name="mobile" placeholder="شماره موبایل">
                <input class="form-control col-12 col-md-5" type="text" name="password" placeholder="رمز عبور">
            </div>
            <input type="hidden" name="user_id">
            <br><br>
            <div class="col-12 d-block d-md-flex justify-content-around">

                <a type="submit" class="form-control text-white col-12 col-md-4 btn btn-primary"
                   onclick="goEditUser()"
                >ارسال</a>
            </div>

        </form>
    </div>


@endsection



