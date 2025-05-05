<?php
 
/*
 * Following code will update a product information
 * A product is identified by product id (pid)
 */
 
// array for JSON response
$response = array();
 
// check for required fields
if (isset($_POST['id']) && isset($_POST['patient_name']) && isset($_POST['patient_gender']) && isset($_POST['patient_address']) && isset($_POST['patient_email'])) {
 
    $id = $_POST['id'];
    $patient_name = $_POST['patient_name'];
    $patient_gender = $_POST['patient_gender'];
    $patient_address = $_POST['patient_address'];
    $patient_email = $_POST['patient_email'];
 
 
define('DB_USER', "epiz_20642892"); // db user
define('DB_PASSWORD', "q2222q"); // db password (mention your db password here)
define('DB_DATABASE', "epiz_20642892_data"); // database name
define('DB_SERVER', "sql302.epizy.com"); // db server
// array for JSON response

 

 $conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD,DB_DATABASE);

$sql = "UPDATE patient_info SET patient_name = '$patient_name', patient_gender = '$patient_gender', patient_email = '$patient_email', patient_address = '$patient_address' WHERE id = $id";
$result = $conn->query($sql) or die (mysqli_connect_error()); 

    // mysql update row with matched pid
   
    // check if row inserted or not
    if ($result) {
        // successfully updated
        $response["success"] = 1;
        $response["message"] = "Patient details successfully updated.";
 
        // echoing JSON response
        echo json_encode($response);
    } else {
 
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}
?>