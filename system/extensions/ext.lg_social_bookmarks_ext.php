<?php
/**
* LG Social Bookmarks extension file
* 
* This file must be placed in the
* /system/extensions/ folder in your ExpressionEngine installation.
*
* @package LgSocialBookmarks
* @version 2.0.3
* @author Leevi Graham <http://leevigraham.com>
* @see http://leevigraham.com/cms-customisation/expressionengine/addon/lg-social-bookmarks/
* @copyright Copyright (c) 2007-2009 Leevi Graham
* @license {@link http://creativecommons.org/licenses/by-sa/3.0/ Creative Commons Attribution-Share Alike 3.0 Unported} All source code commenting and attribution must not be removed. This is a condition of the attribution clause of the license.
*/

if ( ! defined('EXT')) exit('Invalid file request');

if ( ! defined('LG_SB_version')){
	define("LG_SB_version",			"2.0.3");
	define("LG_SB_docs_url",		"http://leevigraham.com/cms-customisation/expressionengine/addon/lg-social-bookmarks/");
	define("LG_SB_addon_id",		"LG Social Bookmarks");
	define("LG_SB_extension_class",	"Lg_social_bookmarks_ext");
	define("LG_SB_cache_name",		"lg_cache");
}

/**
* This extension provides a nice settings interface to LG Social Bookmarks
*
* @package LgSocialBookmarks
* @version 2.0.3
* @author Leevi Graham <http://leevigraham.com>
* @see http://leevigraham.com/cms-customisation/expressionengine/addon/lg-social-bookmarks/
* @copyright Copyright (c) 2007-2009 Leevi Graham
* @license {@link http://creativecommons.org/licenses/by-sa/3.0/ Creative Commons Attribution-Share Alike 3.0 Unported} All source code commenting and attribution must not be removed. This is a condition of the attribution clause of the license.
* @todo Add per field custom settings
*/
class Lg_social_bookmarks_ext {

	/**
	* Extension settings
	* @var array
	*/
	var $settings			= array();

	/**
	* Extension name
	* @var string
	*/
	var $name				= 'LG Social Bookmarks';

	/**
	* Extension version
	* @var string
	*/
	var $version			= LG_SB_version;

	/**
	* Extension description
	* @var string
	*/
	var $description		= 'Adds social bookmarking functionality to ExpressionEngine';

	/**
	* If $settings_exist = 'y' then a settings page will be shown in the ExpressionEngine admin
	* @var string
	*/
	var $settings_exist 	= 'y';

	/**
	* Link to extension documentation
	* @var string
	*/
	var $docs_url			= LG_SB_docs_url;

	/**
	* PHP4 Constructor
	*
	* @see __construct()
	* @since Version 2.0.0
	*/
	function Lg_social_bookmarks_ext($settings='')
	{
		$this->__construct($settings);
	}

	/**
	* PHP 5 Constructor
	*
	* @param	array|string $settings Extension settings associative array or an empty string
	* @since	Version 2.0.0
	*/
	function __construct($settings='')
	{
		global $IN, $SESS;

		if(isset($SESS->cache['lg']) === FALSE){ $SESS->cache['lg'] = array();}

		$this->settings = $this->_get_settings();
		$this->debug = $IN->GBL('debug');
	}

	/**
	* Get the site specific settings from the extensions table
	*
	* @param $force_refresh		bool	Get the settings from the DB even if they are in the $SESS global
	* @param $return_all		bool	Return the full array of settings for the installation rather than just this site
	* @return array 					If settings are found otherwise false. Site settings are returned by default. Installation settings can be returned is $return_all is set to true
	* @since Version 2.0.0
	*/
	function _get_settings($force_refresh = FALSE, $return_all = FALSE)
	{

		global $SESS, $DB, $REGX, $LANG, $PREFS;

		// assume there are no settings
		$settings = FALSE;
		
		// Get the settings for the extension
		if(isset($SESS->cache['lg'][LG_SB_addon_id]['settings']) === FALSE || $force_refresh === TRUE)
		{
			// check the db for extension settings
			$query = $DB->query("SELECT settings FROM exp_extensions WHERE enabled = 'y' AND class = '" . LG_SB_extension_class . "' LIMIT 1");

			// if there is a row and the row has settings
			if ($query->num_rows > 0 && $query->row['settings'] != '')
			{
				// save them to the cache
				$SESS->cache['lg'][LG_SB_addon_id]['settings'] = $REGX->array_stripslashes(unserialize($query->row['settings']));
			}
		}

		// check to see if the session has been set
		// if it has return the session
		// if not return false
		if(empty($SESS->cache['lg'][LG_SB_addon_id]['settings']) !== TRUE)
		{
			if($return_all === TRUE)
			{
				$settings = $SESS->cache['lg'][LG_SB_addon_id]['settings'];
			}
			else
			{
				if(isset($SESS->cache['lg'][LG_SB_addon_id]['settings'][$PREFS->ini('site_id')]) === TRUE)
				{
					$settings = $SESS->cache['lg'][LG_SB_addon_id]['settings'][$PREFS->ini('site_id')];
				}
				else
				{
					$settings = $this->_build_default_settings();
				}
			}
		}

		return $settings;
	}

