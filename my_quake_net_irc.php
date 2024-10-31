<?php
/*
Plugin Name: My QuakeNet IRC
Plugin URI: http://kwark.allwebtuts.net
Description:  My QuakeNet IRC chat plugin for Wordpress. Add a zone for your QuakeNet IRC chat.
Author: Laurent (KwarK) Bertrand
Version: 1.0
Author URI: http://kwark.allwebtuts.net
*/

/*  
	Copyright 2011  Laurent (KwarK) Bertrand  (email : kwark@allwebtuts.net)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

//WORDPRESS API

// Enable internationalisation

load_plugin_textdomain( 'kw-irc', true, dirname( plugin_basename( __FILE__ ) ) . '/langue/' );


add_shortcode( 'quakenet' , 'kw_do_page_irc' );

add_action('admin_menu', 'kw_irc_menu');


wp_enqueue_script( 'statement', WP_PLUGIN_URL . '/my-quakenet-irc/js/statement.js');	
wp_enqueue_style( 'style', WP_PLUGIN_URL . '/my-quakenet-irc/css/style.css');	



function kw_irc_menu() {
	
	add_menu_page('QuakeNet IRC', 'QuakeNet IRC', 'manage_options', 'my_quake_net_irc.php');
	add_submenu_page('my_quake_net_irc.php', 'QuakeNet IRC', __('QuakeNet IRC', 'kw-irc'), 'manage_options', 'my_quake_net_irc.php', 'kw_do_page_irc_options');
}
 
function kw_do_page_irc_options(){
	
	if(isset($_POST['submitted']) == "yes"){
		
	update_option('new_irc', $_POST['new_irc']);
	update_option('kw_use_forum', $_POST['kw_use_forum']);
	update_option('kw_use_shortcode', $_POST['kw_use_shortcode']);
	update_option('kw_use_shortcode_no_sidebar', $_POST['kw_use_shortcode_no_sidebar']);
	update_option('kw_special_width1', $_POST['kw_special_width1']);
	update_option('kw_special_width2', $_POST['kw_special_width2']);
	update_option('kw_special_width3', $_POST['kw_special_width3']);
	
	echo "<div id=\"message\" class=\"updated fade\"><p><strong>";
	echo _e("Options sauvegard&eacute;es.", "kw-irc" );
	echo "</strong></p></div>";
	}
	?>
<div class="postbox" style="position:absolute; top:150px; right:15px; max-width:200px !important; text-align:center !important;">
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="Q56M572XU8XFG">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG_global.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online.">
<img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
</form>
<!-- Begin Allopass Checkout-Button Code -->
<script type="text/javascript" src="https://payment.allopass.com/buy/checkout.apu?ids=261214&idd=1045375&lang=fr"></script>
<noscript>
 <a href="https://payment.allopass.com/buy/buy.apu?ids=261214&idd=1045375" style="border:0">
  <img src="https://payment.allopass.com/static/buy/button/fr/162x56.png" style="border:0" alt="Buy now!" />
 </a>
</noscript>
<!-- End Allopass Checkout-Button Code --></div>
<div class="wrap">
<div id="theme-options-wrap">
  <div class="icon32" id="icon-tools"><br />
  </div>
  <h2>My QuakeNet irc</h2>
    <form method="post" name="kw_irc_admin" target="_self">
      <div style="Display: block; height: 15px; width: 100%;"></div>
      <table class="form-table">
      <tr valign="top">
        <th scope="row"><?php _e("Infos irc", "kw-irc" ) ?></th>
        <td><input type='text' style="width:250px;"  maxlength="200" name='new_irc' value="<?php echo get_option("new_irc"); ?>" />
        <span>
        <?php echo _e("<br />&nbsp;<br />Pour cr&eacute;er votre channel, rendez-vous sur <a href=\"http://webchat.quakenet.org/\" target=\"_new\">http://webchat.quakenet.org/</a> et commencez dans le coin supérieur gauche.<br />&nbsp;<br />Pour définir \"Infos irc\" ne copier/coller que la partie en gras ex: iframe src=\"http://webchat.quakenet.org/?<b>channels=votre-channel&uio=OT1</b>\"<br />&nbsp;<br />", "kw-irc" ); ?>
        </span>
          </td>
      </tr>
       <tr valign="top">
        <th scope="row"><?php _e("Utiliser c&ocirc;t&eacute; forum ?", "kw-irc" ) ?></th>
        <td><input type='checkbox' name='kw_use_forum' value='1' <?php if ( get_option( 'kw_use_forum' ) ) { echo 'checked'; } ?> />
        <span>
       <?php echo _e("Selectionnez pour utiliser My Quakenet irc sur un forum.<br />&nbsp;<br />Un bouton \"Quakenet\" permettra de cacher/voir la partie chat (voir readme.txt file pour l'int&eacute;gration)", "kw-irc" ); ?>
        </span>
          </td>
      </tr>
      <tr valign="top">
        <th scope="row"><?php _e("", "kw-irc" ) ?></th>
        <td><input type='text' style="width:50px;"  maxlength="4" name='kw_special_width1' value="<?php echo get_option("kw_special_width1"); ?>" /><b>px</b>
        <span>
       <?php echo _e("&nbsp;&nbsp;Si la largeur par d&eacute;faut automatique ne convient pas, d&eacute;finissez une nouvelle valeur<br />&nbsp;<br />", "kw-irc" ); ?>
        </span>
          </td>
      </tr>
          <tr valign="top">
        <th scope="row"><?php _e("Page (avec sidebar)", "kw-irc" ) ?></th>
        <td><input type='checkbox' name='kw_use_shortcode' value='1' <?php if ( get_option( 'kw_use_shortcode' ) ) { echo 'checked'; } ?> />
        <span>
       <?php echo _e("Selectionnez pour utiliser My Quakenet irc dans une page avec sidebar.<br />&nbsp;<br />Copier/coller <b>[quakenet]</b> dans la page puis cliquez \"publier\"", "kw-irc" ); ?>
        </span>
          </td>
      </tr>
      <tr valign="top">
        <th scope="row"><?php _e("", "kw-irc" ) ?></th>
        <td><input type='text' style="width:50px;"  maxlength="4" name='kw_special_width2' value="<?php echo get_option("kw_special_width2"); ?>" /><b>px</b>
        <span>
       <?php echo _e("&nbsp;&nbsp;Si la largeur par d&eacute;faut automatique ne convient pas, d&eacute;finissez une nouvelle valeur<br />&nbsp;<br />", "kw-irc" ); ?>
        </span>
          </td>
      </tr>
        <tr valign="top">
        <th scope="row"><?php _e("Pleine page (sans sidebar)", "kw-irc" ) ?></th>
        <td><input type='checkbox' name='kw_use_shortcode_no_sidebar' value='1' <?php if ( get_option( 'kw_use_shortcode_no_sidebar' ) ) { echo 'checked'; } ?> />
        <span>
       <?php echo _e("Selectionnez pour utiliser My Quakenet irc dans une page au format pleine page.<br />&nbsp;<br />Copier/coller <b>[quakenet]</b> dans la page, s&eacute;lectionnez one colum no sidebar puis cliquez \"publier\"", "kw-irc" ); ?>
        </span>
          </td>
      </tr>
      <tr valign="top">
        <th scope="row"><?php _e("", "kw-irc" ) ?></th>
        <td><input type='text' style="width:50px;"  maxlength="4" name='kw_special_width3' value="<?php echo get_option("kw_special_width3"); ?>" /><b>px</b>
        <span>
       <?php echo _e("&nbsp;&nbsp;Si la largeur par d&eacute;faut automatique ne convient pas, d&eacute;finissez une nouvelle valeur<br />&nbsp;<br />", "kw-irc" ); ?>
        </span>
          </td>
      </tr>
       <tr valign="top">
        <th scope="row">&nbsp;</th>
        <td> 
       <input name="submitted" type="hidden" value="yes" />
      <input type="submit" name="Submit" value="<?php echo _e("Mettre &agrave; jour", "kw-irc" ); ?> &raquo;" />
          </td>
      </tr>
       </table>
       <div style="Display: block; height: 15px; width: 100%;"></div>
    </form>
</div>
</div>
<?php } //END Options page

function kw_do_page_irc(){
	if ( get_option('kw_use_forum') == true && is_user_logged_in() && is_page('forum') ) {
		if ( get_option('kw_special_width1') == false ){
		$width1 = '900';
		}
		else {
		$width1 = get_option('kw_special_width1');
		}
		echo '<a style="font-size:11px;" href="javascript:visibilite(\'quake\');" title="Quakenet irc"><b>QuakeNet irc chat</b></a>';	
		echo '<div id="quake" class="hwrap" style="display:none;width:'.$width1.'px;"><div class="kcontent" style="width:'.$width1.'px;"><iframe style="border:none;" src="http://webchat.quakenet.org/?'.get_option("new_irc").'" width="'.$width1.'" height="400"></iframe></div></div>';
	}
	if ( get_option('kw_use_shortcode') == true && is_user_logged_in() ) {
		if ( get_option('kw_special_width2') == false ){
		$width2 = '625';
		}
		else {
		$width2 = get_option('kw_special_width2');
		}
		echo '<div class="kwrap" style="width:'.$width2.'px;"><div class="kcontent" style="width:'.$width2.'px;"><iframe style="border:none;" src="http://webchat.quakenet.org/?'.get_option("new_irc").'" width="'.$width2.'" height="400"></iframe></div></div>';
	}
	if ( get_option('kw_use_shortcode_no_sidebar') == true && get_option('kw_use_shortcode') == false && is_user_logged_in() ) {
		if ( get_option('kw_special_width3') == false ){
		$width3 = '805';
		}
		else {
		$width3 = get_option('kw_special_width3');
		}
		echo '<div class="kwrap" style="width:'.$width3.'px;"><div class="kcontent" style="width:'.$width3.'px;"><iframe style="border:none;" src="http://webchat.quakenet.org/?'.get_option("new_irc").'" width="'.$width3.'" height="400"></iframe></div></div>';
	}
	else{}
}

?>