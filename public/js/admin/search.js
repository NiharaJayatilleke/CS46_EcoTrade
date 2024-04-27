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
        "created_at",
        "status"
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
        "created_at",
        "status"
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

    
    var toggleCell = document.createElement('td');
    var label = document.createElement('label');
    label.className = 'switch';
    var input = document.createElement('input');
    input.type = 'checkbox';
    input.onclick = function() { toggleBan(this, item.id); };
    if (item.status !== undefined) {
        input.checked = item.status == 1;
    }
    var span = document.createElement('span');
    span.className = 'slider';
    label.appendChild(input);
    label.appendChild(span);
    toggleCell.appendChild(label);
    row.appendChild(toggleCell);

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
        confirmDeleteModerators('/ecotrade/Moderators/delete/' + item.id); // Update this URL to match your application's URL structure
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


// Attach the function to the oninput event of the search bar


var choices_preowned = {
    includeScore: true,
    threshold: 0.3,
    location: 0,
    distance: 100,
    maxPatternLength: 32,
    minCharLength: 1,
    keys: [
        "item_name",
        "item_category"
    ]
};

var mod_preowned = new Fuse(preowned, choices_preowned);

function preownedDashSearch() {
    // Get the search query
    // var query = document.getElementById('preowned-dashboard-search').querySelector('input').value;
    var query = document.getElementById('admin-dashboard-search').querySelector('input').value;
    // Clear the table body
    var tableBody = document.querySelector('#ads-container');
    tableBody.innerHTML = '';

    // If the search query is empty, repopulate the table with all users
    if (!query) {
        preowned.forEach(function(preowned) {
            var row = createPreowned(preowned);
            tableBody.appendChild(row);
        });
        return;
    }

    // Perform the search
    var results = mod_preowned.search(query);

    // Add the results to the table body
    results.forEach(function(result) {
        var row = createPreowned(result.item);
        tableBody.appendChild(row);
    });
    }

function createPreowned(item) {
    console.log(item);
    var adContainer = document.createElement('div');
    adContainer.className = 'ad-index-container';
    adContainer.dataset.adId = item.ad_id; 

    // Create and populate ad content based on item properties
    var adHeader = document.createElement('div');
    adHeader.className = 'ad-header';
    adHeader.innerHTML = `
        <div class="ad-body-image">
            <img src="<?php echo URLROOT ?>/public/img/items/${item.item_image}" alt="Ad Image" width="100" height="80">
        </div>
        <div class="ad-item-name"><h3>${item.item_name}</h3></div>
        <div class="ad-user-name">Seller: ${item.seller_name}</div>
        <div class="ad-created-at">${convertTime(item.item_created_at)}</div>
    `;

    var adBody = document.createElement('div');
    adBody.className = 'ad-body';
    adBody.innerHTML = `
        <div class="ad-body-desc">${item.item_desc}</div>
        <div class="ad-price">Rs. ${item.item_price}</div>
    `;

    var adFooter = document.createElement('div');
    adFooter.className = 'ad-footer';
    adFooter.innerHTML = `
        <div>
            <a href="#"><button class="ad-contact-btn">Contact Seller</button></a>
            ${item.negotiable === 'yes' ? `<a href="#"><button class="ad-offer-btn">Make Offer</button></a>` : ''}
            ${item.selling_format === 'auction' ? `<a href="#"><button class="ad-bid-btn">Bid</button></a>` : ''}
        </div>
    `;

    adContainer.appendChild(adHeader);
    adContainer.appendChild(adBody);
    adContainer.appendChild(adFooter);

    return adContainer;

}

function searchHandler(){
   
    let pageHash=window.location.hash;
    if (pageHash==="#secondhand-content"){
        preownedDashSearch();
    }else{
        performModSearch();
    }
}
document.getElementById('admin-dashboard-search').querySelector('input').addEventListener('input', searchHandler); 