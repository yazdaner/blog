
function myFunction(x) {
    x.classList.toggle("change");
  }




  let button = document.querySelector('.btn_popup');
let button2 = document.querySelector('.popup_chat_box');

// Add class to the element
button.addEventListener('click', function() {
  button.classList.toggle('active');
  button2.classList.toggle('active');
  button2.classList.toggle('pending');
  button2.classList.toggle('lauch');
});


document.addEventListener("alpine:init", () => {
  Alpine.data("toggleSidebar", () => ({
    open: false,

    toggle() {
      this.open = !this.open;
    },
  })),
    Alpine.data("toggleSubmenu", () => ({
      open: false,

      toggle() {
        this.open = !this.open;
      },
    }));
});


window.onload = function () {
  document.querySelector('.loading').remove();
}























