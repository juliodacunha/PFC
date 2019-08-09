<!DOCTYPE Html>
<html>
<head>
    <title> Admin - Login</title>
    <link rel="stylesheet" type="text/css" href="<?php base_url();?>includes/bootstrap/css/bootstrap.css">
</head>
<body>
    <div class="login col-md-4 mx-auto">
    <h1 class="mx-auto">Admin Login</h1>
        <form method="post" action="<?php echo site_url('admin/login/verify')?>">    
        <div class="form-group">
            <input type="text" name="email" placeholder="email" class="form-control">
            <input type="password" name="senha" placeholder="senha" class="form-control">
            <input type="submit" name="submit" value="Login" class="btn btn-primary">
        </div>
        </form>       
    </div>
</body>
</html>