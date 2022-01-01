let logoutForm = document.querySelector('.header');

document.querySelector('#logout-btn').onclick = () =>{
    logoutForm.classList.toggle('active');
    navbar.classList.remove('active');
}

let navbar = document.querySelector('.header .navbar');

document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
    logoutForm.classList.remove('active');

}

window.onscroll = () =>{
    logoutForm.classList.remove('active');
    navbar.classList.remove('active');

    document.querySelector('.header').classList.add('active');
}

window.onload = () =>{

    document.querySelector('.header').classList.add('active');
}