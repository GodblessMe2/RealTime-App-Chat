<?php
 session_start();

require_once('config.php');


$firstName = mysqli_real_escape_string($conn, $_POST['firstname']);
$lastName = mysqli_real_escape_string($conn, $_POST['lastname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
 
if (!empty($firstName) && !empty($lastName) && !empty($email) && !empty($password)) {
  // Check if email is valid
  if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // check if email have already exist  
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    if (mysqli_num_rows($sql) > 0) {
      # code...
      echo "$email is already exist in the database";
    } 

    else {
      // if true check if image is uploaded or not 
      if(isset($_FILES['image'])){
        // Get the name of the image files
        $img_name = $_FILES['image']['name'];
        // save/more files into a folder 
        $tmp_name = $_FILES['image']['tmp_name'];

        // get the last extension like jpg, jpeg or png and return in an array
        $img_explope = explode('.', $img_name);

        // get the last name in the extension of user uploading img file
        $img_ext = end($img_explope);

       //store the valid img ext in and array
       $extension = ['png', 'jpg', 'jpeg'];

       if (in_array($img_ext, $extension) === true) {
         // code...
        // return current time.
         $time = time();

         // add the current time to the uploading user img
         $new_img_name = $time.$img_name;

         // if uploading image is successfull move to the folder name IMAGES
         if (move_uploaded_file($tmp_name, "images/".$new_img_name)) {
          // when user signed up the the staus will be active
            $status = "Active now";
            // Create a random id for user 
            $random_id = rand(time(), 10000000);

             // Insert the user data inside the databases table
            $sql_insert = mysqli_query($conn, "INSERT INTO users (unique_id, firstname, lastname, email, password, image, status) VALUES ({$random_id}, '{$firstName}', '{$lastName}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");
            if ($sql_insert) {
              // code...
              $sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
              if (mysqli_num_rows($sql2) > 0) {
                // code...
                $row = mysqli_fetch_assoc($sql2);

                // using session for user unique_id in other php  file
                $_SESSION['unique_id'] = $row['unique_id'];
                echo "success";
              }
            } else {
              echo "Something went wrong!";
            }

         } 

       } else {
        echo "Please select an Image file with jpeg, jpg, png";
      }      
        
      } else {
        echo "Please select aan image file!";
      }

    }

  } else {
    // 
    echo "$email is not a Email, provide a valid email";
   }

} else {
  # code...
  echo "All input Fields Are Required!";
}

?>