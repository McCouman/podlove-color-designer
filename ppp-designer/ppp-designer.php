<?php
/**
 *	Plugin Name: PPP - Color Designer
 *	Plugin URI: http://wikibyte.org
 *	Description: With this plugin you can give the Podlove Web Player, your own style. This has created an independent plug-in and not with the project Podlove relatives and was created by Michael McCouman and at work through the project Podbe. 
 *	Author: Michael McCouman jr.
 *	Version: 0.3.6
 *	Author URI: http://labs.wikiybte.org/
*/

/**
 *	
 * @define to activate
 */
define ('CL_GROUP', 	'ppp_designer');
define ('CL_LOCAL', 	'ppp_designer');
define ('CL_SECTION', 	'color_designer');
define ('CL_PAGE',  	'podlove_webplayer_design');
define ('CL_OPTIONS', 	'adminpage_mask_color_designer');


/**
 *
 * @field var for more fields in PPPCD
 */
$color_option = array ();

/**
 *
 * @global type $color_option
 * @return type 
 */
function color_get_option() {
	global $color_option;
	if ( empty( $color_option ) ) {
		$color_option = get_option( color_option );
	}
	return $color_option;
}


############################################################################################################  Output PPP CSS

function cssadmin_playercss() { 
	// read color field input
	$color_option = color_get_option();
	
/**
 *	automaticle Podlove Color Designer
 *  Test template and integration. 
 *  Calculates the values in variables
 *
 *	@version 0.3 
 *  @implement to wikinode serach 2012(c)
 *	by Michael McCouman jr.
 * 
*/

	// gather color values ​​from the database
	$colordesigner = $color_option['input_color'];

	// determination of the color to the penalty
	// value of the mean value and the darkest color
	$var_mid	= '60';
	$var_dark	= '80';

	// GPR => HEX
	$hex_red 	= substr("$colordesigner", 1, 2); 
	$hex_green 	= substr("$colordesigner", 3, 2); 
	$hex_blue 	= substr("$colordesigner", 5, 2); 

	// Variables to calculate translation
	$dec_r 		= hexdec($hex_red); 
	$dec_g 		= hexdec($hex_green); 
	$dec_b 		= hexdec($hex_blue); 
	
	// Edition of the Middle color value
	$mid_r		= $dec_r - $var_mid;
	$mid_g		= $dec_g - $var_mid;
	$mid_b 		= $dec_b - $var_mid;
	
	// Edition of the darkest color value
	$dark_r		= $dec_r - $var_dark;
	$dark_g		= $dec_g - $var_dark;
	$dark_b 	= $dec_b - $var_dark;
	
	
	// player CSS for global outputs
	echo '<style id="mc" type="text/css">'; 
	
	
	####!!!! To change the information of Farbicons - is not described as a color field !!!!
	#  
	#  Interpretation:
 	#  #555; = dark color (a:hover)
	#  #777; = standard iconcolor 
?>
/*****************************************
/*          TEST AREA ONE COLOR          *
******************************************/
.podlovewebplayer_meta, 
.podlovewebplayer_top {
			/*background: <?php /*hell*/ echo 'rgb('.$dec_r.','.$dec_g.','.$dec_b.')' ?>                 */
			/*background: <?php /*midl*/ echo 'rgb('.$mid_r.','.$mid_g.','.$mid_b.')' ?>                 */
			/*background: <?php /*dunkel*/echo 'rgb('.$dark_r.','.$dark_g.','.$dark_b.')' ?>  !important;*/
}
/*****************************************
/*          COLOR DESIGNER               *
******************************************/
.podlovewebplayer_wrapper .podlovewebplayer_top,
.podlovewebplayer_wrapper .podlovewebplayer_meta {
	background:  <?php /*hell*/ echo 'rgb('.$dec_r.','.$dec_g.','.$dec_b.')' ?>!important;
	background: -moz-linear-gradient(top, <?php /*hell*/ echo 'rgb('.$dec_r.','.$dec_g.','.$dec_b.')' ?> 0%, <?php /*midl*/ echo 'rgb('.$mid_r.','.$mid_g.','.$mid_b.')' ?> 100%)!important;
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,<?php /*hell*/ echo 'rgb('.$dec_r.','.$dec_g.','.$dec_b.')' ?>), color-stop(100%,<?php /*midl*/ echo 'rgb('.$mid_r.','.$mid_g.','.$mid_b.')' ?>))!important;
	background: -webkit-linear-gradient(top, <?php /*hell*/ echo 'rgb('.$dec_r.','.$dec_g.','.$dec_b.')' ?> 0%, <?php /*midl*/ echo 'rgb('.$mid_r.','.$mid_g.','.$mid_b.')' ?> 100%)!important;
	background: -o-linear-gradient(top, <?php /*hell*/ echo 'rgb('.$dec_r.','.$dec_g.','.$dec_b.')' ?> 0%, <?php /*midl*/ echo 'rgb('.$mid_r.','.$mid_g.','.$mid_b.')' ?> 100%)!important;
	background: -ms-linear-gradient(top, <?php /*hell*/ echo 'rgb('.$dec_r.','.$dec_g.','.$dec_b.')' ?> 0%, <?php /*midl*/ echo 'rgb('.$mid_r.','.$mid_g.','.$mid_b.')' ?> 100%)!important;
	background: linear-gradient(to bottom,<?php /*hell*/ echo 'rgb('.$dec_r.','.$dec_g.','.$dec_b.')' ?> 0%,<?php /*midl*/ echo 'rgb('.$mid_r.','.$mid_g.','.$mid_b.')' ?> 100%)!important;
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php /*hell*/ echo 'rgb('.$dec_r.','.$dec_g.','.$dec_b.')' ?>', endColorstr='<?php /*midl*/ echo 'rgb('.$mid_r.','.$mid_g.','.$mid_b.')' ?>',GradientType=0 )!important;
}
.podlovewebplayer_wrapper .mejs-container .mejs-inner .mejs-controls {
	  background: <?php /*midl*/ echo 'rgb('.$mid_r.','.$mid_g.','.$mid_b.')' ?> !important;
	  background: -moz-linear-gradient(top, <?php /*midl*/ echo 'rgb('.$mid_r.','.$mid_g.','.$mid_b.')' ?> 0%, <?php /*dunkel*/echo 'rgb('.$dark_r.','.$dark_g.','.$dark_b.')' ?> 100%) !important;
	  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,<?php /*midl*/ echo 'rgb('.$mid_r.','.$mid_g.','.$mid_b.')' ?>), 
	  color-stop(100%,<?php /*dunkel*/echo 'rgb('.$dark_r.','.$dark_g.','.$dark_b.')' ?>)) !important;
	  background: -webkit-linear-gradient(top, <?php /*midl*/ echo 'rgb('.$mid_r.','.$mid_g.','.$mid_b.')' ?> 0%, <?php /*dunkel*/echo 'rgb('.$dark_r.','.$dark_g.','.$dark_b.')' ?> 100%) !important;
	  background: -o-linear-gradient(top, <?php /*midl*/ echo 'rgb('.$mid_r.','.$mid_g.','.$mid_b.')' ?> 0%, <?php /*dunkel*/echo 'rgb('.$dark_r.','.$dark_g.','.$dark_b.')' ?> 100%) !important;
	  background: -ms-linear-gradient(top, <?php /*midl*/ echo 'rgb('.$mid_r.','.$mid_g.','.$mid_b.')' ?> 0%, <?php /*dunkel*/echo 'rgb('.$dark_r.','.$dark_g.','.$dark_b.')' ?> 100%) !important;
	  background: linear-gradient(to bottom, <?php /*midl*/ echo 'rgb('.$mid_r.','.$mid_g.','.$mid_b.')' ?> 0%, <?php /*dunkel*/echo 'rgb('.$dark_r.','.$dark_g.','.$dark_b.')' ?> 100%) !important;
	  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php /*midl*/ echo 'rgb('.$mid_r.','.$mid_g.','.$mid_b.')' ?>', endColorstr='<?php /*dunkel*/echo 'rgb('.$dark_r.','.$dark_g.','.$dark_b.')' ?>',GradientType=0 ) !important;
}
.podlovewebplayer_meta .bigplay {
	color: <?php /*icons #555555*/  ?>!important;
	border-color: <?php /*icons #555555*/  ?> !important;
	background: transparent !important;
	border: 5px solid <?php /*icons #555555*/  ?>  !important;
}
.podlovewebplayer_wrapper {
	background: transparent !important;
}
.podlovewebplayer_meta .bigplay a:hover, 
.podlovewebplayer_meta .bigplay a:active, 
.podlovewebplayer_meta .bigplay.playing a:hover, 
.podlovewebplayer_meta .bigplay.playing a:active {
	color: <?php /*icons:hover #777777*/  ?> !important;
	border-color: <?php /*icons:hover #777777*/  ?> !important;
	text-shadow: 0px 0px 4px <?php /*icons:hover #777777*/ ?>;
	text-decoration: none;
	filter: dropshadow(color=<?php /*icons:hover #777777*/  ?>, offx=0, offy=0);
	cursor: pointer!important;
	border: 5px solid <?php /*icons:hover #777777*/ ?>!important;
}
.podlovewebplayer_meta + .summary, 
.podlovewebplayer_wrapper .podlovewebplayer_controlbox {
	  background: <?php /*midl*/ echo 'rgb('.$mid_r.','.$mid_g.','.$mid_b.')' ?> !important;
	  border-left: 3px <?php /*midl*/ echo 'rgb('.$mid_r.','.$mid_g.','.$mid_b.')' ?> solid !important;
	  border-right: 3px <?php /*midl*/ echo 'rgb('.$mid_r.','.$mid_g.','.$mid_b.')' ?> solid !important;
}
.podlovewebplayer_wrapper .podlovewebplayer_controlbox {
	  background: <?php /*dunkel*/echo 'rgb('.$dark_r.','.$dark_g.','.$dark_b.')' ?> !important;
	  border-left: 3px <?php /*dunkel*/echo 'rgb('.$dark_r.','.$dark_g.','.$dark_b.')' ?> solid !important;
	  border-right: 3px <?php /*dunkel*/echo 'rgb('.$dark_r.','.$dark_g.','.$dark_b.')' ?> solid !important;
}
.podlovewebplayer_wrapper,
.podlovewebplayer_wrapper .podlovewebplayer_meta,
.podlovewebplayer_wrapper .podlovewebplayer_meta .subtitle,
.podlovewebplayer_wrapper .podlovewebplayer_meta h3,
.podlovewebplayer_wrapper .podlovewebplayer_meta h3 a,
.podlovewebplayer_meta + .summary, 
.podlovewebplayer_wrapper .podlovewebplayer_controlbox,
.podlovewebplayer_wrapper .podlovewebplayer_meta .togglers {
	color: <?php /*icons #555555*/ ?>!important;
}
.podlovewebplayer_wrapper,
.podlovewebplayer_wrapper .podlovewebplayer_meta,
.podlovewebplayer_wrapper .podlovewebplayer_meta .subtitle,
.podlovewebplayer_wrapper .podlovewebplayer_meta h3,
.podlovewebplayer_wrapper .podlovewebplayer_meta h3 a,
.podlovewebplayer_meta + .summary, 
.podlovewebplayer_wrapper .podlovewebplayer_controlbox,
.podlovewebplayer_wrapper .podlovewebplayer_meta .togglers {
	color: <?php /*icons #555555*/  ?>!important;
}
.podlovewebplayer_meta .bigplay:hover,
.podlovewebplayer_meta .bigplay:active,
.podlovewebplayer_meta .bigplay.playing:hover,
.podlovewebplayer_meta .bigplay.playing:active {
	color: <?php /*icons:hover #777777*/  ?> !important;
	border-color: <?php /*icons:hover #777777*/  ?> !important;
	text-shadow: 0px 0px 4px <?php /*icons:hover #777777*/  ?>;
	text-decoration: none;
	filter: dropshadow(color=<?php /*icons:hover #777777*/ ?>, offx=0, offy=0);
	cursor: pointer;
}
.podlovewebplayer_meta .togglers .infobuttons, 
.podlovewebplayer_meta .togglers .infobuttons a, 
.podlovewebplayer_wrapper .podlovewebplayer_controlbox .infobuttons, 
.podlovewebplayer_wrapper .podlovewebplayer_controlbox .infobuttons a {
	color: <?php /*icons #555555*/ ?>!important;
	text-shadow: 0px 0px 1px <?php /*icons:hover #777777*/  ?>!important;
	text-decoration: none;
}
.podlovewebplayer_meta .togglers .infobuttons:hover,
.podlovewebplayer_meta .togglers .infobuttons a:hover,
.podlovewebplayer_wrapper .podlovewebplayer_controlbox .infobuttons:hover,
.podlovewebplayer_wrapper .podlovewebplayer_controlbox .infobuttons a:hover  {
	  color: <?php /*icons:hover #777777*/  ?> !important;
	  text-shadow: 0px 0px 4px #FFFFFF;
	  text-decoration: none;
	  filter: dropshadow(color=#FFFFFF, offx=0, offy=0);
	  cursor: pointer;
}
span.mejs-duration,
span.mejs-currenttime,
div.summary.active,
div.subtitle,
h3.episodetitle a{
	color: <?php /*icons #555555*/ ?>!important;
}
h3.episodetitle a:hover,
div.subtitle:hover {
	color: <?php /*icons #777777*/ ?>!important;
}

.mejs-controls .mejs-button button {
  background: transparent url(img/controls_grey.svg) no-repeat;
}

.mejs-controls .mejs-play button {
  background-position: 0 0;
}
.mejs-controls .mejs-pause button {
  background-position: 0 -16px;
}

.mejs-controls .mejs-stop button {
  background-position: -112px 0;
}

.mejs-controls .mejs-fullscreen-button button {
  background-position: -32px 0;
}

.mejs-controls .mejs-unfullscreen button {
  background-position: -32px -16px;
}

.mejs-controls .mejs-mute button {
  background-position: -16px -16px;
}

.mejs-controls .mejs-unmute button {
  background-position: -16px 0;
}

.mejs-controls .mejs-captions-button button {
  background-position: -48px 0;
}

.mejs-controls .mejs-loop-off button {
  background-position: -64px -16px;
}

.mejs-controls .mejs-loop-on button {
  background-position: -64px 0;
}

.mejs-controls .mejs-backlight-off button {
  background-position: -80px -16px;
}

.mejs-controls .mejs-backlight-on button {
  background-position: -80px 0;
}

.mejs-controls .mejs-sourcechooser-button button {
  background-position: -128px 0;
}
.mejs-container .mejs-controls .mejs-time span {
	color: <?php /*icons #555555*/ ?>!important;
}
.podlovewebplayer_wrapper .podlovewebplayer_chapterbox {
	border: 3px <?php /*dunkel*/ echo 'rgb('.$dark_r.','.$dark_g.','.$dark_b.')' ?> solid !important;
	border-bottom: 0px <?php /*dunkel*/ echo 'rgb('.$dark_r.','.$dark_g.','.$dark_b.')' ?> solid !important;
}
.podlovewebplayer_wrapper .podlovewebplayer_tableend {
	background: <?php /*dunkel*/echo 'rgb('.$dark_r.','.$dark_g.','.$dark_b.')' ?> !important;
	-webkit-box-shadow: 0px 1px <?php /*dunkel*/echo 'rgb('.$dark_r.','.$dark_g.','.$dark_b.')' ?> !important;
	-moz-box-shadow: 0px 1px <?php /*dunkel*/echo 'rgb('.$dark_r.','.$dark_g.','.$dark_b.')' ?> !important;
	box-shadow: 0px 1px <?php /*dunkel*/echo 'rgb('.$dark_r.','.$dark_g.','.$dark_b.')' ?> !important;
}

		<?php 
		echo '</style>';
}
add_action('admin_head', 'cssadmin_playercss');	
add_action('wp_head', 'cssadmin_playercss');	



