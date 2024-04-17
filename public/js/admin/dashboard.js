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

function clickedLink() {
    list.forEach((item) => {
        // Remove the clicked and hovered classes from other items
        if (item !== this) {
            item.classList.remove('clicked', 'hovered');
        }
    });
    // Add the clicked class to the current item
    this.classList.add('clicked');
}

list.forEach((item) => {
    item.addEventListener('mouseover', activeLink);
    item.addEventListener('mouseout', inactiveLink);
    item.addEventListener('click', clickedLink);
});



// Function to hide the search bar
function hideSearchBar() {
    document.getElementById('dashboard-search').style.display = 'none';
    localStorage.setItem('searchBarVisible', 'false');
}

// Function to show the search bar
function showSearchBar() {
    document.getElementById('dashboard-search').style.display = 'block';
    localStorage.setItem('searchBarVisible', 'true');
}

// Attach the function to the onclick event of the tabs
document.getElementById('dashboard-tab').onclick = function() {
    showContent('dashboard-content');
    hideSearchBar();
};
document.getElementById('moderators-tab').onclick = function() {
    showContent('moderators-content');
    showSearchBar();
};

document.getElementById('users-tab').onclick = function() {
    showContent('users-content');
    showSearchBar();
};

document.getElementById('secondhand-tab').onclick = function() {
    showContent('secondhand-content');
    showSearchBar();
};

document.getElementById('recycle-tab').onclick = function() {
    showContent('recycle-content');
    showSearchBar();
};

document.getElementById('recycle-tab').onclick = function() {
    showContent('recycle-content');
    showSearchBar();
};

document.getElementById('messages-tab').onclick = function() {
    showContent('messages-content');
    showSearchBar();
};

document.getElementById('ad-report-tab').onclick = function() {
    showContent('ad-report-content');
    hideSearchBar();
};

document.getElementById('settings-tab').onclick = function() {
    showContent('settings-content');
    hideSearchBar();
};

// Check the state of the search bar when the DOM is fully loaded
document.addEventListener('DOMContentLoaded', (event) => {
    if (localStorage.getItem('searchBarVisible') === 'false') {
        hideSearchBar();
    } else {
        showSearchBar();
    }
});

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
    var query = document.getElementById('dashboard-search').querySelector('input').value;

    // If the search query is empty, return early
    if (!query) {
        return;
    }

    // Perform the search
    var results = fuse.search(query);

    // Clear the table body
    var tableBody = document.querySelector('#users-table tbody');
    tableBody.innerHTML = '';

    // Add the results to the table body
    results.forEach(function(result) {
        var row = document.createElement('tr');

        var usernameCell = document.createElement('td');
        usernameCell.textContent = result.item.username;
        row.appendChild(usernameCell);

        var emailCell = document.createElement('td');
        emailCell.textContent = result.item.email;
        row.appendChild(emailCell);

        var numberCell = document.createElement('td');
        numberCell.textContent = result.item.number;
        row.appendChild(numberCell);

        var userTypeCell = document.createElement('td');
        var userTypeSpan = document.createElement('span');
        userTypeSpan.classList.add('usertype'); // Add the 'usertype' class
        userTypeSpan.classList.add(result.item.user_type); // Add the user type as a class
        userTypeSpan.textContent = result.item.user_type;
        userTypeCell.appendChild(userTypeSpan);
        row.appendChild(userTypeCell);

        var createdAtCell = document.createElement('td');
        createdAtCell.textContent = result.item.created_at;
        row.appendChild(createdAtCell);

        tableBody.appendChild(row);
    });
}

// Attach the function to the oninput event of the search bar
document.getElementById('dashboard-search').querySelector('input').addEventListener('input', performSearch);