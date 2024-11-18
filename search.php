<h2>Search</h2>
<form action='search.php' method='post'>
<p>User ID: <input type="text" name="user_id" size=20 maxlength=40 /></p>
<p><input type='submit' name='search' value='Search' /></p>
</form>
<?php
include('mysql_connect.php');
if (isset($_POST['user_id’])) {
$id = $_POST['user_id’];
$query = "Select user_id, first_name, last_name, email, registration_date FROM users WHERE user_id='$id' ";
$result = @mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
if ($row) {
echo "User ID : " . $row[0] . "<br>";
echo "Name : " . $row[1] . " " . $row[2] . "<br>";
echo "Email Address : " . $row[3] . "<br>";
echo "Date registered : " . $row[4] . "<br>";
}
else
echo "No record found...";
}
?>
<br><br><a href="menu.php">Menu</a>