###################################################################################################################### //End CSS




#################################################################################################################### //Start Adminpage
			
			// registration CSS and JS basics 
			function admin_register_head() {
				// CSS Color
				$url = plugins_url(basename(dirname(__FILE__)) . '/css/farbtastic.css?ver=' . PODLOVE_WEB_DESIGNER);
				 echo "<link rel='stylesheet' type='text/css' href='$url' />\n";				
				// JQ Test Color
				$urljq = plugins_url(basename(dirname(__FILE__)) . '/js/jquery.js?ver=' . PODLOVE_WEB_DESIGNER);
				 echo "<script type='text/javascript' src='$urljq'></script>\n";
				// JS Color
				$urljs = plugins_url(basename(dirname(__FILE__)) . '/js/farbtastic.js?ver=' . PODLOVE_WEB_DESIGNER);
				 echo "<script type='text/javascript' src='$urljs'></script>\n";
				// JS Def
				 echo "<script type='text/javascript' charset='utf-8'>
						  $(document).ready(function() {
							$('#demo').hide();
							$('#picker').farbtastic('#input_color');
						  });
					  </script>";
				 
				// easy player js includes (tests player ppp)
				$mlplayerjs = plugins_url(basename(dirname(__FILE__)) . '/podlove-web-player/libs/mediaelement/build/mediaelement-and-player.min.js?');
				 echo "<script type='text/javascript' src='$mlplayerjs'></script>\n";
				$hshiv = plugins_url(basename(dirname(__FILE__)) . '/podlove-web-player/libs/html5shiv.js');
				 echo "<script type='text/javascript' src='$hshiv'></script>\n";
				$playerjs = plugins_url(basename(dirname(__FILE__)) . '/podlove-web-player/podlove-web-player.js');
				 echo "<script type='text/javascript' src='$playerjs'></script>\n";
				// easy Player css includes (als tests)
				$playercss = plugins_url(basename(dirname(__FILE__)) . '/podlove-web-player/podlove-web-player.css');
				 echo "<link rel='stylesheet' type='text/css' href='$playercss' media='screen' type='text/css' />\n";	
				$mlplayercss = plugins_url(basename(dirname(__FILE__)) . '/podlove-web-player/libs/mediaelement/build/mediaelementplayer.min.css');
				 echo "<link rel='stylesheet' type='text/css' href='$mlplayercss' />\n";
				$fontellocss = plugins_url(basename(dirname(__FILE__)) . '/podlove-web-player/libs/pwpfont/css/fontello.css');
				 echo "<link rel='stylesheet' type='text/css' href='$fontellocss' />\n";	
			}
			add_action('admin_head', 'admin_register_head');

