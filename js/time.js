//Akith Perera IT23551152
function updateClock() {
    var now = new Date();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();

    // Format time as HH:MM:SS
    if (hours < 10) hours = '0' + hours;
    if (minutes < 10) minutes = '0' + minutes;
    if (seconds < 10) seconds = '0' + seconds;

    var currentTime = hours + ':' + minutes + ':' + seconds;
    
    // Display the time
    document.getElementById('clock').textContent = currentTime;
}

// Update the clock every second
setInterval(updateClock, 1000);

// Call the function immediately
updateClock();

