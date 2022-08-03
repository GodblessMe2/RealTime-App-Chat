// Variable 

const searchBtn = document.getElementById('search-btn');
const searchBar = document.querySelector('.search-input');
const userList = document.querySelector('.user-list')


searchBtn.addEventListener('click', toggleSearchBtn);
searchBar.addEventListener('keyup', filterSearch)



function toggleSearchBtn() {
	// if (searchBar.classList.contains('active-submit')) {
  //   searchBar.classList.remove('active-submit');
  // } else {
  //   searchBar.classList.add('active-submit');
  // }
  searchBar.classList.toggle('active-submit');
  searchBar.focus();
  searchBtn.classList.toggle('active');
  searchBar.value = "";   
}



function filterSearch() {
  const searchTerm = searchBar.value;
  if (searchTerm != '') {
     searchBar.classList.add('active');
  } else {
    searchBar.classList.remove('active');
  }


  let xhr = new XMLHttpRequest();
  // Open Connection
  xhr.open("POST", 'php/search.php', true);
  // check if readyState is 4 or stats is 200
  xhr.onload = function () {
    if (xhr.readyState === 4 || xhr.status === 200) {
     let data = xhr.responseText;
     userList.innerHTML = data; 
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send('searchTerm=' + searchTerm);
}





setInterval( function() {
 let xhr = new XMLHttpRequest();
  // Open Connection
  xhr.open("GET", 'php/dashbprocess.php', true);
  // check if readyState is 4 or stats is 200
  xhr.onload = function () {
        if (xhr.readyState === 4 || xhr.status === 200) {
         let data = xhr.responseText;
         // if (searchBar.classList.contains('active') == "") {
         //  userList.innerHTML = data; 
         // }

         if(searchBar.value == '') {
          userList.innerHTML = data; 
         }
        }
    }
   xhr.send();
}, 500); //Runs frequently after 500ms