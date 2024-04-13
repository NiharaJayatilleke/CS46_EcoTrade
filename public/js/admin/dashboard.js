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