$(document).ready(function () {
    $("#birthDate").persianDatepicker({
        initialValue: false,
        initialValueType: 'gregorian',
        altFormat:"Y-m-d",
    });
});


function enableText() {
    $('#text').removeAttr("disabled");
    $('#text').focus();

}

function emailAdd() {
    let emailItemCount = $('.email-item').length;
    if (emailItemCount < 8)
        $('.email-parent').append("<div class='col-12 col-md-6 mt-3 email-item'><label for='email_to'></label><input class='input-sp text-center' id='email_to' name='email_to[]' type='text' placeholder='example@exmp.com'></div>")
}


function ajaxStart() {
    $('.ajax-loader').fadeIn();
}

function ajaxEnd() {
    $('.ajax-loader').fadeOut();
}

function closeItem(item) {
    $(item).fadeOut();
    ajaxEnd();
}

function goEditUser() {
    let user_id = $("input[name='user_id']").val();
    let url = '/panel/goEditUser';
    let token = $("input[name='_token']").val();
    let form = $('.edit-form').serializeArray();
    let data = {"_token": token, 'user_id': user_id, 'data': form};
    $.post(
        url,
        data,
        function (msg) {
            alert(msg);
            console.log(msg);
        }
    )
}

function editUser(name, user_id) {
    let url = '/panel/editUser';
    let token = $("input[name='_token']").val();
    let data = {"_token": token, 'user_id': user_id};
    $.post(
        url,
        data,
        function (msg) {
            let id = msg['user']['id'];
            let name = msg['user']['name'];
            let lastName = msg['user']['lastName'];
            let nationalCode = msg['user']['nationalCode'];
            let birthDate = msg['user']['birthDate'];
            let mobile = msg['user']['mobile'];
            $("input[name='name']").val(name);
            $("input[name='lastName']").val(lastName);
            $("input[name='nationalCode']").val(nationalCode);
            $("input[name='birthDate']").val(birthDate);
            $("input[name='mobile']").val(mobile);
            $("input[name='user_id']").val(id);
            $('.text-header-edit').text(name + " " + lastName);
        }
    )
    ajaxStart();
    $('.edit-user-section').fadeIn();
}

function deleteUser(userName, userId) {

    ajaxStart();
    $(".resolve-delete-user>h4").text("ایا میخواهید کاربر " + userName + " را حذف کنید ؟ ");
    $(".resolve-delete-user>h4").attr("data-id", userId);

    $('.resolve-delete-user').fadeIn();
}

function deleteUserOk() {
    ajaxStart();
    let userId = $(".resolve-delete-user>h4").attr('data-id');
    let token = $("input[name='_token']").val();
    let url = "/panel/deleteUser";
    let data = {'_token': token, 'user_id': userId};
    $.post(
        url,
        data,
        function (msg) {
            if (msg['status'] === 'success') {
                $('.table-dark').prepend("<div class='alert alert-success'>حذف با موفقیت انجام شد </div>");
            }
            window.location.reload();
        }
    )

}

function notDelete(itemHide) {
    $(itemHide).fadeOut();
    ajaxEnd()
}

function addError(input) {
    input.removeClass('success-form');
    input.addClass('error-form');
}

function addSuccess(input) {
    input.removeClass('error-form');
    input.addClass('success-form');
}

function checkPassword() {
    let password = $("input[name='password']");

    let lengthPassword = password.val().length;

    if (lengthPassword < 6 || lengthPassword > 12) {
        addError(password);
        password.closest('div').find("p").text("رمز عبور باید حداقل 6 و حداکثر 12 کاراکتر باشد ");
        return true;
    } else {
        addSuccess(password);
        password.closest('div').find("p").text("");
        return false;
    }

}

function validate(paramsForm = [], requireForm = {}, messageForm = {}) {
    let valInput;
    for (let i = 0; i < paramsForm.length; i++) {
        let input = $("input[name='" + paramsForm[i] + "']");
        valInput = input.val();

        for (let p = 0; p < paramsForm.length; p++) {
            let inp = $("input[name='" + paramsForm[p] + "']");
            let elemError = inp.closest('div').find('p');
            if (inp.hasClass('error-form')) {
                elemError.text(messageForm[paramsForm[p]]);
            } else {
                elemError.text('');
            }
        }

        if (requireForm[paramsForm[i]] !== 'required') {
            if (typeof requireForm[paramsForm[i]] === "number") {

                if (valInput.trim() === '' || valInput.length !== requireForm[paramsForm[i]]) {
                    addError(input);
                } else {
                    addSuccess(input);
                }
            }
        } else {
            if (valInput.trim() === '') {
                addError(input);
            } else {
                addSuccess(input);
            }
        }
    }

    return !$("input").hasClass('error-form');
}

$('input').change(function () {
    checkPassword();
    checkForm();
})

function checkForm() {
    let paramsForm = [
        'name',
        'lastName',
        'mobile',
        'nationalCode',
        'birthDate',
        ''

    ];
    let requireForm = {
        'name': 'required',
        'lastName': 'required',
        'mobile': 11,
        'nationalCode': 10,
        'birthDate': 'required',
        '': ''
    };
    let messageForm = {
        'name': 'لطفا  نام را وارد کنید',
        'lastName': 'لطفا  نام خانوادگی را وارد کنید',
        'mobile': 'لطفا  موبایل را وارد کنید',
        'nationalCode': 'لطفا  کد ملی را وارد کنید',
        'birthDate': 'لطفا  تاریخ تولد را وارد کنید',
        '': ''
    };
    checkPassword();
    return validate(paramsForm, requireForm, messageForm);
}

function submitForm() {
    if (checkForm() && checkPassword) {
        $('#registerForm').submit();
    } else {

    }
}

function submitFormLogin() {
    let paramsForm = [
        'nationalCode',
        ''
    ];
    let requireForm = {
        'nationalCode': 10,
    };
    let messageForm = {
        'nationalCode': 'لطفا  کد ملی را وارد کنید',
    };

    if (validate(paramsForm, requireForm, messageForm)) {
        $('#registerForm').submit();
    }
}

$('document').ready(function () {
    $('input[type="text"], input[type="email"], textarea').focus(function () {
        var background = $(this).attr('id');
        $('#' + background + '-form').addClass('formgroup-active');
        $('#' + background + '-form').removeClass('formgroup-error');
    });
    $('input[type="text"], input[type="email"], textarea').blur(function () {
        var background = $(this).attr('id');
        $('#' + background + '-form').removeClass('formgroup-active');
    });

    function errorfield(field) {
        $(field).addClass('formgroup-error');
        console.log(field);
    }

    $("#waterform").submit(function () {
        var stopsubmit = false;

        if ($('#name').val() == "") {
            errorfield('#name-form');
            stopsubmit = true;
        }
        if ($('#email').val() == "") {
            errorfield('#email-form');
            stopsubmit = true;
        }
        if (stopsubmit) return false;
    });

});
