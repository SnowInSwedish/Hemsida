// Global variables
var mousePos = { x: 0, y: 0 };
var isMouseDown = false;
var clickCount = 0;
var maxClickCount = 0;
var maxClickCountPosition = { x: 0, y: 0 };

// Function to update mouse position
function updateMousePosition(event) {
    mousePos.x = event.clientX;
    mousePos.y = event.clientY;
}

// Function to handle mouse click
function handleMouseClick(event) {
    clickCount++;
    if (clickCount > maxClickCount) {
        maxClickCount = clickCount;
        maxClickCountPosition.x = event.clientX;
        maxClickCountPosition.y = event.clientY;
    }
}

// Event listener for mouse move
document.addEventListener('mousemove', function(event) {
    updateMousePosition(event);
    // Additional tracking logic can be added here
});

// Event listener for mouse down
document.addEventListener('mousedown', function(event) {
    isMouseDown = true;
    handleMouseClick(event);
});

// Event listener for mouse up
document.addEventListener('mouseup', function() {
    isMouseDown = false;
});

// Example usage of the variables
console.log('Current mouse position:', mousePos);
console.log('Is mouse down:', isMouseDown);
console.log('Total click count:', clickCount);
console.log('Max click count:', maxClickCount);
console.log('Position of max click count:', maxClickCountPosition);

