
const hamburger = document.querySelector('.header1 .nav-bar .nav-list .hamburger');
const mobile_menu = document.querySelector('.header1 .nav-bar .nav-list ul');
const menu_item = document.querySelectorAll('.header1 .nav-bar .nav-list ul li a');
const header = document.querySelector('.header1.container');

hamburger.addEventListener('click', () => {
	hamburger.classList.toggle('active');
	mobile_menu.classList.toggle('active');
});

// document.addEventListener('scroll', () => {
// 	var scroll_position = window.scrollY;
// 	if (scroll_position > 250) {
// 		header.style.backgroundColor = '#29323c';
// 	} else {
// 		header.style.backgroundColor = 'transparent';
// 	}
// });

menu_item.forEach((item) => {
	item.addEventListener('click', () => {
		hamburger.classList.toggle('active');
		mobile_menu.classList.toggle('active');
	});
});


document.addEventListener('DOMContentLoaded', function() {
    var birthDateInput = document.getElementById('birthDate');
    var birthDateError = document.getElementById('birthDateError');

    birthDateInput.addEventListener('input', function() {
        var selectedDate = new Date(this.value);
        var selectedMonth = selectedDate.getMonth() + 1; // getMonth returns 0-based index

        if (selectedMonth < 1 || selectedMonth > 12) {
            birthDateError.style.display = 'block';
            this.setCustomValidity('Mesec mora biti između 1 i 12!');
        } else {
            birthDateError.style.display = 'none';
            this.setCustomValidity('');
        }
    });
});