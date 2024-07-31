<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Online Quiz - Quiz List</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz1.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
include("header.php");
include("database.php");
echo "<h2 class=head1><u>Select Subject to Give Quiz</u></h2>";

$rs = mysql_query("select * from mst_subject");

echo "<table class='table table-striped'>";
echo "<thead><tr><th>Subject</th><th>Quiz Link</th></tr></thead>";
echo "<tbody>";

while ($row = mysql_fetch_row($rs)) {
    echo "<tr><td>$row[1]</td><td><a href='showtest.php?subid=$row[0]' class='btn btn-primary'>Click Here</a></td></tr>";
}

echo "</tbody></table>";
?>
</body>
</html>