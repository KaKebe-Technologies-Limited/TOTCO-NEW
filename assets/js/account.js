const url = window.location.origin;

const model = {};
const loginBtn = document.getElementById('loginBtn');
const verifyOTPBtn = document.getElementById('verifyOTPBtn');
const unlockBtn = document.getElementById('unlockBtn');
const regBtn = document.getElementById('regBtn');
const interimRegBtn = document.getElementById('interimRegBtn');
const actiateBtn = document.getElementById('actiateBtn');
const sendEmailBtn = document.getElementById('sendEmailBtn');
const resetBtn = document.getElementById('resetBtn');
const getOTP = document.getElementById('getOTP');
const cancelOTP = document.getElementById('cancelOTP');
const verifyBtn = document.getElementById('verifyBtn');
const businessAccountBtn = document.getElementById('businessAccountBtn');
const collectionAccountBtn = document.getElementById('collectionAccountBtn');
const show_password = document.getElementsByClassName('show_password')[0];

const businessUserRpSelections = document.querySelectorAll('[data-choosen-id]');
const accountsCard = document.querySelectorAll('.accounts');

const msg = document.getElementById('msg');
const email = document.getElementById('email');
const password = document.getElementById('password');
var originalVerifHTML = '';
if (verifyOTPBtn) {
    originalVerifHTML = verifyOTPBtn.innerHTML;
}

const showMessage = (type, message) => {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 10000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon: type ?? 'success',
        title: message
    })


    let d = `
    <div class="alert alert-${type} alert-dismissible fade show" role="alert">
        <div class="alert-text">${message}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>`;

    return '';
}

if (loginBtn !== null) {
    window.addEventListener('keydown', (e) => {
        if (e.key === "Enter") {
            login(e);
        }
    })
    loginBtn.addEventListener('click', (e) => { login(e); });
}

if (getOTP) {
    window.addEventListener('keydown', (e) => {
        if (e.key === "Enter") {
            checkWithOTP(e);
        }
    })
    getOTP.addEventListener('click', (e) => { checkWithOTP(e); });
}

if (unlockBtn !== null) {
    window.addEventListener('keydown', (e) => {
        if (e.key === "Enter") {
            unlocking(e);
        }

    });
    unlockBtn.addEventListener('click', (e) => { unlocking(e); });
}

if (regBtn !== null) {
    window.addEventListener('keydown', (e) => {
        if (e.key === "Enter") {
            checkWithOTP(e);
        }

    });
    regBtn.addEventListener('click', (event) => { checkWithOTP(event); });
}

if (interimRegBtn !== null) {
    window.addEventListener('keydown', (e) => {
        if (e.key === "Enter") {
            registering(e);
        }

    });
    interimRegBtn.addEventListener('click', (event) => { registering(event); });
}

if (businessAccountBtn !== null) {
    businessAccountBtn.addEventListener('click', (event) => { selectAccountType(businessAccountBtn); });
}


if (businessUserRpSelections.length) {
    for (var i = 0; i < businessUserRpSelections.length; i++) {
        businessUserRpSelections[i].addEventListener('click', (event) => {
            selectBusiness(event.currentTarget);
        });
    }
}
if (accountsCard.length) {
    for (var i = 0; i < accountsCard.length; i++) {
        accountsCard[i].addEventListener('click', (event) => {
            var cardDiv = event.currentTarget.querySelector(".card-body");
            cardDiv = cardDiv.querySelector(".justify-content-center");
            cardDiv = cardDiv.querySelector(".align-self-center");

            var spanChild = cardDiv.querySelector('.thumb-md');
            selectBusiness(spanChild);
        });
    }
}

if (collectionAccountBtn !== null) {
    collectionAccountBtn.addEventListener('click', (event) => { selectAccountType(collectionAccountBtn); });
}

if (actiateBtn !== null) {
    window.addEventListener('keydown', (e) => {
        if (e.key === "Enter") {
            activating(e);
        }

    });
    actiateBtn.addEventListener('click', (event) => { activating(event); });
}

