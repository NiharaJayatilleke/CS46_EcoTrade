let toggle = document.querySelector('.dashboard-toggle');
let sidenav = document.querySelector('.dashboard-sidenav');
let main = document.querySelector('.dashboard-main');
toggle.onclick = function(){
    sidenav.classList.toggle('active');
    main.classList.toggle('active');
}


let list = document.querySelectorAll('.dashboard-sidenav li');

function activeLink() {
    // Add the hovered class to the current item
    this.classList.add('hovered');
}

function inactiveLink() {
    // Only remove the hovered class if the item hasn't been clicked
    if (!this.classList.contains('clicked')) {
        this.classList.remove('hovered');
    }
}

let clickedLink = (event) => {
    // Prevent the default behavior
    event.preventDefault();

    // Remove the 'clicked' and 'hovered' class from all tabs
    list.forEach((item) => {
        item.classList.remove('clicked', 'hovered');
    });

    // Add the 'clicked' and 'hovered' class to the clicked tab
    let clickedTab = event.currentTarget;
    clickedTab.classList.add('clicked', 'hovered');

    // Navigate to the link's href
    let link = clickedTab.querySelector('a');
    if (link) {
        window.location.href = link.href;
    }
}

list.forEach((item) => {
    item.addEventListener('mouseover', activeLink);
    item.addEventListener('mouseout', inactiveLink);
    item.addEventListener('click', clickedLink);
});


// Function to show the search bar
function showSearchBar() {
    var searchBar = document.getElementById('admin-dashboard-search');
    if (searchBar) {
        searchBar.style.display = 'block'; 
    }
}

// Function to hide the search bar
function hideSearchBar() {
    var searchBar = document.getElementById('admin-dashboard-search');
    if (searchBar) {
        searchBar.style.display = 'none'; 
    }
}

// Function to check the URL fragment and show or hide the search bar accordingly
function checkFragment() {
    // Get the URL fragment
    var fragment = window.location.hash;

    // Show or hide the search bar based on the URL fragment
    switch (fragment) {
        case '#users-content':
        case '#moderators-content':
        case '#centers-content':
        case '#secondhand-content':
        case '#recycle-content':
        case '#activity-content':
            showSearchBar();
            break;
        case '#dashboard-content':
        case '#reported-ads-content':
        case '#settings-content':
            hideSearchBar();
            break;
        default:
            // If there's no fragment or it doesn't match any of the cases, use the value from localStorage
            if (localStorage.getItem('searchBarVisible') === 'false') {
                hideSearchBar();
            } else {
                showSearchBar();
            }
            break;
    }
}

// Check the state of the search bar when the DOM is fully loaded
document.addEventListener('DOMContentLoaded', checkFragment);

// Also check the state of the search bar when the hash changes
window.addEventListener('hashchange', checkFragment);

//search in users
// The Fuse.js options
var options = {
    includeScore: true,
    threshold: 0.3,
    location: 0,
    distance: 100,
    maxPatternLength: 32,
    minCharLength: 1,
    keys: [
        "username",
        "email",
        "number",
        "user_type",
        "created_at"
    ]
};

// Assuming 'users' is your data array
var fuse = new Fuse(users, options);

// Function to perform search
function performSearch() {
    // Get the search query
    var query = document.getElementById('admin-dashboard-search').querySelector('input').value;

    // Clear the table body
    var tableBody = document.querySelector('#users-table tbody');
    tableBody.innerHTML = '';

    // If the search query is empty, repopulate the table with all users
    if (!query) {
        users.forEach(function(user) {
            var row = createRowUser(user); // Assuming createRowUser is a function that creates a row for a user
            tableBody.appendChild(row);
        });
        return;
    }

    // Perform the search
    var results = fuse.search(query);

    // Add the results to the table body
    results.forEach(function(result) {
        var row = createRowUser(result.item);
        tableBody.appendChild(row);
    });
}

// Attach the function to the oninput event of the search bar
document.getElementById('admin-dashboard-search').querySelector('input').addEventListener('input', performSearch); 

//moderator search
// The Fuse.js options
var mod_options = {
    includeScore: true,
    threshold: 0.3,
    location: 0,
    distance: 100,
    maxPatternLength: 32,
    minCharLength: 1,
    keys: [
        "username",
        "email",
        "number",
        "created_at"
    ]
};

// Assuming 'moderators' is your data array
var mod_fuse = new Fuse(moderators, mod_options);

