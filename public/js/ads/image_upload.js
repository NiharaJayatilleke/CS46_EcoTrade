// Ad images drag and drop
const dropArea = document.querySelector(".ad-form-drag-area");
let dropText = document.querySelector(".ad-form-drag-area-text");
const browseButton = document.querySelector(".ad-form-drag-area-btn");
let inputPath = document.querySelector("#item_images");
// let file;
let files = [];
let totalFiles = 0; 

var imgPlaceholder = document.querySelector("#item_img_placeholder");
var icon = document.querySelector("#item_img_placeholder_icon");
let imageContainer = document.querySelector("#image_container");

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
  // file = this.files[0];
  // showImage(imgPlaceholder,icon,file);
//   dropArea.classList.add("active");
  if (this.files.length + totalFiles > 6) {
    alert('You can only upload a maximum of 6 files');
    this.value = '';
  } else {
    files = this.files;
    totalFiles += this.files.length;
    Array.from(files).forEach(file => {
      showImage(imageContainer,icon,file);
    });
  }
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

    // file = event.dataTransfer.files[0];
    // let list = new DataTransfer();
    // list.items.add(file);
    // inputPath.files = list.files;

    // showImage(imgPlaceholder,icon,file);
    // dropArea.classList.remove("active");

    if (event.dataTransfer.files.length + totalFiles > 6) {
      alert('You can only upload a maximum of 6 files');
    } else {
      let list = new DataTransfer();
      Array.from(inputPath.files).forEach(file => {
        list.items.add(file);
      });
      Array.from(event.dataTransfer.files).forEach(file => {
        list.items.add(file);
        showImage(imageContainer,icon,file);
      });
      inputPath.files = list.files;
      totalFiles += event.dataTransfer.files.length;
      dropArea.classList.remove("active");
    }
})

function showImage(imageContainer,icon,file){
    let fileType = file.type;

    let validExtensions = ["image/jpeg", "image/jpg", "image/png"];
    if(validExtensions.includes(fileType)){
        let fileReader = new FileReader();
        fileReader.onload = ()=>{
            let fileURL = fileReader.result;

            // var imgPlaceholder = document.querySelector("#item_img_placeholder");
            // var imgPlaceholder = placeholders[i];
            // imgPlaceholder.setAttribute("src", fileURL); //i
            // imgPlaceholder.style.display = "block";     //i       
            // document.querySelector("#item_img_placeholder").style.backgroundImage = 'url(' + fileURL + ')';

            // var icon = document.querySelector("#item_img_placeholder_icon");
            // var text = document.querySelector(".ad-form-drag-area-text");
            // var or = document.querySelector(".ad-form-drag-area-or");
            // var button = document.querySelector(".ad-form-drag-area-btn");

             // Create a new image element
            let img = document.createElement('img');
            img.setAttribute("src", fileURL);
            img.style.display = "block";

            // Create a new div to hold the image and the remove button
            let imgWrapper = document.createElement('div');
            imgWrapper.style.position = "relative";

            // Create the remove button
            let removeBtn = document.createElement('button');
            removeBtn.textContent = 'X';
            removeBtn.style.position = "absolute";
            removeBtn.style.top = "0";
            removeBtn.style.right = "0";

            // removeBtn.style.background = "#ff0000"; // Red background
            removeBtn.style.background = "#b8b8b8";
            removeBtn.style.color = "#ffffff"; // White text
            removeBtn.style.borderRadius = "50%"; // Round button
            removeBtn.style.border = "none"; // No border
            removeBtn.style.width = "19px"; // Width
            removeBtn.style.height = "19px"; // Height
            removeBtn.style.cursor = "pointer"; // Pointer cursor on hover

            removeBtn.addEventListener('click', () => {
                // Remove the image and decrease the totalFiles count
                imageContainer.removeChild(imgWrapper);
                totalFiles--;
            });

            // Append the image and the remove button to the wrapper
            imgWrapper.appendChild(img);
            imgWrapper.appendChild(removeBtn);

             // Append the new image element to the placeholder
            imageContainer.appendChild(imgWrapper);

            console.log('Image appended to container');

            icon.style.display = "none";
            // text.style.display = "none";
            // or.style.display = "none";
            // button.style.display = "none";
        };
        fileReader.onerror = () => {
          console.error('Error reading file:', fileReader.error); // Debugging line
        };
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

// const dropArea1 = document.querySelector(".ad-form-drag-area1");
// let dropText1 = document.querySelector(".ad-form-drag-area-text1");
// const browseButton1 = document.querySelector(".ad-form-drag-area-btn1");
// let inputPath1 = document.querySelector("#item_images1");
// let file1;

// var imgPlaceholder1 = document.querySelector("#item_img_placeholder1");
// var icon1 = document.querySelector("#item_img_placeholder_icon1");

//   if(browseButton1 && inputPath1) {
//     browseButton1.onclick = () => {
//       inputPath1.click();
//     };
//   }
  
//   inputPath1.addEventListener("change", function () {
//     file1 = this.files[0];
//     showImage(imgPlaceholder1,icon1,file1);
//   //   dropArea.classList.add("active");
//   });
  
//   dropArea1.addEventListener("dragover", (event) => {
//     event.preventDefault();
//     dropArea1.classList.add("active");
//     dropText1.textContent = "Release to Upload File";
//   });
  
//   dropArea1.addEventListener("dragleave", () => {
//     dropArea1.classList.remove("active");
//     dropText1.textContent = "Drag & Drop to Upload File";
//   });
  
//   dropArea1.addEventListener("drop", (event)=>{
//       event.preventDefault();
  
//       file1 = event.dataTransfer.files[0];
//       let list1 = new DataTransfer();
//       list1.items.add(file);
//       inputPath1.files = list1.files;
  
//       showImage(imgPlaceholder1,icon1,file1);
//       dropArea1.classList.remove("active");
//   })