	/**
	* Configuration for the extension settings page
	* 
	* @param $current	array 		The current settings for this extension. We don't worry about those because we get the site specific settings
	* @since Version 2.0.0
	**/
	function settings_form($current)
	{
		global $DB, $DSP, $LANG, $IN, $PREFS, $SESS;

		// create a local variable for the site settings
		$settings = $this->_get_settings();

		$DSP->crumbline = TRUE;

		$DSP->title  = $LANG->line('extension_settings');
		$DSP->crumb  = $DSP->anchor(BASE.AMP.'C=admin'.AMP.'area=utilities', $LANG->line('utilities')).
		$DSP->crumb_item($DSP->anchor(BASE.AMP.'C=admin'.AMP.'M=utilities'.AMP.'P=extensions_manager', $LANG->line('extensions_manager')));

		$DSP->crumb .= $DSP->crumb_item($LANG->line('lg_social_bookmarks_title') . " {$this->version}");

		$DSP->right_crumb($LANG->line('disable_extension'), BASE.AMP.'C=admin'.AMP.'M=utilities'.AMP.'P=toggle_extension_confirm'.AMP.'which=disable'.AMP.'name='.$IN->GBL('name'));

		$DSP->body = '';

		if(isset($settings['show_promos']) === FALSE) {$settings['show_promos'] = 'y';}
		if($settings['show_promos'] == 'y')
		{
			$DSP->body .= "<script src='http://leevigraham.com/promos/ee.php?id=" . rawurlencode(LG_SB_addon_id) ."&v=".$this->version."' type='text/javascript' charset='utf-8'></script>";
		}

		if(isset($settings['show_donate']) === FALSE) {$settings['show_donate'] = 'y';}
		if($settings['show_donate'] == 'y')
		{
			$DSP->body .= "<style type='text/css' media='screen'>
				#donate{float:right; margin-top:0; padding-left:190px; position:relative; top:-2px}
				#donate .button{background:transparent url(http://leevigraham.com/themes/site_themes/default/img/btn_paypal-donation.png) no-repeat scroll left bottom; display:block; height:0; overflow:hidden; position:absolute; top:0; left:0; padding-top:27px; text-decoration:none; width:175px}
				#donate .button:hover{background-position:top right;}
			</style>";
			$DSP->body .= "<p id='donate'>
							" . $LANG->line('donation') ."
							<a rel='external' href='https://www.paypal.com/cgi-bin/webscr?cmd=_donations&amp;business=sales%40newism%2ecom.au&amp;item_name=LG%20Expression%20Engine%20Development&amp;amount=%2e00&amp;no_shipping=1&amp;return=http%3a%2f%2fleevigraham%2ecom%2fdonate%2fthanks&amp;cancel_return=http%3a%2f%2fleevigraham%2ecom%2fdonate%2fno%2dthanks&amp;no_note=1&amp;tax=0&amp;currency_code=USD&amp;lc=US&amp;bn=PP%2dDonationsBF&amp;charset=UTF%2d8' class='button' target='_blank'>Donate</a>
						</p>";
		}

		$DSP->body .= $DSP->heading($LANG->line('lg_social_bookmarks_title') . " <small>{$this->version}</small>");
		
		$DSP->body .= $DSP->form_open(
								array(
									'action' => 'C=admin'.AMP.'M=utilities'.AMP.'P=save_extension_settings'
								),
								// WHAT A M*THERF!@KING B!TCH THIS WAS
								// REMEMBER THE NAME ATTRIBUTE MUST ALWAYS MATCH THE FILENAME AND ITS CASE SENSITIVE
								// BUG??
								array('name' => strtolower(get_class($this)))
		);
	

		// EXTENSION ACCESS
		$DSP->body .= $DSP->table_open(array('class' => 'tableBorder', 'border' => '0', 'style' => 'margin-top:18px; width:100%'));

		$DSP->body .= $DSP->tr()
			. $DSP->td('tableHeading', '', '2')
			. $LANG->line("access_rights")
			. $DSP->td_c()
			. $DSP->tr_c();

		$DSP->body .= $DSP->tr()
			. $DSP->td('tableCellOne', '30%')
			. $DSP->qdiv('defaultBold', $LANG->line('enable_extension_for_this_site'))
			. $DSP->td_c();

		$DSP->body .= $DSP->td('tableCellOne')
			. "<select name='enable'>"
						. $DSP->input_select_option('y', "Yes", (($settings['enable'] == 'y') ? 'y' : '' ))
						. $DSP->input_select_option('n', "No", (($settings['enable'] == 'n') ? 'y' : '' ))
						. $DSP->input_select_footer()
			. $DSP->td_c()
			. $DSP->tr_c();

		$DSP->body .= $DSP->table_c();

		// Social Bookmarking Sites
		$DSP->body .= $DSP->table_open(array('class' => 'tableBorder', 'border' => '0', 'style' => 'margin-top:18px; width:100%'));

		$DSP->body .= $DSP->tr()
			. $DSP->td('tableHeading', '', '2')
			. $LANG->line("social_bookmarking_sites_title")
			. $DSP->td_c()
			. $DSP->tr_c();

		$DSP->body .= $DSP->tr()
			. $DSP->td('tableCellOne', '30%')
			. $DSP->qdiv('defaultBold', $LANG->line("social_bookmarking_sites_label"))
			. $DSP->td_c();

		$DSP->body .= $DSP->td('tableCellOne');

		$DSP->body .= "<p><a href='#' class='lg_sb_select-all'>Select All</a> | <a href='#' class='lg_sb_select-none'>Select None</a></p>";
		$DSP->body .= "<ul id='social-sites'>";

		// get all the fields for this field type
		if(isset($SESS->cache['lg'][LG_SB_addon_id]['social_sites']) === FALSE)
		{
			$SESS->cache['lg'][LG_SB_addon_id]['social_sites'] = require(PATH_EXT."lg_social_bookmarks_ext/lib.lg_social_bookmark_sites".EXT);
		}

		$social_bookmarking_sites = $SESS->cache['lg'][LG_SB_addon_id]['social_sites'];

		// Generate sites menu items
		foreach ($social_bookmarking_sites as $key => $value)
		{
			$check = (in_array($key, $settings['active_sites'])) ? 1 : 0;
			$active = ($check) ? ' class="active"' : '';
			$DSP->body .= "<li". $active ."><label>";
			$DSP->body .= $DSP->input_checkbox('active_sites[]', $key, $check);
			$DSP->body .= "<img src='".PATH_CP_IMG."lg_social_bookmarks/favicons/" . $social_bookmarking_sites[$key]['favicon'] . "' /> " . $key;
			$DSP->body .= "</label></li>";
		}

		$DSP->body .= "</ul>";

		$DSP->body .= $DSP->td_c();
		$DSP->body .= $DSP->tr_c();
		$DSP->body .= $DSP->table_c();

		/*
		// JQUERY
		$DSP->body .= $DSP->table_open(array('class' => 'tableBorder', 'border' => '0', 'style' => 'margin-top:18px; width:100%'));

		$DSP->body .= $DSP->tr()
			. $DSP->td('tableHeading', '', '2')
			. $LANG->line("scripts")
			. $DSP->td_c()
			. $DSP->tr_c();

		$DSP->body .= $DSP->tr()
			. $DSP->td('', '', '2')
			. "<div class='box' style='border-width:0 0 1px 0; margin:0; padding:10px 5px'><p>" . $LANG->line('scripts_info'). "</p></div>"
			. $DSP->td_c()
			. $DSP->tr_c();

		$DSP->body .= $DSP->tr()
			. $DSP->td('tableCellOne', '30%')
			. $DSP->qdiv('defaultBold', $LANG->line('jquery_core_path_label'))
			. $DSP->td_c();

		$DSP->body .= $DSP->td('tableCellOne')
			. $DSP->input_text('jquery_core_path', $settings['jquery_core_path'])
			. $DSP->td_c()
			. $DSP->tr_c();

		$DSP->body .= $DSP->table_c();
		*/

		// UPDATES
		$DSP->body .= $DSP->table_open(array('class' => 'tableBorder', 'border' => '0', 'style' => 'margin-top:18px; width:100%'));

		$DSP->body .= $DSP->tr()
			. $DSP->td('tableHeading', '', '2')
			. $LANG->line("check_for_updates_title")
			. $DSP->td_c()
			. $DSP->tr_c();

		$DSP->body .= $DSP->tr()
			. $DSP->td('', '', '2')
			. "<div class='box' style='border-width:0 0 1px 0; margin:0; padding:10px 5px'><p>" . $LANG->line('check_for_updates_info') . "</p></div>"
			. $DSP->td_c()
			. $DSP->tr_c();

		$DSP->body .= $DSP->tr()
			. $DSP->td('tableCellOne', '30%')
			. $DSP->qdiv('defaultBold', $LANG->line("check_for_updates_label"))
			. $DSP->td_c();

		$DSP->body .= $DSP->td('tableCellOne')
			. "<select name='check_for_updates'>"
				. $DSP->input_select_option('y', "Yes", (($settings['check_for_updates'] == 'y') ? 'y' : '' ))
				. $DSP->input_select_option('n', "No", (($settings['check_for_updates'] == 'n') ? 'y' : '' ))
				. $DSP->input_select_footer()
			. $DSP->td_c()
			. $DSP->tr_c();

			$DSP->body .= $DSP->table_c();


		if($IN->GBL('lg_admin') != 'y')
		{
			$DSP->body .= $DSP->table_c();
			$DSP->body .= "<input type='hidden' value='".$settings['show_donate']."' name='show_donate' />";
			$DSP->body .= "<input type='hidden' value='".$settings['show_promos']."' name='show_promos' />";
		}
		else
		{
			$DSP->body .= $DSP->table_open(array('class' => 'tableBorder', 'border' => '0', 'style' => 'margin-top:18px; width:100%'));
			$DSP->body .= $DSP->tr()
				. $DSP->td('tableHeading', '', '2')
				. $LANG->line("lg_admin_title")
				. $DSP->td_c()
				. $DSP->tr_c();

			$DSP->body .= $DSP->tr()
				. $DSP->td('tableCellOne', '30%')
				. $DSP->qdiv('defaultBold', $LANG->line("show_donate_label"))
				. $DSP->td_c();

			$DSP->body .= $DSP->td('tableCellOne')
				. "<select name='show_donate'>"
						. $DSP->input_select_option('y', "Yes", (($settings['show_donate'] == 'y') ? 'y' : '' ))
						. $DSP->input_select_option('n', "No", (($settings['show_donate'] == 'n') ? 'y' : '' ))
						. $DSP->input_select_footer()
				. $DSP->td_c()
				. $DSP->tr_c();

			$DSP->body .= $DSP->tr()
				. $DSP->td('tableCellTwo', '30%')
				. $DSP->qdiv('defaultBold', $LANG->line("show_promos_label"))
				. $DSP->td_c();

			$DSP->body .= $DSP->td('tableCellTwo')
				. "<select name='show_promos'>"
						. $DSP->input_select_option('y', "Yes", (($settings['show_promos'] == 'y') ? 'y' : '' ))
						. $DSP->input_select_option('n', "No", (($settings['show_promos'] == 'n') ? 'y' : '' ))
						. $DSP->input_select_footer()
				. $DSP->td_c()
				. $DSP->tr_c();

			$DSP->body .= $DSP->table_c();
		}		

		$DSP->body .= $DSP->qdiv('itemWrapperTop', $DSP->input_submit())
					. $DSP->form_c();
	}