####################################################################################################################### //End

/**
 * create a ColorDesigner page
 */
function adminpage_registra_color_designer () {
	add_options_page ('Podlove Color Designer', 
	'Podlove Color Designer', 
	'manage_options', CL_PAGE, 
	'adminpage_mask_color_designer');
}

/**
 * settings for mask view in the CSS + formular
 */
function adminpage_mask_color_designer () {
	$playerimage = plugins_url(basename(dirname(__FILE__)) . '/img/maske.png');
	$playeraudio = plugins_url(basename(dirname(__FILE__)) . '/podlove-web-player/samples');
?>
<style>
	.wrap {
		position:relative;
	}
	input#input_color{ 
		height: 200px;
		width: 600px;
		background-image: url(<?php echo $playerimage; ?>) !important;
		background
		color: transparent !important;
		border: none;
		border-color:#fff!important;
		font-size:0px;
		background-position: center center;
		background-repeat: no-repeat;
	}
	div#picker {
		margin-top: -212px;
		margin-bottom: 10px;
	}
</style>

<div class="wrap">
	<div class="icon32" id="icon-options-general"><br /></div>
		<h2>Podlove Color Designer</h2>
		<h5>Version 0.3.6 Alpha</h5>
	<!--h3name CL_SECTION includes-->
			<form action="options.php" method="post">	
			<div class="form-item">
			<?php	
				settings_fields (CL_GROUP);
				do_settings_sections (CL_PAGE);
			?>
			</div>
			<div id="picker"></div>
