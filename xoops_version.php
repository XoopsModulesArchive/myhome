<?php

//  ------------------------------------------------------------------------ 	//
//                XOOPS - PHP Content Management System    			//
//                    Copyright (c) 2004 XOOPS.org                       	//
//                       <http://www.xoops.org/>                                //
//                   								//
//                  Authors :							//
//						- solo (www.wolfpackclan.com)   //
//                  Myhome v2.0						//
//  ------------------------------------------------------------------------ 	//

    Global $xoopsModule, $xoopsModuleConfig;

$modversion['name']        = _MI_MYHOME_NAME;
$modversion['version']     = 2.0;
$modversion['description'] = _MI_MYHOME_DSC;
$modversion['credits']     = "Comptoir des Médias (www.comptoir-des-medias.com)";
$modversion['author']      = "Solo";
$modversion['help']        = "";
$modversion['license']     = "GPL see LICENSE";
$modversion['official']    = 0;
$modversion['image']       = "images/myhome_slogo.png";
$modversion['dirname']     = "myhome";

$edit_dir=isset($xoopsModuleConfig['edit_dir'])?$xoopsModuleConfig['edit_dir']:'';
// echo 'edit dir ' . $xoopsModuleConfig['edit_dir'];

// Templates
$i=0;

// if( isset($module) ) {
include_once(XOOPS_ROOT_PATH . '/class/xoopslists.php' );
        $tpl_list = XoopsLists :: getHtmlListAsArray( XOOPS_ROOT_PATH . '/modules/myhome/templates/' );
      foreach($tpl_list as $ii=>$data) {

        if( $data != 'index.html' ) {
            $value = str_replace('.html','',$data);
            $value = str_replace($modversion['dirname'].'_','',$value);
            $file_name = @constant(strtoupper('_MI_EDITO_TPL_' . $value));
            $value = str_replace('_',' ',$value);
            $file  = $data;
            $name  = $file_name?$file_name:ucfirst($value);
        $modversion['templates'][++$i]['file']      = $file;
        $modversion['templates'][$i]['description'] = $name;
        $options_tpl[$name] = $file;
       }
      }
//}

$max=2;
for($i;$i<=$max;$i++) {
$modversion['templates'][++$i]['file']      = 'blocks/myhome_block_'.$i.'.html';
$modversion['templates'][$i]['description'] = '';
}

// Admin
// Admin things
$i=0;
$modversion['hasAdmin']                     = 1;
$modversion['adminindex']                   = "admin/";
$modversion['adminmenu']                    = "admin/include/menu.php";

// Main
$modversion['hasMain'] = 1;


for($i=1;$i<=$max;$i++) {
  $modversion['blocks'][$i]['file']        = 'block.php';
  $modversion['blocks'][$i]['name']        = _MI_MYHOME_ITEM . ' ' . $i;
  $modversion['blocks'][$i]['description'] = '';
  $modversion['blocks'][$i]['show_func']   = 'a_myhome_item_show';
  $modversion['blocks'][$i]['edit_func']   = 'a_myhome_item_edit';
  $modversion['blocks'][$i]['options']     = '|is_description,is_admin,is_settings,is_redirection,is_image|';
  $modversion['blocks'][$i]['template']    = 'myhome_block_'.$i.'.html';
}

// Options
// User side settings
if ( $xoopsModule && $xoopsModule->getVar( 'dirname' ) == 'system' ) {
$i=0;
$modversion['config'][$i]['name']        = 'index_banner';
$modversion['config'][$i]['title']       = '_MI_MYHOME_BANNER';
$modversion['config'][$i]['description'] = '_MI_MYHOME_BANNERDSC';
$modversion['config'][$i]['help']        = '_MI_MYHOME_BANNERHLP';
$modversion['config'][$i]['formtype']    = 'textbox';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i++]['default']   = 'modules/myhome/images/myhome_banner.png';

$modversion['config'][$i]['name']        = 'index_background';
$modversion['config'][$i]['title']       = '_MI_MYHOME_BACKGROUND';
$modversion['config'][$i]['description'] = '_MI_MYHOME_BACKGROUNDDSC';
$modversion['config'][$i]['help']        = '_MI_MYHOME_BANNERHLP';
$modversion['config'][$i]['formtype']    = 'textbox';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i++]['default']   = 'modules/myhome/images/myhome_background.png';

            $options = array(  '_MI_MYHOME_INDEX'         =>     'index',
                               '_MI_MYHOME_ITEM'          =>     'item',
                               '_MI_MYHOME_SITEMAP'       =>     'sitemap'
                               );

