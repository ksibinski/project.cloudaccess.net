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
<p>Today&rsquo;s date (according to this web server) is
    <?php
        echo date('l, F jS Y.');
    ?>
        Your IP number is:
    <?php
        $ip = $_SERVER['REMOTE_ADDR'];
        $handle = fopen('ip_log.txt', 'a+');
        fwrite($handle, $ip); fwrite($handle, "\n");
        fclose($handle);
        echo $ip;
        phpinfo();
    ?>
</p>
</body>
</html>