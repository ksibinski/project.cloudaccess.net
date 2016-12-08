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
<form action="today.php" method="post">
    <p>Enter IP to check: <input title="IP Check Form" type="text" name="form"/></p>
    <p><input type="submit" /></p>
</form>
<p>
    <?php
        $ip_form = $_POST['form'];
        $host_form = gethostbyaddr($ip_form);
        $country_form = geoip_country_code_by_name($ip_form);
        $handle = fopen('form_log.txt', 'a+');
        fwrite($handle, date('l, F jS Y.')); fwrite($handle, " ");fwrite($handle, $ip_form); fwrite($handle, " ");fwrite($handle, $host_form);fwrite($handle, " ");fwrite($handle, $country_form);fwrite($handle, "\n");
        fclose($handle);
        echo "Today's date is: ",date('l, F jS Y.'),"<br>","Your IP number is: ",$ip_form,"<br>","Your host name is: ",$host_form,"<br>","Your country code is: ",$country_form,"<br>";
        $ip = $_SERVER['REMOTE_ADDR'];
        $host = gethostbyaddr($ip);
        $country = geoip_country_code_by_name($ip);
        $handle = fopen('ip_log.txt', 'a+');
        fwrite($handle, date('l, F jS Y.')); fwrite($handle, " ");fwrite($handle, $ip); fwrite($handle, " ");fwrite($handle, $host);fwrite($handle, " ");fwrite($handle, $country);fwrite($handle, "\n");
        fclose($handle);
        echo "Today's date is: ",date('l, F jS Y.'),"<br>","Your IP number is: ",$ip,"<br>","Your host name is: ",$host,"<br>","Your country code is: ",$country,"<br>";
        //phpinfo();
    ?>
</p>
</body>
</html>