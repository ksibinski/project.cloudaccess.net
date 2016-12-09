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
<form action="ipform.php" method="post">
    <p>Enter IP to check: <input title="IP Check Form" type="text" name="form"/></p>
    <p><input type="submit" /></p>
</form>
<p>
    <?php
        $ip = $_SERVER['REMOTE_ADDR'];
        $host = gethostbyaddr($ip);
        $country = geoip_country_code_by_name($ip);
        $handle = fopen('ip_log.txt', 'a+');
        fwrite($handle, date(DATE_RFC2822)); fwrite($handle, "      ");fwrite($handle, $ip); fwrite($handle, "      ");fwrite($handle, $host);fwrite($handle, "     ");fwrite($handle, $country);fwrite($handle, "\n");
        fclose($handle);
        echo "Today's date is: ",date(DATE_RFC2822),"<br>","Your IP number: ",$ip,"<br>","Your host name: ",$host,"<br>","Your country code: ",$country,"<br>";
        //phpinfo();
    ?>
</p>
</body>
</html>