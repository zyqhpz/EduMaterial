const overlay = document.querySelector(".overlay");
const modal = document.querySelector(".modal-container");
const modalTrigger = document.querySelectorAll(".modal-trigger");
const modalClose = document.querySelectorAll(".close");

showModal = () => {
modal.style.transform = "scale(1)";
overlay.setAttribute("style", "opacity: 1; pointer-events: all;");
};

hideModal = () => {
modal.style.transform = "scale(0)";
overlay.setAttribute("style", "opacity: 0; pointer-events: none;");
};

modalTrigger.forEach((element) => {
element.addEventListener("click", showModal);
});

modalClose.forEach((el) => {
el.addEventListener("click", hideModal);
});