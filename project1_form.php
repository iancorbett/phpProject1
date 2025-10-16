<?php

$errors = [];

function clean($v){ return trim($v ?? ''); } //TAKES IN VALUE AND TRIMS IT, if null it defaults to an empty string

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first = clean($_POST['first_name'] ?? '');
    $last  = clean($_POST['last_name'] ?? '');
    $street= clean($_POST['street'] ?? '');
    $city  = clean($_POST['city'] ?? '');
    $state = clean($_POST['state'] ?? '');
    $zip   = clean($_POST['zip'] ?? '');
    $email = clean($_POST['email'] ?? '');
    $phone = clean($_POST['phone'] ?? '');
    $appraised = clean($_POST['appraised_value'] ?? '');

    foreach ([['First Name',$first],['Last Name',$last],['Street Address',$street],
    ['City',$city],['State',$state],['Zip Code',$zip],
    ['E-mail Address',$email],['Appraised Value of House',$appraised]] as [$label,$val]){
if ($val === '') { $errors[] = $label . ' is required.'; } //phone is optional thus why its not listed here in the array
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project-1: Data-Collection</title>
</head>
<body>
    
</body>
</html>