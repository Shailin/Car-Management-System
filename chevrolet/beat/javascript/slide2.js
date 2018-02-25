var sIndex = 1;
sSlides(sIndex);

function pSlides(n) {
  sSlides(sIndex += n);
}

function cSlide(n) {
  sSlides(sIndex = n);
}

function sSlides(n) {
  var i;
  var s = document.getElementsByClassName("mySli");
  if (n > s.length) {sIndex = 1}
  if (n < 1) {sIndex = s.length}
  for (i = 0; i < s.length; i++) {
      s[i].style.display = "none";
  }
  s[sIndex-1].style.display = "block";
  d[sIndex-1].cl;
}