<?php

$csvPath = __DIR__ . '/data/form_submissions1.csv';
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