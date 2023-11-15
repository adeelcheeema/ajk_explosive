   <?php
    if ($portal_user_id && ($user_role == 'home')) {
      echo '<a href="https://industries.ajk.gov.pk/explosive/auth/login.php" class="btn btn-primary mr-2" type="button">Accept</a>
      <a href="https://industries.ajk.gov.pk/explosive/auth/login.php" class="btn btn-primary mr-2" type="button">Reject</a>';
    } else if ($portal_user_id && ($user_role == 'explosive')) {
      echo '<form method="post" class="m-0">
              <input class="btn btn-danger mr-2" type="submit" name="logout" value="Logout">
            </form>
            ';
    } else {
      echo '<a href="https://industries.ajk.gov.pk/explosive/auth/login.php" class="btn btn-primary mr-2" type="button">Login</a>';
    }
    ?>