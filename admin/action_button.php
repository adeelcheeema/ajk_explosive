   <?php
    if ($portal_user_id && ($user_role == 'home')) {
      echo '<a href="https://localhost/explosive/auth/login.php" class="btn btn-primary mr-2" type="button">Accept</a>
      <a href="https://localhost/explosive/auth/login.php" class="btn btn-primary mr-2" type="button">Reject</a>';
    } else if ($portal_user_id && ($user_role == 'explosive')) {
      echo '
      <a href="https://localhost/explosive/auth/login.php" class="btn btn-primary mr-2" type="button">Forward To DC</a>';
    } else {
      echo '<a href="https://localhost/explosive/auth/login.php" class="btn btn-primary mr-2" type="button">Login</a>';
    }
    ?>