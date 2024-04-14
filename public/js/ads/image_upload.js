// Ad images drag and drop
const dropArea = document.querySelector(".ad-form-drag-area");
let dropText = document.querySelector(".ad-form-drag-area-text");
const browseButton = document.querySelector(".ad-form-drag-area-btn");
let inputPath = document.querySelector("#item_images");
let file;

var imgPlaceholder = document.querySelector("#item_img_placeholder");
var icon = document.querySelector("#item_img_placeholder_icon");
// let dropAreas = document.querySelectorAll(".ad-form-drag-area");
// let dropTexts = document.querySelectorAll(".ad-form-drag-area-text");
// let browseButtons = document.querySelectorAll(".ad-form-drag-area-btn");
// let placeholders = document.querySelectorAll(".item_img_placeholder");
// let inputs = document.querySelectorAll(".item_images");

// dropAreaParent.addEventListener("click", function(event) {
//   let browseButton = event.target.closest(".ad-form-drag-area-btn");
//   if (!browseButton) return;

//   let dropArea = browseButton.closest(".ad-form-drag-area");
//   let inputPath = dropArea.querySelector(".item_images");

//   inputPath.click();
// });

// for(let i=0; i<dropAreas.length; i++) {
//   let dropArea = dropAreas[i];
//   let dropText = dropTexts[i];
//   let browseButton = browseButtons[i];
//   let inputPath = inputs[i];
//   let file;

//browse options and upload options
if(browseButton && inputPath) {
browseButton.onclick = () => {
  inputPath.click();
};
}

inputPath.addEventListener("change", function () {
  file = this.files[0];
  showImage(imgPlaceholder,icon,file);
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

    showImage(imgPlaceholder,icon,file);
    dropArea.classList.remove("active");
})

function showImage(imgPlaceholder,icon,file){
    let fileType = file.type;

    let validExtensions = ["image/jpeg", "image/jpg", "image/png"];
    if(validExtensions.includes(fileType)){
        let fileReader = new FileReader();
        fileReader.onload = ()=>{
            let fileURL = fileReader.result;

            // var imgPlaceholder = document.querySelector("#item_img_placeholder");
            // var imgPlaceholder = placeholders[i];
            imgPlaceholder.setAttribute("src", fileURL);
            imgPlaceholder.style.display = "block";            
            // document.querySelector("#item_img_placeholder").style.backgroundImage = 'url(' + fileURL + ')';

            // var icon = document.querySelector("#item_img_placeholder_icon");
            // var text = document.querySelector(".ad-form-drag-area-text");
            // var or = document.querySelector(".ad-form-drag-area-or");
            // var button = document.querySelector(".ad-form-drag-area-btn");

            icon.style.display = "none";
            // text.style.display = "none";
            // or.style.display = "none";
            // button.style.display = "none";
        }
        fileReader.readAsDataURL(file);

        //let validate = document.querySelector(".form-drag-area-validate");
        //
    }else{
        alert("This is not an Image File!");
        dropArea.classList.remove("active");
    }
}

// }//end for
    

// ADDITIONAL IMAGES 

const dropArea1 = document.querySelector(".ad-form-drag-area1");
let dropText1 = document.querySelector(".ad-form-drag-area-text1");
const browseButton1 = document.querySelector(".ad-form-drag-area-btn1");
let inputPath1 = document.querySelector("#item_images1");
let file1;

var imgPlaceholder1 = document.querySelector("#item_img_placeholder1");
var icon1 = document.querySelector("#item_img_placeholder_icon1");

  if(browseButton1 && inputPath1) {
    browseButton1.onclick = () => {
      inputPath1.click();
    };
  }
  
  inputPath1.addEventListener("change", function () {
    file1 = this.files[0];
    showImage(imgPlaceholder1,icon1,file1);
  //   dropArea.classList.add("active");
  });
  
  dropArea1.addEventListener("dragover", (event) => {
    event.preventDefault();
    dropArea1.classList.add("active");
    dropText1.textContent = "Release to Upload File";
  });
  
  dropArea1.addEventListener("dragleave", () => {
    dropArea1.classList.remove("active");
    dropText1.textContent = "Drag & Drop to Upload File";
  });
  
  dropArea1.addEventListener("drop", (event)=>{
      event.preventDefault();
  
      file1 = event.dataTransfer.files[0];
      let list1 = new DataTransfer();
      list1.items.add(file);
      inputPath1.files = list1.files;
  
      showImage(imgPlaceholder1,icon1,file1);
      dropArea1.classList.remove("active");
  })