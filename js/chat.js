const typingMsg = document.querySelector('.message-typing');
const inputMsg = typingMsg.querySelector('.input-message')
const sendBtn = typingMsg.querySelector('button');
const chatBody = document.querySelector('.chat-body')

typingMsg.addEventListener('click', function(e){
   e.preventDefault();
});


sendBtn.addEventListener('click', function() {
	// Create XML Object
  let xhr = new XMLHttpRequest();
  // Open Connection
  xhr.open("POST", 'php/chatprocsess.php', true);
  // check if readyState is 4 or stats is 200
  xhr.onload = function () {
    if (xhr.readyState === 4 || xhr.status === 200) {
      // Clear input msg when its send
      inputMsg.value = "";
     scrollToBottom();
    }
  }
  // send data TYPINGMSG through ajax to php
  // Create an Object
  let formData = new FormData(typingMsg);
  xhr.send(formData);
})

chatBody.addEventListener('mouseenter', function () {
	chatBody.classList.add('active');
})

chatBody.addEventListener('mouseleave', function () {
	chatBody.classList.remove('active');
})

setInterval( function() {
 let xhr = new XMLHttpRequest();
  // Open Connection
  xhr.open("POST", 'php/get-chat.php', true);
  // check if readyState is 4 or stats is 200
  xhr.onload = function () {
        if (xhr.readyState === 4 || xhr.status === 200) {
         let data = xhr.responseText;
         chatBody.innerHTML = data;
         if (!chatBody.classList.contains('active')) {}
             scrollToBottom();
        }
    }
   // send data TYPINGMSG through ajax to php
  // Create an Object
  let formData = new FormData(typingMsg);
  xhr.send(formData);
}, 500); //Runs frequently after 500ms

function scrollToBottom () {
	chatBody.scrolltop = chatBody.scrollHeight; 
}