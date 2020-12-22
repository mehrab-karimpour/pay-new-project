@extends('layouts.index')

@section('main-content')
    <header class="container-fluid header">
        <nav class="row nav-top p-2">
            <div class="col-12 col-md-6 text-right  pt-2">
                <i class="fab mr-3 fa-linkedin-in"></i>
                <i class="fab mr-3 fa-instagram"></i>
                <i class="fab mr-3 fa-telegram"></i>
            </div>
            <div class="col-12 col-md-4 text-right">
                <a href="" class="mr-2">
                    ثبت نام
                    <i class="fas fa-registered m-2"></i>
                </a>
                <a href="" class="ml-2">
                    ورور
                    <i class="fas fa-user m-2"></i>
                </a>
            </div>
        </nav>


        <nav class="row nav-bottom p-2">
            <div class="col-3">
                <button class="btn btn-warning text-white">گرفتن کارت</button>
            </div>
            <div class="col-8 d-none float-right d-md-block text-right">
                <ul class="d-md-flex col-7 float-right justify-content-around">
                    <li class="float-right">
                        <a>درباره ما</a>
                    </li>
                    <span>|</span>
                    <li class="float-right">
                        <a>روشهای کمک</a>
                    </li>
                    <span>|</span>
                    <li class="float-right">
                        <a>نیکوکاری</a>
                    </li>
                    <span>|</span>
                    <li class="float-right">
                        <a>درمان</a>
                    </li>
                    <span>|</span>

                </ul>
            </div>
        </nav>
    </header>
    <section class="container-fluid " id="head-site">
        <div class="row">
            <div class="col-12">
            </div>
        </div>
    </section>
    <br>
    <section class="container-fluid">
        <div class="row">
            <div class="col-12">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink"
                     x="0px" y="0px" width="800px" height="600px" viewBox="0 0 800 600"
                     enable-background="new 0 0 800 600"
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
                    <linearGradient id="SVGID_3_" gradientUnits="userSpaceOnUse" x1="180.3469" y1="362.2723"
                                    x2="249.7487"
                                    y2="362.2723">
                        <stop offset="0" style="stop-color:#12B3D6"></stop>
                        <stop offset="1" style="stop-color:#7853A8"></stop>
                    </linearGradient>
                    <circle fill="url(#SVGID_3_)" cx="215.048" cy="362.272" r="34.701"></circle>
                    <linearGradient id="SVGID_4_" gradientUnits="userSpaceOnUse" x1="367.3469" y1="375.3673"
                                    x2="596.9388"
                                    y2="375.3673">
                        <stop offset="0" style="stop-color:#12B3D6"></stop>
                        <stop offset="1" style="stop-color:#7853A8"></stop>
                    </linearGradient>
                    <circle fill="url(#SVGID_4_)" cx="482.143" cy="375.367" r="114.796"></circle>
                    <linearGradient id="SVGID_5_" gradientUnits="userSpaceOnUse" x1="365.4405" y1="172.8044"
                                    x2="492.4478"
                                    y2="172.8044"
                                    gradientTransform="matrix(0.8954 0.4453 -0.4453 0.8954 127.9825 -160.7537)">
                        <stop offset="0" style="stop-color:#FFA33A"></stop>
                        <stop offset="1" style="stop-color:#DF3D8E"></stop>
                    </linearGradient>
                    <circle fill="url(#SVGID_5_)" cx="435.095" cy="184.986" r="63.504"></circle>
