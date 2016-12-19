<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>IP Check Form</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
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
        echo "Today's date is: ",date(DATE_RFC2822),"<br>","IP number: ",$ip_form,"<br>","Host name: ",$host_form,"<br>","Country code: ",$country_form,"<br>","<br>","<a href='today.php'>Back to your IP page</a>";
        //phpinfo();
    ?>
</p>
</body>
</html>