if (sendEmailBtn !== null) {
    window.addEventListener('keydown', (e) => {
        if (e.key === "Enter") {
            sendEmailToReset(e);
        }

    });
    sendEmailBtn.addEventListener('click', (event) => { sendEmailToReset(event); });
}

if (resetBtn !== null) {
    window.addEventListener('keydown', (e) => {
        if (e.key === "Enter") {
            resetPassword(e);
        }

    });
    resetBtn.addEventListener('click', (event) => { resetPassword(event); });
}

if (cancelOTP) {
    cancelOTP.addEventListener('clik', () => {
        regBtn.innerHTML = 'Register';
        document.getElementById('otpForm').setAttribute('hidden', 'hidden');
        document.getElementById('regForm').removeAttribute('hidden');
    });
}

function login(event) {
    if (event && event.keyCode == 13) //if this is enter key
    {
        event.preventDefault();
    }
    msg.innerHTML = '';

    model.Email = email.value;
    model.Password = password.value;

    let originalHtml = loginBtn.innerHTML;
    loginBtn.setAttribute('disabled', 'disabled');

    loginBtn.innerHTML = 'Logging you in <span class="spinner-border spinner-border-sm" role="status"></span>';

    fetch(`${url}/account/signin`, {
        method: 'post',
        mode: "cors",
        cache: "no-cache",
        credentials: "same-origin",
        headers: {
            "Content-Type": "application/json"
        },
        redirect: "follow",
        referrer: "no-referrer",
        body: JSON.stringify(model)
    })
        .then(result => result.json())
        .then(response => {
            loginBtn.removeAttribute('disabled');

            loginBtn.innerHTML = originalHtml;

            if (response.code === -1) {
                msg.innerHTML = showMessage('warning', response.message);
                return;
            }

            msg.innerHTML = showMessage('success', 'Logging you in.');

            if (response.data) {
                window.location.href = `${url}/home`;
            } else {
                window.location.href = `${url}/chooseBusiness`;
            }

        })
        .catch(err => {
            loginBtn.innerHTML = originalHtml;
            loginBtn.removeAttribute('disabled');
            msg.innerHTML = showMessage('error', 'failed to login, something went wrong');
            console.log(err);
        });
}

function unlocking(e) {
    if (e && e.keyCode == 13) //if this is enter key
    {
        e.preventDefault();
    }

    msg.innerHTML = '';

    model.Password = password.value;

    let originalHtml = unlockBtn.innerHTML;
    unlockBtn.setAttribute('disabled', 'disabled');

    unlockBtn.innerHTML = 'Unlocking <div class="spinner-border spinner-border-sm" role="status"></div>';

    fetch(`${url}/`, {
        method: 'post',
        mode: "cors",
        cache: "no-cache",
        credentials: "same-origin",
        headers: {
            "Content-Type": "application/json"
        },
        redirect: "follow",
        referrer: "no-referrer",
        body: JSON.stringify(model)
    })
        .then(response => response.json())
        .then(result => {

            console.log({ result });

            unlockBtn.removeAttribute('disabled');
            unlockBtn.innerHTML = originalHtml;
            if (result.code === -1) {
                msg.innerHTML = showMessage('error', result.message);
                return;
            }
            msg.innerHTML = showMessage('success', result.message);
            console.log(result.data);
            window.location.href = result.data;

        })
        .catch(err => {
            unlockBtn.innerHTML = originalHtml;
            unlockBtn.removeAttribute('disabled');
            msg.innerHTML = showMessage('error', 'failed to unlock, something went wrong');
            console.log(err);
        });
}

