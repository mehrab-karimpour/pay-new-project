@extends('layouts.admin_index')

@section('admin-content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4>قیمت فعلی هر کارت برابر با <small class="text-primary"><strong>{{$amount}}</strong></small> ریال است </h4>
            </div>
        </div>
        <br><br>
        <div class="row">
            <form method="post" action="" class="col-12 col-md-5">
                @csrf
                <div class="form-group">
                    <label for="amount"></label>
                    <input name="amount" type="text" class="form-control" id="amount" placeholder="قیمت را وارد کنید .">
                    <small id="emailHelp" class="form-text text-muted">لطفا قیمت را به ریال وارد نمایید</small>
                </div>

                <button type="submit" class="btn btn-primary">ویرایش</button>
            </form>
        </div>
    </div>

@endsection



