const ctx = document.getElementById('adminChart');
const ads = document.getElementById('ads');

// Extract labels and counts from the userCounts object
var labels = Object.keys(userCounts);
var counts = Object.values(userCounts);

new Chart(ctx, {
    type: 'polarArea',
    data: {
        labels: labels, // Use the extracted labels
        datasets: [{
            label: 'System Users',
            data: counts, // Use the extracted counts
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
    }
});

// new Chart(ctx, {
//     type: 'polarArea',
//     data: {
//         labels: labels, // Use the extracted labels
//         datasets: [{
//             label: 'System Users',
//             data: counts, // Use the extracted counts
//             backgroundColor: [
//                 'rgba(76, 175, 80, 1)', // Green 500
//                 'rgba(139, 195, 74, 1)', // Light Green 500
//                 'rgba(205, 220, 57, 1)', // Lime 500
//                 'rgba(156, 204, 101, 1)', // Light Green 300
//                 'rgba(67, 160, 71, 1)' // Green 700
//             ],
//             borderWidth: 1
//         }]
//     },
//     options: {
//         responsive: true,
//     }
// });
  
var labels = Object.keys(adCountsByCategory);
var AdCounts = Object.values(adCountsByCategory);

console.log('Labels:', labels);
console.log('Counts:', AdCounts);

new Chart(ads, {
  type: 'bar',
  data: {
    labels: labels,
    datasets: [{
      label: 'Number of Preowned ItemAds',
      data: AdCounts,
      backgroundColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)',
          'rgba(0, 128, 0, 1)',
          'rgba(128, 0, 128, 1)',
          'rgba(255, 0, 0, 1)'
      ],
      borderWidth: 1
    }]
  },

  options: {
      responsive: true,
    }
});




