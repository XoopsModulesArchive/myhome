<?php
/**
* XOOPS - PHP Content Management System
* Copyright (c) 2004 <http://www.xoops.org/>
*
* Licence : GPL
* Authors :
*           - solo (http://www.wolfpackclan.com/wolfactory)
*/

if (!defined("XOOPS_ROOT_PATH")) { die("XOOPS root path not defined"); }

// Check redirections
function myhome_group_access( $settings='', $is_redir=1 ) {
  Global $xoopsModuleConfig, $xoopsUser;

        $user_group  = is_object($xoopsUser) ? $xoopsUser->getGroups() : array(XOOPS_GROUP_ANONYMOUS);
        $settings    = $settings?$settings:$xoopsModuleConfig;

  foreach( $settings as $name => $value ) { if(ereg('redir_grps', $name)) { if( $user_group == $value ) {

           $i=explode('_', $name);
           $url   = 'redir_url_'.$i[2];
           $text  = 'redir_msg_'.$i[2];
           $image = 'redir_image_'.$i[2];

                     if( $settings[$url]=='index.php'
                      || $settings[$url]=='.'
                      ||!$settings[$url] 
                      ||!$is_redir ) { 
                        
                        $settings['text']  = $settings[$text];
                        $settings['image'] = $settings[$image];
                        Return $settings; };

           $settings[$url] = ereg('http', $settings[$url])?$settings[$url]:XOOPS_URL.'/'.$settings[$url];
           if( $settings[$text] ) {
                    redirect_header($settings[$url], $settings['index_transition'], $settings[$text] );
                    exit;
           } {
                    header('Location: ' . $settings[$url]);
                    exit;
           }
    }}}
                        $settings['text']  = $xoopsModuleConfig['index_description'];
                        $settings['image'] = '';
Return $settings;
}

// Referers
function myhome_referer_search() {
 Global $xoopsModule;
	$module  = isset($xoopsModule)?$xoopsModule->getVar('dirname'):'';

   // Get Referers'query if any
   	$url_array = parse_url( getenv("HTTP_REFERER") );
        parse_str($url_array['query'], $variables);

   // Retrieve query's keywords
   	$keywords  =  isset($variables['q'])    ?urldecode($variables['q']):'';
   	$keywords .=  isset($variables['p'])    ?urldecode($variables['p']):'';
   	$keywords .=  isset($variables['query'])?urldecode($variables['query']):'';
   	$keywords  = ereg_replace(' ', '+' , $keywords);

//	$redirect = $keywords?XOOPS_URL.'/search.php?query='.$keywords.'&andor=AND&action=results':FALSE;

	if( $keywords && 
           !ereg('search.php', $_SERVER['PHP_SELF']) && 
           !ereg(XOOPS_URL, getenv("HTTP_REFERER")) ) {
                 header('Status : 301 Moved Permanently');
        	 header('Location: '.XOOPS_URL.'/search.php?query='.$keywords.'&andor=AND&action=results');
        	 exit();
	}

Return False;
}


