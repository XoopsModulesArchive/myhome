<?php
/**
* Module: Admin
* Licence : GPL
* Authors :
*           - solo (http://www.wolfpackclan.com)
*/


// Define here your operator list + the default values
$ops = array(        'op'            =>      'new',
                    'image_select'   =>      '',
                    'thumb_gen'      =>      '',
                    'width'          =>      0,
                    'height'         =>      0,
                    'text'           =>      '',
                    'backgroundcolor'=>      $xoopsModuleConfig['image_thumb_color'],
                    'image_file'     =>      '',
                    'startart'       =>      0
                    );
 include_once('include/admin_op_retrieve.php');
 $image_dir = $xoopsModuleConfig['edit_dir'];
 $def_menu = $startart?$def_menu.'&startart='.$startart:$def_menu;
 if( !is_dir( '../../../'.$image_dir.'/orig' ) ) { admin_create_dir( '../../../'.$image_dir.'/orig' ); }

// So, what are we doing now?
switch( $op )
  {
   case ( $op=='new' ):
  	include (XOOPS_ROOT_PATH.'/class/xoopsformloader.php');
        include_once('thumb_gen/thumb_gen_infos.php');
	$form = new XoopsThemeForm(_MD_MYHOME_IMAGEDIR . ' : ' . $image_dir, '', '');
	include ('form/imageform.inc.php');
        $form->display();
    break;


  case ( $op && !$image_select && !$_POST['xoops_upload_file'][0] ):
     default:
        redirect_header($def_menu, 1, _MD_MYHOME_NODATA );
        exit();
   break;


  case ( $op==_MD_MYHOME_UPLOAD && $_POST['xoops_upload_file'][0] ):

$images_weight = 2097152;
$images_width  = 4096;
$images_height = 4096;
$allowed_mimetype = array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/x-png', 'image/png');

          include_once (XOOPS_ROOT_PATH.'/class/uploader.php');
        $uploader = new XoopsMediaUploader(XOOPS_ROOT_PATH . '/' . $image_dir, $allowed_mimetype, $images_weight, $images_width, $images_height );
        $err = array();
        $ucount = count($_POST['xoops_upload_file']);
      for ($i = 0; $i < $ucount; $i++) {
            if ($uploader->fetchMedia($_POST['xoops_upload_file'][$i])) {

 //               if( file_exists($image_dir . '/' . $image_name) ) { $replaced = 1;  }

                if (!$uploader->upload()) {
                    $err[] = $uploader->getErrors();
                } else {
                    $avt_handler =& xoops_gethandler('image');
                    $image =& $avt_handler->create();

                    if (!$avt_handler->insert($image)) {
                        $err[] = sprintf(_FAILSAVEIMG, $image->getVar('image_name'));
                    }
                }
            } else {
                $err[] = sprintf(_FAILFETCHIMG, $i);
                $err = array_merge($err, $uploader->getErrors(false));
            }
        }

        if (count($err) > 0) {
            $message = xoops_error($err);
            redirect_header('', 2, $message);
        } else { 
            $message = isset($replaced)?_MYHOME_UPDATED:_MYHOME_UPLOADED;
        }
        redirect_header($def_menu, 2, $message );
 /*
             include_once('thumb_gen/functions_upload_images.php');
             foreach ($_FILES as $keyname => $fileup) {
               if( $keyname) {
               $error = thumb_gen_uploading_image( $keyname, XOOPS_ROOT_PATH . '/'.$image_dir, '1024|2048|10000' );
               $upload = $error?$error:_MD_MYHOME_UPLOADED;
               redirect_header($def_menu, 2, $upload );
               }
             }
            */

        exit();
    break;


// Delete a data
  case ( $op==_MD_MYHOME_DELETE && $image_select ):

       foreach( $image_select as $image ) {
        unlink( XOOPS_ROOT_PATH . '/'.$image_dir.$image );
        if( file_exists(XOOPS_ROOT_PATH . '/'.$image_dir.$image )) {
            unlink( XOOPS_ROOT_PATH . '/'.$image_dir.$image );
        }
       }

        redirect_header($def_menu, 1, _MD_MYHOME_DELETED );
        exit();
    break;



// Resize a data
  case ( $op==_MD_MYHOME_UPDATE ):

       if( $image_select ) {
       include('thumb_gen/thumb_gen_'.$thumb_gen.'.php');

       foreach( $image_select as $image ) {
                $image_url = '../../../'.$image_dir.$image;
                $image_orig_url = '../../../'.$image_dir.'/orig/'.$image;

                if( !file_exists($image_orig_url) ) { 
                     copy($image_url, $image_orig_url); } else {
                     copy($image_orig_url, $image_url); }

                if($thumb_gen=='normal')        { $i = new imagethumbnail(); }
        	if($thumb_gen=='rounded')       { $i = new imagethumbnail_corners(); }
        	if($thumb_gen=='blackandwhite') { $i = new imagethumbnail_blackandwhite(); }
        	if($thumb_gen=='dropshadow')    { $i = new imagethumbnail_dropshadow(); }
        	if($thumb_gen=='grad')          { $i = new imagethumbnail_grad(); }
	        if($thumb_gen=='info')          { $i = new imagethumbnail_info(); }
	        

                $image_url = '../../../'.$image_dir.$image;
                $i->open( $image_url );
        	if( $width )  { $i->setX($width);  } else { $i->setX(0); }
        	if( $height ) { $i->setY($height); } else { $i->setY(0); }

//	        if($thumb_gen=='normal')
        	if($thumb_gen=='rounded')       { $i->setColor(ereg_replace('#','',$backgroundcolor)); $i->clipcorners(); }
        	if($thumb_gen=='blackandwhite') { $i->blackandwhite(); }
        	if($thumb_gen=='dropshadow')    { $i->setColor(ereg_replace('#','',$backgroundcolor)); $i->dropshadow(); }
        	if($thumb_gen=='grad')          { $i->setColor(ereg_replace('#','',$backgroundcolor)); $i->grad(); }
	        if($thumb_gen=='info')          { $i->setColor(ereg_replace('#','',$backgroundcolor)); $i->info($text); }

         	$i->imagejpeg($image_url);
        }


        redirect_header($def_menu, 1, _MD_MYHOME_UPDATED );
        exit(); 
        } else {
          redirect_header($def_menu, 1, _MD_MYHOME_NODATA );
          exit();
        }
    break;
}

?>