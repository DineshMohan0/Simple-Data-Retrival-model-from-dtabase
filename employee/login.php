<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <?php 
    include "db.php";
    session_start();
    
    if(isset($_POST["login"]))
    {
        $username = $_POST["userid"];
        $password = $_POST["userpassword"];
        $role = $_POST["role"];
        
        $qry = "SELECT * FROM employee WHERE Username='$username' AND Password='$password' AND Role='$role'";
        $result = $conn->query($qry);
        
        if ($result && $result->num_rows > 0) {
            $_SESSION["Username"] = $username;
            $_SESSION["Role"] = $role;

            if ($role === "manager") {
                header("Location: manager.php");
                exit;
            } elseif ($role === "employee") {
                header("Location: employee.php");
                exit;
            } elseif ($role === "admin") {
                header("Location: admin.php");
                exit;
            }
        } else {
            echo "<div class='alert alert-warning alert-dismissible'>
                    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                    <strong>Warning!</strong> Please enter correct username, password, and role.
                  </div>";
        }
    }
    ?>

    <div class="login-text">
    </div>
    <div class="container login-cont">
        <div class="form-box px-5 py-4">
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                <h2 class="text-center mb-4">LOGIN</h2>
                <label>User ID</label>
                <input type="text" name="userid" placeholder="Enter your ID" class="form-control" required><br>
                <label>Password</label>
                <input type="password" name="userpassword" placeholder="Enter your password" class="form-control" required><br>
                <label>Role</label>
                <select name="role" class="form-control" required>
                    <option value="">Select Role</option>
                    <option value="admin">Admin</option>
                    <option value="manager">Manager</option>
                    <option value="employee">Employee</option>
                  
                </select><br>
                <br>
                <button type="submit" name="login" class="subm-btn form-control">Login</button>
            </form>
        </div>
    </div>

</body>
</html>
