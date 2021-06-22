<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
 
    <title>Dashboard</title>
  </head>
  <body>
    <?php
        // $session = session();
        // echo "Welcome back, ".$session->get('user_name')."<a href='/CodeIgniter/public/login/logout/'>Click here to logout</a>"; 
    ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">PROFILER</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav" style="margin-left: 35%;">
            <a class="nav-link" aria-current="page" href="/CodeIgniter/public/dashboard/" style="margin-top: 6px;">Dashboard</a>
            <?php if($role_name == 'SuperAdmin'):?>
            <a class="nav-link" href="/CodeIgniter/public/adduser/" style="margin-top: 6px;">Add User</a>
            <a class="nav-link active" href="#" style="margin-top: 6px;">Add Role</a>
            <a class="nav-link" href="#" style="margin-top: 6px;">some task 2</a>
            <a class="nav-link" href="#" style="margin-top: 6px;">some task 3</a>
            <?php elseif($role_name == 'Admin'):?>
            <a class="nav-link" href="#" style="margin-top: 6px;">some task 2</a>
            <a class="nav-link" href="#" style="margin-top: 6px;">some task 3</a>
            <?php endif;?>
            <a class="nav-link" href="/CodeIgniter/public/editprofile/" style="margin-top: 6px;">Edit Profile</a>
            <a class="nav-link" href='/CodeIgniter/public/login/logout/'><button type="button" class="btn btn-danger" style="margin-right: 5%;">Logout</button></a>
        </div>
        </div>
    </div>
    </nav>

    <div class="container" style="text-align: left; margin-top: 5%;">
      <div class="row justify-content-md-center">
        <div class="col-6">
            <h1>Add Role</h1>
            <?php if(isset($validation)):?>
                <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
            <?php endif;?>
            <form action="/CodeIgniter/public/addrole/save" method="post">
                <div class="mb-3">
                    <h5>Available Roles :</h5>
                    <ul>
                        <?php foreach ($role_names as $rolename):?>
                        <li><?=$rolename?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="mb-3">
                    <label for="InputForRoleName" class="form-label">Role Name</label>
                    <input type="text" name="rolename" class="form-control" id="InputForRoleName" value="<?= set_value('rolename') ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
      </div>
    </div>
     
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  </body>
</html>