	/**
	* Save Settings
	* 
	* @since Version 2.0.0
	**/
	function save_settings()
	{
		// make somethings global
		global $DB, $IN, $PREFS, $REGX, $SESS;

		// loop through each of the post varaibles and remove the extra active_sites_foo keys
		foreach ($_POST as $key => $value)
		{
			if(strpos($key, 'active_sites_') !== FALSE)
			{
				unset($_POST[$key]);
			}
		}
		// unset the name
		unset($_POST['name']);

		$active_sites = (empty($_POST['active_sites']) === FALSE) ? implode("|", $_POST['active_sites']) : '';
		$default_settings = array('active_sites' => $active_sites);

		// merge the defaults with our $_POST vars
		$_POST = array_merge($default_settings, $_POST);

		// load the settings from cache or DB
		// force a refresh and return the full site settings
		$settings = $this->_get_settings(TRUE, TRUE);

		// add the posted values to the settings
		$settings[$PREFS->ini('site_id')] = $_POST;

		// update the settings
		$query = $DB->query($sql = "UPDATE exp_extensions SET settings = '" . addslashes(serialize($settings)) . "' WHERE class = '" . LG_SB_extension_class . "'");
	}

	/**
	* Returns the default settings for this extension
	* This is used when the extension is activated or when a new site is installed
	*/
	function _build_default_settings()
	{
		$default_settings = array(
								'enable'			=> 'y', // Enable for this site
								'check_for_updates' => 'y', // Check for all 3rd party updates
								'show_donate'		=> 'y',  // Show donate. Do Not Remove
								'active_sites'		=> array('Digg'),
								'jquery_core_path' 	=> 'http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js',
								'show_promos'		=> 'y'
							);
		return $default_settings;
	}

