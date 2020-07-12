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
         Vous pouvez g�rer les redirections sur n\'importe quelles pages du site. 
         Pour cela, ajouter la ligne suivante dans le fichier \'header.php\' � la racine du site :

         <div style="border:1px Inset Black; padding:12px; margin:12px; width:520px; background:LightGrey;">
         include_once XOOPS_ROOT_PATH."/modules/myhome/redirection.php";</div>

         Les param�tres de redirection par groupes s\'appliquent uniquement aux utilisateurs faisant partie des groupes s�lectionn�s. Attention, il s\'agit de s�lection multiples. 
         
         Ainsi, pour qu\'une redirection s\'applique � l\'utilisateur faisant partie � la fois du groupe webmaster et du groupe utilisateur, le param�tre de redirection doit s\'appliquer � ces deux groupes � la fois.
         
         Si vous ne souhaitez pas appliquer les redirections � l\'ensemble du site, vous pouvez aussi les activer via l\'un des blocs du module, en l\'affichant sur les pages d�sir�es.
         
         <h3>Gestion des groupes</h3>
         
         Vous pouvez cr�er autant de redirection qu\'il existe de groupes. Si vous cr�ez un nouveau groupe, mettez le module � jour de fa�on � ce qu\'il int�gre le nouveau groupe ainsi cr��. 
         ',


'image'        => '<h3>Gestionnaire d\'images</h3>
         Vous pouvez g�rer ici les images/vignettes/logos utilis�s pour agr�menter vos listes de liens.
         Chaque menu peut disposer de sa propre liste d\'images, dans son propre r�pertoire de stockage.

         Quelques fonctionnalit�s vous permettrons d\'uniformiser l\'aspect des vignettes <u>tout en pr�servant les images originales</u> !
         Chaque images modifi�es est sauvegard�e au pr�alable pour pouvoir lui restaurer ses propri�t�s (taille, couleur, format) d\'origine.
         
         <b>Descriptions des options disponibles :</b>
         <ol>
         <li><b>G�n�rateur de vignette :</b> S�lectionnez ici le type de modification que vous souhaitez apporter � vos vignettes.
         <table width="100%"><tr>
         <td align="center"><img src="../images/sample/flag_normal.jpg" />
         Normal</td><td align="center"><img src="../images/sample/flag_rounded.jpg" />
         Bord arrondis</td><td align="center"><img src="../images/sample/flag_b-w.jpg" />
         Noir & blanc</td><td align="center"><img src="../images/sample/flag_shadow.jpg" />
         Ombr�</td><td align="center"><img src="../images/sample/flag_deg.jpg" />
         D�grad�</td><td align="center"><img src="../images/sample/flag_text.jpg" />
         Texte</td></tr></table>
         </li>
         <li><b>Texte :</b> Texte � afficher en mode <b>Texte</b>.</li>
         <li><b>Largeur :</b> Largeur absolue de l\'image. Facultatif.</li>
         <li><b>Hauteur :</b> Hauteur absolue de l\'image. Facultatif.</li>
         <li><b>Couleur de fond :</b> Couleur de fond pour la cr�ation de la vignette en mode <b>Bord arrondis</b>, <b>Ombr�</b> et <b>D�grad�</b>.</li></ol>
         ',

'css'        => '<h3>Feuille de style li�e � la template</h3>
         Vous pouvez affecter une feuille de style sp�cifique � chaque template de menu.
         Ces feuilles de style peuvent �tre : <ul>
         <li>pr�-existantes et li�e � la template.</li>
         <li>inexistantes et cr��e par vos soins. Elle sera automatiquement li�e � la template ainsi �dit�e et aff�ct�e � tous les menus qui feront appel � elle.</li></ul>

         A l\'instar des feuilles de styles des menus, la balise {id} permettra de distinguer automatiquement une caract�ristique li�e � un menu sp�cifique.
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
         Certaines templates de menu font appel � un script java.
         Certains script font parfois appel � des param�tres pass�s en variables.
         Vous pouvez editer ce script ou ces variables dans cette fen�tre.
         ',

'tpl'        => '<h3>Templates de menu</h3>
         Les templates de menu est le code html et smarty employ� pour g�n�rer les menus. 
         Les templates disponibles sont celles propos�es dans le gestionnaire de templates de Xoops.
         Seules les templates cr��es via un jeu de template personnalis� sont disponibles.
         Si la fen�tre d\'�dition s\'affiche gris�e, c\'est qu\'elle n\'est pas modifiable pour l\'une des raisons suivantes :
         <ul><li>il n\'y a pas de jeu de template personnalis� ;</li>
         <li>le jeu de template personnalis� n\'a pas �t� mis � jour.</li></ul>
         '
                                  );



//        $item_val_array = $info_val_array + $tips_val_array;
//        $tips_count = count($item_val_array);

// Render defines
 	foreach ($help_val_array as $item_lg=>$item_val) {
                 define(strtoupper('_HLP_MYHOME_'.$item_lg),$item_val);
	}
?>