function registering(e) {
    if (e && e.keyCode == 13) //if this is enter key
    {
        e.preventDefault();
    }
    //event.preventDefault();
    let originalHtml;
    if (regBtn) {
        document.getElementById('otpForm').setAttribute('hidden', 'hidden');
        document.getElementById('regForm').removeAttribute('hidden');
        originalHtml = regBtn.innerHTML;

        regBtn.innerHTML = 'Registering &nbsp; <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>';
        regBtn.setAttribute('disabled', 'disabled');
    }
    if (interimRegBtn) {
        originalHtml = interimRegBtn.innerHTML;
        interimRegBtn.innerHTML = 'Registering &nbsp; <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>';
        interimRegBtn.setAttribute('disabled', 'disabled');
    }

    msg.innerHTML = '';


    let name = document.getElementById('BusinessName');
    let number = document.getElementById('BusinessNumber');
    let repPassword = document.getElementById('RepPassword');

    model.EmailAddress = email.value;
    model.Password = password.value;
    model.RepPassword = repPassword.value;
    model.PhoneNumber = number.value;
    model.Name = name.value;

    var user_password = document.getElementById('user_password');
    if (user_password) {
        var _origin = document.getElementById('origin');
        model.user_password = user_password.value;
        model.origin = _origin.value;
    }

    fetch(`/account/add`, {
        method: 'post',
        mode: "cors",
        cache: "no-cache",
        credentials: "same-origin",
        headers: {
            "Content-Type": "application/json"
        },
        redirect: "follow",
        referrer: "no-referrer",
        body: JSON.stringify(model)
    })
        .then(response => response.json())
        .then(result => {
            if (regBtn) {
                regBtn.removeAttribute('disabled');
                regBtn.innerHTML = originalHtml;
            }
            if (interimRegBtn) {
                interimRegBtn.removeAttribute('disabled');
                interimRegBtn.innerHTML = originalHtml;
            }
            if (result.code === -1) {
                msg.innerHTML = showMessage('error', result.message);
                return;
            }
            msg.innerHTML = showMessage('success', result.message);

            window.location.href = `${window.location.origin}/business/dashboard`;
        })
        .catch(err => {
            console.error(err);
            if (regBtn) {
                regBtn.removeAttribute('disabled');
                regBtn.innerHTML = originalHtml;
            }
            if (interimRegBtn) {
                interimRegBtn.removeAttribute('disabled');
                interimRegBtn.innerHTML = originalHtml;
            }

            msg.innerHTML = showMessage('error', 'failed to data, something went wrong');

        });
}

function activating(event) {

    event.preventDefault();
    msg.innerHTML = '';
    const initBtnContent = actiateBtn.innerHTML;
    actiateBtn.innerHTML = 'Activating &nbsp; <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>';
    actiateBtn.setAttribute('disabled', 'disabled');

    const model = $('#activateForm').serialize();

    fetch(`${url}/account/updatepassword?${model}`)
        .then(response => response.json())
        .then(result => {
            actiateBtn.removeAttribute('disabled');
            actiateBtn.innerHTML = initBtnContent;

            if (result.code === -1) {
                msg.innerHTML = showMessage('error', result.message);
                return;
            }
            msg.innerHTML = showMessage('success', result.message);

            setInterval(function () { window.location.href = `${url}/home`; }, 2000);


        })
        .catch(err => {
            console.error(err);
            actiateBtn.removeAttribute('disabled');
            actiateBtn.innerHTML = initBtnContent;
            msg.innerHTML = showMessage('error', 'failed to activate your account, something went wrong');

        });


}

function sendEmailToReset(event) {
    if (event && event.keyCode == 13) //if this is enter key
    {
        event.preventDefault();
    }
    event.preventDefault();
    msg.innerHTML = '';

    let originalHtml = sendEmailBtn.innerHTML;
    sendEmailBtn.setAttribute('disabled', 'disabled');

    sendEmailBtn.innerHTML = 'Sending email <div class="spinner-border spinner-border-sm" role="status"></div>';

    fetch(`${url}/account/sendemailforreset?email=${email.value}`)
        .then(response => response.json())
        .then(result => {
            sendEmailBtn.removeAttribute('disabled');
            sendEmailBtn.innerHTML = originalHtml;
            if (result.code === -1) {
                msg.innerHTML = showMessage('error', result.message);
                return;
            }
            msg.innerHTML = showMessage('success', result.message);
            email.value = '';
        })
        .catch(err => {
            sendEmailBtn.innerHTML = originalHtml;
            sendEmailBtn.removeAttribute('disabled');
            msg.innerHTML = showMessage('error', 'failed to send email, something went wrong');
            console.log(err);
        });
}

