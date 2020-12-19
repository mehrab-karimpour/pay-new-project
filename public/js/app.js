function addError(input) {
    input.addClass('error-form');
}

function addSuccess(input) {
    input.removeClass('error-form');
    input.addClass('success-form');
}

function validate(paramsForm, requireForm) {
    let valInput;
    for (let i = 0; i < paramsForm.length; i++) {
        let input = $("input[name='" + paramsForm[i] + "']");
        valInput = input.val();

        if (requireForm[paramsForm[i]] !== 'required') {
            if (typeof requireForm[paramsForm[i]] === "number") {
                if (valInput.trim() === '' || valInput.length !== requireForm[paramsForm[i]]) {
                    addError(input);
                } else {
                    addSuccess(input);
                }
            } else {
                let items = requireForm[paramsForm[i]].split("|");
                for (let j = 0; j < items.length; j++) {
                    let oneItem = items[j].split(":");
                    if (oneItem[0] === 'max') {
                        if (valInput.length > oneItem[1]) {
                            addError(input);
                        } else {
                            addSuccess(input);
                        }

                    } else if (oneItem[0] === 'min') {
                        if (valInput.length < oneItem[1]) {
                            addError(input);
                        } else {
                            addSuccess(input);
                        }
                    }
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
    checkForm();
})

function checkForm() {
    let paramsForm = [
        'name',
        'lastName',
        'mobile',
        'nationalCode',
        'birthDate',
        'password'
    ];
    let requireForm = {
        'name': 'required',
        'lastName': 'required',
        'mobile': 11,
        'nationalCode': 10,
        'birthDate': 'required',
        'password': 'max:12|min:6',
    }
    return validate(paramsForm, requireForm);
}

function submitForm() {
    if (checkForm()) {
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
