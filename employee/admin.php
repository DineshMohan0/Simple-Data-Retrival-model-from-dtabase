<?php
include "db.php";
session_start();

if (isset($_POST['logout'])) {
  
  session_destroy();
  header("Location: login.php");
  exit();
}

$qryAdmin = "SELECT * FROM admin LIMIT 1";
$resultAdmin = $conn->query($qryAdmin);
$admin = null;
if ($resultAdmin && $resultAdmin->num_rows > 0) {
  $admin = $resultAdmin->fetch_assoc();
}

$qryEmployee = "SELECT * FROM empdata LIMIT 1";
$resultEmployee = $conn->query($qryEmployee);
$employee = null;
if ($resultEmployee && $resultEmployee->num_rows > 0) {
  $employee = $resultEmployee->fetch_assoc();
}

$qryManager = "SELECT * FROM managerdata LIMIT 1";
$resultManager = $conn->query($qryManager);
$manager = null;
if ($resultManager && $resultManager->num_rows > 0) {
  $manager = $resultManager->fetch_assoc();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Page</title>
  <link rel="stylesheet" href="admin.css">
</head>

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
<body>
  <div class="container">
    <h2>Welcome, Admin</h2>
    <p>This is the admin page where you have access to perform administrative tasks.</p>
    
    <h3>Admin Details</h3>
    <?php if ($admin) { ?>
      <ul>
        <li><strong>Name:</strong> <?php echo $admin['name']; ?></li>
        <li><strong>Email:</strong> <?php echo $admin['email']; ?></li>
        <li><strong>Phone:</strong> <?php echo $admin['phone']; ?></li>
      </ul>
    <?php } else { ?>
      <p>No admin details found.</p>
    <?php } ?>
    
    <button onclick="viewManagers()">View Managers</button>
    <button onclick="viewEmployees()">View Employees</button>
<br>
<form method="post">
        <button type="submit" name="logout" class="but">Logout</button>
    </form>
  </div>

  <script>
    function viewManagers() {
      
      window.location.href = "manager.php";
    }

    function viewEmployees() {
      
      window.location.href = "employee.php";
    }
  </script>
</body>
</html>
