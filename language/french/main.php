<?php
/**
* XOOPS - PHP Content Management System
* Copyright (c) 2001 - 2008 <http://www.xoops.org/>
*
* Module: multiMenu 2.x
* Licence : GPL
* Authors :
*           - solo (http://www.wolfpackclan.com/wolfactory)
*/

// Common values
$main_val_array =  array(        'index'        => 'Index',
  	                         'admIn'        => 'Admin',
  	                         'description'  => 'Description',

  	                         'source_code'  => 'Code source',

  	                         'admins'       => 'Admin',
  	                         'edit'         => 'Editer',
  	                         'clone'        => 'Cloner',
  	                         'alt_title'    => 'Alternatif',

  	                         'images'       => 'Images',
  	                         'templates'    => 'Templates',
  	                         'blocks'       => 'Blocs',
  	                         'settings'     => 'Paramètres',
  	                         'utils'        => 'Utilitaires',
  	                         'delete'       => 'Supprimer',

  	                         'block'        => 'Bloc',
  	                         'help'         => 'Aide',

  	                         'notactive'    => 'Cette page est indisponible.'
                                 );

                                 
// Render defines

 	foreach ($main_val_array as $item_lg=>$item_val) {
                 define(strtoupper('_MYHOME_'.$item_lg),$item_val);
	}

?>