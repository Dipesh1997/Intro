<?php
 
/*
 * Following code will list all the products
 */
define('DB_USER', "epiz_20642892"); // db user
define('DB_PASSWORD', "q2222q"); // db password (mention your db password here)
define('DB_DATABASE', "epiz_20642892_data"); // database name
define('DB_SERVER', "sql302.epizy.com"); // db server
// array for JSON response
$response = array();
 $conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD,DB_DATABASE);
// get all products from products table
$sql = "SELECT * FROM patient_info";
$result = $conn->query($sql) or die (mysqli_connect_error());

//$result = mysqli_query("") or die(mysqli_connect_error());
 
// check for empty result
if (mysqli_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["patients"] = array();
 
    while ($row = mysqli_fetch_array($result)) {
        // temp user array
        $product = array();
        $product["id"] = $row["id"];
        $product["patient_name"] = $row["patient_name"];

        $product["patient_gender"] = $row["patient_gender"];
       
        $product["patient_address"] = $row["patient_address"];
        $product["patient_email"] = $row["patient_email"];
       
 
        // push single product into final response array
        array_push($response["patients"], $product);
    }
    // success
    $response["success"] = 1;
 
    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No products found";
 
    // echo no users JSON
    echo json_encode($response);
}
?>