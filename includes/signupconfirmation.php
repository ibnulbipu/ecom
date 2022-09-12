<?php
if (isset($_POST['signup'])) {

  $email = $_POST['email'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $dob = $_POST['Dob'];
  $mobile = $_POST['Mobile'];
  $password = $_POST['password'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $country = $_POST['country'];

  $encryptedpass = md5($password);


  include 'db.php';

  //connecting & inserting data

  $query = "INSERT INTO users(email,
  firstname,
  lastname,
  Dob,
  Mobile,
  password,
  address,
  city,
  country,
  role) VALUES ('$email',
  '$firstname',
  '$lastname',
  '$dob',
  '$mobile',
  '$encryptedpass',
  '$address',
  '$city',
  '$country',
  'client')";

  if ($connection->query($query) === TRUE) {


    echo "<div class='center-align'>
         <h5 class='black-text'> Dear,<br> <span class='green-text'>$firstname $lastname Your Resigtration is Succesful !!</span> </h5>
         <h5 class='black-text'><span class='blue-text'>And Your mobile number is $mobile 
         </span> </h5>
         <a class='button-rounded btn waves-effects waves-light'>Log In</a>
         </div>";
  } else {
    echo "<h5 class='red-text'>Error: " . $query . "</h5>" . $connection->error;
  }

  $connection->close();
}
