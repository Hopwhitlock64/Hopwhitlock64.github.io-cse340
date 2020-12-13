<?php 
// This is the main controller 

// Create or access a Session
session_start();

require_once '../library/connections.php';
require_once '../model/main-model.php';
require_once '../model/accounts-model.php';
require_once '../model/reviews-model.php';
require_once '../library/functions.php';

 // Get the array of classifications
 $classifications = getClassifications();
$navList = navigationList($classifications);

 //echo $navList;
 // exit;

 $action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }
    
 switch ($action){
 case 'register':
  include '../view/register.php';
  break;
  case 'logout':    
session_destroy();
header('Location: /phpmotors/');
  break;
 case 'signin':
$clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
$clientEmail = checkEmail($clientEmail);
$clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
$passwordCheck = checkPassword($clientPassword);

// Destroy cookie
if (isset($_COOKIE['firstname'])) {
  unset($_COOKIE['firstname']);
  setcookie('firstname', '', time() - 3600, '/'); // empty value and old timestamp
}
// Run basic checks, return if errors
if (empty($clientEmail) || empty($passwordCheck)) {
 $message = '<p class="notice">Please provide a valid email address and password.</p>';
 include '../view/signIn.php';
 exit;
}
$clientData = getClient($clientEmail);
// Compare the password just submitted against
// the hashed password for the matching client
$hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
// If the hashes don't match create an error
// and return to the login view
if(!$hashCheck) {
  $message = '<p class="notice">Please check your password and try again.</p>';
  include '../view/signIn.php';
  exit;
}
// A valid user exists, log them in
$_SESSION['loggedin'] = TRUE;
// Remove the password from the array
// the array_pop function removes the last
// element from an array
array_pop($clientData);
// Store the array into the session
$_SESSION['clientData'] = $clientData;
// Send them to the admin view
include '../view/admin.php';
exit;

 break;
 case 'mod':
  $existingClient = $_SESSION['clientData'];
  include '../view/client-update.php';
exit;
 break;

 case 'admin':
  $clientId = $_SESSION['clientData']['clientId'];
  $reviewData = getReviewsByClient($clientId);

  if(!count($reviewData)){

  }else{
    $reviewDisplay = buildReviewDisplayAdmin($reviewData);
}  
  include '../view/admin.php';
exit;
 break;

 case 'updateAccount':
  $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);
  $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
  $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
  $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
  // check email
  $clientEmail = checkEmail($clientEmail);

  $existingEmail = false;
  if($clientEmail == $_SESSION['clientData']['clientEmail']){
    $existingEmail = checkExistingEmail($clientEmail);
  }
  if(empty($clientId) || empty($clientFirstname) || empty($clientLastname) || empty($clientEmail)){
    $message = '<p>Please provide information for all empty form fields.</p>';
    include '../view/client-update.php';
    exit; 
  } 
  $clientResult = updateClient($clientId, $clientFirstname, $clientLastname, $clientEmail);

  if($clientResult === 1){
    $_SESSION['message'] = '<p>congrats, your info was updated.</p>';
    $_SESSION['clientData'] = getClientById($clientId);
    include '../view/admin.php';
    exit;
  } else {
    $_SESSION['message'] = '<p>Error. Info failed to update.</p>';
    include '../view/admin.php';
    exit;
  }
  include '../view/client-update.php';
  exit;
 break;
 case 'changePassword':
  $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);
  $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
  $checkPassword = checkPassword($clientPassword);

  // Hash the checked password
$hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

$passwordResult = updatePassword($clientId, $hashedPassword);
// var_dump($passwordResult);
// exit;

if($passwordResult === 1){
  $_SESSION['message'] = '<p>congrats, your password was updated.</p>';
  $_SESSION['clientData'] =  getClientById($clientId);
  include '../view/admin.php';} else {
    $_SESSION['message'] = '<p>Password failed to update.</p>';
  include '../view/admin.php';
  exit;
  }
  exit;
 break;
case 'registration':

// Filter and store the data
$clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
$clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
$clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
$clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
$clientEmail = checkEmail($clientEmail);
$checkPassword = checkPassword($clientPassword);
$existingEmail = checkExistingEmail($clientEmail);

 //echo $checkPassword.' :: '.$existingEmail;
//echo 'FirstName: '.$clientFirstname.' ::LastName: '.$clientLastname.' :: Email: '.$clientEmail.' :: Password: '.$clientPassword.' !!';
//exit;

// checking for existing email address
if($existingEmail){
  $message = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
  include '../view/signIn.php';
  exit;
 }
 

// Check for missing data
if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)){
  $message = '<p>Please provide information for all empty form fields.</p>';
  include '../view/register.php';
  exit; 
} 
// Hash the checked password
$hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);


// Send the data to the model
$regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);

// Check and report the result
if($regOutcome === 1){
  setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
  $_SESSION['message'] = "Thanks for registering $clientFirstname. Please use your email and password to login.";
  header('Location: /phpmotors/accounts/?action=signin');
  exit;
 } else {
  $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
  include '../view/register.php';
  exit;
 }
break;
default:
break;
}





 

