<?php
////////////////////////////////////////////////////////////////////////////////
// get theme option
////////////////////////////////////////////////////////////////////////////////
if( !function_exists('get_theme_option') ):
function get_theme_option($option)
{
global $shortname;
return stripslashes(get_option($shortname . '_' . $option));
}
endif;

if( !function_exists('get_theme_settings') ):
function get_theme_settings($option)
{
return stripslashes(get_option($option));
}
endif;


////////////////////////////////////////////////////////////////////////////////
// get alt style list
////////////////////////////////////////////////////////////////////////////////
$alt_stylesheet_path = get_template_directory() . '/lib/styles/alt-styles/';
$alt_stylesheets = array();
if ( is_dir($alt_stylesheet_path) ) {
if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) {
while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
if(stristr($alt_stylesheet_file, ".css") !== false) {
$alt_stylesheets[] = $alt_stylesheet_file;
}
}
}
}
$styles_bulk_list = array_unshift($alt_stylesheets, "default.css");

////////////////////////////////////////////////////////////////////////////////
// global upload path
////////////////////////////////////////////////////////////////////////////////
$option_upload = wp_upload_dir();
$option_upload_path = $option_upload['basedir'];
$option_upload_url = $option_upload['baseurl'];


////////////////////////////////////////////////////////////////////////////////
// multiple string option page
////////////////////////////////////////////////////////////////////////////////
function _g($str) { return $str; }

function theme_admin_head_script() {
global $theme_version;
if ($_GET["page"] == "theme-options") {
wp_enqueue_script( 'theme-color-picker-js', get_template_directory_uri() . '/lib/admin/js/colorpicker.js', array( 'jquery' ), $theme_version );
wp_enqueue_script( 'theme-option-custom-js', get_template_directory_uri() . '/lib/admin/js/options-custom.js', array( 'jquery' ), $theme_version );
//add uniform js
wp_enqueue_script( 'theme-uniform-js', get_template_directory_uri() . '/lib/admin/js/uniform/jquery.uniform.js', array( 'jquery' ), $theme_version );
?>
<script type='text/javascript'>
 jQuery(function(){
 jQuery("select,textarea,input:checkbox,input:text,input:radio,input:file").uniform();
 });
</script>
<?php
}
}

function theme_admin_head_style() {
global $theme_version;
if ($_GET["page"] == "theme-options") {
wp_enqueue_style( 'admin-css', get_template_directory_uri() . '/lib/admin/css/admin.css', array(), $theme_version );
wp_enqueue_style( 'color-picker-main', get_template_directory_uri() . '/lib/admin/css/colorpicker.css', array(), $theme_version );
wp_enqueue_style( 'uniform-css', get_template_directory_uri() . '/lib/admin/js/uniform/css/uniform.default.css', array(), $theme_version );
?>
<?php }
}
add_action('admin_footer', 'theme_admin_head_script');
add_action('admin_print_styles', 'theme_admin_head_style');


////////////////////////////////////////////////////////////////////////////////
// Theme Option
////////////////////////////////////////////////////////////////////////////////
$theme_data = wp_get_theme( TEMPLATE_DOMAIN );
$theme_version = $theme_data['Version'];
$theme_name = $theme_data['Name'];
$shortname = 'tn_'. TEMPLATE_DOMAIN;

$choose_count = array("Select a number","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20");

$background_pattern_list = array("Select a pattern","pattern1","pattern2","pattern3","pattern4","pattern5","pattern6","pattern7","pattern8");

/* including fonts functions */
include_once( get_template_directory() . '/lib/functions/fonts-functions.php');

$categories = get_categories('hide_empty=0&orderby=name');
$wp_cats = array();
foreach ($categories as $category_list ) {
$wp_cats[$category_list->cat_ID] = $category_list->cat_name;
}
array_unshift($wp_cats, "Choose a category:");