<hr />	
	
	<p><h3>Player Ergebnis:</h3></p>
	<p style="width: 680px;">
		<audio id="testplayer">
			<source src="<?php echo $playeraudio; ?>/podlove-test-track.mp4" type="audio/mp4"></source>
			<source src="<?php echo $playeraudio; ?>/podlove-test-track.mp3" type="audio/mp3"></source>
			<source src="<?php echo $playeraudio; ?>/podlove-test-track.ogg" type="audio/ogg; codecs=vorbis"></source>
			<source src="<?php echo $playeraudio; ?>/podlove-test-track.opus" type="audio/ogg; codecs=opus"></source>
		</audio>
		<script>
		// Standalone Player
		// test include all ppp files
			$('#testplayer').podlovewebplayer({
				poster: '<?php echo $playeraudio; ?>/coverimage.png',
				title: 'PODLOVE Color Designer Test',
				permalink: 'http://podlove.github.com/podlove-web-player/standalone.html',
				subtitle: 'Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.',
				chapters: '00:00:00.000 Chapter One title'
							+"\n"+'00:00:01.000 Chapter Two with <a href="#">hyperlink</a>'
							+"\n"+'00:00:01.500 Chapter Three',
				summary: '<p>Summary and even links <a href="https://github.com/gerritvanaaken/podlove-web-player">Podlove Web Player</a>'
							+"\n"+'Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Maecenas sed diam eget risus varius blandit sit amet non magna. Maecenas sed diam eget risus varius blandit sit amet non magna.</p>'
							+"\n"+'<p>Nullam id dolor id nibh ultricies vehicula ut id elit. Nulla vitae elit libero, a pharetra augue. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Cras mattis consectetur purus sit amet fermentum. Nullam id dolor id nibh ultricies vehicula ut id elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>',
				duration: '00:02.500',
				alwaysShowHours: true,
				startVolume: 0.8,
				width: 'auto',
				summaryVisible: false,
				timecontrolsVisible: false,
				sharebuttonsVisible: false,
				chaptersVisible: true	
			});
		</script>
	</p>
	
	
		<!--send colorpicker-->
		<p class="submit">
			<input name="Submit" type="submit" value="<?php esc_attr_e('Save Changes'); ?>" class="button-primary" />	
		</p>
	</form>
