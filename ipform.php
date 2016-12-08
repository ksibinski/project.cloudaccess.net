<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>IP Check Form</title>
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
        $ip_form = $_POST['form'];
        $host_form = gethostbyaddr($ip_form);
        $country_form = geoip_country_code_by_name($ip_form);
        $handle = fopen('ip_form_log.txt', 'a+');
        fwrite($handle, date(DATE_RFC2822)); fwrite($handle, "      ");fwrite($handle, $ip_form); fwrite($handle, "     ");fwrite($handle, $host_form);fwrite($handle, "        ");fwrite($handle, $country_form);fwrite($handle, "\n");
        fclose($handle);
        echo "Today's date is: ",date('l, F jS Y.'),"<br>","IP number: ",$ip_form,"<br>","Host name: ",$host_form,"<br>","Country code: ",$country_form,"<br>","<a href='today.php'>Back to your IP</a>";
        //phpinfo();
    ?>
</p>
</body>
</html>