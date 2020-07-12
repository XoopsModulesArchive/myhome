<?php
//  ------------------------------------------------------------------------ 	//
//                XOOPS - PHP Content Management System    			//
//                    Copyright (c) 2004 XOOPS.org                       	//
  //                       <http://www.xoops.org/>                              //
//                   								//
//                  Authors :							//
//						- solo (www.wolfpackclan.com)   //
//                  Myhome v1.0							//
//  ------------------------------------------------------------------------ 	//

// include_once( XOOPS_ROOT_PATH . "/modules/myhome/include/functions_urw.php" );
// include_once( XOOPS_ROOT_PATH . "/modules/myhome/include/functions_directory.php" );

include('include/item.php');


function myhome_getmoduleoption($option, $repmodule='myhome')
{
	global $xoopsModuleConfig, $xoopsModule;
	static $tbloptions= Array();
	if(is_array($tbloptions) && array_key_exists($option,$tbloptions)) {
		return $tbloptions[$option];
	}

	$retval=false;
	if (isset($xoopsModuleConfig) && (is_object($xoopsModule) && $xoopsModule->getVar('dirname') == $repmodule && $xoopsModule->getVar('isactive')))
	{
		if(isset($xoopsModuleConfig[$option])) {
			$retval= $xoopsModuleConfig[$option];
		}

	} else {
		$module_handler =& xoops_gethandler('module');
		$module =& $module_handler->getByDirname($repmodule);
		$config_handler =& xoops_gethandler('config');
		if ($module) {
		    $moduleConfig =& $config_handler->getConfigsByCat(0, $module->getVar('mid'));
	    	if(isset($moduleConfig[$option])) {
	    		$retval= $moduleConfig[$option];
	    	}
		}
	}
	$tbloptions[$option]=$retval;
	return $retval;
}

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
?>