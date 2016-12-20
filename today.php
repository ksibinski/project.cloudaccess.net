<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Today&rsquo;s Date</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.blue_grey-indigo.min.css" />
    <script defer src="https://code.getmdl.io/1.2.1/material.min.js"></script>
</head>
<body>
<form action="ipform.php" method="post">
    <p>Enter IP to check: <input title="IP Check Form" type="text" name="form"/></p>
    <p><input type="submit" /></p>
</form>
<!-- Accent-colored raised button with ripple -->
<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
    Button
</button>
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
