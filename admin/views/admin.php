<?php
/**
 * Represents the view for the administration dashboard.
 *
 * This includes the header, options, and other information that should provide
 * The User Interface to the end user.
 *
 * @package   Plugin_Name
 * @author    Your Name <email@example.com>
 * @license   GPL-2.0+
 * @link      http://example.com
 * @copyright 2014 Your Name or Company Name
 */
?>

<div class="wrap">

	<h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
	<p>UnPointZero social share is a simple plugin to share everything from your WordPress website to social networks, without any API. Fully customizable, no bullshit !</p>
	<!-- @TODO: Provide markup for your options page here. -->
	<form method="post" action="options.php">
		<?php
			settings_fields( 'upzsocial_options' );
			$options = get_option( 'upzsocial_options' );
		?>
	<div class="upzsocial_tabs" id="tab-socialnetworks">
		<h2>Social-networks</h2>
		<table class="form-table" cellspacing="2" cellpadding="5" width="100%">
			<tbody>
				<tr>
					<th width="30%" valign="top" style="padding-top:10px;">
							Displayed social-networks
					</th>
					<td>
							<?php form_selectmultiple("upzsocial_options[social_networks]",upzsocial_social_networks(),serialize($options["social_networks"])); ?>
							<p class="setting-description" style="margin:5px 10px;">Select the social-networks icons you want to display on your content.</p>
					</td>
				</tr>
			</tbody>
		</table>
	</div>

	<div class="upzsocial_tabs" id="tab-displayon">
		<h2>Display on</h2>
		<table class="form-table" cellspacing="2" cellpadding="5" width="100%">
			<tbody>
				<tr>
					<th width="30%" valign="top" style="padding-top:10px;">
							Select type of content
					</th>
					<td>
							<?php form_selectmultiple("upzsocial_options[type_of_content]",list_wp_contents_types(),serialize($options["type_of_content"])); ?>
							<p class="setting-description" style="margin:5px 10px;">Select where you want to display social share icons.</p>
					</td>
				</tr>
				<tr>
					<th width="30%" valign="top" style="padding-top:10px;">
							Display on excerpt
					</th>
					<td>
							<?php form_checkbox("upzsocial_options[excerpt]","Display on excerpt",true,$options["excerpt"]); ?>
							<p class="setting-description" style="margin:5px 10px;">Check to display on excerpt.</p>
					</td>
				</tr>
				<tr>
					<th width="30%" valign="top" style="padding-top:10px;">
							Display on content
					</th>
					<td>
							<?php form_checkbox("upzsocial_options[content]","Display on content",true,$options["content"]); ?>
							<p class="setting-description" style="margin:5px 10px;">Check to display on content.</p>
					</td>
				</tr>
				<tr>
					<th width="30%" valign="top" style="padding-top:10px;">
							Position
					</th>
					<td>
							<?php form_select("upzsocial_options[position]",array("top"=>"top position","bottom"=>"bottom position","both"=>"top & bottom"),$options["position"]); ?>
							<p class="setting-description" style="margin:5px 10px;">Select share buttons position.</p>
					</td>
				</tr>
				<tr>
					<th width="30%" valign="top" style="padding-top:10px;">
							Excluded pages
					</th>
					<td>
							<?php form_selectmultiple("upzsocial_options[excludedpages]",upzsocial_list_pages(),serialize($options["excludedpages"])); ?>
							<p class="setting-description" style="margin:5px 10px;">Select excluded pages. Use 'CTRL' key to deselect an item.</p>
					</td>
				</tr>
			</tbody>
		</table>
	</div>

	<div class="upzsocial_tabs" id="tab-style">
		<h2>Style</h2>
		<table class="form-table" cellspacing="2" cellpadding="5" width="100%">
			<tbody>
				<tr>
					<th width="30%" valign="top" style="padding-top:10px;">
							Icon style
					</th>
					<td>
							<?php form_radio("upzsocial_options[iconstyle]",upzsocial_list_styles(),$options["iconstyle"]); ?>
							<p class="setting-description" style="margin:5px 10px;">Select icon style.</p>
					</td>
				</tr>
				<tr>
					<th width="30%" valign="top" style="padding-top:10px;">
							Custom style (if custom selected)
					</th>
					<td>
							<?php form_input("upzsocial_options[customstyle]",$options["customstyle"]); ?>
							<p class="setting-description" style="margin:5px 10px;">Enter the url of the folder containing your icons based on your theme as base. See plugin readme for more infos</p>
					</td>
				</tr>
				<tr>
					<th width="30%" valign="top" style="padding-top:10px;">
							Align
					</th>
					<td>
							<?php form_radio("upzsocial_options[iconalign]",array("left"=>"left","right"=>"right","center"=>"center"),$options["iconalign"]); ?>
							<p class="setting-description" style="margin:5px 10px;">Icons alignement.</p>
					</td>
				</tr>
			</tbody>
		</table>
	</div>

	<div class="upzsocial_tabs" id="tab-customization">
		<h2>Customization</h2>
		<table class="form-table" cellspacing="2" cellpadding="5" width="100%">
			<tbody>
				<tr>
					<th width="30%" valign="top" style="padding-top:10px;">
							Text
					</th>
					<td>
							<?php form_input("upzsocial_options[text]",$options["text"]); ?>
							<p class="setting-description" style="margin:5px 10px;">Enter the text, displayed before the share buttons</p>
					</td>
				</tr>
			</tbody>
		</table>
	</div>

	<p class="submit"><input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" /></p>
	</form>

</div>
