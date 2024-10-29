var searchForm = document.querySelector('.search-form');
        document.querySelector('#search-btn').onclick = function() {
            searchForm.classList.toggle('active');
            loginForm.classList.remove('active')
            shoppingCart.classList.remove('active')
            navbar.classList.remove('active')
        }

var shoppingCart = document.querySelector('.shopping-cart');
        document.querySelector('#cart-btn').onclick = function() {
            shoppingCart.classList.toggle('active');
            loginForm.classList.remove('active')
            searchForm.classList.remove('active')
            navbar.classList.remove('active')
        }

var loginForm = document.querySelector('.login-form');
        document.querySelector('#login-btn').onclick = function() {
            loginForm.classList.toggle('active');
            searchForm.classList.remove('active')
            shoppingCart.classList.remove('active')
            navbar.classList.remove('active')
        }

var navbar = document.querySelector('.navbar');
        document.querySelector('#menu-btn').onclick = function() {
            navbar.classList.toggle('active');
            loginForm.classList.remove('active')
            searchForm.classList.remove('active')
            shoppingCart.classList.remove('active')
           
        }
window.onscroll = () => {
    loginForm.classList.remove('active')
    searchForm.classList.remove('active')
    shoppingCart.classList.remove('active')
    navbar.classList.remove('active')
}

var swiper = new Swiper (".product-slider", {
loop:true,
spaceBetween: 20,
autoplay:{
    delay: 7500,
    disableOnInteraction: false,
},
breakpoints: {
0: {
slidesPerView: 1, 

},
768: {
slidesPerView: 2,

},
1020: {
slidesPerView: 3, 
},
},
});
