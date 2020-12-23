@extends('layouts.admin_index')

@section('admin-content')
    <div class="container">
        <div class="row">
            <div class="col-12 ">

            </div>
        </div>
        <br><br>
        <div class="row">
            <form method="post" action="" class="col-12 col-md-5">
                <h4>قیمت فعلی هر کارت برابر با <small
                        class="text-primary"><strong>{{@number_format($amountCart->amount)}}</strong></small> ریال است
                </h4>
                @csrf
                <div class="form-group">
                    <label for="amount"></label>
                    <input name="amount" type="text" class="form-control" id="amount"
                           placeholder="قیمت را وارد کنید .">
                    <small id="emailHelp" class="form-text text-muted">لطفا قیمت را به ریال وارد نمایید</small>
                    <input type="hidden" name="type" value="amount-cart">
                </div>

                <button type="submit" class="btn btn-primary">ویرایش</button>
            </form>

            <form method="post" action="" class="col-12 mt-4 mt-md-0 col-md-5">
                <h4>قیمت ارسال پیام برابر است با <small
                        class="text-primary"><strong>{{@$amountMessage->amount}}</strong></small> ریال است </h4>
                @csrf
                <div class="form-group">
                    <label for="amount"></label>
                    <input name="amount" type="text" class="form-control" id="amount"
                           placeholder="قیمت را وارد کنید .">
                    <input type="hidden" name="type" value="amount-message">
                    <small id="emailHelp" class="form-text text-muted">لطفا قیمت را به ریال وارد نمایید</small>
                </div>

                <button type="submit" class="btn btn-primary">ویرایش</button>
            </form>
        </div>
    </div>

@endsection