</svg>
                <svg version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink"
                     x="0px" y="0px" width="800px" height="600px" viewBox="0 0 800 600"
                     enable-background="new 0 0 800 600"
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
                    <linearGradient id="SVGID_3_" gradientUnits="userSpaceOnUse" x1="180.3469" y1="362.2723"
                                    x2="249.7487"
                                    y2="362.2723">
                        <stop offset="0" style="stop-color:#12B3D6"></stop>
                        <stop offset="1" style="stop-color:#7853A8"></stop>
                    </linearGradient>
                    <circle fill="url(#SVGID_3_)" cx="215.048" cy="362.272" r="34.701"></circle>
                    <linearGradient id="SVGID_4_" gradientUnits="userSpaceOnUse" x1="367.3469" y1="375.3673"
                                    x2="596.9388"
                                    y2="375.3673">
                        <stop offset="0" style="stop-color:#12B3D6"></stop>
                        <stop offset="1" style="stop-color:#7853A8"></stop>
                    </linearGradient>
                    <circle fill="url(#SVGID_4_)" cx="482.143" cy="375.367" r="114.796"></circle>
                    <linearGradient id="SVGID_5_" gradientUnits="userSpaceOnUse" x1="365.4405" y1="172.8044"
                                    x2="492.4478"
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
                                <div class="col-12">
                                    <h5 class="text-center text-info mb-4">برای دریافت کارت فرم زیر را پر کنید</h5>
                                </div>
                                <div class="form-group col-12 row m-0 m-auto" id="form-pay">
                                    <div class="col-12 col-md-6 bg-white">
                                        <label for="name"></label>
                                        <input type="text" id="name" name="name" class="input-sp p-2" placeholder="نام">
                                        <p class="show-error"></p>
                                    </div>
                                    <div class="col-12 col-md-6 bg-white">
                                        <label for="lastName"></label>
                                        <input type="text" id="lastName" name="lastName" class="input-sp p-2"
                                               placeholder="نام خانوادگی">
                                        <p class="show-error"></p>
                                    </div>
                                    <br>
                                    <div class="col-12 col-md-6 bg-white">
                                        <label for="nationalCode"></label>
                                        <input type="number" id="nationalCode" name="nationalCode" class="input-sp p-2"
                                               placeholder="کد ملی">
                                        <p class="show-error"></p>

                                    </div>
                                    <div class="col-12 col-md-6 bg-white">
                                        <label for="birthDate"></label>
                                        <input type="text" id="birthDate" name="birthDate" class="input-sp p-2"
                                               placeholder="تاریخ تولد">
                                        <p class="show-error"></p>
                                    </div>
                                    <br>
                                    <div class="col-12 col-md-6 bg-white">
                                        <label for="mobile"></label>
                                        <input type="number" id="mobile" name="mobile" class="input-sp p-2"
                                               placeholder="شماره تلفن">
                                        <p class="show-error"></p>
                                    </div>
                                    <br>
                                    <div class="col-12 col-md-6 bg-white rounded-left-bottom">

                                    </div>
                                    <div class="col-8 col-md-4">
                                        <label for="submit"></label>
                                        <a id="submit" onclick="submitForm()"
                                           type="submit"
                                           class="form-control btn btn-info text-white">
                                            ثبت نام
                                        </a>
                                    </div>
                                    <br>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container mb-5 p-2" id="send-message">
        <div class="row">
            <div class="col-12 col-md-8">
                <br>
                <div class="btn btn-secondary"><strong>ورود و تکمیل اطلاعات</strong></div>
                <p class="text-center p-3">در روزهایی که باید فاصله‌گذاری اجتماعی را رعایت کنیم و حتی در آینده‌ای که
                    سلامتی باز هم به جهانمون برگردد، با سفارش و ارسال پیام تبریک و تسلیت از طریق پیام همدلی به صورت
                    آنلاین در روزهای شیرین و تلخ، همراهی با عزیزانمان را به نجات زندگی کودکان مبتلا به سرطان پیوند
                    بزنیم. (ارسال پیام از طریق ایمیل، واتساپ و پیامک) با پرداخت مبلغ ۱۰۰ هزار تومان و ارسال پیام همدلی،
                    روزهای شاد زندگی دوستان و عزیزانتان را با کمک به ادامه زندگی کودکان مبتلا به سرطان پیوند بزنید و
                    شادی شان را دوچندان کنید</p>
            </div>
            <form method="post" action="{{route('messageHandle')}}" class="col-12">
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

                    <textarea  class="input-sp text-right" id="text" name="text" type="text" disabled> روزهاى شاد زندگی شما مایه خوشحالی من/ماست. به همین خاطر، حالا که برای حفظ سلامتی مان، نمی توانیم دور هم جمع شویم، با فرستادن این پیام از سوى   مى خواهيم همراهی خود در لحظات شاد زندگی تان را با شوق و اميد سلامتى کودکان مبتلا به سرطان پیوند بزنيم و با تامین هزینه دارو و درمان این قهرمانان کوچک سهیم شویم. تبریک ما را از طریق پیام   پذیرا باشید. به امید آنکه به زودی و با گذر از روزهاى سخت شيوع كرونا، به میمنت این اتفاق نیک دیداری تازه کنیم. باور کنید که دست هایمان از شما دور و قلب هایمان به شما نزدیک است.
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
                        <input type="checkbox" class="form-check-input ml-5" id="exampleCheck1">
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
                           placeholder="example@exmp.com">
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
                        <input type="checkbox" class="form-check-input ml-5" id="exampleCheck1">
                        <label class="form-check-label mr-5" for="exampleCheck1"><strong>از طریق پیامک</strong></label>
                    </div>
                    <br>


                    <input class="input-sp text-center" id="audience" name="audience" type="text"
                           placeholder="example@exmp.com">
                    <label for="audience"></label>
                </div>
                <h6 class="mb-2 mt-2 text-center">شماره تلفن همراه گیرنده پیام - حداکثر ۲ شماره تماس</h6>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <label for="mobile_to"></label>
                        <input class="input-sp text-center" id="mobile_to" name="mobile_to[]" type="text"
                               placeholder="-- -- ---  --09 ">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="mobile_to"></label>
                        <input class="input-sp text-center" id="mobile_to" name="mobile_to[]" type="text"
                               placeholder="-- -- ---  --09 ">
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col-12 col-md-6 mb-4">
                        <button class="btn btn-info">ادامه و پرداخت</button>
                    </div>
                </div>


            </form>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <br><br><br>
                    <p class="text-center text-white">دارای مجــوز رســـمی به شــماره ۵۱۶/۱/۱۳۸۲ و شـمـاره ثـــبـت ۲۱۶۷۴
                        نشان استاندارد جهانی موسسات غیردولتی از موسسه بین اللملی SGS</p>
                    <div class="col-12 d-flex justify-content-around">
                        <div class="col-6 direction-rtl text-right">
                            <i class="fa fa-phone bg-primary p-2 rounded"></i>
                            <p class="text-white">نشان استاندارد جهانی موسسات غیردولتی از موسسه بین اللملی SGS</p>
                        </div>
                        <br>
                        <div class="col-6 direction-rtl text-right">
                            <i class="fas fa-envelope bg-primary p-2 rounded"></i>
                            <p class="text-white">mehra0bkarimpour@gmail.com</p>
                        </div>
                        <br>
                    </div>
                    <div class="col-12 d-flex justify-content-around">
                        <div class="col-12 direction-rtl text-right">
                            <i class="fas fa-map-marker-alt bg-primary p-2 rounded"></i>
                            <p class="text-white">
                                دفتر مرکزی: تهران، خیابان آیت‌ الله کاشانی، بین اباذر و مهران جنب
                                بانک سینا، پلاک ۷۳
                            </p>
                        </div>
                        <br>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <br><br>
                    <form class="form-group">
                        <label for="email"></label>
                        <input type="email" name="email" id="email" class="form-control text-right"
                               placeholder="همین حالا ثبت نام کنید">
                        <br>
                        <label for="submit"></label>
                        <input type="submit" name="submit" id="submit" value="ثبت نام" class="btn btn-warning">
                    </form>
                    <h5 class="text-right text-white d-flex justify-content-center direction-rtl">
                        ادرس :
                    </h5>
                    <h6 class="text-center direction-rtl text-white">
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است،
                        چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی
                        مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه
                        درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری
                        را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این
                    </h6>

                </div>
            </div>
        </div>
    </footer>


@endsection
