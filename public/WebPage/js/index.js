// // =================fader scroll=================

// const faders = document.querySelectorAll('.fade-in');
// const sliders = document.querySelectorAll('.slide-in');
// const appearOptions = {
//   threshold: 0,
// };
// const appearOnScroll = new IntersectionObserver(function(entries, appearOnScroll){
//   entries.forEach(entry => {
//     if(!entry.isIntersecting){
//       return;
//     } else{
//       entry.target.classList.add('appear');
//       appearOnScroll.unobserve(entry.target);
//     }
//   });
// }, appearOptions);

// faders.forEach(fader => {
//   appearOnScroll.observe(fader)
// });

// sliders.forEach(slider => {
//   appearOnScroll.observe(slider);
// });

// // =================active nav-link=================
// var active = document.getElementById("nav-active");
// var navLink = active.getElementsByClassName("nav-link");
// for (var i = 0; i < navLink.length; i++) {
//   navLink[i].addEventListener("click", function() {
//   var current = document.getElementsByClassName("active");
//   current[0].className = current[0].className.replace(" active", "");
//   this.className += " active";
//   });
// }

// // =================smooth scroll=================
// $(document).ready(function(){
//   // Add smooth scrolling to all links
//   $("a").on('click', function(event) {

//     // Make sure this.hash has a value before overriding default behavior
//     if (this.hash !== "") {
//         // Prevent default anchor click behavior
//         event.preventDefault();

//         // Store hash
//         var hash = this.hash;

//         // Using jQuery's animate() method to add smooth page scroll
//         // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
//         $('html, body').animate({
//             scrollTop: $(hash).offset().top
//         }, 1111, function(){
       
//         // Add hash (#) to URL when done scrolling (default click behavior)
//         window.location.hash = hash;
//         });
//     } // End if
//   });
// });

onst wrapper = document.querySelector('.wrapper')
let isMouseDown = false
let startX, scrollLeft

wrapper.addEventListener('mousedown', (e) => {
  isMouseDown = true
  startX = e.pageX - wrapper.offsetLeft
  scrollLeft = wrapper.scrollLeft
})

wrapper.addEventListener('mouseleave', () => {
  isMouseDown = false
})

wrapper.addEventListener('mouseup', () => {
  isMouseDown = false
})

wrapper.addEventListener('mousemove', (e) => {
  if (!isMouseDown) return

  const x = e.pageX - wrapper.offsetLeft
  // 3 là tốc độ scroll
  const walk = (x - startX) * 3
  wrapper.scrollLeft = scrollLeft - walk
})