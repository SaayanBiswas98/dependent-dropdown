<select name="state" id="state" class="form-control">
    <option value="">Select a State</option>
    <?php if(!empty($states)){
        foreach($states as $states){?>
        <option value="<?php echo $states['id'];?>"><?php echo $states['state'];?></option>
    <?php  } } ?>
</select>