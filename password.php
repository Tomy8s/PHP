<form action="password.php" method="post">
    Please enter a password: <input type="password" name="pass" autofocus onchange="this.form.submit()">
    <input type="submit" value="Continue">
</form>
<?php
if ($_POST['pass']==1234){
    echo '<p>Correct password!</p>';
}else{
    echo '<p>Incorrect password!</p>';
}
?>