	/**
	* Activates the extension
	*
	* @return	bool Always TRUE
	* @since 	Version 2.0.0
	*/
	function activate_extension()
	{
		global $DB, $PREFS;

		$default_settings = $this->_build_default_settings();

		// get the list of installed sites
		$query = $DB->query("SELECT * FROM exp_sites");

		// if there are sites - we know there will be at least one but do it anyway
		if ($query->num_rows > 0)
		{
			// for each of the sites
			foreach($query->result as $row)
			{
				// build a multi dimensional array for the settings
				$settings[$row['site_id']] = $default_settings;
			}
		}

		$hooks = array(
			'lg_addon_update_register_source'	=> 'lg_addon_update_register_source',
			'lg_addon_update_register_addon'	=> 'lg_addon_update_register_addon',
			'show_full_control_panel_end'		=> 'show_full_control_panel_end',
			'weblog_entries_tagdata_end'		=> 'weblog_entries_tagdata_end'
		);

		foreach ($hooks as $hook => $method)
		{
			$sql[] = $DB->insert_string( 'exp_extensions', 
											array('extension_id' 	=> '',
												'class'			=> get_class($this),
												'method'		=> $method,
												'hook'			=> $hook,
												'settings'		=> addslashes(serialize($settings)),
												'priority'		=> 10,
												'version'		=> $this->version,
												'enabled'		=> "y"
											)
										);
		}

		// run all sql queries
		foreach ($sql as $query)
		{
			$DB->query($query);
		}
		return TRUE;
	}