// // Function to perform search
function performModSearch() {
    // Get the search query
    var query = document.getElementById('admin-dashboard-search').querySelector('input').value;

    // Clear the table body
    var tableBody = document.querySelector('#moderators-table tbody');
    tableBody.innerHTML = '';

    // If the search query is empty, repopulate the table with all moderators
    if (!query) {
        moderators.forEach(function(moderator) {
            var row = createRowMod(moderator); // Assuming createRowMod is a function that creates a row for a moderator
            tableBody.appendChild(row);
        });
        return;
    }

    // Perform the search
    var results = mod_fuse.search(query);

    // Add the results to the table body
    results.forEach(function(result) {
        var row = createRowMod(result.item);
        tableBody.appendChild(row);
    });
}

// Attach the function to the oninput event of the search bar
document.getElementById('admin-dashboard-search').querySelector('input').addEventListener('input', performModSearch); 

// Function to create a row for a user or moderator
function createRowUser(item) {
    var row = document.createElement('tr');

    var usernameCell = document.createElement('td');
    usernameCell.textContent = item.username;
    row.appendChild(usernameCell);

    var emailCell = document.createElement('td');
    emailCell.textContent = item.email;
    row.appendChild(emailCell);

    var numberCell = document.createElement('td');
    numberCell.textContent = item.number;
    row.appendChild(numberCell);

    var userTypeCell = document.createElement('td');
    var userTypeSpan = document.createElement('span');
    userTypeSpan.classList.add('usertype'); // Add the 'usertype' class
    userTypeSpan.classList.add(item.user_type); // Add the user type as a class
    userTypeSpan.textContent = item.user_type;
    userTypeCell.appendChild(userTypeSpan);
    row.appendChild(userTypeCell);

    var createdAtCell = document.createElement('td');
    createdAtCell.textContent = item.created_at;
    row.appendChild(createdAtCell);

    return row;
}

// Function to create a row for a user or moderator
function createRowMod(item) {
    var row = document.createElement('tr');

    var usernameCell = document.createElement('td');
    usernameCell.textContent = item.username;
    row.appendChild(usernameCell);

    var emailCell = document.createElement('td');
    emailCell.textContent = item.email;
    row.appendChild(emailCell);

    var numberCell = document.createElement('td');
    numberCell.textContent = item.number;
    row.appendChild(numberCell);

    var createdAtCell = document.createElement('td');
    createdAtCell.textContent = item.created_at;
    row.appendChild(createdAtCell);

    // Create the control buttons cell
    var controlButtonsCell = document.createElement('td');
    var controlButtonsDiv = document.createElement('div');
    controlButtonsDiv.className = 'mod-control-btns';

    // Create the edit button
    var editButton = document.createElement('button');
    editButton.className = 'ad-edit-btn';
    editButton.innerHTML = '<i class="fas fa-edit"></i>';
    editButton.onclick = function() {
        window.location.href = '/ecotrade/Moderators/edit/' + item.id; // Update this URL to match your application's URL structure
    };
    controlButtonsDiv.appendChild(editButton);

    // Create the delete button
    var deleteButton = document.createElement('button');
    deleteButton.className = 'ad-edit-btn';
    deleteButton.innerHTML = '<i class="fas fa-trash-alt"></i>';
    deleteButton.onclick = function() {
        if (confirm("Are you sure you want to delete this item?")) {
            window.location.href = '/ecotrade/Moderators/delete/' + item.id; // Update this URL to match your application's URL structure
        }
    };
    controlButtonsDiv.appendChild(deleteButton);

    controlButtonsCell.appendChild(controlButtonsDiv);
    row.appendChild(controlButtonsCell);

    return row;
}


function confirmDeleteModerators(url) {
    Swal.fire({
        title: 'Are you sure?',
        text: "By deleting this moderator you will not be able to revert again!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete Moderator!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Deleted!',
                'The moderator has been deleted.',
                'success'
            ).then(() => {
                window.location.href = url;
            });
        }
    })
}

//   const ctx = document.getElementById('myChart');

//   new Chart(ctx, {
//     type: 'bar',
//     data: {
//       labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
//       datasets: [{
//         label: '# of Votes',
//         data: [12, 19, 3, 5, 2, 3],
//         borderWidth: 1
//       }]
//     },
//     options: {
//       scales: {
//         y: {
//           beginAtZero: true
//         }
//       }
//     }
//   });


