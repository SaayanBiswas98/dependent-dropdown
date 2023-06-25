<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="navbar navbar-dark bg-dark">
        <div class="container">
            <h1 class="text-white">Update Application</h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
        <form action="<?php echo base_url().'index.php/auth/edit/'.$user['id'];?>" method="POST">
            <div class="md-col-12">
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" value="<?php echo set_value('email',$user['email']);?>"/>
                    <?php echo form_error('email');?>
                </div>
                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="tel" class="form-control" name="phone" value="<?php echo set_value('phone',$user['phone']);?>"/>
                    <?php echo form_error('phone');?>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="text" class="form-control" name="password"  value="<?php echo set_value('password',$user['password']);?>"/>
                    <?php echo form_error('password');?>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success"/>
                </div>
            </div>
        </div>
        </form>
    </div>
</body>
</html>