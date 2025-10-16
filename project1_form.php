<?php

$csvPath = __DIR__ . '/data/form_submissions1.csv'; //file path to our csv
$errors = []; //errors will be logged in array that we start as empty
$success = false; //initialize to false, will be true upon successful update to the csv

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
if ($email && !filter_var($email, FILTER_VALIDATE_EMAIL)) { $errors[] = 'E-mail Address is invalid.'; } //use built in email validation t check if email is valid
if ($zip && !preg_match('/^\\d{5}(-\\d{4})?$/', $zip)) { $errors[] = 'Zip Code should be 5 digits (optional +4).'; } //make sure zip code is either 4 or five numbers, no strings etc
if ($appraised && !is_numeric($appraised)) { $errors[] = 'Appraised Value must be numeric.'; } //make sure appraised is a numeric value

if (!$errors){ // (if there are no errors)
    // Append to CSV. If new file, write header first.
    $isNew = !file_exists($csvPath); //only runs the very first time
    $fh = fopen($csvPath, 'a'); //open file for writing, 'a' is php syntax for append mode
    if ($isNew){
      fputcsv($fh, ['first_name','last_name','street','city','state','zip','email','phone','appraised_value','submitted_at']); //writes the header row
    }
    fputcsv($fh, [$first,$last,$street,$city,$state,$zip,$email,$phone,$appraised,date('c')]); //write single line to csv with all the input
    fclose($fh); //close file
    $success = true; //set to true for successful submission
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

<h1>Project #1 – Data Collection Form</h1>
<nav><a href="project1_view.php">View CSV</a></nav>

 <form method="post" novalidate> <!-- already validating with earlier foreach loop -->
    <label>First Name<input name="first_name" required></label>
    <label>Last Name<input name="last_name" required></label>
    <label>Street Address<input name="street" required></label>
    <label>City<input name="city" required></label>
    <label>State<input name="state" maxlength="2" placeholder="PA" required></label>
    <label>Zip Code<input name="zip" inputmode="numeric" pattern="\\d{5}(-\\d{4})?" placeholder="#####"></label>
    <label>E-mail Address<input type="email" name="email" required></label>
    <label>Phone Number (optional)<input name="phone" placeholder="(###) ###-####"></label>
    <label>Appraised Value of House<input name="appraised_value" inputmode="decimal" placeholder="250000" required></label>
    <div style="grid-column:1/-1">
      <button type="submit">Save to CSV</button>
    </div>
  </form>
  <footer><small class="mono">Data file: data/project1_leads.csv</small></footer>
</body>
</html>