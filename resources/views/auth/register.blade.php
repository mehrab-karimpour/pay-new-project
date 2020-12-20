@extends('layouts.index')

@section('main-content')

    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
         xmlns:xlink="http://www.w3.org/1999/xlink"
         x="0px" y="0px" width="800px" height="600px" viewBox="0 0 800 600" enable-background="new 0 0 800 600"
         xml:space="preserve">
<linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="174.7899" y1="186.34" x2="330.1259" y2="186.34"
                gradientTransform="matrix(0.8538 0.5206 -0.5206 0.8538 147.9521 -79.1468)">
    <stop offset="0" style="stop-color:#FFC035"></stop>
    <stop offset="0.221" style="stop-color:#F9A639"></stop>
    <stop offset="1" style="stop-color:#E64F48"></stop>
</linearGradient>
        <circle fill="url(#SVGID_1_)" cx="266.498" cy="211.378" r="77.668"></circle>
        <linearGradient id="SVGID_2_" gradientUnits="userSpaceOnUse" x1="290.551" y1="282.9592" x2="485.449"
                        y2="282.9592">
            <stop offset="0" style="stop-color:#FFA33A"></stop>
            <stop offset="0.0992" style="stop-color:#E4A544"></stop>
            <stop offset="0.9624" style="stop-color:#00B59C"></stop>
        </linearGradient>
        <circle fill="url(#SVGID_2_)" cx="388" cy="282.959" r="97.449"></circle>
        <linearGradient id="SVGID_3_" gradientUnits="userSpaceOnUse" x1="180.3469" y1="362.2723" x2="249.7487"
                        y2="362.2723">
            <stop offset="0" style="stop-color:#12B3D6"></stop>
            <stop offset="1" style="stop-color:#7853A8"></stop>
        </linearGradient>
        <circle fill="url(#SVGID_3_)" cx="215.048" cy="362.272" r="34.701"></circle>
        <linearGradient id="SVGID_4_" gradientUnits="userSpaceOnUse" x1="367.3469" y1="375.3673" x2="596.9388"
                        y2="375.3673">
            <stop offset="0" style="stop-color:#12B3D6"></stop>
            <stop offset="1" style="stop-color:#7853A8"></stop>
        </linearGradient>
        <circle fill="url(#SVGID_4_)" cx="482.143" cy="375.367" r="114.796"></circle>
        <linearGradient id="SVGID_5_" gradientUnits="userSpaceOnUse" x1="365.4405" y1="172.8044" x2="492.4478"
                        y2="172.8044"
                        gradientTransform="matrix(0.8954 0.4453 -0.4453 0.8954 127.9825 -160.7537)">
            <stop offset="0" style="stop-color:#FFA33A"></stop>
            <stop offset="1" style="stop-color:#DF3D8E"></stop>
        </linearGradient>
        <circle fill="url(#SVGID_5_)" cx="435.095" cy="184.986" r="63.504"></circle>
</svg>
    <svg version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg"
         xmlns:xlink="http://www.w3.org/1999/xlink"
         x="0px" y="0px" width="800px" height="600px" viewBox="0 0 800 600" enable-background="new 0 0 800 600"
         xml:space="preserve">
<linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="174.7899" y1="186.34" x2="330.1259" y2="186.34"
                gradientTransform="matrix(0.8538 0.5206 -0.5206 0.8538 147.9521 -79.1468)">
    <stop offset="0" style="stop-color:#FFC035"></stop>
    <stop offset="0.221" style="stop-color:#F9A639"></stop>
    <stop offset="1" style="stop-color:#E64F48"></stop>
