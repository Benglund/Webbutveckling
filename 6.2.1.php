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

$mysql_host='localhost';
$mysql_user='root';
$mysql_password='';
$mysql_db='guestbook';
$link = @mysqli_connect($mysql_host, $mysql_user,$mysql_password, $mysql_db);


if(isset($_POST['name']) and isset($_POST['email']) and isset($_POST['homepage']) and isset($_POST['comment'])) {

    $name = checkInput($_POST['name']);
    $email = checkInput($_POST['email']);
    $homepage = checkInput($_POST['homepage']);
    $comment = checkInput($_POST['comment']);


    $insert_query = $link -> prepare("INSERT INTO guestbook (id, time, name, email, homepage, comment) 
                                            VALUES (NULL, NULL, ?, ?, ?, ?)");
    $insert_query->bind_param('ssss', $name, $email, $homepage, $comment);

    $insert_query->execute();

    //$query_run = mysqli_query($link, $insert_query);

}


        $show_list_query = "SELECT id, time, name, email, homepage, comment FROM guestbook ORDER BY id DESC";

        if ($query_run = mysqli_query($link, $show_list_query)) {

            if (mysqli_num_rows($query_run) == null) {
                echo 'no results found';
            } else {

                while ($query_row = mysqli_fetch_assoc($query_run)) {
                    $id = XSSProtection($query_row['id']);
                    $time = XSSProtection($query_row['time']);
                    $name = XSSProtection($query_row['name']);
                    $email = XSSProtection($query_row['email']);
                    $homepage = XSSProtection($query_row['homepage']);
                    $comment = XSSProtection($query_row['comment']);


                    echo '<p>
    <strong>Inlägg:</strong> '.$id.'<br>
<p>
    <strong>Tid:</strong> '.$time.'<br>
    <strong>Från:</strong> <a href="'.$homepage.'">'.$name.'</a><br>
    <strong>E-post:</strong> <a href="mailto:'.$email.'">'.$email.'</a>
</p>
<p>
    <strong>Kommentar:</strong> '.$comment.'
</p><hr>';

                }
            }

        } else {
            echo mysqli_error($link);
        }

        function XSSProtection($output){
           return htmlspecialchars(strip_tags($output));
        }

        function checkInput($input){
            global $link;
            $input = $link->escape_string($input);
            return $input;
        }

?>
