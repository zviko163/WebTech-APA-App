function setActiveTab(event, tabName) {
  // Remove the 'active' class from all tab links
  const tabs = document.querySelectorAll('.tab-link');
  tabs.forEach(tab => tab.classList.remove('active'));

  // Add the 'active' class to the clicked tab
  event.target.classList.add('active');

  // Hide all tab content
  const tabContents = document.querySelectorAll('.tab-content');
  tabContents.forEach(content => content.style.display = 'none');

  // Show the clicked tab's content
  document.getElementById(tabName).style.display = 'block';
}

function showEditForm(tabName) {
  const formId = `${tabName}-edit-form`;
  const form = document.getElementById(formId);
  // Toggle the form visibility
  if (form.style.display === 'none' || form.style.display === '') {
      form.style.display = 'block';
  } else {
      form.style.display = 'none';
  }
}

document.addEventListener("DOMContentLoaded", function () {
  const emailInput = document.getElementById('email');
  emailInput.innerHTML = `${email}`;
  const usenameInput = document.getElementById('username');
  usenameInput.innerHTML = `${username}`;

  const bioTab = document.getElementById('bio');
  const achievementsTab = document.getElementById('achievements');
  const clubAffiliationsTab = document.getElementById('club-affiliations');
  const profilePicHeader = document.getElementById('profilePicHeader'); 
  const profilePicMain = document.getElementById('profilePicMain'); 

  // Function to fetch profile data
  async function fetchProfileData() {
      try {
          const response = await fetch(`../actions/get_profile.php?user_id=${userId}`);
          const data = await response.json();
          
          if (data.error) {
              alert(data.error);
              return;
          }

          // Display Bio
          bioTab.innerHTML = `
              <p>${data.bio || "This is the bio section. You can update your personal information here."}</p>
              <button class="btn btn-outline-primary d-block mx-auto" onclick="showEditForm('bio')">Edit Bio</button>
              <div id="bio-edit-form" class="edit-form" style="display:none;">
                  <h3>Edit Bio</h3>
                  <form>
                      <div class="mb-3">
                          <label for="bioInput" class="form-label">New Bio</label>
                          <textarea id="bioInput" class="form-control" rows="4">${data.bio || ''}</textarea>
                      </div>
                      <button type="submit" class="btn btn-primary" onclick="saveBio()">Save Changes</button>
                      <p id="bioMessage" style="margin-top: 10px; font-weight: bold;"></p>
                  </form>
              </div>
          `;



            // Display Achievements
            achievementsTab.innerHTML = `
                <ul>
                    ${data.achievements && data.achievements.length > 0 ? data.achievements.map(achievement => `<li>${achievement}</li>`).join('') : "No achievements yet."}
                </ul>
                <button class="btn btn-outline-primary d-block mx-auto" onclick="showEditForm('achievements')">Edit Achievements</button>
                <div id="achievements-edit-form" class="edit-form" style="display:none;">
                    <h3>Edit Achievements</h3>
                    <form>
                        <div class="mb-3">
                            <label for="achievementsInput" class="form-label">New Achievements</label>
                            <textarea id="achievementsInput" class="form-control" rows="4"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            `;

            // Display Club Affiliations
            clubAffiliationsTab.innerHTML = `
                <p>${data.club || "This is the club affiliations section. You can update your club affiliations here."}</p>
                <button class="btn btn-outline-primary d-block mx-auto" onclick="showEditForm('club-affiliations')">Edit Club Affiliations</button>
                <div id="club-affiliations-edit-form" class="edit-form" style="display:none;">
                    <h3>Edit Club Affiliations</h3>
                    <form>
                        <div class="mb-3">
                            <label for="clubAffiliationsInput" class="form-label">New Affiliations</label>
                            <textarea id="clubAffiliationsInput" class="form-control" rows="4"></textarea>
                        </div>
                        <button type="submit" onclick="saveClubAffiliations()" class="btn btn-primary">Save Changes</button>
                        <p id="clubMessage" style="margin-top: 10px; font-weight: bold;"></p>
                    </form>
                </div>
            `;

          // Set profile pictures dynamically for both spots
          const profileImage = data.picture || 'chalk.jpg';
          profilePicHeader.style.backgroundImage = `url('../assets/images/${profileImage}')`;
          profilePicMain.style.backgroundImage = `url('../assets/images/${profileImage}')`; 

      } catch (error) {
          console.error('Error fetching profile data:', error);
          alert('Failed to load profile data');
      }
  }

  // Function to toggle the visibility of the edit form
  function showEditForm(tabName) {
    const formId = `${tabName}-edit-form`;
    const form = document.getElementById(formId);

    // Toggle visibility of the form
    if (form.style.display === 'none' || form.style.display === '') {
        form.style.display = 'block'; 
    } else {
        form.style.display = 'none';   
    }
}

  /*
   * Save functions for bio, achievements, and club affiliations
   * Making the accessed globally by using window.functionName
   */
  window.saveBio = function() {
    const bioText = document.getElementById('bioInput').value;

    fetch('../actions/update_bio.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({ bio: bioText })
    })
    .then(response => response.json())
    .then(data => {
        const messageElement = document.getElementById('bioMessage');

        if (data.success) {
            messageElement.textContent = data.success;
            messageElement.style.color = 'green'; // Success message in green
        } else {
            messageElement.textContent = data.error;
            messageElement.style.color = 'red'; // Error message in red
        }
    })
    .catch(error => console.error('Error updating bio:', error));
    const messageElement = document.getElementById('bioMessage');
    messageElement.textContent = 'An unexpected error occurred.';
    messageElement.style.color = 'red';
    
}


  function saveAchievements() {
      const achievementsText = document.getElementById('achievements-textarea').value;
      alert(`Saved Achievements: ${achievementsText}`);
      // Implement saving logic to server here
  }

  window.saveClubAffiliations = function() {
    const clubAffiliationsText = document.getElementById('clubAffiliationsInput').value;

    fetch('../actions/update_club_aff.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({ club: clubAffiliationsText })
    })
    .then(response => response.json())
    .then(data => {
      const messageElement = document.getElementById('clubMessage');

      if (data.success) {
          messageElement.textContent = data.success;
          messageElement.style.color = 'green'; // Success message in green
      } else {
          messageElement.textContent = data.error;
          messageElement.style.color = 'red'; // Error message in red
      }
    })
    .catch(error => console.error('Error updating club affiliations:', error));
    const messageElement = document.getElementById('clubMessage');
    messageElement.textContent = 'An unexpected error occurred.';
    messageElement.style.color = 'red';
}


  // Initial fetch of profile data
  fetchProfileData();
});

// Implementing logout functionality
document.getElementById('logoutButton').addEventListener('click', () => {
  fetch('../actions/logout.php', {
      method: 'POST',
      headers: {
          'Content-Type': 'application/json'
      }
  })
  .then(response => response.json())
  .then(data => {
      if (data.success) {
        window.location.replace('../view/login.php');
          // Redirect the user to the login page
          // window.location.href = '../view/login.php'; 
      } else {
          alert('Logout failed. Please try again.');
      }
  })
  .catch(error => console.error('Error:', error));
});