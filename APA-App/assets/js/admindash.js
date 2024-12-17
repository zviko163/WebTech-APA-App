document.addEventListener('DOMContentLoaded', () => {
    fetchMatches();

    // Fetch and render matches
    function fetchMatches() {
        fetch('../../actions/fetch_matches.php')
            .then(response => response.json())
            .then(data => {
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
                    <td>${match.challenger}</td>
                    <td>${match.challenged}</td>
                    <td>${match.schedule_date}</td>
                    <td>
                        <select class="form-select winner-dropdown" data-match-id="${match.match_id}">
                            <option value="">Select Winner</option>
                            <option value="challenger">${match.challenger}</option>
                            <option value="challenged">${match.challenged}</option>
                        </select>
                    </td>
                </tr>
            `;
            tableBody.insertAdjacentHTML('beforeend', row);
        });

        attachDropdownListeners();
    }

    // Attach event listeners to dropdowns
    function attachDropdownListeners() {
        document.querySelectorAll('.winner-dropdown').forEach(dropdown => {
            dropdown.addEventListener('change', function () {
                const matchId = this.dataset.matchId;
                const winnerId = this.value === 'challenger' ? this.dataset.challengerId : this.dataset.challengedId;
                declareWinner(matchId, winnerId);
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
                document.getElementById(`match-${matchId}`).remove(); // Remove row dynamically
            } else {
                alert('Failed to declare winner: ' + data.error);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An unexpected error occurred.');
        });
    }
    
});