	/**
	* Updates the extension
	*
	* @param	string $current If installed the current version of the extension otherwise an empty string
	* @return	bool FALSE if the extension is not installed or is the current version
	* @since 	Version 2.0.0
	*/
	function update_extension($current = '')
	{
		global $DB;
		if ($current == '' OR $current == $this->version)
		{
			return FALSE;
		}

		$sql[] = "UPDATE exp_extensions SET version = '" . $DB->escape_str($this->version) . "' WHERE class = '" . get_class($this) . "'";

		// run all sql queries
		foreach ($sql as $query)
		{
			$DB->query($query);
		}
	}

	/**
	* Disables the extension the extension and deletes settings from DB
	* 
	* @since version 2.0.0
	*/
	function disable_extension()
	{
		global $DB;
		$DB->query("DELETE FROM exp_extensions WHERE class = '" . get_class($this) . "'");
	}

	/**
	* Takes the control panel html and replaces the drop down
	*
	* @param	string $out The control panel html
	* @return	string The modified control panel html
	* @see		http://expressionengine.com/developers/extension_hooks/show_full_control_panel_end/
	* @since 	Version 1.0.0
	*/
	function show_full_control_panel_end( $out )
	{
		global $DB, $EXT, $IN, $PREFS, $SESS;

		// -- Check if we're not the only one using this hook
		if($EXT->last_call !== FALSE) $out = $EXT->last_call;

		if($IN->GBL('name', 'GET') == 'lg_social_bookmarks_ext' && $IN->GBL('P', 'GET') == 'extension_settings')
		{
			$r = "\n<link rel='stylesheet' type='text/css' media='screen' href='" . $PREFS->ini('theme_folder_url', 1) . "cp_themes/".$PREFS->ini('cp_theme')."/lg_social_bookmarks/css/admin.css' />";
			$r .= "\n<script type='text/javascript' charset='utf-8' src='". $PREFS->ini('theme_folder_url', 1) . "cp_themes/".$PREFS->ini('cp_theme')."/lg_social_bookmarks/js/admin.js'></script>";
			// add the script string before the closing head tag
			$out = str_replace("</head>", $r . "</head>", $out);
		}
		return $out;
	}

