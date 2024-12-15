
document.addEventListener('DOMContentLoaded', function() {

    // Fetch username
    fetch('../actions/get_username.php')
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        if (data.error) {
            console.error(data.error);
            return;
        }
        
        // Dynamically update the welcome message with the username
        const welcomeElement = document.getElementById('welcomeMessage');
        if (welcomeElement) {
            welcomeElement.textContent = `Welcome, ${data.username || 'Guest'}`;
        }
    })
    .catch(error => console.error('Error fetching username:', error));

    // Description: Script to fetch and display dashboard stats
    fetch('../actions/dashboard_stats.php')
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        if (data.error) {
            console.error(data.error);
            return;
        }
        document.getElementById('totalMatches').textContent = data.total_matches || 0;
        document.getElementById('winRate').textContent = `${data.win_rate || 0}%`;
    })
    .catch(error => console.error('Error fetching data:', error));

    // Description: Script to fetch and display upcoming matches
    fetch('../actions/get_upcoming_matches.php')
    .then(response => response.json())
    .then(data => {
        const matchesSection = document.querySelector('.upcoming-matches-container'); 
        matchesSection.innerHTML = ''; // Clear existing content

        data.forEach(match => {
            const matchCard = `
                <div class="challenge-card d-flex align-items-center justify-content-between p-3 shadow-sm">
                    <div class="d-flex align-items-center gap-3">
                        <div class="icon">
                            <svg width="24" height="24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="..." />
                            </svg>
                        </div>
                        <div>
                            <h6 class="mb-0">Match against ${match.opponent_name}</h6>
                            <p class="text-muted mb-0">Scheduled for ${new Date(match.schedule_date).toLocaleString()}</p>
                        </div>
                    </div>
                    <button class="btn btn-create view-details" 
                        data-time="${match.schedule_date}" 
                        data-opponent="${match.opponent_name}">
                        View Details
                    </button>
                </div>
            `;
            matchesSection.innerHTML += matchCard;
        });

        // Attach event listeners to "View Details" buttons
        document.querySelectorAll('.view-details').forEach(button => {
            button.addEventListener('click', function () {
                const popup = document.getElementById('matchDetailsPopup');
                const matchTime = new Date(this.dataset.time).toLocaleString();
                const opponentName = this.dataset.opponent;

                document.getElementById('matchTime').textContent = `Match with ${opponentName} is scheduled for ${matchTime}.`;
                popup.classList.remove('hidden'); // Show the popup
            });
        });
    })
    .catch(error => console.error('Error fetching upcoming matches:', error));

    // Fetching challenges
    fetch('../actions/get_challenges.php')
        .then(response => response.json())
        .then(data => {
            const challengesSection = document.querySelector('.challenges-section'); 
            challengesSection.innerHTML = '';

            data.forEach(challenge => {
                const challengeCard = `
                    <div class="challenge-card d-flex align-items-center justify-content-between p-3 shadow-sm">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon">
                                <svg width="24" height="24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="..." />
                                </svg>
                            </div>
                            <div>
                                <h6 class="mb-0">${challenge.challenger_name} challenged you to a match!</h6>
                                <p class="text-muted mb-0">Scheduled for ${new Date(challenge.schedule_date).toLocaleString()}</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2">
                            <button class="btn btn-approve" data-id="${challenge.match_id}">Approve</button>
                            <button class="btn btn-decline" data-id="${challenge.match_id}">Decline</button>
                        </div>
                    </div>
                `;
                challengesSection.innerHTML += challengeCard;
            });

            // Add event listeners for Approve and Decline buttons
            document.querySelectorAll('.btn-approve').forEach(button => {
                button.addEventListener('click', function () {
                    const matchId = this.dataset.id;
                    updateChallengeStatus(matchId, 'approve');
                });
            });

            document.querySelectorAll('.btn-decline').forEach(button => {
                button.addEventListener('click', function () {
                    const matchId = this.dataset.id;
                    updateChallengeStatus(matchId, 'decline');
                });
            });
        })
        .catch(error => console.error('Error fetching challenges:', error));

});

// Function to Approve or Decline a challenge
function updateChallengeStatus(matchId, action) {
    fetch('../actions/update_challenge_status.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `match_id=${matchId}&action=${action}`
    })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                alert('Challenge successfully ' + (action === 'approve' ? 'approved!' : 'declined!'));
                location.reload();
            } else {
                console.error(result.error || 'Failed to update challenge status');
            }
        })
        .catch(error => console.error('Error updating challenge status:', error));
}

// Handle popup close button
document.getElementById('closePopup').addEventListener('click', function () {
    const popup = document.getElementById('matchDetailsPopup');
    popup.classList.add('hidden'); // Hide the popup
});
