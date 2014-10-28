By default, MyBB only displays the usergroup image for the primary usergroup on the user's postbit and profile. This plugin enables MyBB to display all usergroup images, and is tested and compatible with MyBB 1.6 and MyBB 1.8.

The {$post['additional_groups']} variable will be used on the 'postbit' and 'postbit_classic' templates. You can remove or move this variable to wherever you'd like. On user profiles, the variable for additional usergroup images will be the {$memprofile['additional_groups']} variable, found in the 'member_profile' template. If you do not wish for additional group images to be displayed on user profiles, you may remove this variable. 

Please note that this plugin may not be compatible with highly customized themes by default if these themes remove the {$post['groupimage']} or the {$groupimage} variables from the postbit or the profile templates, respectively. If the plugin does not work with your theme, you will need to manually add these variables into your templates. 

Installation: 
1) Upload the contents of the "Upload" folder to your MyBB root folder. 
2) Activate "Multiple Usergroup Images on Postbit/Profile" via ACP -> Plugins. 

License: 

    This file is part of apgi (additional postbit group images)

    APGI is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    APGI is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with APGI.  If not, see <http://www.gnu.org/licenses/>.
