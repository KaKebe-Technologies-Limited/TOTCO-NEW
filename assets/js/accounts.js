const model = {};
const loginBtn = document.getElementById('loginBtn');
const msg = document.getElementById('msg');
const user_name = document.getElementById('user_name');
const password = document.getElementById('password');

function login(event) {
    if (event && event.keyCode == 13) 
    {
        event.preventDefault();
    }
    msg.innerHTML = '';

    model.Username = user_name.value;
    model.Password = password.value;

    loginBtn.innerHTML = 'Logging you in <span class="spinner-border spinner-border-sm" role="status"></span>';

}

if (loginBtn !== null) {
    window.addEventListener('keydown', (e) => {
        if (e.key === "Enter") {
            login(e);
        }
    })
    loginBtn.addEventListener('click', (e) => { login(e); });
}

