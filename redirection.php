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
// include_once('header.php');

include_once(XOOPS_ROOT_PATH.'/modules/myhome/include/functions_common.php');

function myhome_getmoduleAlloption($repmodule='myhome')
{

		$module_handler =& xoops_gethandler('module');
		$module =& $module_handler->getByDirname($repmodule);
		$config_handler =& xoops_gethandler('config');
		if ($module) {
		    $moduleConfig =& $config_handler->getConfigsByCat(0, $module->getVar('mid'));
		}

	Return $moduleConfig;
}

myhome_group_access( myhome_getmoduleAlloption('myhome')  );

?>