$options = array (

/*header setting*/
array(
"header-title" => __("Header Setting", TEMPLATE_DOMAIN),
"name" => __("Site Logo", TEMPLATE_DOMAIN),
	"description" => __("Upload your logo here.", TEMPLATE_DOMAIN),
	"id" => $shortname."_header_logo",
    "filename" => $shortname."_header_logo",
	"type" => "uploads",
	"default" => ""),

array(
"name" => __("Custom Header Title", TEMPLATE_DOMAIN),
"description" => __("If not using logo, enter your custom header title here.<br /><em>*optional - default site name will be use</em>", TEMPLATE_DOMAIN),
	"id" => $shortname."_custom_header_title",
	"type" => "text",
	"default" => ""),

array(
"name" => __("Custom Header Text", TEMPLATE_DOMAIN),
"description" => __("Enter your custom header text here.<br /><em>*optional - default site description will be use</em>", TEMPLATE_DOMAIN),
	"id" => $shortname."_custom_header_text",
	"type" => "text",
	"default" => ""),

array(
"name" => __("Favourite Icon", TEMPLATE_DOMAIN),
	"description" => __("Upload your fav icon here. <em>prefered 16x16 or 32x32 image dimension</em>", TEMPLATE_DOMAIN),
	"id" => $shortname."_fav_icon",
    "filename" => $shortname."_fav_icon",
	"type" => "uploads",
	"default" => ""),


/* typography setting */
array(
"header-title" => __("Typography Settings", TEMPLATE_DOMAIN),
"name" => __("Body Font", TEMPLATE_DOMAIN),
	"description" => __("Choose a font for the body text.", TEMPLATE_DOMAIN),
	"id" => $shortname."_body_font",
	"type" => "select-fonts",
	"options" => $font_family_group,
	"default" => ""),

array(
"name" => __("Headline and Title Font", TEMPLATE_DOMAIN),
	"description" => __("Choose a font for the headline text.", TEMPLATE_DOMAIN),
	"id" => $shortname."_headline_font",
	"type" => "select-fonts",
	"options" => $font_family_group,
	"default" => ""),

array(
"name" => __("Navigation Font", TEMPLATE_DOMAIN),
	"description" => __("Choose a font for the navigation text.", TEMPLATE_DOMAIN),
	"id" => $shortname."_navigation_font",
	"type" => "select-fonts",
	"options" => $font_family_group,
	"default" => ""),


/* featured setting */
array(
"header-title" => __("Featured Setting", TEMPLATE_DOMAIN),
"name" => "Sidebar Featured Category",
"description" => __("Choose which category to featured in sidebar", TEMPLATE_DOMAIN),
"id" => $shortname."_sidebar_featured",
"type" => "select",
"default" => "",
"options" => $wp_cats),

array(
"name" => "Footer Featured Category",
"id" => $shortname."_footer_featured",
"description" => __("Choose which category to featured in footer", TEMPLATE_DOMAIN),
"type" => "select",
"default" => "",
"options" => $wp_cats),


/* banner setting */
array(
"header-title" => __("Advertisment Setting", TEMPLATE_DOMAIN),
"name" => __("Banner 1", TEMPLATE_DOMAIN),
"description" => __("Insert Banner 1 embed html code here<br /><em>*leave blank if not use</em>", TEMPLATE_DOMAIN),
"id" => $shortname."_sidebar_banner_one",
"type" => "textarea",
"default" => "",
),
array(
"name" => __("Banner 2", TEMPLATE_DOMAIN),
"description" => __("Insert Banner 2 embed html code here<br /><em>*leave blank if not use</em>", TEMPLATE_DOMAIN),
"id" => $shortname."_sidebar_banner_two",
"type" => "textarea",
"default" => "",
),
array(
"name" => __("Banner 3", TEMPLATE_DOMAIN),
"description" => __("Insert Banner 3 embed html code here<br /><em>*leave blank if not use</em>", TEMPLATE_DOMAIN),
"id" => $shortname."_sidebar_banner_three",
"type" => "textarea",
"default" => "",
),
array(
"name" => __("Banner 4", TEMPLATE_DOMAIN),
"description" => __("Insert Banner 4 embed html code here<br /><em>*leave blank if not use</em>", TEMPLATE_DOMAIN),
"id" => $shortname."_sidebar_banner_four",
"type" => "textarea",
"default" => "",
),
array(
"name" => __("Banner 5", TEMPLATE_DOMAIN),
"description" => __("Insert Banner 5 embed html code here<br /><em>*leave blank if not use</em>", TEMPLATE_DOMAIN),
"id" => $shortname."_sidebar_banner_five",
"type" => "textarea",
"default" => "",
),
array(
"name" => __("Banner 6", TEMPLATE_DOMAIN),
"description" => __("Insert Banner 6 embed html code here<br /><em>*leave blank if not use</em>", TEMPLATE_DOMAIN),
"id" => $shortname."_sidebar_banner_six",
"type" => "textarea",
"default" => "",
),


/* adsense setting */
array(
"header-title" => __("Google Adsense Settings", TEMPLATE_DOMAIN),
"name" => "Post Loop",
"description" => "Insert advertisment or google adsense code here<br /><em>suitable size 468x60 or 300x300</em>",
"id" => $shortname."_adsense_post",
"type" => "textarea",
"default" => "",
),


array(
"name" => "Post Single",
"description" => "Insert advertisment or google adsense code here<br /><em>suitable size 468x60 or 300x300</em>",
"id" => $shortname."_adsense_single",
"type" => "textarea",
"default" => "",
),


array(
"name" => "Post Sidebar",
"description" => "Insert advertisment or google adsense code here<br /><em>suitable size 300x300 or 250x250</em>",
"id" => $shortname."_adsense_sidebar",
"type" => "textarea",
"default" => "",
),

array(
"name" => "Goolge Analystic",
"description" => "Insert google analystic code <br /><em>*optional - leave it blank if not using</em>",
"id" => $shortname."_google_analystic",
"type" => "textarea",
"default" => "",
),


/* social setting */
array(
"header-title" => __("Social Setting", TEMPLATE_DOMAIN),
"name" => __("RSS Feeds", TEMPLATE_DOMAIN),
"description" => __("If you want to direct all your feeds to feedburner, insert you feedburner ID here <br /><em>*leave blank if not necessary</em>", TEMPLATE_DOMAIN),
"id" => $shortname."_feedburner",
"type" => "text",
"default" => "",
),

array(
"name" => __("Post Social Links", TEMPLATE_DOMAIN),
"description" => __("Enable or Disable post social share button", TEMPLATE_DOMAIN),
"id" => $shortname."_social_on",
"type" => "radio",
"default" => "Yes",
"options" => array("Yes", "No")
),

array(
"name" => "Big Social Links",
"description" => __("Enable or disable the big social button in single post", TEMPLATE_DOMAIN),
"id" => $shortname."_social_single_on",
"type" => "radio",
"default" => "Yes",
"options" => array("Yes", "No")
),

/* misc setting */
/*array(
"header-title" => __("Misc Settings", TEMPLATE_DOMAIN),
"name" => "Social Links",
"description" => __("Enable or disable the big social button in single post", TEMPLATE_DOMAIN),
"id" => $shortname."_keko_social",
"type" => "select",
"default" => "Enable",
"options" => array("Enable", "Disable "))*/


);

