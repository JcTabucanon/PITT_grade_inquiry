<!-- <link rel="stylesheet" href="table.css">
<?php
echo "<table border='1'>";
echo "<tr><th></th>"; // First row with empty cell for spacing

// Create header row with column values
for ($col = 1; $col <= 5; $col += 0.1) {
if ($col == 4.3) {
echo "<th colspan='7'>" . number_format($col, 1) . "</th>";
} elseif ($col < 4.3 || $col >= 5) {
echo "<th>" . number_format($col, 1) . "</th>";
}
}
echo "</tr>";

// Create remaining rows with row values and computed values in intersection
for ($row = 1; $row <= 5; $row += 0.1) {
echo "<tr><td>" . number_format($row, 1) . "</td>";
for ($col = 1; $col <= 5; $col += 0.1) {
if ($col == 4.3) {
echo "<td colspan='7'></td>";
} elseif ($col < 4.3 || $col >= 5) {
$value = number_format(($row + $col) / 2, 1);
echo "<td>" . $value . "</td>";
}
}
echo "</tr>";
}

echo "</table>";

?>



 -->
