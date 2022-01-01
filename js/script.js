let loginForm = document.querySelector('.header .login-form');

document.querySelector('#login-btn').onclick = () =>{
    loginForm.classList.toggle('active');
    navbar.classList.remove('active');
}

let navbar = document.querySelector('.header .navbar');

document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
    loginForm.classList.remove('active');
}


window.onscroll = () =>{
    loginForm.classList.remove('active');
    navbar.classList.remove('active');

    document.querySelector('.header').classList.add('active');

    // if(window.scrollY > 0){
    //     document.querySelector('.header').classList.add('active');
    // } else{
    //     document.querySelector('.header').classList.remove('active');
    // }
}

window.onload = () =>{

    document.querySelector('.header').classList.add('active');

    // if(window.scrollY > 0){
    //     document.querySelector('.header').classList.add('active');
    // } else{
    //     document.querySelector('.header').classList.remove('active');
    // }
}