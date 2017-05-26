<?php

include("lib/credentials.php");
$conn = mysqli_connect($credentials['host'],$credentials['username'],$credentials['password'],$credentials['db_name']);

if(!empty($_POST["login"])) {
    $result = mysqli_query($conn,"SELECT * FROM users WHERE user_name='" . $_POST["user_name"] . "' and password = '".md5($_POST["password"])."'");
    $row  = mysqli_fetch_array($result);
    if(is_array($row)) {
    $_SESSION["user_id"] = $row['user_id'];
    } else {
    $message = "<b>Feil:</b> Du har skrevet ugyldig brukernavn/passord!";
    }
}
?>

<div class="login-page">
    <?php if(empty($_SESSION["user_id"])) { ?>
      <div class="form">
        <form action="" class="login-form" method="post">
          <input type="text" name="user_name" placeholder="Brukernavn"/>
          <input type="password" name="password" placeholder="Passord"/>
          <button type="submit" name="login" value="Login">Logg inn</button>
        </form>
      </div>
      <?php if(isset($message)) { ?>
      <div class="error-message">
         <?= $message; ?>
      </div>
      <?php } ?>
    <?php } else { ?>
        <?php echo "<script>location='?page=reservasjoner'</script>"; ?>
    <?php } ?>
</div>

</form>
</div>
</div>