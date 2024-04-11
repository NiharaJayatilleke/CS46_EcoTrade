
const form = document.querySelector("form"),
        nextBtn = form.querySelector(".nextBtn"),
        backBtn = form.querySelector(".backBtn"),
        allInput = form.querySelectorAll(".first input");


nextBtn.addEventListener("click", (event) => {
    event.preventDefault();
    let allRequiredFieldsFilled = true;
    allInput.forEach(input => {
        if (input.required && !input.readOnly && input.value === "") {
            allRequiredFieldsFilled = false;
        }
    });
    console.log(allRequiredFieldsFilled);
    if (allRequiredFieldsFilled) {
        form.classList.add('secActive');
    } else {
        form.classList.remove('secActive');
        alert("Please fill all the required fields");
    }
});

form.addEventListener("submit", (event) => {
    if (!form.classList.contains('secActive')) {
        event.preventDefault();
    }
});

backBtn.addEventListener("click", (event) => {
    form.classList.remove('secActive');
});

// Function to update options of subsequent select fields based on the selection made
function updateOptions(selectedValues, selectFields, currentSelect) {
    for (let i = 0; i < selectFields.length; i++) {
        const options = selectFields[i].getElementsByTagName('option');
        for (let j = 0; j < options.length; j++) {
            if (selectedValues.includes(options[j].value) && selectFields[i] !== currentSelect) {
                options[j].disabled = true; // Disable the selected option
            } else {
                options[j].disabled = false; // Enable other options
            }
        }
    }
}

// Get all select fields
const selectFields = document.querySelectorAll('.district-select');

// Store all selected values
var selectedValues = [];

// Add change event listener to each select field
selectFields.forEach(selectField => {
    selectField.addEventListener('change', function() {
        const selectedValue = this.value;
        
        // Remove the previously selected value of this select field from the array of selected values
        const previousValue = this.getAttribute('data-previous-value');
        if (previousValue) {
            const index = selectedValues.indexOf(previousValue);
            if (index > -1) {
                selectedValues.splice(index, 1);
            }
        }
        
        // Add the selected value to the array of selected values if it was not previously selected
        if (!selectedValues.includes(selectedValue)) {
            selectedValues.push(selectedValue);
        }
        
        // Update the data-previous-value attribute with the new selected value
        this.setAttribute('data-previous-value', selectedValue);
        
        updateOptions(selectedValues, selectFields, this);
    });
});

// // Function to update options of subsequent select fields based on the selection made
// function updateOptions(selectedValues, selectFields) {
//     for (let i = 0; i < selectFields.length; i++) {
//         const options = selectFields[i].getElementsByTagName('option');
//         for (let j = 0; j < options.length; j++) {
//             if (selectedValues.includes(options[j].value)) {
//                 options[j].disabled = true; // Disable the selected option
//             } else {
//                 options[j].disabled = false; // Enable other options
//             }
//         }
//     }
// }

// // Get all select fields
// const selectFields = document.querySelectorAll('.district-select');

// // Store all selected values
// var selectedValues = [];

// // Add change event listener to each select field
// selectFields.forEach(selectField => {
//     selectField.addEventListener('change', function() {
//         const selectedValue = this.value;

//         // Add the selected value to the array of selected values if it was not previously selected
//         if (!selectedValues.includes(selectedValue)) {
//             selectedValues.push(selectedValue);
//         }

//         updateOptions(selectedValues, selectFields);
//     });
// });