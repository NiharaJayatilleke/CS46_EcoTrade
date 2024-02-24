function updateList() {

    let results = Array.from(document.querySelectorAll('.ad-index-container'));
    let minPrice = document.getElementById('minPrice').value;
    let maxPrice = document.getElementById('maxPrice').value;
    // let itemCondition = document.getElementById('item_condition').value;
    const otherCategoryInput = document.getElementById('otherCategInput').value.trim().toLowerCase();

    // Hide all results
    results.forEach(function(result) {
      result.style.display = 'none';
    });

    // Filter results to those that meet ANY requirements:
    const selectedAttributes = new Set(Array.from(document.querySelectorAll('.indicator input[data-filter]:checked'), function(input) {
        return input.getAttribute('data-filter');
    }));

    // Filter according to the selected attributes:
    if (selectedAttributes.size > 0) {
        results = results.filter(function(result) {
            let itemCategory = result.getAttribute('data-category');
            return selectedAttributes.has(itemCategory) ;
        });
    }

    // Filter results based on the "Other Category" input
    if (otherCategoryInput !== '') {
        results = results.filter(function(result) {
            let itemCategory = result.getAttribute('data-category').toLowerCase();
            return itemCategory.includes(otherCategoryInput);
        });
    }

    // Filter according to the price:
    results = results.filter(function(result) {

        let price = result.getAttribute('data-price');

        price = parseFloat(price);
        if (minPrice !== '' && price < minPrice) {
            return false;
        }
        if (maxPrice !== '' && price > maxPrice) {
            return false;
        }
        return true;
    });

    // Filter according to the item condition:
    // results = results.filter(function(result) {
    //     let condition = result.getAttribute('data-condition');
    //     if (itemCondition !== '' && itemCondition !== condition) {
    //         return false;
    //     }
    //     return true;
    // });
    const selectedConditions = new Set(Array.from(document.querySelectorAll('.condition .indicator input[type="checkbox"]:checked'), function(input) {
        return input.getAttribute('data-filter');
    }));

    if (selectedConditions.size > 0) {
        results = results.filter(function(result) {
            let condition = result.getAttribute('data-condition');
            return selectedConditions.has(condition);
        });
    }
    
    // const selectedConditions = new Set(Array.from(document.querySelectorAll('.condition input[type="checkbox"]:checked'), function(input) {
    //     return input.getAttribute('data-filter');
    // }));
    
    // if (selectedConditions.size > 0) {
    //     results = results.filter(function(result) {
    //         let condition = result.getAttribute('data-condition');
    //         return selectedConditions.has(condition);
    //     });
    // }
    

    // Show those filtered results:
    results.forEach(function(result) {
        result.style.display = 'block';
    });

    // IF no results, show a message:
    if (results.length === 0) {
        document.getElementById('noResults').style.display = 'block';
    } else {
        document.getElementById('noResults').style.display = 'none';
    }
    
}
  
// stop propagation
document.querySelectorAll('.indicator input[type="checkbox"]').forEach(function(ele) {
    ele.addEventListener('click', function(event) {
        event.stopPropagation();
        updateList();
    });
});

document.querySelectorAll('.condition .indicator input[type="checkbox"]').forEach(function(ele) {
    console.log("condition");
    ele.addEventListener('click', function(event) {
        event.stopPropagation();
        updateList();
    });
});

document.getElementById('minPrice').addEventListener('input',function() {
    updateList();
});
document.getElementById('maxPrice').addEventListener('input',function() {
    updateList();
});
// document.getElementById('item_condition').addEventListener('change',function() {
//     updateList();
// });
document.getElementById('otherCategInput').addEventListener('input', function() {
    updateList();
});


const checkboxContainers = document.querySelectorAll('.indicator li');
console.log(checkboxContainers);
checkboxContainers.forEach(function(container) {
    let checkbox = container.querySelector('input[type="checkbox"]');
    container.addEventListener('click', function(event) {
        event.preventDefault();
        checkbox.checked = !checkbox.checked;
        updateList();

    });
});
