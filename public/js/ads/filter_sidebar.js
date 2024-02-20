function updateList() {

    let results = Array.from(document.querySelectorAll('.ad-index-container'));
    let minPrice = document.getElementById('minPrice').value;
    let maxPrice = document.getElementById('maxPrice').value;
    let itemCondition = document.getElementById('item_condition').value;

    // Hide all results
    results.forEach(function(result) {
      result.style.display = 'none';
    });

    // Filter results to those that meet ANY requirements:
    const selectedAttributes = new Set(Array.from(document.querySelectorAll('.indicator input[data-filter]:checked'), function(input) {
        return input.getAttribute('data-filter');
    }));

    // Filter according to the selected attributes:
    results = results.filter(function(result) {
        if (selectedAttributes.size === 0) {
            return true;
        }
        for (const attrib of selectedAttributes) {
            if (result.classList.contains(attrib)) {
                return true;
                }
        }
        return false;
    
    });

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
    results = results.filter(function(result) {
        let condition = result.getAttribute('data-condition');
        if (itemCondition !== '' && itemCondition !== condition) {
            return false;
        }
        return true;
    });

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
  

document.querySelectorAll('.indicator input[type="checkbox"]').forEach(function(input) {
    input.addEventListener('change',function() {
        updateList();
    });
});
document.getElementById('minPrice').addEventListener('input',function() {
    updateList();
});
document.getElementById('maxPrice').addEventListener('input',function() {
    updateList();
});
document.getElementById('item_condition').addEventListener('change',function() {
    updateList();
});