	/**
	* Modify the tagdata for the weblog entries before anything else is parsed
	* @param 	string		$r				The Weblog Entries tag data
	* @param	array 		$row			Array of data for the current entry
	* @param 	object		$this			The current Weblog object including all data relating to categories and custom fields
	*/
	function weblog_entries_tagdata_end($r, $row, $weblog)
	{
		global $EXT, $FNS, $LANG, $OUT, $REGX, $TMPL;

		if($EXT->last_call !== false) $r = $EXT->last_call;

		if(strpos($r, LD."lg_social_bookmarks") !== FALSE && $this->settings['enable'] == 'y')
		{

			$LANG->fetch_language_file('lg_social_bookmarks_ext');

			// get all the fields for this field type
			if(isset($SESS->cache['lg'][LG_SB_addon_id]['social_sites']) === FALSE)
			{
				$SESS->cache['lg'][LG_SB_addon_id]['social_sites'] = require(PATH_EXT."lg_social_bookmarks_ext/lib.lg_social_bookmark_sites".EXT);
			}

			$social_bookmarking_sites = $SESS->cache['lg'][LG_SB_addon_id]['social_sites'];
			$active_social_bookmarking_sites = $this->settings['active_sites'];

			if(strpos($r, LD."path") !== FALSE)
			{
				$r = preg_replace_callback("/".LD."\s*path=(.*?)".RD."/", array(&$FNS, 'create_url'), $r);
			}

			// process all lg_data_matrix custom field tags
			preg_match_all("/".LD."\s*lg_social_bookmarks(.*?)".RD."(.*?)".LD.SLASH."lg_social_bookmarks".RD."/s", $r, $tags);

			foreach($tags[0] as $tag_key => $tag)
			{
				$tag_chunk = $tags[0][$tag_key];
				$tag_params = $FNS->assign_parameters($tags[1][$tag_key]);
				$tag_chunk_content = $tags[2][$tag_key];

				// get the post permalink
				if(isset($tag_params['permalink']) === FALSE)
				{
					$OUT->fatal_error($LANG->line('no_permalink_in_tag'));
				}

				$permalink = str_replace(SLASH, "/", $tag_params['permalink']);

				if(isset($tag_params['sites']) === TRUE)
				{
					$active_social_bookmarking_sites = explode("|", $tag_params['sites']);
				}

				// count the number of active sites
				$active_sites_count = count($active_social_bookmarking_sites);

				// check to see if this weblog has social bookmarks
				if(strpos($tag_chunk_content, LD."social_sites") !== FALSE)
				{
					preg_match_all("/".LD."social_sites(.*?)".RD."(.*?)".LD.SLASH."social_sites".RD."/s", $tag_chunk, $social_site_tags);

					foreach($social_site_tags[0] as $social_site_tags_key => $social_site_tags_tag)
					{
						$social_site_chunk = $social_site_tags[0][$social_site_tags_key];
						// There are no params for the {social_sites} tag... yet :)
						//$social_site_params = $FNS->assign_parameters($social_site_tags[1][$social_site_tags_key]);
						$social_site_content = $social_site_tags[2][$social_site_tags_key];

						$social_sites_inner = '';
						$site_count = 0;
						foreach ($active_social_bookmarking_sites as $site_name)
						{
							++$site_count;
							$active_site = $social_bookmarking_sites[$site_name];

							$url = $active_site["url"];

							// replace the PERMALINK string in the link url with the post permalink
							$url = str_replace(LD.'permalink'.RD, htmlentities(urlencode($REGX->unhtmlentities($permalink))), $url);

							// replace the VERSION string in the link url with the version of this module
							$url = str_replace(LD.'version'.RD, $this->version, $url);

							if(isset($tag_params['title']) === TRUE)
							{
								if($site_name !== "Email")
								{
									$url = str_replace(LD.'title'.RD, htmlentities(urlencode($REGX->unhtmlentities($tag_params['title']))), $url);
								}
								else
								{
									$url = str_replace(LD.'title'.RD, $tag_params['title'], $url);
								}
							}

							// loop through each of the weblog values
							foreach ($row as $key => $value)
							{
								if($site_name !== "Email")
								{
									$url = str_replace(LD.$key.RD, htmlentities(urlencode($REGX->unhtmlentities($value))), $url);
								}
								else
								{
									$url = str_replace(LD.$key.RD, $value, $url);
								}
							}

							// loop through each of the tag params making this pretty flexible
							foreach ($tag_params as $key => $value)
							{
								if($site_name !== "Email")
								{
									$url = str_replace(LD.$key.RD, htmlentities(urlencode($REGX->unhtmlentities($value))), $url);
								}
								else
								{
									$url = str_replace(LD.$key.RD, $value, $url);
								}
							}

							$tagdata = $social_site_content;
							// swap the nested tag data {social_site_name}, {social_url}, {social_image_url} with our new variables
							$tagdata = $TMPL->swap_var_single("social_site_name", $site_name, $tagdata);
							$tagdata = $TMPL->swap_var_single("social_site_url", $url, $tagdata);
							$tagdata = $TMPL->swap_var_single("social_site_img_url", $active_site["favicon"], $tagdata);
							$tagdata = $TMPL->swap_var_single("social_site_count", $site_count, $tagdata);
							$tagdata = $FNS->prep_conditionals($tagdata, array(
								"social_site_name" => $site_name,
								"social_site_img_url" => $active_site["favicon"],
								"social_site_count" => $site_count)
							);
							//$tagdata = $TMPL->swap_var_single("social_site_script", $active_site["script"], $tagdata);
							//$tagdata = $TMPL->swap_var_single("social_site_script_onclick", $active_site["onclick"], $tagdata);
							$social_sites_inner .= $tagdata;
						}
						$attribution = "
<!--
** LG Social Bookmarks v{$this->version} ** 
ExpressioneEngine Social Bookmarking Extension
See: " . LG_SB_docs_url ." for more information.
-->";
						$tag_chunk_content = str_replace($social_site_chunk, $social_sites_inner . $attribution, $tag_chunk_content);
					}
				}
				$tag_chunk_content = str_replace(LD."total_social_site_count".RD, $active_sites_count, $tag_chunk_content);
				$tag_chunk_content = $FNS->prep_conditionals($tag_chunk_content, array("social_total_site_count" => $active_sites_count));
				$r = str_replace($tag_chunk, $tag_chunk_content, $r);
			}
		}
		return $r;
	}