</linearGradient>
        <circle fill="url(#SVGID_1_)" cx="266.498" cy="211.378" r="77.668"></circle>
        <linearGradient id="SVGID_2_" gradientUnits="userSpaceOnUse" x1="290.551" y1="282.9592" x2="485.449"
                        y2="282.9592">
            <stop offset="0" style="stop-color:#FFA33A"></stop>
            <stop offset="0.0992" style="stop-color:#E4A544"></stop>
            <stop offset="0.9624" style="stop-color:#00B59C"></stop>
        </linearGradient>
        <circle fill="url(#SVGID_2_)" cx="388" cy="282.959" r="97.449"></circle>
        <linearGradient id="SVGID_3_" gradientUnits="userSpaceOnUse" x1="180.3469" y1="362.2723" x2="249.7487"
                        y2="362.2723">
            <stop offset="0" style="stop-color:#12B3D6"></stop>
            <stop offset="1" style="stop-color:#7853A8"></stop>
        </linearGradient>
        <circle fill="url(#SVGID_3_)" cx="215.048" cy="362.272" r="34.701"></circle>
        <linearGradient id="SVGID_4_" gradientUnits="userSpaceOnUse" x1="367.3469" y1="375.3673" x2="596.9388"
                        y2="375.3673">
            <stop offset="0" style="stop-color:#12B3D6"></stop>
            <stop offset="1" style="stop-color:#7853A8"></stop>
        </linearGradient>
        <circle fill="url(#SVGID_4_)" cx="482.143" cy="375.367" r="114.796"></circle>
        <linearGradient id="SVGID_5_" gradientUnits="userSpaceOnUse" x1="365.4405" y1="172.8044" x2="492.4478"
                        y2="172.8044"
                        gradientTransform="matrix(0.8954 0.4453 -0.4453 0.8954 127.9825 -160.7537)">
            <stop offset="0" style="stop-color:#FFA33A"></stop>
            <stop offset="1" style="stop-color:#DF3D8E"></stop>
        </linearGradient>
        <circle fill="url(#SVGID_5_)" cx="435.095" cy="184.986" r="63.504"></circle>
</svg>
    <div class="container">
        <div class="row">
            <div class="col-12" id="form">
                <form method="post" action="" class="col-12 col-md-8 text-center" id="registerForm">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <p>  {{$error}}</p>
                            @endforeach
                        </div>
                    @endif

                    @if(session('register-status'))
                        @if(session('register-status')==='success')
                            <div class="alert alert-success">
                                ثبت نام با موفقیت انجام شد
                            </div>
                        @endif
                         @if(session('register-status')==='error')
                            <div class="alert alert-danger">
                                ثبت نام انجام نشد لطفا دوباره تلاش کنید
                            </div>
                        @endif

                    @endif

                    <div class="form-group col-12 row m-0 m-auto">
                        <div class="col-12 col-md-6 bg-white">
                            <label for="name"></label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="نام">
                            <p class="show-error"></p>
                        </div>
                        <div class="col-12 col-md-6 bg-white">
                            <label for="lastName"></label>
                            <input type="text" id="lastName" name="lastName" class="form-control"
                                   placeholder="نام خانوادگی">
                            <p class="show-error"></p>
                        </div>
                        <br>
                        <div class="col-12 col-md-6 bg-white">
                            <label for="nationalCode"></label>
                            <input type="number" id="nationalCode" name="nationalCode" class="form-control"
                                   placeholder="کد ملی">
                            <p class="show-error"></p>

                        </div>
                        <div class="col-12 col-md-6 bg-white">
                            <label for="birthDate"></label>
                            <input type="text" id="birthDate" name="birthDate" class="form-control"
                                   placeholder="تاریخ تولد">
                            <p class="show-error"></p>
                        </div>
                        <br>
                        <div class="col-12 col-md-6 bg-white">
                            <label for="mobile"></label>
                            <input type="number" id="mobile" name="mobile" class="form-control"
                                   placeholder="شماره تلفن">
                            <p class="show-error"></p>
                        </div>
                        <br>
                        <div class="col-12 col-md-6 bg-white rounded-left-bottom">
                            <label for="password"></label>
                            <input type="password" id="password" name="password" class="form-control"
                                   placeholder="رمز عبور">
                            <p class="show-error"></p>
                        </div>
                        <div class="col-8 col-md-4">
                            <label for="submit"></label>
                            <a id="submit" onclick="submitForm()"
                               type="submit"
                               class="form-control btn btn-primary text-white">
                                ثبت نام
                            </a>
                        </div>
                        <br>

                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection