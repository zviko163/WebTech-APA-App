window.saveEvent = function () {
    // Collect form input values
    const eventData = {
        name: document.getElementById('eventName').value,
        venue: document.getElementById('eventVenue').value,
        date: document.getElementById('eventDate').value,
        description: document.getElementById('eventDescription').value,
        capacity: document.getElementById('eventCapacity').value,
        prize: document.getElementById('eventPrize').value
    };

    // Send data to the server
    fetch('../../actions/create_event.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(eventData) 
    })
    .then(response => response.json()) 
    .then(data => {
        const responseElement = document.getElementById('response');

        if (data.success) {
            responseElement.textContent = data.success; // Success message
            responseElement.style.color = 'green';
        } else {
            responseElement.textContent = data.error; // Error message
            responseElement.style.color = 'red';
        }
    })
    .catch(error => {
        console.error('Error saving event:', error);
        const responseElement = document.getElementById('response');
        responseElement.textContent = 'An unexpected error occurred.';
        responseElement.style.color = 'red';
    });
};