// Generate Settings drop list
function myhome_select_settings( $max=0, $settings='' ) {
 Global $xoopsModuleConfig;
$i=0; $set=''; $prev_prefix='';
$count = count( $xoopsModuleConfig );
$height= $max&&$count>$max?5:1;
      $set .= '
               <form action="">
               <select size="'.$height.'"
                       name="myhome_settings"
                       onchange="location=this.options[this.selectedIndex].value"
                       style="width:160px;"
               >
               <option value="" selected="selected"></option>
              ';
              
       $settings    = $settings?$settings:$xoopsModuleConfig;
      // ksort( $xoopsModuleConfig );
      foreach( $settings as $name => $value ) {
      
       $prefix = explode('_', $name);

        $set .= $prefix[0]!=$prev_prefix?'
                </optgroup>
                <optgroup label="'.myhome_define( $prefix[0], '_MI' ).'">
                <option value="'.XOOPS_URL.'/modules/myhome/admin/index.php?admin=settings&sub='.$prefix[0].'"
                        style="font-weight:bold;">
                [' . myhome_define( $prefix[0], '_MI' ) . ']
                </option>
                ':'';

        $number = isset($prefix[2])?' ' . $prefix[2]:'';
        $set .= '
        <option value="'.XOOPS_URL.'/modules/myhome/admin/index.php?admin=settings&sub='.$prefix[0].'&num='.$i++.'">';
        $set .= ' - ' . myhome_define( $prefix[1], '_MI' ) . $number;
        $set .= '</option>';
      
        $prev_prefix = $prefix[0];   
      }
        $set .= '</optgroup>';
        $set .= '</select>';
        $set .= '</form>';
              
  Return $set;
}


 function myhome_check_script_file( $file_name, $catid='', $dest_dir, $file_type ) {

 $orignal_file = XOOPS_ROOT_PATH . '/modules/myhome/templates/'.$file_name.'/'.$file_type.'_0.'.$file_type;
 $target_file  = XOOPS_ROOT_PATH . '/'.$dest_dir.$file_name.'_'.$catid.'.'.$file_type;
 $edited_file  = XOOPS_ROOT_PATH . '/'.$dest_dir.$file_name.'_0.'.$file_type;

    if( file_exists( $orignal_file ) && !file_exists( $edited_file ) ) { copy( $orignal_file, $edited_file ); }  // Backup original file for edition

    if( file_exists( $orignal_file ) && !file_exists( $target_file ) && !file_exists( $edited_file ) ) {     // Create a new file if no files in cache
      // Open file to read
        $handle = fopen ($orignal_file, "rb");
        $data = fread ($handle, filesize ($orignal_file));
        fclose ($handle);
        
        $data = ereg_replace('{id}', $catid, $data);
        $data = ereg_replace('{xoops_url}', XOOPS_URL, $data);
        
      
      // Open target file to write
       	$handle = fopen($target_file, 'w+');
		if ($handle) {
			fwrite($handle, $data);
                }
        fclose ($handle);
    }

    if( !file_exists( $target_file ) && file_exists( $edited_file ) ) {     // Use edited file to generate target file
      // Open file to read
        $handle = fopen ($edited_file, "rb");
        $data = fread ($handle, filesize ($edited_file));
        fclose ($handle);
        
        $data = ereg_replace('{id}', $catid, $data);
        $data = ereg_replace('{xoops_url}', XOOPS_URL, $data);

      // Open target file to write
       	$handle = fopen($target_file, 'w+');
		if ($handle) {
			fwrite($handle, $data);
                }
        fclose ($handle);
    }


   if( file_exists( $target_file ) ) {  // Use target file if exists
       $target_file = ereg_replace(XOOPS_ROOT_PATH, '', $target_file); 
       return $target_file; 
       } else { 
       return False;
       }
 }


function myhome_tpl_rename( $file )
{
            $value = str_replace('include/','',$file);
            $value = str_replace('.css','',$value);
            $value = str_replace('.html','',$value);
            $file_name = str_replace('myhome_','',$value);
            $value = str_replace('_',' ',$file_name);
            $name  = @constant(strtoupper('_MI_MYHOME_MODE_' . $value));
            
            $data['file']      = $file;
            $data['file_name'] = $file_name;
            $data['name']      = $name?$name:ucfirst($value);

Return $data;
}

function myhome_define( $name='', $prefix='' ) {
  Global $xoopsModule;

  $define_name   = str_replace( '_', ' ',  $name);
  $constant_name = str_replace( ' ', '_',  $name); 

  Return constant( strtoupper( $prefix . '_myhome_' . $constant_name) )?constant( strtoupper( $prefix . '_myhome_' . $constant_name) ):ucfirst( $define_name ) . ' *';
}
?>