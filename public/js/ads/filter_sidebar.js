function updateList() {

    let results = Array.from(document.querySelectorAll('.ad-index-container'));
    // Hide all results
    results.forEach(function(result) {
      result.style.display = 'none';
    });

    // Filter results to those that meet ANY requirements:
    const selectedAttributes = new Set(Array.from(document.querySelectorAll('.indicator input[data-filter]:checked'), function(input) {
        return input.getAttribute('data-filter');
    }));

    // Show all results if nothing is checked
    if (selectedAttributes.size === 0) {
        results.forEach(function(result) {
        result.style.display = 'block';
        });

    }else{
        results = results.filter(function(result) {
            for (const attrib of selectedAttributes) {
            if (result.classList.contains(attrib)) {
                return true;
                }
            }
            return false;
        });
    
        // Show those filtered results:
        results.forEach(function(result) {
        result.style.display = 'block';
        });
    }
}
  

document.querySelectorAll('.indicator input[type="checkbox"]').forEach(function(input) {
    input.addEventListener('change',function() {
        updateList();
    });
});