$modversion['config'][$i]['name']         = 'index_description';
$modversion['config'][$i]['title']        = '_MI_MYHOME_DESC';
$modversion['config'][$i]['description']  = '_MI_MYHOME_DESCDSC';
$modversion['config'][$i]['help']         = '_MI_MYHOME_DESCHLP';
$modversion['config'][$i]['formtype']     = 'textarea';
$modversion['config'][$i]['valuetype']    = 'text';
$modversion['config'][$i++]['default']    = _MI_MYHOME_WELCOME;


$modversion['config'][$i]['name']         = 'index_transition';
$modversion['config'][$i]['title']        = '_MI_MYHOME_TRANSITION';
$modversion['config'][$i]['description']  = '_MI_MYHOME_TRANSITIONDSC';
$modversion['config'][$i]['help']         = '_MI_MYHOME_TRANSITIONHLP';
$modversion['config'][$i]['formtype']     = 'textbox';
$modversion['config'][$i]['valuetype']    = 'text';
$modversion['config'][$i++]['default']    = '3';

$modversion['config'][$i]['name']         = 'index_mode';
$modversion['config'][$i]['title']        = '_MI_MYHOME_MODE';
$modversion['config'][$i]['description']  = '_MI_MYHOME_MODEDSC';
$modversion['config'][$i]['help']         = '_MI_MYHOME_MODEHLP';
$modversion['config'][$i]['formtype']     = 'select';
$modversion['config'][$i]['valuetype']    = 'text';
$modversion['config'][$i]['default']      = 'myhome_index_01.html';
$modversion['config'][$i++]['options']    = isset($options_tpl)?$options_tpl:'';

$modversion['config'][$i]['name']         = 'edit_dir';
$modversion['config'][$i]['title']        = '_MI_MYHOME_DIR';
$modversion['config'][$i]['description']  = '_MI_MYHOME_DIRDSC';
$modversion['config'][$i]['help']         = '_MI_MYHOME_DIRHLP';
$modversion['config'][$i]['formtype']     = 'textbox';
$modversion['config'][$i]['valuetype']    = 'text';
$modversion['config'][$i++]['default']    = 'uploads/myhome/';

    	$options = array( _MI_MYHOME_IMAGE   => 'image',
    	                  _MI_MYHOME_BUTTON  => 'button',
    	                  _MI_MYHOME_SELECT  => 'select',
    	                  _MI_MYHOME_TEXT    => 'text',
                              );

$modversion['config'][$i]['name']         = 'edit_button';
$modversion['config'][$i]['title']        = '_MI_MYHOME_BUTTONS';
$modversion['config'][$i]['description']  = '_MI_MYHOME_BUTTONSDSC';
$modversion['config'][$i]['help']         = '_MI_MYHOME_BUTTONSHLP';
$modversion['config'][$i]['formtype']     = 'select';
$modversion['config'][$i]['valuetype']    = 'text';
$modversion['config'][$i]['default']      = 'text';
$modversion['config'][$i++]['options']    = $options;

$modversion['config'][$i]['name']        = 'image_max_size';
$modversion['config'][$i]['title']       = '_MI_MYHOME_THUMBMW';
$modversion['config'][$i]['description'] = '_MI_MYHOME_THUMBMWDSC';
$modversion['config'][$i]['help']        = '_MI_MYHOME_THUMBMWHLP';
$modversion['config'][$i]['formtype']    = 'textbox';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i++]['default']   = '160|160';

            $options = array( '5'  => 5,
                              '8'  => 8,
                              '10' => 10,
                              '12' => 12,
                              '15' => 15,
                              '20' => 20,
                              '30' => 30,
                              '50' => 50,
                              '100'=> 100,
                              '_MI_MYHOME_ALL'=> 100000  );

$modversion['config'][$i]['name']        = 'image_perpage';
$modversion['config'][$i]['title']       = '_MI_MYHOME_PERPAGE';
$modversion['config'][$i]['description'] = '_MI_MYHOME_PERPAGEDSC';
$modversion['config'][$i]['help']        = '_MI_MYHOME_PERPAGEHLP';
$modversion['config'][$i]['formtype']    = 'select';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['options']      = $options;
$modversion['config'][$i++]['default']     = '12';

$modversion['config'][$i]['name']        = 'image_thumb_color';
$modversion['config'][$i]['title']       = '_MI_MYHOME_COLOR';
$modversion['config'][$i]['description'] = '_MI_MYHOME_COLORDSC';
$modversion['config'][$i]['help']        = '_MI_MYHOME_COLORHLP';
$modversion['config'][$i]['formtype']    = 'color';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i++]['default']   = '#FFFFFF';

            $options = array( '1' => 1,
                              '2' => 2,
                              '3' => 3,
                              '4' => 4,
                              '5' => 5  );

$modversion['config'][$i]['name']        = 'image_cols';
$modversion['config'][$i]['title']       = '_MI_MYHOME_COLS';
$modversion['config'][$i]['description'] = '_MI_MYHOME_COLSDSC';
$modversion['config'][$i]['help']        = '_MI_MYHOME_COLSHLP';
$modversion['config'][$i]['formtype']    = 'select';
$modversion['config'][$i]['valuetype']   = 'text';
$modversion['config'][$i]['options']      = $options;
$modversion['config'][$i++]['default']     = '4';

