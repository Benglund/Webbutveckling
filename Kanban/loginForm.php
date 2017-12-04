<?php
//require 'core.php';
//echo $current_file;

if (isset($_POST['email']) and isset($_POST['password'])){
    $usernameORemail = $_POST['email'];
    $password = $_POST['password'];
    $password_hash = md5($password);

    if (!empty($usernameORemail) and !empty($password)){

        $query = "SELECT id FROM users WHERE password = '$password_hash' AND (email = '$usernameORemail' or username = '$usernameORemail')";
       $query_run = mysqli_query($link, $query);
           if (0 == mysqli_num_rows($query_run)){
               echo 'fel lösen o användarnamncombo';
           } else if(1 == mysqli_num_rows($query_run)){
               echo 'lösen o användarnamn match';
               $row = mysqli_fetch_assoc($query_run);
               echo $count = $row['id'];
               $_SESSION['user_id'] = $count;
               header('Location: login.php');
           }
       }



}else{
    echo "No username/email or passwrod has ben supplied";
}
?>

<form action="<?php
echo $current_file;
?>" method="POST">

    Email or Username: <input type="text" name="email"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" name="login" value="Log in" ><br>


</form>
