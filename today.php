<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Today&rsquo;s Date</title>
    <style>
        h1 {text-align:center;}
        p {text-align:center;}
    </style>
</head>
<body>
<p>
    <?php
        echo "Today's date (according to this web server) is: \n";
        echo date('l, F jS Y.');
        echo "Your IP number is: ";
        $ip = $_SERVER['REMOTE_ADDR'];
        echo $ip;
        $handle = fopen('ip_log.txt', 'a+');
        fwrite($handle, $ip); fwrite($handle, "\n");
        fclose($handle);
        phpinfo();
    ?>
</p>
</body>
</html>