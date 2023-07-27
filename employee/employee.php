<?php 
    include "db.php";
    session_start(); 

    if (isset($_POST['logout'])) {
      session_destroy();
      header("Location: login.php");
      exit();
  }

$qry = "SELECT * FROM empdata LIMIT 1";
$result = $conn->query($qry);
if ($result && $result->num_rows > 0) {
  $employee = $result->fetch_assoc();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Employee Page</title>
  <link rel="stylesheet" href="employee.css">

  <style>
button[name="logout"] {
  background-color: #f44336; 
  color: #ffffff; 
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button[name="logout"]:hover {
  background-color: #d32f2f; 
}

  </style>
</head>
<body>
  <div class="container">
    
    <?php if (isset($employee)) { ?>
      <h2>Employee <?php echo $employee['name']; ?></h2>
      <ul>
        <li><strong>Name:</strong> <?php echo $employee['name']; ?></li>
        <li><strong>Employee ID:</strong> <?php echo $employee['employee_id']; ?></li>
        <li><strong>Department:</strong> <?php echo $employee['department']; ?></li>
        <li><strong>Email:</strong> <?php echo $employee['email']; ?></li>
        <li><strong>Phone:</strong> <?php echo $employee['phone']; ?></li>
      </ul>

      <form method="post">
        <button type="submit" name="logout" class="but">Logout</button>
    </form>
    <?php } else { ?>
      <p class="error">Employee details not found.</p>
    <?php } ?>
  </div>
</body>
</html>

