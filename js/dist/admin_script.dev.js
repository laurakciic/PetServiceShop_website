"use strict";

var logoutForm = document.querySelector('.header');

document.querySelector('#logout-btn').onclick = function () {
  logoutForm.classList.toggle('active');
  navbar.classList.remove('active');
};

var navbar = document.querySelector('.header .navbar');

document.querySelector('#menu-btn').onclick = function () {
  navbar.classList.toggle('active');
  logoutForm.classList.remove('active');
};

window.onscroll = function () {
  logoutForm.classList.remove('active');
  navbar.classList.remove('active');
  document.querySelector('.header').classList.add('active');
};

window.onload = function () {
  document.querySelector('.header').classList.add('active');
};