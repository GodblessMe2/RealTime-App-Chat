// Declare Variable
const form = document.querySelector('.signup form');
const submitButton = document.getElementById('submit');
const errorMsg = document.querySelector('.error-text');

// Add event Listeners 
loadEventListener();

function loadEventListener() {
  form.addEventListener('submit', dataSubmit)
  submitButton.addEventListener('click', submitData)
}


// functions

function dataSubmit(e) {
  e.preventDefault();
}

function submitData() {
  // Create XML Object
  let xhr = new XMLHttpRequest();
  // Open Connection
  xhr.open("POST", 'php/signup.php', true);
  // check if readyState is 4 or stats is 200
  xhr.onload = function () {
    if (xhr.readyState === 4 || xhr.status === 200) {
     const data = xhr.responseText;
     // console.log(data);
     if (data == "success") {
      window.location.href = 'dashboard.php';
     } else {
      errorMsg.style.display = "block";
      errorMsg.textContent = data;      
     }
    }
  }
  // send data form through ajax to php
  // Create an Object
  let formData = new FormData(form);
  xhr.send(formData);
  
} 