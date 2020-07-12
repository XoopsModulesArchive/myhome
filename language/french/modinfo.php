<?php
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System    		     //
//                    Copyright (c) 2004 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
//                   							     //
//                  Authors :						     //
//						- solo (www.wolfpackclan.com)//
//                  Myhome v1.0						     //
//  ------------------------------------------------------------------------ //

// Common values
 	$com_val_array =  array( 
                                 'description'  => 'Description',
                                 'num'          => 'Nombre',
                                 'keywords'     => 'Mots cl�s',
                                 'redir'        => 'Redirections',
                                 'all'          => 'Tous',
                                 'message'      => 'Message',

                                 'name'        => 'Myhome',
  	                         'dsc'         => 'Module de gestion de menus',
  	                         'clone'       => 'Cloner',
  	                         'submit'      => 'Envoyer',
  	                         'block'       => 'Blocs',
  	                         'utils'       => 'Utilitaires',

  	                         'index'       => 'Index',
  	                         'edit'        => 'Edition',
  	                         'help'        => 'Aide',
  	                         'settings'    => 'Param�tres',
  	                         'item'        => 'Item',
  	                         'meta'        => 'Meta',
                                 'templates'   => 'Templates',

  	                         'indexdsc'       => 'Param�tres de la page d\'index du module.',
  	                         'helpdsc'        => 'Aide du module',
  	                         'settingsdsc'    => 'Liste de tous les param�tres g�n�raux du module',
  	                         'templatesdsc'   => 'Gestionnaire de templates',
  	                         'metadsc'        => 'Param�tres des metas du module.',

  	                         'index_dsc'       => 'Retourner � la page d\'accueil du module.',
  	                         'image_dsc'       => 'Ajouter, supprimer, modifier une image.',
  	                         'block_dsc'       => 'Param�ter un bloc.',
  	                         'settings_dsc'    => 'Param�trer les pr�f�rences g�n�rales du module.',
  	                         'templates_dsc'   => 'Gestionnaire de templates',
  	                         'utils_dsc'       => 'Cloner le module.',
  	                         'help_dsc'        => 'Acc�der � l\'aide.',
  	                         'redir_dsc'       => 'Gestion des redirections'
                                 );

// Modinfo values
 	$pref_val_array =  array(
 	                          'mode_list_image'        => 'Images',
 	                          'mode_list_select'       => 'Bo�te de s�lection',
 	                          'mode_list_ul'           => 'Liste � puce',

 	                          'welcome'                => 'Bienvenue sur Myhome, le module de page d\'accueil alternative ou de redirection.',
 	                          'metakeywords'           => '',
 	                          'metadescription'        => '',

  	                         'max'                     => 'Taille des images',
  	                         'thumb'                   => 'Vignette',
  	                         'url'                     => 'Adresse',
  	                         'msg'                     => 'Message'
                                 );

// Settings values
 	$sett_val_array =  array( 'banner'                 => 'Banni�re',
 	                          'bannerdsc'                 => 'Url de la banni�re � afficher sur tout le module.',
 	                          'bannerhlp'                 => 'Laisser vide pour ne rien afficher. Format images uniquement (.jpg, .gif, etc.).',

 	                          'background'             => 'Image de fond',
 	                          'backgrounddsc'             => 'Url de l\'image de fond � afficher sur tout le module.',
 	                          'backgroundhlp'             => 'Laisser vide pour ne rien afficher. Format images uniquement (.jpg, .gif, etc.).',

 	                          'mode'                   => 'Mode d\'affichage',
 	                          'modedsc'                   => 'Mode d\'affichage par d�faut de la page d\'accueil du module.',

 	                          'desc'                   => 'Texte de la page d\'index',
 	                          'descdsc'                   => 'Texte � afficher sur la page d\'index du module.',
 	                          'deschlp'                   => 'Supporte le hmtl et les codes Xoops (smilies et balises). Laisser vide pour ne rien afficher.',

 	                          'perpage'               =>  'Nombre d\'items par page',
 	                          'perpagedsc'                => 'Nombre maximum d\'items � afficher par page.',
 	                          'perpagehlp'                => 'D�termine le nombre d\'informations � afficher par pages du module (liste de menus, de lien, d\'images, etc.) en partie publique et administrative.',

 	                          'thumbmw'                => 'Taille des vignettes',
 	                          'thumbmwdsc'                => 'D�fini la largeur et la hauteur des vignettes en px.',
 	                          'thumbmwhlp'                => '',

 	                          'cols'                   => 'Colonnes',
 	                          'colsdsc'                   => 'Nombre de colonnes par d�faut.',

                                  'grps'                   => 'Groupes',
                                  'grpsdsc'                   => 'S�lection des groupes utilisateurs.',

                                  'url'                  => 'Adresse',
                                  'urldsc'                  => 'Adresse de redirection (absolue ou relative)',

                                  'message'                => 'Message',
                                  'messagedsc'                => 'Message de redirection ou de page d\'accueil alternative.',

 	                          'color'                  => 'Couleurs des vignettes',
  	                          'thumb_color'            => 'Couleur des vignettes',
 	                          'colordsc'                  => 'D�fini la couleur de fond des vignettes.',
 	                          'colorhlp'                  => '',

 	                          'metakeyword'            => 'Mots cl�s',
 	                          'metakeyworddsc'            => 'Mots cl�s � utiliser par d�faut sur l\'ensemble du module.',
 	                          'metakeywordhlp'            => '',

 	                          'metadesc'               => 'Meta Description',
                                  'metadescdsc'               => 'Meta Description � utiliser par d�faut sur l\'ensemble du module.',
 	                          'metadeschlp'               => '',
 	                          
 	                          'dir'                    => 'R�pertoire de stockage',
                                  'dirdsc'                    => 'R�pertoire de stockage par d�faut utilis� lors de la cr�ation d\'une nouvelle page.',
                                  'dirhlp'                    => '',
 	                          
 	                          'redirsearch'            => 'Redirection sur recherche',
 	                          'search'                 => 'Recherche redirig�e',
                                  'redirsearchdsc'            => 'Active la redirection vers la recherche interne.',
                                  'redirsearchhlp'            => 'Activer la redirection des visiteurs en provenance des moteurs de recherche vers la page de recherche interne du site, en affichant les r�sultats bas�s sur les mots cl�s de l\'utilisateur.',
                                  
 	                          'buttons'                => 'Boutons admin',
 	                          'buttonsdsc'                => 'Format d\'affichage des boutons d\'administration.',
 	                          'buttonshlp'                => '',
 	                          'image'                        => 'Images',
 	                          'text'                         => 'Texte',
 	                          'button'                       => 'Bouton',
 	                          'select'                       => 'Bo�te de s�lection',

 	                          'transition'            => 'Transition',
                                  'transitiondsc'             => 'Param�tre de transition des redirections en secondes.',
                                  'transitionhlp'             => ''

                                 );

// Settings values
 	$desc_val_array =  array(

                                 );

// Render defines
        $item_val_array = array_merge( $com_val_array,
                                       $pref_val_array,
                                       $sett_val_array,
                                       $desc_val_array );

 	foreach ($item_val_array as $item_lg=>$item_val) {
                 define(strtoupper('_MI_MYHOME_'.$item_lg),$item_val);
	}
?>

