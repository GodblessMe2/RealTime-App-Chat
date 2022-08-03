<!-- <!DOCTYPE html>
<html>
<head>
    <title>Toggle Password Visibility</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
  .container i {
    margin-left: -30px;
    cursor: pointer;
}

  .mystyle {
    width: 100%;
    padding: 25px;
    background-color: coral;
    color: white;
    font-size: 25px;
    box-sizing: border-box;
  }
</style>
<body>
  <div class="container">
      <h1>Toggle Password Visibility</h1>
      <input type="password" name="password" id="password" placeholder="Enter the password">
      <i class="far fa-eye" id="togglePassword"></i>
  </div>

  <button onclick="myFunction()">Try it</button>

  <div id="myDIV">
    This is a DIV element.
  </div>
    <script src="js/app.js"></script>
</body>
<!-- <script>
  const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#password');

  togglePassword.addEventListener('click', function (e) {

    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});


function myFunction() {
   var element = document.getElementById("myDIV");
   element.classList.toggle("mystyle");
}

</script> -->
 <!--</html> -->

<?php 

function filter_array($array, $letter) {
  $filtered_array = array();
  foreach ($array as $key => $value) {
    // code...
    if ($value[0] == $letter) {
      // code...
      $filtered_array[] = $value; } } return $filtered_array; } $entries =
      array('p01', 'p02', 'p03', 'g01', 'g02', 'a01', 'a02'); $filtered =
      filter_array($entries, 'a'); var_dump($filtered);


?>