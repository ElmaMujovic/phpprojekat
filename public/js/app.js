// // hamburger = document.querySelector(".hamburger");
// // hamburger.onclick = function(){
// //     navBar = document.querySelector(".nav-bar");
// //     navBar.classList.toggle("active");
// // }
// const hamburger = document.querySelector(".hamburger");
// const navLinks = document.querySelector(".nav-links");
// const links = document.querySelectorAll(".nav-links li");

// hamburger.addEventListener("click", () => {
//   navLinks.classList.toggle("open");
//   links.forEach((link) => {
//     link.classList.toggle("fade");
//   });
// });

const hamburger = document.querySelector('.header1 .nav-bar .nav-list .hamburger');
const mobile_menu = document.querySelector('.header1 .nav-bar .nav-list ul');
const menu_item = document.querySelectorAll('.header1 .nav-bar .nav-list ul li a');
const header = document.querySelector('.header1.container');

hamburger.addEventListener('click', () => {
	hamburger.classList.toggle('active');
	mobile_menu.classList.toggle('active');
});

document.addEventListener('scroll', () => {
	var scroll_position = window.scrollY;
	if (scroll_position > 250) {
		header.style.backgroundColor = '#29323c';
	} else {
		header.style.backgroundColor = 'transparent';
	}
});

menu_item.forEach((item) => {
	item.addEventListener('click', () => {
		hamburger.classList.toggle('active');
		mobile_menu.classList.toggle('active');
	});
});