</div>
<?php
}
#------------------------------------------------------------------------------------------------------

/**
 * adminpage register
 * ColorDesigner fields inputs
 */
function adminpage_mask_init () {
	$vars = color_get_option ();	
	register_setting (CL_GROUP, color_option, 'adminpage_color_field_inputs');
	add_settings_section (CL_SECTION, __('Player Vorschau:', CL_LOCAL), 'adminpage_color_section', CL_PAGE);
#---------------------------
	//register init wpfild
	add_settings_field (
		'input_color',__('', CL_LOCAL),
		'form_color_input',
		CL_PAGE,
		CL_SECTION,
		array (
			'id' => 'input_color',
			'value' => $vars,
			'default' => '#000000',
			#'description' => __('Playerfarbe', CL_LOCAL), //no output label
			'description' => __('', CL_LOCAL), //#fixed no admin
		)
	);
	
#---------------------------	
	//{ ... icon fields integration 
	// in Arbeit!
	//... }
	/*
	add_settings_field (
		'input_color',__('', CL_LOCAL),
		'form_color_input',
		CL_PAGE,
		CL_SECTION,
		array (
			'id' => 'input_icon_color',
			'value' => $vars,
			'default' => '#000000',
			'description' => __('Playerfarbe', CL_LOCAL),
		)
	);
	*/
	
}

