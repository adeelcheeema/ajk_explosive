   <?php 
            if ($portal_user_id && ( $user_role == 'admin' || $user_role == 'super-admin')) { echo '
<div class="btn-group">
  <button type="button" class="btn btn-warning mr-2 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Reports
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="admin/reports/mill.php">Mill</a>
    <a class="dropdown-item" href="admin/reports/depo.php">Depo</a>
  </div>
</div>
                <form method="post" class="m-0">
        <input class="btn btn-danger mr-2" type="submit" name="logout" value="Logout">
    </form>
            
            ';}
            
            else if ($portal_user_id) { echo '<a href="https://industries.ajk.gov.pk/explosive/admin" class="btn btn-warning mr-2" type="button">Manage Inventory</a>
                <form method="post" class="m-0">
        <input class="btn btn-danger mr-2" type="submit" name="logout" value="Logout">
    </form>
            
            ';}
            else { echo '<a href="https://industries.ajk.gov.pk/explosive/auth/login.php" class="btn btn-primary mr-2" type="button">Login</a>';}
            ?>