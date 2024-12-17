// Fetch roles and populate the dropdown
function fetchRoles() {
    fetch('../../actions/get_roles.php')  
        .then(response => response.json())
        .then(data => {
            const roleSelect = document.getElementById('userRole1');
            // Clear existing options
            roleSelect.innerHTML = '';

            // Add a default option (optional)
            const defaultOption = document.createElement('option');
            defaultOption.value = '';
            defaultOption.textContent = 'Select Role';
            roleSelect.appendChild(defaultOption);

            // Populate the dropdown with fetched roles
            data.forEach(role => {
                const option = document.createElement('option');
                option.value = role.role_id;  // Set the role_id as the value
                option.textContent = role.role;  // Display the role_name
                roleSelect.appendChild(option);
            });
        })
        .catch(error => {
            console.error('Error fetching roles:', error);
        });
}

// Call the function to fetch roles when the page loads
fetchRoles();


// Fetch users and populate the table
function fetchUsers() {
    fetch('../../actions/admin_get_users.php')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const tableBody = document.querySelector('#usersTable tbody');
                tableBody.innerHTML = ''; // Clear existing data

                data.users.forEach(user => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${user.user_id}</td>
                        <td>${user.username}</td>
                        <td>${user.matches_played}</td>
                        <td>${user.wins}</td>
                        <td>${user.win_rate}</td>
                        <td>
                            <button class="btn btn-sm btn-primary me-2" data-bs-toggle="collapse" data-bs-target="#editUserForm1" onclick="populateEditForm(${user.user_id})">
                                Edit
                            </button>
                            <button class="btn btn-sm btn-danger" onclick="deleteUser(${user.user_id})">
                                Delete
                            </button>
                        </td>
                    `;
                    tableBody.appendChild(row);
                });
            } else {
                alert('Failed to fetch users: ' + data.error);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An unexpected error occurred while fetching data.');
        });
}

// Populate the edit form with user data
function populateEditForm(userId) {
    // Populate the form fields for the selected user
    fetch(`../../actions/get_user.php?user_id=${userId}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const user = data.user;
                document.querySelector('#editUserId').value = user.user_id;
                document.querySelector('#userRole1').value = user.role_id;  // Set selected role_id
            } else {
                alert('Error fetching user data');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An unexpected error occurred while fetching user data.');
        });
}

// Handle Edit User form submission
function editUserRole() {
    const userId = document.querySelector('#editUserId').value;
    const roleId = document.querySelector('#userRole1').value;

    fetch('../../actions/edit_user.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `user_id=${userId}&role=${roleId}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            fetchUsers(); // Refresh the users table
        } else {
            alert('Failed to update user: ' + data.error);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An unexpected error occurred while updating user.');
    });
}

// Handle Add User form submission
function addUser() {
    const username = document.getElementById('addUsername').value;
    const email = document.getElementById('addEmail').value;
    const password = document.getElementById('addPassword').value;
    const role = document.getElementById('addRole').value;  // Get selected role_id
    // console.log(username, email, password, roleId);
    const roleId = role === 'admin' ? 1 : 2;  // Convert role name to role_id
    
    fetch('../../actions/add_user.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `username=${username}&email=${email}&password=${password}&role=${roleId}`,
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            fetchUsers();  // Refresh the user list after successful addition
        } else {
            alert('Error adding user');
        }
    })
    .catch(error => console.error('Error:', error));
}

// Handle Delete User action
function deleteUser(userId) {
    if (confirm('Are you sure you want to delete this user?')) {
        fetch('../../actions/delete_user.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `user_id=${userId}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                fetchUsers(); // Refresh the users table
            } else {
                alert('Failed to delete user: ' + data.error);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An unexpected error occurred while deleting user.');
        });
    }
}

// Initialize the users table
document.addEventListener('DOMContentLoaded', fetchUsers);
