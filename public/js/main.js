var slideIndexOne = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndexOne++;
  if (slideIndexOne > slides.length) {
    slideIndexOne = 1;
  }
  slides[slideIndexOne - 1].style.display = "block";
  setTimeout(showSlides, 5000); // Change image every 2 seconds
}

var slideIndexTwo = 1;
showDivs(slideIndexTwo);

function plusDivs(n) {
  showDivs(slideIndexTwo += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("my-slides-two-item");
  if (n > x.length) {slideIndexTwo = 1}
  if (n < 1) {slideIndexTwo = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  x[slideIndexTwo-1].style.display = "block";
}
