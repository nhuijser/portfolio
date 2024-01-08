function flashingText(element, color, color2) {
  const elementSelected = document.getElementById(element);

  if (elementSelected.style.color == color) {
    elementSelected.style.color = color2;
  } else {
    elementSelected.style.color = color;
  }
}

setInterval(function () {
  flashingText("click-here-text", "white", "#6d63f7");
  flashingText("hey-text", "white", "#6d63f7");
}, 750);
