function login(e){
    let email = document.getElementById('email').value;
    if(email.length == 0){
        e.preventDefault();
        window.alert("Enter email address");
    }
}

let submit = document.getElementById('login');
submit.addEventListener('click', login);
