//Ad images drag and drop
const dropArea = document.querySelector(".ad-form-drag-area");
let dropText = document.querySelector(".ad-form-drag-area-text");
const browseButton = document.querySelector(".ad-form-drag-area-btn");
let inputPath = document.querySelector("#item_images");
let file;

//browse options and upload options
browseButton.onclick = () => {
  inputPath.click();
};

inputPath.addEventListener("change", function () {
  file = this.files[0];
  showImage();
//   dropArea.classList.add("active");
});

dropArea.addEventListener("dragover", (event) => {
  event.preventDefault();
  dropArea.classList.add("active");
  dropText.textContent = "Release to Upload File";
});

dropArea.addEventListener("dragleave", () => {
  dropArea.classList.remove("active");
  dropText.textContent = "Drag & Drop to Upload File";
});

dropArea.addEventListener("drop", (event)=>{
    event.preventDefault();

    file = event.dataTransfer.files[0];
    let list = new DataTransfer();
    list.items.add(file);
    inputPath.files = list.files;

    showImage();
    dropArea.classList.remove("active");
})

function showImage(){
    let fileType = file.type;

    let validExtensions = ["image/jpeg", "image/jpg", "image/png"];
    if(validExtensions.includes(fileType)){
        let fileReader = new FileReader();
        fileReader.onload = ()=>{
            let fileURL = fileReader.result;

            var imgPlaceholder = document.querySelector("#item_img_placeholder");
            imgPlaceholder.setAttribute("src", fileURL);
            imgPlaceholder.style.display = "block";            
            // document.querySelector("#item_img_placeholder").style.backgroundImage = 'url(' + fileURL + ')';

            var icon = document.querySelector("#item_img_placeholder_icon");
            var text = document.querySelector(".ad-form-drag-area-text");
            var or = document.querySelector(".ad-form-drag-area-or");
            var button = document.querySelector(".ad-form-drag-area-btn");

            icon.style.display = "none";
            text.style.display = "none";
            or.style.display = "none";
            button.style.display = "none";
        }
        fileReader.readAsDataURL(file);

        //let validate = document.querySelector(".form-drag-area-validate");
        //
    }else{
        alert("This is not an Image File!");
        dropArea.classList.remove("active");
    }
}
    


