<?php
/**
* XOOPS - PHP Content Management System
* Copyright (c) 2001 - 2006 <http://www.xoops.org/>
*
* Module: multiMenu 1.90
* Licence : GPL
* Authors :
*           - solo (http://www.wolfpackclan.com/wolfactory)
*			- herve (http://www.herve-thouzard.com)
*			- blueteen (http://myxoops.romanais.info)
*			- DuGris (http://www.dugris.info)
*/

 	$help_val_array =  array( 

'menucssh'        => '<h3>Gestion des redirections</h3>
         Vous pouvez gérer les redirections sur n\'importe quelles pages du site. 
         Pour cela, ajouter la ligne suivante dans le fichier \'header.php\' à la racine du site :

         <div style="border:1px Inset Black; padding:12px; margin:12px; width:520px; background:LightGrey;">
         include_once XOOPS_ROOT_PATH."/modules/myhome/redirection.php";</div>

         Les paramètres de redirection par groupes s\'appliquent uniquement aux utilisateurs faisant partie des groupes sélectionnés. Attention, il s\'agit de sélection multiples. 
         
         Ainsi, pour qu\'une redirection s\'applique à l\'utilisateur faisant partie à la fois du groupe webmaster et du groupe utilisateur, le paramètre de redirection doit s\'appliquer à ces deux groupes à la fois.
         
         Si vous ne souhaitez pas appliquer les redirections à l\'ensemble du site, vous pouvez aussi les activer via l\'un des blocs du module, en l\'affichant sur les pages désirées.
         
         <h3>Gestion des groupes</h3>
         
         Vous pouvez créer autant de redirection qu\'il existe de groupes. Si vous créez un nouveau groupe, mettez le module à jour de façon à ce qu\'il intègre le nouveau groupe ainsi créé. 
         ',


'image'        => '<h3>Gestionnaire d\'images</h3>
         Vous pouvez gérer ici les images/vignettes/logos utilisés pour agrémenter vos listes de liens.
         Chaque menu peut disposer de sa propre liste d\'images, dans son propre répertoire de stockage.

         Quelques fonctionnalités vous permettrons d\'uniformiser l\'aspect des vignettes <u>tout en préservant les images originales</u> !
         Chaque images modifiées est sauvegardée au préalable pour pouvoir lui restaurer ses propriétés (taille, couleur, format) d\'origine.
         
         <b>Descriptions des options disponibles :</b>
         <ol>
         <li><b>Générateur de vignette :</b> Sélectionnez ici le type de modification que vous souhaitez apporter à vos vignettes.
         <table width="100%"><tr>
         <td align="center"><img src="../images/sample/flag_normal.jpg" />
         Normal</td><td align="center"><img src="../images/sample/flag_rounded.jpg" />
         Bord arrondis</td><td align="center"><img src="../images/sample/flag_b-w.jpg" />
         Noir & blanc</td><td align="center"><img src="../images/sample/flag_shadow.jpg" />
         Ombré</td><td align="center"><img src="../images/sample/flag_deg.jpg" />
         Dégradé</td><td align="center"><img src="../images/sample/flag_text.jpg" />
         Texte</td></tr></table>
         </li>
         <li><b>Texte :</b> Texte à afficher en mode <b>Texte</b>.</li>
         <li><b>Largeur :</b> Largeur absolue de l\'image. Facultatif.</li>
         <li><b>Hauteur :</b> Hauteur absolue de l\'image. Facultatif.</li>
         <li><b>Couleur de fond :</b> Couleur de fond pour la création de la vignette en mode <b>Bord arrondis</b>, <b>Ombré</b> et <b>Dégradé</b>.</li></ol>
         ',

'css'        => '<h3>Feuille de style liée à la template</h3>
         Vous pouvez affecter une feuille de style spécifique à chaque template de menu.
         Ces feuilles de style peuvent être : <ul>
         <li>pré-existantes et liée à la template.</li>
         <li>inexistantes et créée par vos soins. Elle sera automatiquement liée à la template ainsi éditée et afféctée à tous les menus qui feront appel à elle.</li></ul>

         A l\'instar des feuilles de styles des menus, la balise {id} permettra de distinguer automatiquement une caractéristique liée à un menu spécifique.
         Exemple :<div style="border:1px Inset Black; padding:12px; margin:12px; width:360px; background:LightGrey;">/* Sub links */
          #dropmenudiv_{id} {
            position:absolute;
            margin-left:10px;
            margin-top:-1px;
            border: 1px outset black;
            }
            </div>
         ',

'script'        => '<h3>Script Java</h3>
         Certaines templates de menu font appel à un script java.
         Certains script font parfois appel à des paramètres passés en variables.
         Vous pouvez editer ce script ou ces variables dans cette fenêtre.
         ',

'tpl'        => '<h3>Templates de menu</h3>
         Les templates de menu est le code html et smarty employé pour générer les menus. 
         Les templates disponibles sont celles proposées dans le gestionnaire de templates de Xoops.
         Seules les templates créées via un jeu de template personnalisé sont disponibles.
         Si la fenêtre d\'édition s\'affiche grisée, c\'est qu\'elle n\'est pas modifiable pour l\'une des raisons suivantes :
         <ul><li>il n\'y a pas de jeu de template personnalisé ;</li>
         <li>le jeu de template personnalisé n\'a pas été mis à jour.</li></ul>
         '
                                  );



//        $item_val_array = $info_val_array + $tips_val_array;
//        $tips_count = count($item_val_array);

// Render defines
 	foreach ($help_val_array as $item_lg=>$item_val) {
                 define(strtoupper('_HLP_MYHOME_'.$item_lg),$item_val);
	}
?>