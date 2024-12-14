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