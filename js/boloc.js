// JavaScript to add functionality for the main button
document.getElementById("dropdownButton").addEventListener("click", function(event) {
    var dropdownContent = document.getElementById("dropdownContent");
    // Toggle class "show" to hide/show the dropdown
    dropdownContent.classList.toggle("show");
    event.stopPropagation(); // Prevent click from immediately propagating to document
});

// JavaScript to handle clicks on dropdown buttons
var buttons = document.querySelectorAll('.dropdown-item button');
buttons.forEach(function(button) {
    button.addEventListener('click', function(event) {
        this.classList.toggle('selected');
        event.stopPropagation(); // Prevent click from propagating to document
    });
});

// JavaScript to handle the "Clear" button click
document.getElementById("clearButton").addEventListener("click", function(event) {
    buttons.forEach(function(button) {
        button.classList.remove('selected');
    });
    event.stopPropagation(); // Prevent click from propagating to document
});

// JavaScript to handle the "Show Results" button click
document.getElementById("showResultButton").addEventListener("click", function(event) {
    var dropdownContent = document.getElementById("dropdownContent");
    dropdownContent.classList.remove("show");
    event.stopPropagation(); // Prevent click from propagating to document
});

// Close the dropdown if the click occurred outside of it
document.addEventListener("click", function(event) {
    var dropdownContent = document.getElementById("dropdownContent");
    if (!dropdownContent.contains(event.target) && !document.getElementById("dropdownButton").contains(event.target)) {
        dropdownContent.classList.remove("show");
    }
});
