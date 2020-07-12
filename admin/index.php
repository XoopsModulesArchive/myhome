<?php
#################################################################################################################
#                                                                                                               #
#  Admin manager for Xoops 2.0.x	                                                                        #
#  						                                                                #
#  © 2007, Solo ( wolfactory.wolfpackclan.com )                                                                 #
#  Special thanks to Hervé and DuGris for their suggestions     	                                        #
#  Licence : GPL 	         		                                                                #
#                                                                                                               #
#################################################################################################################


include_once ("include/admin_header.php");
include_once ("include/admin_functions.php");

if( !is_dir( '../../../'.$xoopsModuleConfig['edit_dir'].'/orig' ) ) { admin_create_dir( '../../../'.$xoopsModuleConfig['edit_dir'].'/orig' ); }

$def_menu = '?admin='.$admin;

// Select operation
          $op = isset($_GET['op']) ? $_GET['op'] : '';
          $op = isset($_POST['op']) ? $_POST['op'] : $op;

      if( $op!='update'
        &&$op!='post'
        &&$op!='delete'
        &&$op!='dup'
        &&$op!='status'
        &&$op!='save'
        &&$op!=_MD_MYHOME_UPLOAD
        &&$op!=_MD_MYHOME_DELETE
        &&$op!=_MD_MYHOME_UPDATE ) {

          xoops_cp_header();

          echo admin_menu($admin, $admin.'DSC', 0);

          }
          if( $admin=='index' ) {
           // echo '<h1 style="text-align:center;">' . $xoopsModule -> getVar('name') . '</h1>';
             $def_menu = 'index.php?admin=home';
             include('home.php');
             } else {
             file_exists($admin.'.php')?include($admin.'.php'):$error='<h1 style="text-align:center;">'._MODULENOEXIST.'</h1>';
             echo isset($error)?$error:'';
          }
          echo '<p />';
          echo admin_footer();
       xoops_cp_footer();

?>