#------------------------------------------------------------------------------------------------------
/*
 *
 * All field inputs
 */
function adminpage_color_field_inputs ($fields) {
	// sanitize color
	$fields['input_color'] = esc_html ($fields['input_color']);  
	$fields['input_color'] = strip_tags ($fields['input_color']);
	
	return $fields;
}

#------------------------------------------------------------------------------------------------------
/**
 *
 * @param type $fields
 * @return type 
 */
function adminpage_color_section ($fields) {
	return $fields;
}

#------------------------------------------------------------------------------------------------------
/**
 *
 * @param type $args 
 */
function form_color_input ($args) {
	
	// defaults
	$id = '';
	$value = '';
	$description = '';
	
	// set values
	if (!empty ($args['value'][$args['id']])) {
		$value = $args['value'][$args['id']];
	} else {
		if (!empty ($args['default'])) {
			$value = $args['default'];				
		}
	}
	// old typ wp as desc	(!? codex.wordpress.com )
	if (!empty ($args['description'])) {
		$description = $args['description'];
	}
	// argu in ID push
	$id = $args['id'];
?>
	<input type="text" id="<?php echo $id; ?>" name="<?php echo color_option; ?>[<?php echo $id; ?>]" value="<?php echo $value; ?>" class="regular-text"/>
<?php
	// old typ wp as desc	(!? codex.wordpress.com )
	if (!empty ($description)) {
		echo '<span class="description">' . $description . '</span>';
	}
	
}
#------------------------------------------------------------------------------------------------------
/**
 *
 * @param type $args 
 */
function form_color_select ($args) {
	
	// defaults
	$id = '';
	$value = '';
	$options = array();
	$description = '';
	
	//option for podlove icons (no include in version)
	if (!empty($args['options'])) {
		$options = $args['options'];
	}
	//adapt input =>id
	if (!empty($args['value'][$args['id']])) {
		$value = $args['value'][$args['id']];
	} else {
		//include standards (# in colorpicker)
		if (!empty ($args['default'])) {
			$value = $args['default'];				
		}
	}
	// old wp standrad outputting
	if (!empty ($args['description'])) {
		$description = $args['description'];
	}
	//var == ID
	$id = $args['id'];
	
	//modul desc.
	if (!empty ($description)) {
		echo '<br /><span class="description">' . $description . '</span>';
	}
}

// Register in WordPress
add_action( 'admin_init', 'adminpage_mask_init' );
add_action( 'admin_menu', 'adminpage_registra_color_designer' );

//End PPP Designer






