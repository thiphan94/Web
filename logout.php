<html>
<head>
  <h1>See you again!</h1>
</head>
</html>

<?
phpsession_start();
unset($_SESSION["pseudo"]);
unset($_SESSION["pass"]);
header("Location:session.php");
?>
<h2><a href="index.php">Page accueil</a></h2>