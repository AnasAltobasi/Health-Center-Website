<?php include "Connection_DataBase.php";

$Name = isset($_POST["Name"]) ? $_POST["Name"] : "";

$Email = isset($_POST["Email"]) ? $_POST["Email"] : "";

$Subject = isset($_POST["Subject"]) ? $_POST["Subject"] : "";

$Message = isset($_POST["Message"]) ? $_POST["Message"] : "";

$Submit = isset($_POST["Submit"]) ? $_POST["Submit"] : "";

$Error_flag_name = false;

$Error_flag_email = false;

$Error_flag_subject = false;

$Error_flag_message = false;

$error = null;

$check = true;

$Error_array = array(
    // register errors
    'Name' => '',
    'Email' => '',
    'Message' => '',
    'Subject' => ''
);


if (isset($_POST["Submit"])) {
    if (empty($Name) || empty($Email) || empty($Subject) || empty($Message)) {
        $error = "Please Fill All Requires In Form";
        $check = false;
    }
    //validation name
    if (empty($Name)) {
        $Error_array['Name'] = "Name Empty";
        $Error_flag_name = true;
    } else if (!preg_match('/^[_\s[:alpha:]]+$/', $Name) && (!preg_match("/\p{Arabic}/u", $Name))) {
        $Error_array['Name'] = "Only letters";
        $Error_flag_name = true;
    }
    //validation email
    if (empty($Email)) {
        $Error_array['Email'] = "Email Empty";
        $Error_flag_email = true;
    } elseif (!preg_match('/^[-_[:alnum:]]+(\.[-_[:alnum:]]+)*@[[:alnum:]]+(\.[[:alnum:]]+)*(\.[[:alpha:]]{2,})$/', $Email)) {
        $Error_array['Email'] = "Invalid Email";
        $Error_flag_email = true;
    }
    //validation subject
    if (empty($Subject)) {
        $Error_array['Subject'] = "Subject Empty";
        $Error_flag_subject = true;
    }
    //validation Messages
    if (empty($Message)) {
        $Error_array['Message'] = "Message Empty";
        $Error_flag_message = true;
    }

    if ($check &&  $Error_flag_name === false && $Error_flag_email === false  && $Error_flag_subject === false && $Error_flag_message === false) {
        if ('$Submit') {
            $query = "INSERT INTO contact ( Name,Email,Subject,Message) VALUES('$Name','$Email','$Subject','$Message')";
            //  (ID,Name,Email,Subject,Message)
            $result = mysqli_query($conn, $query);
        }
    }
}

// End
