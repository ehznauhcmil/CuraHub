const element = document.getElementById("list-item");
let isSelected = false;

element.addEventListener("click", () => {
  isSelected = !isSelected; // Toggle the selected state
  if (isSelected) {
    element.style.backgroundColor = rgba(255, 255, 255, 0.7);
  } else {
    element.style.backgroundColor = rgba(255, 255, 255, 0.5); // Or your original color
  }
});
