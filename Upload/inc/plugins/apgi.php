<?php

 /*     This file is part of APGI (Additional Postbit Group Images)

    APGI is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    APGI is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with APGI.  If not, see <http://www.gnu.org/licenses/>. */

if(!defined("IN_MYBB")) {
    die("Hacking Attempt.");
}

$plugins->add_hook("postbit", "apgi");
$plugins->add_hook("postbit_pm", "apgi");
$plugins->add_hook("postbit_announcement", "apgi");

function apgi_info()
{
	return array(
		'name'			=> 'Multiple Usergroup Images on Postbit',
		'description'	=> 'Displays secondary usergroup images on the postbit along with the primary usergroup image.',
		'website'		=> 'http://www.makestation.net',
		'author'		=> 'Darth Apple',
		'authorsite'	=> 'http://www.makestation.net',
		'version'		=> '1.1',
		"compatibility"	=> "16*, 18*"
	);
}

function apgi_activate () {
	require MYBB_ROOT.'/inc/adminfunctions_templates.php';
	find_replace_templatesets("postbit", '#'.preg_quote('{$post[\'groupimage\']}').'#', '{$post[\'groupimage\']} {$post[\'additional_images\']}');	
	find_replace_templatesets("postbit_classic", '#'.preg_quote('{$post[\'groupimage\']}').'#', '{$post[\'groupimage\']} {$post[\'additional_images\']}');	
}

function apgi_deactivate () {
	require MYBB_ROOT.'/inc/adminfunctions_templates.php';
	find_replace_templatesets("postbit", '#'.preg_quote(' {$post[\'additional_images\']}').'#', '',0);
	find_replace_templatesets("postbit_classic", '#'.preg_quote('{$post[\'additional_images\']}').'#', '',0); 
}

function apgi (&$post) {
	global $mybb, $templates, $cache, $apgi, $templates;
	$u_groups = explode(",", $post['additionalgroups']);
	$usergroups_cache = $cache->read("usergroups");	
	
	foreach ($u_groups as $groupID) {
		$usergroup = $usergroups_cache[$groupID];
		if (!empty($usergroup['image'])) {
			$post['additional_images'] .= "<div style='margin-top: 3px; padding: 0px;'></div>"; // Adding a <br /> tag between group images results in alignment issues on chrome. This seems to work better.  
			eval("\$post['additional_images'] .= \"".$templates->get("postbit_groupimage")."\";");
		}
	}
	
	$post['groupimage'] = str_replace('<br />', '', $post['groupimage']); // chrome fix
	$post['additional_images'] .= "<div style='margin-top: 3px; padding: 0px;'></div>"; // padding fix
	return $post;
}
