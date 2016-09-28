<?php
if(!isset($_POST['submit']))
{
	//This page should not be accessed directly. Need to submit the form.
	echo "error; you need to submit the form!";
}

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$visitor_email = $_POST['email'];
$cell_phone = $_POST['cell'];
$work_phone = $_POST['work'];
$message = $_POST['message'];

//Validate first
if(empty($first_name)||empty($visitor_email) || empty($last_name) || empty($cell_phone))
{
    echo "First name, last name, cell phone and email are mandatory!";
    exit;
}
if(IsInjected($visitor_email))
{
    echo "Bad email value!";
    exit;
}

$email_from = $visitor_email;
$email_subject= "New Enquiry on website";
$email_body=" You have received a new inquiry from an individual with the following details: \n".
"Name: $first_name  $last_name \n".
"Email: $visitor_email \n".
"Cell Phone: $cell_phone \n".
"Work Phone: $work_phone \n".
"Query:\n $message".

$to = "info@tegat.co.ke";

$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $visitor_email \r\n";

//Send the email!
mail($to,$email_subject,$email_body,$headers);

//Redirect to thank_you page

header('Location:thank_you.html');

// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}

?> 
