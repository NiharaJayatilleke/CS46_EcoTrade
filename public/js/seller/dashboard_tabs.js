function showContent(section) {

    // Hide all content sections
    document.getElementById('dashboard-content').style.display = 'none';
    document.getElementById('notif-content').style.display = 'none';
    document.getElementById('sec-ad-content').style.display = 'none';
    document.getElementById('rec-ad-content').style.display = 'none';
    document.getElementById('signout-content').style.display = 'none';

    // Show the selected content section
    document.getElementById(section).style.display = 'block';

     // Update the URL hash to store the current section
    window.location.hash = '#' + section;
}

// Function to handle initial content section based on URL hash
function handleInitialSection() {
    var hash = window.location.hash;
    if (hash) {
        // Extract the section name from the hash
        var section = hash.substring(1); // Remove '#'
        showContent(section);
        currentSection = section;
    } else {
        // If no hash is present, default to the dashboard section
        showContent('dashboard-content');
        currentSection = 'dashboard-content';
    }
}

handleInitialSection(); 
    // Call the function when the page loads
    window.onload = handleInitialSection;

    // Function to redirect to the current active section
    function redirectToCurrentSection() {
    // Get the current hash from the URL
    var hash = window.location.hash;
    if (hash) {
        // Redirect to the current active section
        var section = hash.substring(1);
        window.location.href = '<?php echo URLROOT; ?>/seller/index' + hash;
        showContent(section);
    }
}
