<?php include (TEMPLATEPATH . '/lib/options/options-var.php'); ?>
<?php if($tn_keko_sidebar_banner_one != '') { ?>
<li id="sidebar-ads">
<h3>Advertisment</h3>
<ul>
<li id="ads">

<?php if($tn_keko_sidebar_banner_one != '') { ?>
<?php echo stripcslashes($tn_keko_sidebar_banner_one); ?>
<?php } ?>

<?php if($tn_keko_sidebar_banner_two != '') { ?>
<?php echo stripcslashes($tn_keko_sidebar_banner_two); ?>
<?php } ?>

<?php if($tn_keko_sidebar_banner_three != '') { ?>
<?php echo stripcslashes($tn_keko_sidebar_banner_three); ?>
<?php } ?>

<?php if($tn_keko_sidebar_banner_four != '') { ?>
<?php echo stripcslashes($tn_keko_sidebar_banner_four); ?>
<?php } ?>

<?php if($tn_keko_sidebar_banner_five != '') { ?>
<?php echo stripcslashes($tn_keko_sidebar_banner_five); ?>
<?php } ?>

<?php if($tn_keko_sidebar_banner_six != '') { ?>
<?php echo stripcslashes($tn_keko_sidebar_banner_six); ?>
<?php } ?>


</li>
</ul>
</li>
<?php } ?>