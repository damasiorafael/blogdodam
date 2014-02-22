<?php
$font_loc = get_template_directory_uri() . '/lib/fonts/roboto/';
?>

@font-face {
    font-family: 'Roboto';
    src: url('<?php echo $font_loc; ?>Roboto-Bold-webfont.eot');
    src: url('<?php echo $font_loc; ?>Roboto-Bold-webfont.eot?#iefix') format('embedded-opentype'),
         url('<?php echo $font_loc; ?>Roboto-Bold-webfont.woff') format('woff'),
         url('<?php echo $font_loc; ?>Roboto-Bold-webfont.ttf') format('truetype'),
         url('<?php echo $font_loc; ?>Roboto-Bold-webfont.svg#RobotoBold') format('svg');
    font-weight: normal;
    font-style: normal;

}

@font-face {
    font-family: 'Roboto Light';
    src: url('<?php echo $font_loc; ?>Roboto-Light-webfont.eot');
    src: url('<?php echo $font_loc; ?>Roboto-Light-webfont.eot?#iefix') format('embedded-opentype'),
         url('<?php echo $font_loc; ?>Roboto-Light-webfont.woff') format('woff'),
         url('<?php echo $font_loc; ?>Roboto-Light-webfont.ttf') format('truetype'),
         url('<?php echo $font_loc; ?>Roboto-Light-webfont.svg#RobotoLight') format('svg');
    font-weight: normal;
    font-style: normal;

}