	/**
	* Register a new Addon Source
	*
	* @param	array $sources The existing sources
	* @return	array The new source list
	* @since 	Version 2.0.0
	*/
	function lg_addon_update_register_source($sources)
	{
		global $EXT;
		// -- Check if we're not the only one using this hook
		if($EXT->last_call !== FALSE)
			$sources = $EXT->last_call;

		// add a new source
		// must be in the following format:
		/*
		<versions>
			<addon id='LG Social Bookmarks' version='2.0.0' last_updated="1218852797" docs_url="http://leevigraham.com/" />
		</versions>
		*/
		if($this->settings['check_for_updates'] == 'y')
		{
			$sources[] = 'http://leevigraham.com/version-check/versions.xml';
		}

		return $sources;

	}

	/**
	* Register a new Addon
	*
	* @param	array $addons The existing sources
	* @return	array The new addon list
	* @since 	Version 2.0.0
	*/
	function lg_addon_update_register_addon($addons)
	{
		global $EXT;
		// -- Check if we're not the only one using this hook
		if($EXT->last_call !== FALSE)
			$addons = $EXT->last_call;

		// add a new addon
		// the key must match the id attribute in the source xml
		// the value must be the addons current version
		if($this->settings['check_for_updates'] == 'y')
		{
			$addons[LG_SB_addon_id] = $this->version;
		}

		return $addons;
	}

}

?>