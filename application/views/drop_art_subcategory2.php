<option >--select--</option>
<?php
foreach ($update_data as $art_subcategory2) {
    ?>
    <option value="<?php echo $art_subcategory2->art_subcategory2_id ?>"><?php echo $art_subcategory2->art_subcategory2_name ?></option>
    <?php
}
?>