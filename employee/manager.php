  <?php
include "db.php";
session_start();

if (isset($_POST['logout'])) {
  session_destroy();
  header("Location: login.php");
  exit();
}

$qry = "SELECT * FROM managerdata LIMIT 1";
$result = $conn->query($qry);
if ($result && $result->num_rows > 0) {
  $manager = $result->fetch_assoc();
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Manager Page</title>
  <link rel="stylesheet" href="manager.css">
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
    <h2> Manager</h2>
    <p>This is the manager page where you have access to perform managerial tasks.</p>
    
    <h3>Manager Details</h3>
    <?php if (isset($manager)) { ?>
      <ul>
        <li><strong>Name:</strong> <?php echo $manager['name']; ?></li>
        <li><strong>Employee ID:</strong> <?php echo $manager['manager_id']; ?></li>
        <li><strong>Role:</strong> <?php echo $manager['role']; ?></li>
        <li><strong>Email:</strong> <?php echo $manager['email']; ?></li>
        <li><strong>Phone:</strong> <?php echo $manager['phone']; ?></li>
      </ul>

     
    <?php } else { ?>
      <p>No manager details found.</p>
    <?php } ?>
    
    <button onclick="viewEmployees()">View Employees</button>
    <br>
    <form method="post">
        <button type="submit" name="logout" class="but">Logout</button>
    </form>
  </div>


  <script>
    function viewEmployees() {
      window.location.href = "employee.php";
    }
  </script>
</body>
</html>  
