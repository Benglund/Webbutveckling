<form method="post" action="6.2.1.php">
    <table>
        <tbody><tr>
            <td>
                Namn:
            </td>
            <td>
                <input type="text" name="name">
            </td>
        </tr>
        <tr>
            <td>
                E-post:
            </td>
            <td>
                <input type="text" name="email">
            </td>
        </tr>
        <tr>
            <td>
                Hemsida:
            </td>
            <td>
                <input type="text" name="homepage">
            </td>
        </tr>
        <tr>
            <td>
                Kommentar:
            </td>
            <td>
                <textarea name="comment" rows="10" cols="15"></textarea>
            </td>
        </tr>
        </tbody></table>
    <p>
        <input type="submit" value="Lägg till" name="push_button">
    </p>
</form>
<hr>

<?php

$link = connectToDatabase();

if(
    ($name = checkInput(@$_POST['name']) and //tar bort felmeddelandeet att eller om variabeln som inte är initerad
    $email = checkInput($_POST['email']) and
    $homepage = checkInput($_POST['homepage']) and
    $comment = checkInput($_POST['comment'])) != ''){

    $insert_query = $link -> prepare("INSERT INTO guestbook (id, time, name, webpage, email, comment) VALUES (NULL, NULL, ?, ?, ?, ?)");
    $insert_query->bind_param('ssss', $name, $homepage, $email, $comment);
    $insert_query->execute();

    header('location: 6.2.1.php'); //tvingar url att ändras och rensar post för att inte submitta igen vid refresh

}

displayComments();

function displayComments() {//visar tidigare kommentarer
    global $link;
    $show_list_query = "SELECT id, time, name, webpage, email, comment FROM guestbook ORDER BY id DESC";
    if ($query_run = mysqli_query( $link, $show_list_query)) {
        if (mysqli_num_rows($query_run) == null) {
            echo 'No comments found';
        } else {
            while ($query_row = mysqli_fetch_assoc($query_run)) {
                $id = XSSProtection($query_row['id']);
                $time = XSSProtection($query_row['time']);
                $name = XSSProtection($query_row['name']);
                $email = XSSProtection($query_row['email']);
                $homepage = XSSProtection($query_row['webpage']);
                $comment = XSSProtection($query_row['comment']);
                echo '<p>
    <strong>Inlägg:</strong> ' . $id . '<br>
<p>
    <strong>Tid:</strong> ' . $time . '<br>
    <strong>Från:</strong> <a href="' . $homepage . '">' . $name . '</a><br>
    <strong>E-post:</strong> <a href="mailto:' . $email . '">' . $email . '</a>
</p>
<p>
    <strong>Kommentar:</strong> ' . $comment . '
</p><hr>';
            }
        }
    } else {
        echo mysqli_error($link);
    }
}

function connectToDatabase(){ //ansluter till DSV databas, skulle kunna göras genom ett annat php dokument och en incloude/require också.
    $mysql_host='atlas.dsv.su.se';
    $mysql_user='usr_17383323';
    $mysql_password='383323';
    $mysql_db='db_17383323';
    $mysql_port = 3306;
    return $link = @mysqli_connect($mysql_host, $mysql_user,$mysql_password, $mysql_db, $mysql_port);
}
function XSSProtection($output){ //tar bort kod som kan ändra html outlay och scripts
    return htmlspecialchars(strip_tags($output));
}
function checkInput($input){ //städar inputen för att kunna läggas in i databas och tar bort mellanrum
    global $link;
    $input = $link->escape_string(trim($input));
    return $input;
}
?>