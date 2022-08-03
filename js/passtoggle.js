// Variable 
const togglePassword = document.querySelector('#togglePassword'), 
      password = document.querySelector('#password');

// Event Listeners
loadEventListeners();

function loadEventListeners() {
	togglePassword.addEventListener('click', toggleButton);	
}



// Function 

function toggleButton(e) {
	e.preventDefault();
	// toggle the type attribute
	const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
	password.setAttribute('type', type);
	// toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
		
}




