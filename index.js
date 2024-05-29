let currentColorSelection = document.getElementById("current-color-selection");
let targetColorSelection = document.getElementById("target-color-selection");
let currentCar = document.getElementById("current-car-image");
let targetCar = document.getElementById("target-car-image");

currentColorSelection.addEventListener("change", function () {
  let selectedColor = currentColorSelection.value;
  let imagePath = "assets/Default Car.png";

  if (selectedColor !== "empty") {
    imagePath = "assets/" + selectedColor + " Car.png";
  }

  currentCar.src = imagePath;
});
targetColorSelection.addEventListener("change", function () {
  let selectedColor = targetColorSelection.value;
  let imagePath = "assets/Default Car.png";

  if (selectedColor !== "empty") {
    imagePath = "assets/" + selectedColor + " Car.png";
  }

  targetCar.src = imagePath;
});
