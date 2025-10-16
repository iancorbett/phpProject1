<?php

$csvPath = __DIR__ . '/data/form_submissions1.csv';

$rows = [];
$sum = 0.0;

if (file_exists($csvPath)) { // only if csv file exists
    if (($fh = fopen($csvPath, 'r')) !== false) { //open the file in read only mode, hence the 'r', continue if it works successfully
      $header = fgetcsv($fh); // first line = column headers
      while (($data = fgetcsv($fh)) !== false) { //keep  looping while there is more to read in the csv file
        $row = array_combine($header, $data); // create an associative array (key-value pairs)
        $row['appraised_value'] = (float)($row['appraised_value'] ?? 0); //making this a float instead of a string
        $rows[] = $row; // take the current $row array and push it to the end of the $rows array
      }
      fclose($fh); //close file
    }

    usort($rows, function ($a, $b) { //user defined sort, sorting $rows array using custom rule
        $c = strcasecmp($a['city'] ?? '', $b['city'] ?? ''); //strcasecmp is built in php function that ocmpares two srings (case insenstitve) and determines their order alphebetically
        if ($c !== 0) return $c; //only returns zero if they are identical
        return strcasecmp($a['last_name'] ?? '', $b['last_name'] ?? ''); //compare by cities if last names are identical
      });

      foreach ($rows as $r) {
        $sum += (float)$r['appraised_value']; //value of all entries combined in the csv
      }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project-1: CSV Viewer</title>
</head>
<body>
<h1>Project #1 – CSV Viewer</h1>
  
<nav>
    <a href="project1_form.php">Back to Form</a>
</nav>  

<?php if (!file_exists($csvPath)): ?> <!-- if file doesnt exist -->
    <p class="notice">No data yet — submit the form first.</p> <!-- return message if no submission made -->
<?php else: ?> <!-- else if it does exist then create a table-->

<table class="table">
      <thead>
        <tr>
          <th>First</th><th>Last</th><th>Street</th><th>City</th><th>State</th>
          <th>Zip</th><th>Email</th><th>Phone</th>
          <th>Appraised</th><th>Submitted</th>
        </tr>
      </thead>
    </table>
    
    <?php endif; ?>
</body>
</html>