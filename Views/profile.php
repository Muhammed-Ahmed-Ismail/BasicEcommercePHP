<?php
print_r($_SESSION);
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]==true)
{
?>

<h1>Hello from profile page</h1>
    <a href="Views/downloadpage.php?id=8">download</a>
<?php }
else{
    header("Location:/login");
}