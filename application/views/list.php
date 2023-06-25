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
<?php $msg=$this->session->flashdata('msg');
    if($msg!=""){
        echo "<div class='alert alert-success'>'.$msg.'</div>";

    }
    ?>
    <div class="navbar navbar-dark bg-dark">
        <div class="container mb-2">
            <h1 class="text-white">Crud Application</h1>
        </div>
    </div>
    <div class="container mt-3 ">
        <div class="row">
        <div class="col-6">
            <h1>View User</h1>
        </div>
        <div class="col-6">
        <a href='<?= base_url().'index.php/auth/index';?>' class="btn btn-primary">Create</a>
        </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <tr>
                        <th>Email</th>
                        <th class="">Phone</th>
                        <th class="">Password</th>
                        <th>Action</th>
                    </tr>
                    <?php if(!empty($user))foreach($user as $user){?>
                        <tr>
                         <td><?php echo $user['email'];?></td>
                         <td><?php echo $user['phone'];?></td>
                         <td><?php echo $user['password'];?></td>
                         <td><a href="<?php echo base_url().'index.php/auth/edit/'.$user['id'];?>" class="btn btn-success">Edit</a></td>
                         <td><a href="<?php echo base_url().'index.php/auth/delete_record/'.$user['id'];?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                    <?php }  else {?>
                    <tr>
                        <td>NO records</td>
                    </tr>
                    <?php } ?>
                    </table>

                        

            </div>
        </div>
    </div>
</body>
</html>