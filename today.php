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
        $ip = $_SERVER['REMOTE_ADDR'];
        $host = gethostbyaddr($ip);
        //$asn = geoip_asnum_by_name($ip);
        $handle = fopen('ip_log.txt', 'a+');
        fwrite($handle, $ip); fwrite($handle, "\n");
        fclose($handle);
        echo "Today's date is: ",date('l, F jS Y.'),"<br>","Your IP number is: ",$ip,"<br>","Your host name is: ",$host,"<br>";//,"Your ASN is: ",$asn;
        phpinfo();
    ?>
</p>
</body>
</html>