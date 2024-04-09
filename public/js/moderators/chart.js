const ctx = document.getElementById('myChart');
const earning = document.getElementById('ads');

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
  

new Chart(ads, {
  type: 'bar',
  data: {
    labels: ['Furniture', 'Electronics', 'Clothing', 'Books', 'Kitchenware', 'Home Deco', 'Sports Equipment', 'Appliances', 'Other'],
    datasets: [{
      label: 'Number of Ads',
      data: [12, 19, 3, 5, 2, 3, 4, 7, 10],
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


