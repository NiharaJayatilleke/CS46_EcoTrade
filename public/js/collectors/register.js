
const form = document.querySelector("form"),
        nextBtn = form.querySelector(".nextBtn"),
        backBtn = form.querySelector(".backBtn"),
        allInput = form.querySelectorAll(".first input");

        
nextBtn.addEventListener("click", (event) => {
    event.preventDefault();
    let allFieldsFilled = true;
    allInput.forEach(input => {
        if (input.value === "") {
            allFieldsFilled = false;
        }
    });
    console.log(allFieldsFilled);
    if (allFieldsFilled) {
        form.classList.add('secActive');
    } else {
        form.classList.remove('secActive');
        // alert("Please fill all the fields");
    }
});

backBtn.addEventListener("click", () => form.classList.remove('secActive'));
