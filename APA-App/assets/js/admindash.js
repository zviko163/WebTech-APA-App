document.addEventListener('DOMContentLoaded', () => {
    fetchMatches(); // Fetch matches when the page is loaded

    // Fetch and render matches
    function fetchMatches() {
        fetch('../../actions/fetch_matches.php')
            .then(response => response.json())
            .then(data => {
                // console.log("Data response:", data); // Debug log
                if (data.success) {
                    renderMatches(data.matches);
                } else {
                    alert('Failed to fetch matches.');
                }
            });
    }

    // Render matches into the table
    function renderMatches(matches) {
        const tableBody = document.getElementById('matches-body');
        tableBody.innerHTML = ''; // Clear table content
    
        matches.forEach((match, index) => {
            const row = `
                <tr id="match-${match.match_id}">
                    <td>${index + 1}</td>
                    <td>${match.challenger} vs ${match.challenged}</td>
                    <td>${match.schedule_date}</td>
                    <td>
                        <select class="form-select winner-dropdown" 
                            data-match-id="${match.match_id}" 
                            data-challenger-id="${match.challenger_id}" 
                            data-challenged-id="${match.challenged_id}">
                            <option value="">Select Winner</option>
                            <option value="challenger">${match.challenger}</option>
                            <option value="challenged">${match.challenged}</option>
                        </select>
                    </td>
                </tr>
            `;
            tableBody.insertAdjacentHTML('beforeend', row);
        });
    
        attachDropdownListeners(); // Attach event listeners to the dropdowns
    }
    

    // Attach event listeners to dropdowns
    function attachDropdownListeners() {
        document.querySelectorAll('.winner-dropdown').forEach(dropdown => {
            dropdown.addEventListener('change', function () {
                const matchId = this.dataset.matchId;
                // console.log("dataset ", this.dataset); // Debug log
                const winnerId = this.value === 'challenger' 
                ? this.dataset.challengerId 
                : this.dataset.challengedId;
            


                    // Check if winnerId is properly set
                    if (!winnerId) {
                        console.warn("Winner ID is not set correctly.");
                    }

                    console.log("Selected Winner ID:", winnerId); 
                declareWinner(matchId, winnerId); // Pass the matchId and winnerId to declareWinner
            });
        });
    }

    // Declare the winner
    function declareWinner(matchId, winnerId) {
        console.log("Sending data:", { match_id: matchId, winner_id: winnerId }); // Debug log
        
        fetch('../../actions/declare_winner.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ match_id: matchId, winner_id: winnerId })
        })
        .then(response => response.json())
        .then(data => {
            console.log("Server response:", data); // Debug log
        
            if (data.success) {
                alert('Winner declared successfully!');
                document.getElementById(`match-${matchId}`).remove(); // Remove the row dynamically from the table
            } else {
                alert('Failed to declare winner: ' + data.error);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An unexpected error occurred.');
        });
    }


    fetchDashboardData(); // Fetch dashboard data when the page is loaded

    // Function to fetch the dashboard data
    function fetchDashboardData() {
        fetch('../../actions/admindash_data.php')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log("Data response:", data); // Debug log
                    // Update Welcome section with Admin's username
                    document.querySelector('.welcome-section h3').textContent = `Welcome, Admin ${data.admin_username}`;
                    
                    // Update Statistics section with total and pending events
                    document.querySelector('.statistics-section .total-users').textContent = data.total_users;
                    document.querySelector('.statistics-section .total-events').textContent = data.total_events;
                    document.querySelector('.statistics-section .pending-events').textContent = data.pending_events;
                    console.log("total events: ", data.total_events, "pending :", data.pending_events); // Debug log
                } else {
                    alert('Failed to fetch dashboard data: ' + data.error);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An unexpected error occurred while fetching data.');
            });
    }
    
});
