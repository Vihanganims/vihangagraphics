document.addEventListener("keydown", function(event) {
  if (event.keyCode == 123) { // F12 key code
    event.preventDefault(); // Prevent the default action (opening dev tools)
    // Optionally, you can add a message or perform other actions here.
    // For example, show a custom message:
    // alert("Developer tools are disabled for this page.");
  }
});