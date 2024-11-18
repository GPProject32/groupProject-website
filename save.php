<?php
// Check if the form has been submitted
if (isset($_POST['submit'])) {
    $pl = $_POST['policy'];
    $c = $_POST['count'];
    
    include('mysql_connect.php');
    
    // Insert data into the TBPolicies table
    $query = "INSERT INTO TBPolicies(Violation, Count) VALUES ('$pl', '$c')";
    $result = @mysqli_query($conn, $query);
    
    if ($result) {
        echo "<h1>Thank you...</h1><p>New Policy Added!</p>";
    } else {
        echo "<h1>Error</h1><p>There was an issue adding the new policy. Please try again.</p>";
    }
    
    mysqli_close($conn);
}
?>


