document.addEventListener('DOMContentLoaded', function() {
    const timeDifferenceHours = document.getElementById('timeDifferenceHours');
    const timeDifferenceMinutes = document.getElementById('timeDifferenceMinutes');
    const timeDifferenceSeconds = document.getElementById('timeDifferenceSeconds');

    function updateTimer() {
        // Get the current time
        const now = new Date();

        // Set the target time to 8:00 AM tomorrow
        const nextDay8AM = new Date();
        nextDay8AM.setDate(nextDay8AM.getDate() + 1);
        nextDay8AM.setHours(8, 0, 0, 0);

        // Calculate the time difference in milliseconds
        const timeDifference = nextDay8AM - now;

        // Convert milliseconds to hours, minutes, and seconds
        const hours = Math.floor(timeDifference / (1000 * 60 * 60));
        const minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

        // Display the time difference in the HTML
        timeDifferenceHours.textContent = `${hours}`;
        timeDifferenceMinutes.textContent = `${minutes}`;
        timeDifferenceSeconds.textContent = `${seconds}`;
    }

    // Call updateTimer initially
    updateTimer();

    // Update the timer every second
    setInterval(updateTimer, 1000);
});
