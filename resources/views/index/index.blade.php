@extends('layouts.index')

@section('main-content')


    @include('header')


    <section class="container mb-5 p-2" id="send-message">
        <div class="row">
            <form method="post" action="{{route('message.send')}}" class="col-12">

                <div class="col-12 text-center">
                    @if(session('error') and session('error')==='message')
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p>{{$error}}</p>
                                @endforeach
                            </div>
                        @endif
                    @endif

                    <br>
                    <div class="btn btn-secondary"><strong>ورود و تکمیل اطلاعات</strong></div>
                    <p class="text-center p-3">در روزهایی که باید فاصله‌گذاری اجتماعی را رعایت کنیم و حتی در آینده‌ای که
                        سلامتی باز هم به جهانمون برگردد، با سفارش و ارسال پیام تبریک و تسلیت از طریق پیام همدلی به صورت
                        آنلاین در روزهای شیرین و تلخ، همراهی با عزیزانمان را به نجات زندگی کودکان مبتلا به سرطان پیوند
                        بزنیم. (ارسال پیام از طریق ایمیل، واتساپ و پیامک) با پرداخت مبلغ ۱۰۰ هزار تومان و ارسال پیام
                        همدلی،
                        روزهای شاد زندگی دوستان و عزیزانتان را با کمک به ادامه زندگی کودکان مبتلا به سرطان پیوند بزنید و
                        شادی شان را دوچندان کنید</p>
                </div>

                @csrf
                <div class="col-12">
                    <h5 class="text-center">خطاب به:*</h5>
                    <h6 class="text-center"><small class="col-12 text-center"><strong>برای مثال: سرکار خانم مریم محمدی
                                گرامی/ جناب آقای علی
                                حسینی عزیز/ خانواده محترم حسینی/
                                دوست عزیزم علی حسینی</strong></small></h6>
                    <input class="input-sp" id="message_to_name" name="message_to_name" type="text"
                           placeholder="نام و نام خانوادگی گیرنده پیام همدلی را وارد کنید ">
                    <label for="message_to_name"></label>
                    <h5 class="text-center">از طرف:*</h5>
                    <h6 class="text-center">
                        <small class="col-12 text-center">
                            <strong>
                                برای مثال: مینا سرمدی/ دوست شما رضا علوی/ خانواده علوی/ همکاران شما در واحد حسابداری/
                                برادران یوسفی
                            </strong>
                        </small>
                    </h6>
                    <input class="input-sp" id="message_of_name" name="message_of_name" type="text"
                           placeholder="نام و نام خانوادگی فرستنده  پیام همدلی را وارد کنید ">
                    <label for="message_of_name"></label>
                    <h5 class="text-center">متن پیام :</h5>
                    <div class="col-12 text-right">
                        <div onclick="enableText()" class="btn btn-secondary rounded">
                            ویرایش
                        </div>
                    </div>

                    <textarea class="input-sp text-right" id="text" name="text" type="text" disabled> روزهاى شاد زندگی شما مایه خوشحالی من/ماست. به همین خاطر، حالا که برای حفظ سلامتی مان، نمی توانیم دور هم جمع شویم، با فرستادن این پیام از سوى   مى خواهيم همراهی خود در لحظات شاد زندگی تان را با شوق و اميد سلامتى کودکان مبتلا به سرطان پیوند بزنيم و با تامین هزینه دارو و درمان این قهرمانان کوچک سهیم شویم. تبریک ما را از طریق پیام   پذیرا باشید. به امید آنکه به زودی و با گذر از روزهاى سخت شيوع كرونا، به میمنت این اتفاق نیک دیداری تازه کنیم. باور کنید که دست هایمان از شما دور و قلب هایمان به شما نزدیک است.
                    </textarea>
                    <label for="text"></label>

                    <h5 class="text-center">شماره تلفن همراه نیکوکار سفارش دهنده</h5>

                    <input class="input-sp direction-rtl text-center" id="mobile_of" name="mobile_of" type="number"
                           placeholder="...0918">
                    <label for="mobile_of"></label>
                </div>
                <hr>
                <div class="col-12">
                    <h5 class="text-right mb-4">
                        روش‌های ارسال پیام را انتخاب کنید
                    </h5>
                    <div class="form-check text-center">
                        <input type="checkbox" name="sendEmail" class="form-check-input ml-5" id="exampleCheck1">
                        <label class="form-check-label mr-5" for="exampleCheck1"><strong>از طریق ایمیل</strong></label>
                    </div>
                    <br>

                    <h6 class="text-center">
                        <small class="col-12 text-center">
                            <strong>
                                آدرس ایمیل نیکوکار سفارش دهنده
                            </strong>
                        </small>
                    </h6>
                    <input class="input-sp text-center" id="email_of" name="email_of" type="text"
                           placeholder="ادرس ایمیل خود را وارد کنید ">
                    <label for="email_of"></label>
                </div>
                <h6 class="mb-2 mt-2 text-center">آدرس ایمیل گیرنده/ گیرندگان پیام همدلی- حداکثر ۱۰ آدرس ایمیل</h6>
                <div class="row email-parent">
                    <div class="col-12 col-md-6 email-item">
                        <label for="email_to"></label>
                        <input class="input-sp text-center" id="email_to" name="email_to[]" type="text"
                               placeholder="example@exmp.com">
                    </div>
                    <div class="col-12 col-md-6 email-item">
                        <label for="email_to"></label>
                        <input class="input-sp text-center" id="email_to" name="email_to[]" type="text"
                               placeholder="example@exmp.com">
                    </div>
                </div>
                <div class="col-12 text-right mt-3">
                    <i onclick="emailAdd()" class="fas btn btn-primary mr-5 fa-plus-square"></i>
                </div>
                <hr>


                <div class="col-12">
                    <div class="form-check text-center">
                        <input type="checkbox" name="sendMessage" class="form-check-input ml-5" id="sendMessage">
                        <label class="form-check-label mr-5" for="sendMessage"><strong>از طریق پیامک</strong></label>
                    </div>
                    <br>


                    <input class="input-sp text-center" id="numberMobileOf" name="numberMobileOf" type="number"
                           placeholder="شماره تلفن خود را وارد کنید ">
                    <label for="numberMobileOf"></label>
                </div>
                <h6 class="mb-2 mt-2 text-center">شماره تلفن همراه گیرنده پیام - حداکثر ۲ شماره تماس</h6>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <label for="numberMobileTo"></label>
                        <input class="input-sp text-center" id="numberMobileTo" name="numberMobileTo[]" type="text"
                               placeholder="-- -- ---  --09 ">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="numberMobileTo"></label>
                        <input class="input-sp text-center" id="mobile_to" name="numberMobileTo[]" type="text"
                               placeholder="-- -- ---  --09 ">
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-12 col-md-6 mb-4">
                        <a class="btn btn-info text-white" onclick="proccessForm()">ادامه و پرداخت</a>
                    </div>
                </div>


            </form>
        </div>
    </section>

    @include('footer')


@endsection