function resetPassword(event) {
    event.preventDefault();
    msg.innerHTML = '';
    const initBtnContent = resetBtn.innerHTML;
    resetBtn.innerHTML = 'Reseting &nbsp; <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>';
    resetBtn.setAttribute('disabled', 'disabled');

    const model = $('#resetForm').serialize();
    console.log(model);
    fetch(`${url}/account/updatepassword?${model}`)
        .then(response => response.json())
        .then(result => {
            resetBtn.removeAttribute('disabled');
            resetBtn.innerHTML = initBtnContent;

            if (result.code === -1) {
                msg.innerHTML = showMessage('error', result.message);
                return;
            }
            msg.innerHTML = showMessage('success', result.message);

            setInterval(function () { window.location.href = `${url}/`; }, 2000);


        })
        .catch(err => {
            console.error(err);
            resetBtn.removeAttribute('disabled');
            resetBtn.innerHTML = initBtnContent;
            msg.innerHTML = showMessage('error', 'failed to reset password your account, something went wrong');

        });


}

function checkWithOTP(event) {
    event.preventDefault();

    msg.innerHTML = '';

    let originalHtml = regBtn.innerHTML;
    regBtn.innerHTML = 'Registering &nbsp; <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>';
    regBtn.setAttribute('disabled', 'disabled');

    let name = document.getElementById('BusinessName');
    let number = document.getElementById('BusinessNumber');
    let repPassword = document.getElementById('RepPassword');

    model.EmailAddress = email.value;
    model.Password = password.value;
    model.RepPassword = repPassword.value;
    model.PhoneNumber = number.value;
    model.Name = name.value;

    fetch(`/account/Check`, {
        method: 'post',
        mode: "cors",
        cache: "no-cache",
        credentials: "same-origin",
        headers: {
            "Content-Type": "application/json"
        },
        redirect: "follow",
        referrer: "no-referrer",
        body: JSON.stringify(model)
    })
        .then(response => response.json())
        .then(result => {
            regBtn.removeAttribute('disabled');
            regBtn.innerHTML = originalHtml;

            if (result.code === -1) {
                msg.innerHTML = showMessage('error', result.message);
                return;
            }

            document.getElementById('regForm').setAttribute('hidden', 'hidden');
            document.getElementById('otpForm').removeAttribute('hidden');


            otp('');

        })
        .catch(err => {
            console.error(err);
            regBtn.removeAttribute('disabled');
            regBtn.innerHTML = originalHtml;
            msg.innerHTML = showMessage('error', 'failed to unlock, something went wrong');

        });

}

function selectAccountType(btn) {
    msg.innerHTML = '';

    var originalHtml = btn.innerHTML;

    btn.setAttribute('disabled', 'disabled');
    btn.innerHTML = `<span class="spinner-border spinner-border-sm font-24 align-self-center text-muted" role="status"></span>`;

    var accountType = btn.getAttribute('data-type');
    fetch(`${url}/account/ChooseAccountTypes?accountType=${accountType}`)
        .then(result => result.json())
        .then(response => {
            btn.removeAttribute('disabled');

            btn.innerHTML = originalHtml;

            if (response.code === -1) {
                msg.innerHTML = showMessage('warning', response.message);
                return;
            }

            msg.innerHTML = showMessage('success', 'Logging you in.');

            window.location.href = `${url}/${response.data}`;

        })
        .catch(err => {
            btn.innerHTML = originalHtml;
            btn.removeAttribute('disabled');
            msg.innerHTML = showMessage('error', 'failed to login, something went wrong');
            console.log(err);
        });
}