function theme_admin_option_register() {
global $theme_name, $shortname, $options, $option_upload_path, $option_upload_url;
?>

<div id="custom-theme-option" class="wrap">
<?php screen_icon(); echo "<h2>" . $theme_name . __( ' Theme Options', TEMPLATE_DOMAIN ) . "</h2>"; ?>
<?php
if ( $_REQUEST['saved'] ) echo '<div class="updated fade"><p><strong>'. $theme_name . __(' settings saved.', TEMPLATE_DOMAIN) . '</strong></p></div>';
if ( $_REQUEST['reset'] ) echo '<div class="updated fade"><p><strong>'. $theme_name . __(' settings reset.', TEMPLATE_DOMAIN) . '</strong></p></div>';
?>


<form id="wp-theme-options" method="post" action="" enctype="multipart/form-data">

<table class="form-table">

<?php foreach ($options as $value) { ?>

<?php if ( $value['header-title'] != "" ) { ?>
<tr class="trtitle" valign="top"><th scope="row"><h3><?php echo stripslashes($value['header-title']); ?></h3></th></tr>
<?php } ?>


<?php if ( $value['type'] == "text" ) { ?>

<tr valign="top"><th scope="row"><?php echo $value['name']; ?></th>
<td>
<input class="regular-text" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id']) ); } else { echo stripslashes($value['default']); } ?>" /><br />
<label class="description" for="<?php echo $value['id']; ?>"><?php echo $value['description']; ?></label>
</td>
</tr>

<?php } else if ( $value['type'] == "uploads" ) { ?>

<tr valign="top"><th scope="row"><?php echo $value['name']; ?></th>
<td>
<?php if( file_exists( $option_upload_path . '/' . $value['filename'] . '.jpg') ) { ?>
<img src="<?php echo $option_upload_url . '/' . $value['filename'] . '.jpg'; ?>" alt="<?php echo $value['id']; ?>" />
<br /><input type="submit" class="button-secondary" name="delete_<?php echo $value['filename']; ?>" value="Delete this image &raquo;" />
<?php } else { ?>
<input type="file" id="<?php echo $value['id']; ?>" name="<?php echo $value['filename']; ?>" size="50" />
<br />
<label class="description" for="<?php echo $value['id']; ?>"><?php echo $value['description']; ?></label>
<?php } ?>
</td>
</tr>

<?php } elseif ( $value['type'] == "radio" ) { // setting ?>

<tr valign="top"><th scope="row"><?php echo $value['name']; ?></th>
<td>
<?php foreach ($value['options'] as $option) {
$radio_setting = get_option($value['id']);
if($radio_setting != '') {
if (get_option($value['id']) == $option) { $checked = "checked=\"checked\""; } else { $checked = ""; }
} else {
if(get_option($value['id']) == $value['default'] ){ $checked = "checked=\"checked\""; } else { $checked = ""; }
} ?>
<input id="<?php echo $value['hide_call']; ?>" type="radio" name="<?php echo $value['id']; ?>" value="<?php echo $option; ?>" <?php echo $checked; ?> />&nbsp;<?php echo $option; ?>&nbsp;&nbsp;&nbsp;
<?php } ?>
<br /><label class="description" for="<?php echo $value['id']; ?>"><?php echo $value['description']; ?></label>
</td>
</tr>


<?php } elseif ( $value['type'] == "checkbox" ) { // setting ?>

<tr valign="top"><th scope="row"><?php echo $value['name']; ?></th>
<td>
<?php if(get_option($value['id'])) { $checked = "checked=\"checked\""; } else { $checked = ""; } ?>
<input type="<?php echo $value['type']; ?>" class="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="<?php echo $value['id']; ?>" <?php echo $checked; ?> />&nbsp;&nbsp;<?php echo $value['name']; ?>
<br /><label class="description" for="<?php echo $value['id']; ?>"><?php echo $value['description']; ?></label>
</td>
</tr>



<?php } elseif ( $value['type'] == "radio-pattern" ) { // setting ?>

<tr valign="top"><th scope="row"><?php echo $value['name']; ?></th>
<td>
<?php $pi = 0; foreach ($value['options'] as $option) {
$radio_setting = get_option($value['id']);
if($radio_setting != '') {
if (get_option($value['id']) == $option) { $checked = "checked=\"checked\""; } else { $checked = ""; }
} else {
if(get_option($value['id']) == $value['default'] ){ $checked = "checked=\"checked\""; } else { $checked = ""; }
} ?>

<div style="<?php if($pi==0): ?>display:none; <?php endif; ?>text-slign:center;width:60px;height:80px;float:left;margin:0 10px 0 0;">
<div style="border:1px solid #ddd;width:60px;height:50px;background: transparent url('<?php echo get_template_directory_uri(); ?>/images/textures/pattern<?php echo $pi; ?>.png') repeat;"></div>
<input type="radio" name="<?php echo $value['id']; ?>" value="<?php echo $option; ?>" <?php echo $checked; ?> /><?php echo $option; ?>
</div>

<?php $pi++; } ?>
<div style="clear:both;"></div>
<br /><label class="description" for="<?php echo $value['id']; ?>"><?php echo $value['description']; ?></label>
</td>
</tr>


<?php } elseif ( $value['type'] == "textarea" ) { // setting ?>

<tr valign="top"><th scope="row"><?php echo $value['name']; ?></th>
<td>
<?php
$valuex = $value['id'];
$valuey = stripslashes($valuex);
$video_code = get_option($valuey);
?>
<textarea name="<?php echo $valuey; ?>" class="mytext" cols="60%" rows="8" /><?php if ( get_option($valuey) != "") { echo stripslashes($video_code); } else { echo $value['default']; } ?>
</textarea><br />
<label class="description" for="<?php echo $value['id']; ?>"><?php echo $value['description']; ?></label>
</td>
</tr>

<?php } elseif ( $value['type'] == "colorpicker" ) { ?>

<tr valign="top"><th scope="row"><?php echo $value['name']; ?></th>
<td>

<div id="<?php echo esc_attr( $value['id'] . '_picker' ); ?>" class="colorSelector">
<div style="background-color:<?php if( get_option( $value['id'] )) { echo get_option( $value['id'] ); } ?>"></div></div>&nbsp;
<input class="of-color" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php if( get_option( $value['id'] )) { echo get_option( $value['id'] ); } ?>" /><br /><label class="description" for="<?php echo $value['id']; ?>">&nbsp;&nbsp;<?php echo $value['description']; ?></label>
</td>
</tr>


<?php } elseif ( $value['type'] == "select" ) { ?>

<tr class="<?php echo $value['hide_blk']; ?>" valign="top"><th scope="row"><?php echo $value['name']; ?></th>
<td>
<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
<?php foreach ($value['options'] as $option) { ?>
<option<?php if ( get_option( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['default']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
<?php } ?>
</select><br />
<label class="description" for="<?php echo $value['id']; ?>"><?php echo $value['description']; ?></label>
</td>
</tr>


<?php } elseif ( $value['type'] == "select-fonts" ) { ?>

<tr valign="top"><th scope="row"><?php echo $value['name']; ?></th>
<td>
<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
<?php foreach ($value['options'] as $option) { ?>
<option<?php if ( get_option( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == get_option( $value['default']) ) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
<?php } ?>
</select>
<br />
<label class="description" for="<?php echo $value['id']; ?>"><?php echo $value['description']; ?></label>
</td>
</tr>


<?php } elseif ( $value['type'] == "notice" ) { ?>

<tr valign="top"><th scope="row"></th>
<td>
<p class="<?php echo $value['hide_blk']; ?> notice"><?php echo $value['description']; ?></p>
</td>
</tr>


<?php } ?>

<?php } ?>
</table>

<div style="float: left; margin: 20px 40px 0 0;" class="submit">
<input name="save" type="submit" class="button-primary sbutton" value="<?php echo esc_attr(__('Save Options',TEMPLATE_DOMAIN)); ?>" /><input type="hidden" name="action" value="save" />
</div>
</form>

<form method="post">
<div style="float: left; margin: 20px 40px 0 0;" class="submit">
<?php
$alert_message = __("Are you sure you want to delete all saved settings for this theme?.", TEMPLATE_DOMAIN ); ?>
<input name="reset" type="submit" class="button-secondary" onclick="return confirm('<?php echo $alert_message; ?>')" value="<?php echo esc_attr(__('Reset Options',TEMPLATE_DOMAIN)); ?>" />
<input type="hidden" name="action" value="reset" />
</div>
</form>


</div>

<?php }



function theme_admin_menu_register() {
global $thetextlink,$theme_name, $shortname, $options, $option_upload_path, $option_upload_url;
if ( $_GET['page'] == 'theme-options' ) {
if ( 'save' == $_REQUEST['action'] ) {

foreach ($options as $value) {
update_option( $value['id'], $_REQUEST[ $value['id'] ] );
if($_FILES[ $value['filename'] ]['type'] ) {
//Get the file information
$userfile_name = $_FILES[ $value['filename'] ]['name'];
$userfile_sanitize_name = str_replace(" ","-",$userfile_name);
$userfile_sanitize_ext = substr($userfile_sanitize_name, strripos($userfile_sanitize_name, '.'));
$userfile_size = $_FILES[ $value['filename'] ]['size'];
$userfile_tmp = $_FILES[ $value['filename'] ]['tmp_name'];
$allowed_file_types = array('.png','.jpg','.jpeg','.gif');
if ( in_array($userfile_sanitize_ext,$allowed_file_types) ) {
$large_image_location = $option_upload_path . '/' . $value['filename'] . '.jpg';
if(ereg('[^a-zA-Z0-9 ._.-]', $userfile_sanitize_name)){
echo "<p class=\"uperror\">" . __('The image name contain invalid character, rename it and try upload it again', TEMPLATE_DOMAIN) . "</p>";
} else {
move_uploaded_file($userfile_tmp, $large_image_location);
chmod($large_image_location, 0777);
}
}
}
$img1 = $value['filename'];
if ( isset( $_POST['delete_' . $img1] )){
if( file_exists( $option_upload_path . '/' . $value['filename'] . '.jpg' )) {
unlink($option_upload_path . '/' . $value['filename'] . '.jpg');
}
}
}
foreach ($options as $value) {
if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'],  $_REQUEST[ $value['id'] ] ); } else { delete_option( $value['id'] ); }
}
header("Location: themes.php?page=theme-options&saved=true");
die;

} else if( 'reset' == $_REQUEST['action'] ) {

foreach ($options as $value) {
delete_option( $value['id'] );
if( file_exists( $option_upload_path . '/' . $value['filename'] . '.jpg' )) {
unlink($option_upload_path . '/' . $value['filename'] . '.jpg');
}
}
header("Location: themes.php?page=theme-options&reset=true");
die;
}
}

add_theme_page(_g ($theme_name . __(' Options' , TEMPLATE_DOMAIN)),  _g (__('Theme Options', TEMPLATE_DOMAIN)),  'edit_theme_options', 'theme-options', 'theme_admin_option_register');
}

add_action('admin_menu', 'theme_admin_menu_register');
?>