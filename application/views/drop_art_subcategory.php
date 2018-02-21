<option >--select--</option> 
<?php
foreach ($update_data as $art_subcategory) {
    ?>
    <option value="<?php echo $art_subcategory->art_subcategory_id ?>"><?php echo $art_subcategory->art_subcategory_name ?></option>
    <?php
}

