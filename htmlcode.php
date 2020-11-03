<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HTML Code</title>
</head>
<body>
<h1>This is HTML way to write php</h1>
<p>This is where the paragraph goes</p>
<?php

$i = 0;
while($i<10){

    echo "<p>This is the '.$i.'th line</p>";
        $i++;
}

?>
</body>
</html>