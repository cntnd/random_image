<?php
// cntnd_random_image

// assert framework initialization
defined('CON_FRAMEWORK') || die('Illegal call: Missing framework initialization - request aborted.');

// editmode
$editmode = cRegistry::isBackendEditMode();

// input/vars
$folder = "CMS_VALUE[1]";
$additionalClass = "CMS_VALUE[2]";
if (!$additionalClass || $additionalClass=="false"){
    $additionalClass="";
}

// includes
cInclude('module', 'includes/class.cntnd_random_image.php');

// vars
$image = CntndRandomImage::randomImage($folder,$client);

// module
if ($editmode){
	echo '<div class="content_box"><label class="content_type_label">'.mi18n("MODULE").'</label>';
}

$tpl = cSmartyFrontend::getInstance();
$tpl->assign('image', $image);
$tpl->assign('additionalClass', $additionalClass);

$tpl->display('default.html');

if ($editmode){
  echo '</div>';
}
?>
