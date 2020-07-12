<?php
//  ------------------------------------------------------------------------ 	//
//                XOOPS - PHP Content Management System    				//
//                    Copyright (c) 2004 XOOPS.org                       	//
//                       <http://www.xoops.org/>                              //
//                   										//
//                  Authors :									//
//						- solo (www.wolfpackclan.com)         	//
//                  Myhome v2.x								//
//  ------------------------------------------------------------------------ 	//


function a_myhome_item_show( $options ) {

Global $xoopsUser;
$myts =& MyTextSanitizer::getInstance();
include_once(XOOPS_ROOT_PATH.'/modules/myhome/include/functions_common.php');
      $module_options = myhome_getmoduleAlloption(); 
      $settings       = myhome_group_access( $module_options, ereg('is_redirection', $options[1]) );
                        ereg('is_search', $options[1])?myhome_referer_search():'';
      $background     = myhome_getmoduleoption('index_background');
      $admin          = $xoopsUser && $xoopsUser->isAdmin()&&ereg('is_admin', $options[1])&&$options[0]?'
                                   <a  href="'.XOOPS_URL.'/modules/myhome/admin/blocks/admin.php?fct=blocksadmin&op=edit&bid='.$options[0].'" title="'._MB_MYHOME_EDIT.'">
                                   '._MB_MYHOME_EDIT.'
                                   </a> |
                                   <a  href="'.XOOPS_URL.'/modules/myhome/admin/" title="'._MB_MYHOME_ADMIN.'">
                                   '._MB_MYHOME_ADMIN.'
                                   </a>
                                   ':'';
      $admin .= ereg('is_settings', $options[1])?myhome_select_settings( 16, $module_options ):'';
// Style sheet && Java
/*$edit_dir = multimenu_getmoduleoption('edit_dir');
$mode = ereg_replace( 'include/', '', $data_list['mode'] );
$menu_name = ereg_replace( '.html', '', $mode );
$data_list['css_link']    = multimenu_check_script_file( $menu_name, $options[2], $edit_dir . 'cache/', 'css' );
$data_list['script_link'] = multimenu_check_script_file( $menu_name, $options[2], $edit_dir . 'cache/', 'js' );
*/

// Send datas to templates
      	$item_val_array = array(
                                 'background'   => $background&&ereg('is_background', $options[1])?XOOPS_URL.'/'.$background:'',
                                 'admin'        => $admin,
                                 'image'        => $settings['image']&&ereg('is_image', $options[1])?XOOPS_URL.'/'.$module_options['edit_dir'].$settings['image']:'',
                                 'description'  => $settings['text']&&ereg('is_description', $options[1])?$myts->makeTareaData4Show( $settings['text'] ):$myts->makeTareaData4Show( $options[2] )

                                 );

 	foreach ($item_val_array as $item_lg=>$item_val) {
                 $data_list[$item_lg] = $item_val;
	}

Return $data_list;
}




function a_myhome_item_edit( $options ) {
  
  $i=0;
        $form = '<style>a.info {cursor:selector; color:black; }</style>';
        $form .= '<table class="bg2">';
        
        $form .= '<tr>
                  <th width="30%">'._MB_MYHOME_OPTION.'</th>
                  <th width="70%">'._MB_MYHOME_SETTINGS.'</th>
                  </tr>
        ';

        $form .= '<tr>';

        $td       = '</td>         <td class="even">';
        $tr       = '</td></tr><tr><td class="odd">';
        $td_end   = '</td>';

        $form .= '<td class="odd">';
        

        $form .= '<input type="hidden"
                         name="options['.$i.']"
                         value="' . $_GET['bid'] . '"
                   />';


// Check box
  	$radio = array(
  	                _MB_MYHOME_REDIR        => "is_redirection",
  	                _MB_MYHOME_SEARCH       => "is_search",
  	                _MB_MYHOME_ADMIN        => "is_admin",
  	                _MB_MYHOME_SETTINGS     => "is_settings",
                        _MB_MYHOME_DESCRIPTION  => "is_description",
  	                _MB_MYHOME_BACKGROUND   => "is_background",
  	                _MB_MYHOME_IMAGE        => "is_image"
                       );
        $i++; $ii = 0; $max=round(count($radio)/2);  $checked = " checked='checked'";
        $form.= '<b>';
        $form  .= '<a title="Option n° '.$i.'" class="info">'._MB_MYHOME_DISPLAY.'</a>';
        $form .= '</b> <p />';
        $form .= _MB_MYHOME_DISPLAYDSC;
        $form .= $td;
        $form .= '<table><tr><td width="50%">';
        $form .= '<input type="hidden"
                         id="options['.$i.']"
                         name="options['.$i.'][]"
                         value=""
                         checked="checked"
                   />';

 	foreach ($radio as $item_lg=>$item_val) {
          if($ii>=$max){ $tdd = '</td><td width="50%"><br />'; $ii=0; } else { $tdd=''; $ii++; }
        $form .= $tdd;
        $check =  ereg($item_val,$options[$i])?$checked:'';
        $form .= '<input type="checkbox"
                        id="options['.$i.']"
                        name="options['.$i.'][]"
                        value="'.$item_val.'"
                        '.$check.'
                   />
                  '
                  . $item_lg .
                  '<br />';
	} 
	for($ii;$ii<$max;$ii++) { $form .= '<br />'; }
	$form .= '</td></tr></table>';

	$form .= $tr;

// Textarea
        $i++;
        $form.= '<b>';
        $form .= '<a title="Option n° '.$i.'" class="info">'._MB_MYHOME_DESCRIPTION.'</a>';
        $form .= '</b> <p />';
        $form .= _MB_MYHOME_DESCRIPTIONDSC;
        $form .= $td;
        $form .= '<textarea  
                         cols="4"
                         rows="10"
                         name="options['.$i.']"
                   />';
        $form .= $options[$i];
        $form .= '</textarea>';


        $form .= '</td>';
        $form .= '</tr>';
        $form .= '</table>';

	
Return $form;
}
?>