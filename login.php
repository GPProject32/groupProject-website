<h2>Login</h2>
<form action="login.php" method="post">
    Email Address: <input type="text" id="email_add" name="email_add" size="20" maxlength="40"><br>
    Password: <input type="password" id="password" name="password" size="20" maxlength="20"><br><br>
    <input type="submit" name="submit" value="Login">
</form>

<?php
if (isset($_POST['submit'])) {
    include('mysql_connect.php');

    // Retrieve and sanitize inputs
    $e = mysqli_real_escape_string($conn, $_POST['email_add']);
    $p = mysqli_real_escape_string($conn, $_POST['password']);

    // Validate inputs
    if (!empty($e) && !empty($p)) {
        // Prepare the query
        $query = "SELECT user_id, first_name, last_name FROM users WHERE email='$e' AND password=SHA('$p')";
        $result = @mysqli_query($conn, $query);

        // Check the result
        if ($row = mysqli_fetch_array($result)) {
            echo "<h1>Welcome! $row[first_name] $row[last_name]</h1><br><br>";
            echo '<a href="menu.php">Continue</a>';
            exit();
        } else {
            echo 'The email address and password entered do not match those on file.';
        }
    } else {
        echo 'Please enter both email and password.';
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
