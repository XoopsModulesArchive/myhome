<?php
//  ------------------------------------------------------------------------ 	//
//                XOOPS - PHP Content Management System    				//
//                    Copyright (c) 2004 XOOPS.org                       	//
//                       <http://www.xoops.org/>                              //
//                   										//
//                  Authors :									//
//						- solo (www.wolfpackclan.com)         	//
//                  Myhome v2.0								//
//  ------------------------------------------------------------------------ 	//

// General settings
include_once('header.php');

/* ----------------------------------------------------------------------- */
/*                    Redirect index to a specific page                    */
/* ----------------------------------------------------------------------- */

include_once('include/functions_common.php');
$settings = myhome_group_access();
            $xoopsModuleConfig['redir_search']?myhome_referer_search():'';
$mode     = $xoopsModuleConfig['index_mode']?$xoopsModuleConfig['index_mode']:'myhome_index_01.html';
$xoopsOption['template_main'] = $mode;
include_once(XOOPS_ROOT_PATH . '/header.php');

// Style sheet && Scripts
$tpl_name    = ereg_replace( '.html', '', $mode );

// Metagen
include_once('include/metagen.php');

// Module Banner
if ( eregi('.swf', $xoopsModuleConfig['index_banner']) ) {
	$banner = '<object
    			classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
                        codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/ swflash.cab#version=6,0,40,0" ;=""
                        height="60"
                        width="468">
                <param  name="movie"
                value="' . trim($xoopsModuleConfig['index_banner']) . '">
                <param name="quality" value="high">
                <embed src="' . trim($xoopsModuleConfig['index_banner']) . '"
                quality="high"
                pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" ;=""
                type="application/x-shockwave-flash"
                height="60"
                width="468">
                </object>';
} elseif ( $xoopsModuleConfig['index_banner'] ) {
	$banner = '
                   <img src="../../'.trim($xoopsModuleConfig['index_banner']).'"
                        alt="'.$xoopsModule -> getVar('name').'" />
                  ';
} else {
	$banner = '';
}



// Admin buttons
$admin=''; $admin_settings='';
if( $xoopsUser && $xoopsUser->isAdmin($xoopsModule->mid()) ) {
  include('admin/include/admin_buttons.php');
          $admin_buttons = array(
                                  'settings'       =>      'admin/index.php?admin=settings',
                                  'images'         =>      'admin/index.php?admin=images',
                                  'templates'      =>      'admin/index.php?admin=templates',
                                  'blocks'         =>      'admin/index.php?admin=blocks',
                                  'utils'          =>      'admin/index.php?admin=utils',
                                  'help'           =>      'admin/index.php?admin=help'
                       );

          $admin  = myhome_create_admin_links( $admin_buttons,
                                               0, 2,
                                               'images/icon/',
                                               '.png',
                                               $xoopsModuleConfig['edit_button'],
                                               '48' );
         $admin_settings = myhome_select_settings();
          }



// Other values
        $myts =& MyTextSanitizer::getInstance();
  	$item_val_array = array(
  	                         'banner'         => $banner,
  	                         'background'     => $xoopsModuleConfig['index_background']?'../../' . $xoopsModuleConfig['index_background']:'',
  	                         'admin'          => $admin,
  	                         'mode'           => $mode,
  	                         'css_link'       => myhome_check_script_file( $tpl_name, '', $xoopsModuleConfig['edit_dir'] . 'cache/', 'css' ),
                                 'script_link'    => myhome_check_script_file( $tpl_name, '', $xoopsModuleConfig['edit_dir'] . 'cache/', 'js' ),
                                 'admin_settings' => $admin_settings,
                                 'image'          => $settings['image']?'../../'.$xoopsModuleConfig['edit_dir'].$settings['image']:'',
                                 'texte'          => $settings['text']?$myts->makeTareaData4Show( $settings['text'] ):$myts->makeTareaData4Show( $xoopsModuleConfig['index_description'] )
                                 );


 	foreach ($item_val_array as $item_lg=>$item_val) {
                 $xoopsTpl->assign($item_lg, 	$item_val );
	}
	
// Datas
include_once(XOOPS_ROOT_PATH."/footer.php");
?>