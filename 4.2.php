<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <?php
    setcookie('time' , date(DATE_COOKIE), (time() + (60 * 60 * 3)));
    setcookie('name' , 'Studentsson', (time() + (60 * 60 * 3)));
    ?>
</head>
<body>
    <p>
       Hej hej, hemsidan använder kakor(Cookies),<br> för att godkänna och se dina
        kakor, tryck på knappen.
    </p>
    <br>
    <form action="4.2.1.php">

    <p>
        <input type="submit" value="Godkänn" name="button">
    </p>
</form>
</body>
</html>
