<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$set_path = "../";
require("../helpers/connect.php");
// require functions in use
require("../helpers/modules.php");
$record_id = filter_input(INPUT_GET, 'id');
?>
<center>
    <button class="btn btn-danger intbtnpco" onclick="tpl_cancelDeletePost(<?=$record_id?>)">Yes, Proceed</button>&nbsp;
    <button class="btn btn-default intbtnpco dismiss-modal-bco">No, Dismiss</button>
</center>
<center>
<div class="loader-wait"></div>
</center>
<script type="text/javascript">
    $(".dismiss-modal-bco").click(function(e) {
        $('#popupModalDEL').modal('toggle');
    });
</script>