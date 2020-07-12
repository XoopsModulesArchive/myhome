<?php
#######################################################
#  Myhome version 1.1 pour Xoops 2.0.x	      #
#  						      #
#  © 2005, Solo ( www.wolfpackclan.com/wolfactory )   #
#  						      #
#  Licence : GPL 				      #
#######################################################

// Nav box admin Menu
$i=0;
    $adminmenu[++$i]['title'] = _MI_MYHOME_INDEX;
    $adminmenu[$i]['link'] = "./";
    $adminmenu[$i]['description'] = _MI_MYHOME_INDEX_DSC;
    
    $adminmenu[++$i]['title'] = _MI_MYHOME_REDIR;
    $adminmenu[$i]['link'] = "admin/index.php?admin=settings&sub=redir";
    $adminmenu[$i]['description'] = _MI_MYHOME_REDIR_DSC;

    $adminmenu[++$i]['title'] = _MI_MYHOME_TEMPLATES;
    $adminmenu[$i]['link'] = "admin/index.php?admin=templates";
    $adminmenu[$i]['description'] = _MI_MYHOME_TEMPLATES_DSC;

    $adminmenu[++$i]['title'] = _MI_MYHOME_IMAGE;
    $adminmenu[$i]['link'] = "admin/index.php?admin=images";
    $adminmenu[$i]['description'] = _MI_MYHOME_IMAGE_DSC;

    $adminmenu[++$i]['title'] = _MI_MYHOME_BLOCK;
    $adminmenu[$i]['link'] = "admin/index.php?admin=blocks";
    $adminmenu[$i]['description'] = _MI_MYHOME_BLOCK_DSC;

    $adminmenu[++$i]['title'] = _MI_MYHOME_SETTINGS;
    $adminmenu[$i]['link'] = "admin/index.php?admin=settings";
    $adminmenu[$i]['description'] = _MI_MYHOME_SETTINGS_DSC;

    $adminmenu[++$i]['title'] = _MI_MYHOME_UTILS;
    $adminmenu[$i]['link'] = "admin/index.php?admin=utils";
    $adminmenu[$i]['description'] = _MI_MYHOME_UTILS_DSC;

    $adminmenu[++$i]['title'] = _MI_MYHOME_HELP;
    $adminmenu[$i]['link'] = "admin/index.php?admin=help";
    $adminmenu[$i]['description'] = _MI_MYHOME_HELP_DSC;

?>