// Meta settings
$modversion['config'][$i]['name']         = 'meta_keywords';
$modversion['config'][$i]['title']        = '_MI_MYHOME_METAKEYWORD';
$modversion['config'][$i]['description']  = '_MI_MYHOME_METAKEYWORDDSC';
$modversion['config'][$i]['help']         = '_MI_MYHOME_METAKEYWORDHLP';
$modversion['config'][$i]['formtype']     = 'textarea';
$modversion['config'][$i]['valuetype']    = 'text';
$modversion['config'][$i++]['default']    = _MI_MYHOME_METAKEYWORDS;

$modversion['config'][$i]['name']         = 'meta_description';
$modversion['config'][$i]['title']        = '_MI_MYHOME_METADESC';
$modversion['config'][$i]['description']  = '_MI_MYHOME_METADESCDSC';
$modversion['config'][$i]['help']         = '_MI_MYHOME_METADESCHLP';
$modversion['config'][$i]['formtype']     = 'textarea';
$modversion['config'][$i]['valuetype']    = 'text';
$modversion['config'][$i++]['default']    = _MI_MYHOME_METADESCRIPTION;

$modversion['config'][$i]['name']         = 'redir_search';
$modversion['config'][$i]['title']        = '_MI_MYHOME_REDIRSEARCH';
$modversion['config'][$i]['description']  = '_MI_MYHOME_REDIRSEARCHDSC';
$modversion['config'][$i]['help']         = '_MI_MYHOME_REDIRSEARCHHLP';
$modversion['config'][$i]['formtype']     = 'yesno';
$modversion['config'][$i]['valuetype']    = 'int';
$modversion['config'][$i++]['default']    = 0;

// Redirections settings
	$member_handler =& xoops_gethandler('member');
	$xoopsgroups = &$member_handler->getGroupList();
	foreach ($xoopsgroups as $key=>$group) {
		$groups[$group] = $key;
	}

 $max = count($xoopsgroups)+1;
 include_once('blocks/block.php');
 $image_array_01 = array('-' => 0);
 $image_array_02 = XoopsLists :: getImgListAsArray( XOOPS_ROOT_PATH . '/' . myhome_getmoduleoption('edit_dir') );
 $image_array  = array_merge($image_array_01,$image_array_02);
 for( $ii=1; $ii<=$max; $ii++ ) {
      $def_group[1] = $ii;

      $modversion['config'][$i]['name']        = 'redir_grps_'.$ii;
      $modversion['config'][$i]['title']       = '_MI_MYHOME_GRPS';
      $modversion['config'][$i]['description'] = '_MI_MYHOME_GRPSDSC';
      $modversion['config'][$i]['formtype']    = 'select_multi';
      $modversion['config'][$i]['valuetype']   = 'array';
      $modversion['config'][$i]['options']     = $groups;
      $modversion['config'][$i++]['default']   = $def_group;
      
      $modversion['config'][$i]['name']        = 'redir_url_'.$ii;
      $modversion['config'][$i]['title']       = '_MI_MYHOME_URL';
      $modversion['config'][$i]['description'] = '_MI_MYHOME_URLDSC';
      $modversion['config'][$i]['help']        = '_MI_MYHOME_URLHLP';
      $modversion['config'][$i]['formtype']    = 'textbox';
      $modversion['config'][$i]['valuetype']   = 'text';
      $modversion['config'][$i++]['default']   = '';

      $modversion['config'][$i]['name']        = 'redir_image_'.$ii;
      $modversion['config'][$i]['title']       = '_MI_MYHOME_IMAGE';
      $modversion['config'][$i]['description'] = '_MI_MYHOME_IMAGEDSC';
      $modversion['config'][$i]['help']        = '_MI_MYHOME_IMAGEHLP';
      $modversion['config'][$i]['formtype']    = 'select';
      $modversion['config'][$i]['valuetype']   = 'text';
      $modversion['config'][$i]['default']     = '';
      $modversion['config'][$i++]['options']   = $image_array;

      $modversion['config'][$i]['name']        = 'redir_msg_'.$ii;
      $modversion['config'][$i]['title']       = '_MI_MYHOME_MESSAGE';
      $modversion['config'][$i]['description'] = '_MI_MYHOME_MESSAGEDSC';
      $modversion['config'][$i]['help']        = '_MI_MYHOME_MESSAGEHLP';
      $modversion['config'][$i]['formtype']    = 'textarea';
      $modversion['config'][$i]['valuetype']   = 'text';
      $modversion['config'][$i++]['default']   = '';


 }
}
?>