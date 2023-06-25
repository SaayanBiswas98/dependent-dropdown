<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> 
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

   
    <title>Document</title>
</head>
<body>
    <?php $msg=$this->session->flashdata('msg');
    if($msg!=""){
        echo "<div class='alert alert-success'>'.$msg.'</div>";

    }
    ?>
    <div class="navbar navbar-dark bg-dark">
        <div class="container">
            <h1 class="text-white">Crud Application</h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
            <a href="<?php echo base_url().'index.php/list';?>" class="btn btn-primary">list</a>
            </div>
            
        <form action="<?= base_url().'index.php/auth/save';?>" method="POST">
            <div class="md-col-12">
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email"/>
                    <?php echo form_error('email');?>
                </div>
                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="text" class="form-control" name="phone"/>
                    <?php echo form_error('phone');?>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="text" class="form-control" name="password"/>
                    <?php echo form_error('password');?>
                </div>
                <div class="form-group">
                    <label for="">Country</label>
                    <select name="country" id="country" class="form-control">
                        <option value="">country</option>
                        <?php if(!empty($user)){
                            foreach($user as $user){
                                ?>
                                <option value="<?php echo $user['country_id'];?>"><?php echo $user['country'];?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>State</label>
                    <div id="statesBox">
                        <select name="state" id="state" class="form-control">
                          <option value=''>Select a State</option>
                        </select>
                    </div>
                </div>   
                
                <div class="form-group">
                    <input type="submit" class="btn btn-success"/>
                </div>
            </div>
        </div>
        </form>
    </div>

    <script type="text/javascript">
      $(document).ready(function(){
        $("#country").change(function(){

            var country_id=$(this).val();
            $url='<?php echo base_url().'index.php/auth/getstates';?>/';
            alert(country_id);
            console.log(country_id);
            $.ajax({
                url:$url,
                type:'POST',
                data:{country_id:country_id},
                datatype:'JSON',
                success:function(response){
                    if(response['states']) {
                        $("#statesBox").html(response['states']);
                        
                    }
                }
            })

        });
      });
      
    </script>
</body>
</html>