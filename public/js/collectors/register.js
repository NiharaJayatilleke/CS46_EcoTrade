document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");
    if (!form) return; // Check if form element exists

    const nextBtn = form.querySelector(".nextBtn");
    const backBtn = form.querySelector(".backBtn");
    const allInput = form.querySelectorAll(".first input");

    nextBtn.addEventListener("click", function(event) {
        event.preventDefault(); // Prevent default form submission behavior
        let isValid = true;
        allInput.forEach(input => {
            if (input.value.trim() === "") {
                isValid = false;
            }
        });
        if (isValid) {
            form.classList.add('secActive');
        } else {
            console.log("Please fill in all required fields.");
        }
    });

    backBtn.addEventListener("click", function(event) {
        event.preventDefault(); // Prevent default form submission behavior
        form.classList.remove('secActive');
    });
});


// const form = document.querySelector("form"),
//         nextBtn = form.querySelector(".nextBtn"),
//         backBtn = form.querySelector(".backBtn"),
//         allInput = form.querySelectorAll(".first input");

// nextBtn.addEventListener("click", () => {
//     allInput.forEach(input => {
//         if (input.value !== "") {
//             form.classList.add('secActive');
//         } else {
//             form.classList.remove('secActive');
//         }
//     });
// });

// backBtn.addEventListener("click", () => form.classList.remove('secActive'));

