document.addEventListener('DOMContentLoaded', function(){
    const form = document.getElementById('loginForm');
    const loginError = document.getElementById('login-error');

    document.getElementById('email').value = 'test@example.com';
    document.getElementById('password').value = 'password123';

    form.addEventListener('submit', function(e){
        e.preventDefault();

        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        if(email === 'test@example.com' && password === 'password123'){
            window.location.href ='dashboard.html';
        }else{
            loginError.style.display = 'block';
        }

    });
})