<?php
include('mysql_connect.php');

// Display the existing table content
$query = "SELECT * FROM TBPolicies";
$result = @mysqli_query($conn, $query);

echo "<h2>Violations</h2>";

// Simple design for the table
echo "<style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        p {
            font-weight: bold;
        }
      </style>";

// Start table
echo "<table>";
echo "<thead>
        <tr>
            <th>Violation</th>
            <th>Count</th>
        </tr>
      </thead>";
echo "<tbody>";

$i = 0;
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row[0] . "</td>";
    echo "<td>" . $row[1] . "</td>";
    echo "</tr>";
    ++$i;
}

mysqli_free_result($result);
mysqli_close($conn);

// Close the table and display total records
echo "</tbody>";
echo "</table>";
echo "<p>Total Violations: " . $i . "</p>";
?>