function selectBusiness(btn) {

    msg.innerHTML = '';

    var originalHtml = btn.innerHTML;

    btn.setAttribute('disabled', 'disabled');
    btn.innerHTML = `<span class="spinner-border spinner-border-sm font-24 align-self-center text-muted" role="status"></span>`;

    var selectedbusiness = btn.getAttribute('data-choosen-id');
    fetch(`${url}/account/choosebusiness?selectedbusiness=${selectedbusiness}`)
        .then(result => result.json())
        .then(response => {
            btn.removeAttribute('disabled');

            btn.innerHTML = originalHtml;

            if (response.code === -1) {
                msg.innerHTML = showMessage('warning', response.message);
                return;
            }

            msg.innerHTML = showMessage('success', response.message);

            window.location.href = `${url}/${response.data}`;

        })
        .catch(err => {
            btn.innerHTML = originalHtml;
            btn.removeAttribute('disabled');
            msg.innerHTML = showMessage('error', 'failed to login, something went wrong');
            console.log(err);
        });
}

if (show_password) {
    show_password.addEventListener('click', () => {
        if (password) {
            if (password.type == 'text') {
                password.type = 'password';
                show_password.innerHTML = '<i class="far fa-eye" style="margin-right: 0.12rem;margin-top: 0.18rem;"></i>';
                return;
            }
            if (password.type == 'password') {
                password.type = 'text';
                show_password.innerHTML = '<i class="far fa-eye-slash" style="margin-right: 0.12rem;margin-top: 0.18rem;"></i>';
                return;
            }
        }
    });
}

function otp(code) {
    var pin_error_msg = document.getElementById('pin_error_msg');
    (async () => {
        const options = {
            method: 'POST',
            body: null,
        };

        var myModal = new bootstrap.Modal(document.getElementById('otp_modal'), {
            keyboard: false
        })

        getOTP.innerHTML = 'Sending ...';
        const result = await fetch(`${window.location.origin}/interim/SendOtp?code=${code}`, options)
            .then(response => response.json())
            .then(result => {
                return result;
            })
            .catch(err => {
                console.log(err);
                return {
                    code: -2,
                    message: 'OTP has failed. Contact support.',
                    data: false
                };
            });


        if (result.code === -2) {
            verifyOTPBtn.removeAttribute('disabled');
            verifyOTPBtn.innerHTML = originalVerifHTML;
            msg.innerHTML = showMessage('error', result.message);
        }
        if (result.code === -3) {
            verifyOTPBtn.removeAttribute('disabled');
            verifyOTPBtn.innerHTML = originalVerifHTML;
            msg.innerHTML = showMessage('warning', result.message);
        }
        if (result.code === -1) {
            verifyOTPBtn.removeAttribute('disabled');
            verifyOTPBtn.innerHTML = originalVerifHTML;
            pin_error_msg.innerHTML = showMessage('warning', result.message);
        }
        if (result.code === 0) {
            msg.innerHTML = showMessage('success', result.message);
            getOTP.innerHTML = 'Request code';

            myModal.show();
        }
        if (result.code === 1) {

            //$('#otp_modal').modal('toggle');
            myModal.toggle();

            registering(null);
        }

    })()
}

$('#otp_input').pincodeInput({

    // 4 input boxes = code of 4 digits long
    inputs: 4,

    // hide digits like password input
    hideDigits: true,

    // keyDown callback
    keydown: function (e) { },

    // callback on every input on change (keyup event)
    change: function (input, value, inputnumber) {
        //input = the input textbox DOM element
        //value = the value entered by user (or removed)
        //inputnumber = the position of the input box (in touch mode we only have 1 big input box, so always 1 is returned here)
    },

    // callback when all inputs are filled in (keyup event)
    complete: function (value, e, errorElement) {
        // value = the entered code
        // e = last keyup event
        // errorElement = error span next to to this, fill with html
        //$(errorElement).html("Code not correct");
        console.log(errorElement);


        verifyOTPBtn.setAttribute('disabled', 'disabled');
        verifyOTPBtn.innerHTML = 'Verifying <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>';

        otp(value);
    }

});

function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    var refreshId = setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            $('#re_send_otp').removeAttr('disabled');
            clearInterval(refreshId);
        }
    }, 1000);
}
$('#re_send_otp').click(() => {
    $('#otp_input').val('');

    otp('');

    verifyOTPBtn.innerHTML = 'Verify';
    verifyOTPBtn.removeAttribute('disabled');

    var fiveMinutes = 60 * 2;

    display = document.querySelector('#timer');

    startTimer(fiveMinutes, display);
});