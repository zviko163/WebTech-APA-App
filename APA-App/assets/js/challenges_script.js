

document.addEventListener("DOMContentLoaded", function () {
    const searchBar = document.getElementById("searchBar");
    const userList = document.getElementById("userList");

    // Function to fetch users
    async function fetchUsers(search = "") {
        try {
            const response = await fetch("../actions/get_users.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: new URLSearchParams({ search }),
            });
            const users = await response.json();
            renderUsers(users);
        } catch (error) {
            console.error("Error fetching users:", error);
        }
    }

    // Function to render users
    function renderUsers(users) {
        userList.innerHTML = "";
        if (users.length === 0) {
            userList.innerHTML = "<p>No users found.</p>";
            return;
        }

        users.forEach((user) => {
            const userCard = document.createElement("div");
            userCard.classList.add("card", "mb-2");
            userCard.innerHTML = `
                <div class="card-body">
                    <h5 class="card-title">${user.username}</h5>
                    <input type="date" class="form-control mb-2 schedule-date" data-user-id="${user.user_id}" required>
                    <button class="btn btn-primary challenge-btn" data-user-id="${user.user_id}">Challenge</button>
                </div>
            `;
            userList.appendChild(userCard);
        });

        // Add event listeners to challenge buttons
        document.querySelectorAll(".challenge-btn").forEach((button) => {
            button.addEventListener("click", async function () {
                const challengedId = this.getAttribute("data-user-id");
                const scheduleDateInput = document.querySelector(`.schedule-date[data-user-id="${challengedId}"]`);
                const scheduleDate = scheduleDateInput ? scheduleDateInput.value : null;
    
                // Client-side validation for the selected date
                const today = new Date().toISOString().split("T")[0]; 
                if (!scheduleDate) {
                    alert("Please select a date for the challenge.");
                    return;
                }
                if (scheduleDate < today) {
                    alert("Please select a valid future date for the challenge.");
                    return;
                }
    
                // Proceed with the fetch request if validations pass
                try {
                    const response = await fetch("../actions/process_challenge.php", {
                        method: "POST",
                        headers: { "Content-Type": "application/x-www-form-urlencoded" },
                        body: new URLSearchParams({
                            challenged_id: challengedId,
                            schedule_date: scheduleDate,
                        }),
                    });
                    const result = await response.json();
                    alert(result.message || "An unknown error occurred.");
                } catch (error) {
                    alert("Failed to connect to the server.");
                }
    
                fetchUsers(searchBar.value); 
            });
        });
    }

    // Initial fetch to load all users
    fetchUsers();

    // Add event listener to the search bar
    searchBar.addEventListener("input", () => {
        fetchUsers(searchBar.value); // Re-fetch users based on search input
    });
});
