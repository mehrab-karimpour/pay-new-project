@extends('layouts.index')

@section('main-content')
    <div class="container" id="registration-form">
        <div class="image"></div>
        <div class="frm">
            <h1>ثبت نام</h1>
            <form>
                <div class="form-group">
                    <label for="username">نام کاربری:</label>
                    <input type="text" class="form-control" id="username" placeholder="نام کاربری را وارد کنید">
                </div>
                <div class="form-group">
                    <label for="email">ایمیل:</label>
                    <input type="email" class="form-control" id="email" placeholder="ایمیل را وارد کنید">
                </div>
                <div class="form-group">
                    <label for="pwd">کلمه عبور:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="کلمه عبور را وارد کنید">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg float-left">ارسال</button>
                </div>
            </form>
        </div>
    </div>
@endsection
