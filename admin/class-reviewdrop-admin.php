<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://reviewdrop.io
 * @since      1.0.0
 *
 * @package    Reviewdrop
 * @subpackage Reviewdrop/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Reviewdrop
 * @subpackage Reviewdrop/admin
 * @author     Reviewdrop <support@reviewdrop.io>
 */
class rdxt_Admin
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in rdxt_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The rdxt_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/reviewdrop-admin.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in rdxt_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The rdxt_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/reviewdrop-admin.js', array('jquery'), $this->version, false);
	}
}

/////////////////////

add_action('admin_menu', 'rdxt_add_admin_menu');
add_action('admin_init', 'rdxt_settings_init');

function rdxt_add_admin_menu()
{

	add_options_page('Reviewdrop', 'Reviewdrop', 'manage_options', 'reviewdrop', 'rdxt_options_page');
}


function rdxt_settings_init()
{

	register_setting('pluginPage', 'rdxt_settings');

	add_settings_section(
		'rdxt_pluginPage_section',
		__('Widget configuration', 'reviewdrop'),
		'rdxt_settings_section_callback',
		'pluginPage'
	);

	add_settings_field(
		'rdxt_text_field_0',
		__('Widget ID', 'reviewdrop'),
		'rdxt_text_field_0_render',
		'pluginPage',
		'rdxt_pluginPage_section'
	);

	add_settings_field(
		'rdxt_select_field_1',
		__('Button Position', 'reviewdrop'),
		'rdxt_select_field_1_render',
		'pluginPage',
		'rdxt_pluginPage_section'
	);

	add_settings_field(
		'rdxt_select_field_2',
		__('Display previews?', 'reviewdrop'),
		'rdxt_select_field_2_render',
		'pluginPage',
		'rdxt_pluginPage_section'
	);

	add_settings_field(
		'rdxt_select_field_3',
		__('Mobile previews?', 'reviewdrop'),
		'rdxt_select_field_3_render',
		'pluginPage',
		'rdxt_pluginPage_section'
	);

	add_settings_field(
		'rdxt_text_field_4',
		__('Branding color', 'reviewdrop'),
		'rdxt_text_field_4_render',
		'pluginPage',
		'rdxt_pluginPage_section'
	);

	add_settings_field(
		'rdxt_select_field_5',
		__('Delay pop-up time', 'reviewdrop'),
		'rdxt_select_field_5_render',
		'pluginPage',
		'rdxt_pluginPage_section'
	);

	add_settings_field(
		'rdxt_select_field_6',
		__('Conversion Token', 'reviewdrop'),
		'rdxt_text_field_6_render',
		'pluginPage',
		'rdxt_pluginPage_section'
	);

	add_settings_field(
		'rdxt_select_field_7',
		__('Email send date', 'reviewdrop'),
		'rdxt_select_field_7_render',
		'pluginPage',
		'rdxt_pluginPage_section'
	);

	add_settings_field(
		'rdxt_select_field_8',
		__('Enable conversion emails?', 'reviewdrop'),
		'rdxt_select_field_8_render',
		'pluginPage',
		'rdxt_pluginPage_section'
	);

	add_settings_field(
		'rdxt_select_field_9',
		__('Hide widget from website?', 'reviewdrop'),
		'rdxt_select_field_9_render',
		'pluginPage',
		'rdxt_pluginPage_section'
	);
}


function rdxt_text_field_0_render()
{

	$options = get_option('rdxt_settings');
?>
	<input type='text' name='rdxt_settings[rdxt_text_field_0]' value='<?php echo $options['rdxt_text_field_0']; ?>' placeholder="123923">
<?php

}


function rdxt_select_field_1_render()
{

	$options = get_option('rdxt_settings');
?>
	<select name='rdxt_settings[rdxt_select_field_1]'>
		<option value='review-drop--widget--left' <?php selected($options['rdxt_select_field_1'], 'review-drop--widget--left'); ?>>Left</option>
		<option value='review-drop--widget--right' <?php selected($options['rdxt_select_field_1'], 'review-drop--widget--right'); ?>>Right</option>
	</select>

<?php

}


function rdxt_select_field_2_render()
{

	$options = get_option('rdxt_settings');
?>
	<select name='rdxt_settings[rdxt_select_field_2]'>
		<option value='true' <?php selected($options['rdxt_select_field_2'], 'true'); ?>>Yes</option>
		<option value='false' <?php selected($options['rdxt_select_field_2'], 'false'); ?>>No</option>
	</select>

<?php

}


function rdxt_select_field_3_render()
{

	$options = get_option('rdxt_settings');
?>
	<select name='rdxt_settings[rdxt_select_field_3]'>
		<option value='true' <?php selected($options['rdxt_select_field_3'], 'true'); ?>>Yes</option>
		<option value='false' <?php selected($options['rdxt_select_field_3'], 'false'); ?>>No</option>
	</select>

<?php

}


function rdxt_text_field_4_render()
{

	$options = get_option('rdxt_settings');
?>
	<input type='text' name='rdxt_settings[rdxt_text_field_4]' value='<?php echo $options['rdxt_text_field_4']; ?>' placeholder='1972f5'>
<?php

}


function rdxt_select_field_5_render()
{

	$options = get_option('rdxt_settings');
?>
	<select name='rdxt_settings[rdxt_select_field_5]'>
		<option value='3500' <?php selected($options['rdxt_select_field_5'], '3500'); ?>>Normal</option>
		<option value='1000' <?php selected($options['rdxt_select_field_5'], '1000'); ?>>Fast</option>
		<option value='5000' <?php selected($options['rdxt_select_field_5'], '5000'); ?>>Long</option>
	</select>

<?php

}

function rdxt_text_field_6_render()
{

	$options = get_option('rdxt_settings');
?>
	<input type='text' name='rdxt_settings[rdxt_text_field_6]' value='<?php echo $options['rdxt_text_field_6']; ?>' placeholder='Unique token string'>
<?php

}

function rdxt_select_field_7_render()
{

	$options = get_option('rdxt_settings');
?>
	<select name='rdxt_settings[rdxt_select_field_7]'>
		<option value="0" <?php selected($options['rdxt_select_field_7'], '0'); ?>>Instant</option>
		<option value="1440" <?php selected($options['rdxt_select_field_7'], '1440'); ?>>1 day from order</option>
		<option value="2880" <?php selected($options['rdxt_select_field_7'], '2880'); ?>>2 days from order</option>
		<option value="4320" <?php selected($options['rdxt_select_field_7'], '4320'); ?>>3 days from order</option>
		<option value="10080" <?php selected($options['rdxt_select_field_7'], '10080'); ?>>1 week from order</option>
		<option value="20160" <?php selected($options['rdxt_select_field_7'], '20160'); ?>>2 weeks from order</option>
		<option value="30240" <?php selected($options['rdxt_select_field_7'], '30240'); ?>>3 weeks from order</option>
		<option value="40320" <?php selected($options['rdxt_select_field_7'], '40320'); ?>>4 weeks from order</option>
	</select>

<?php

}

function rdxt_select_field_8_render()
{

	$options = get_option('rdxt_settings');
?>
	<select name='rdxt_settings[rdxt_select_field_8]'>
		<option value="0" <?php selected($options['rdxt_select_field_8'], '0'); ?>>No</option>
		<option value="1" <?php selected($options['rdxt_select_field_8'], '1'); ?>>Yes</option>
	</select>

<?php

}

function rdxt_select_field_9_render()
{

	$options = get_option('rdxt_settings');
?>
	<select name='rdxt_settings[rdxt_select_field_9]'>
		<option value="0" <?php selected($options['rdxt_select_field_9'], '0'); ?>>No</option>
		<option value="1" <?php selected($options['rdxt_select_field_9'], '1'); ?>>Yes</option>
	</select>

<?php

}


function rdxt_settings_section_callback()
{

	echo __('For branding color, please enter your HEX code without the #', 'reviewdrop');
}


function rdxt_options_page()
{

?>
	<form action='options.php' method='post'>

		<h2>Reviewdrop</h2>

		<h2>Step 1:</h2>
		<p>
			Sign up for a free Reviewdrop account - <a href="https://reviewdrop.io/register" target="_blank">Create account</a>
		</p>
		<hr />
		<h2>Step 2:</h2>
		<p>
			Navigate to the widget settings page on your dashboard and copy your third-party <b>ID</b> - <a href="https://reviewdrop.io/settings/widget" target="_blank">Install widget</a>
		</p>
		<hr />
		<h2>Step 3:</h2>
		<p>
			Paste in your <b>ID</b> in the "Widget ID" field.
		</p>
		<hr />
		<h2>Step 4 (Optional):</h2>
		<p>
			If using conversion emails with WooCommerce, enter your <a href="https://reviewdrop.io/user/api-tokens" target="_blank">conversion token</a> and set when you would like emails to be sent after order.
		</p>
		<hr />
		<?php
		settings_fields('pluginPage');
		do_settings_sections('pluginPage');
		submit_button();
		?>

	</form>
	<?php

}

//Add to footer

add_action('wp_footer', 'rdxt_footer_script');
function rdxt_footer_script()
{

	$rd_options = get_option('rdxt_settings');

	//Check if widget enabled
	if ($rd_options['rdxt_select_field_9'] == '0') {

		$rd_id = $rd_options['rdxt_text_field_0'];
		$rd_pos = $rd_options['rdxt_select_field_1'];
		$rd_prev = $rd_options['rdxt_select_field_2'];
		$rd_mob_prev = $rd_options['rdxt_select_field_3'];
		$rd_branding = $rd_options['rdxt_text_field_4'];
		if ($rd_branding) {
			$rd_branding = $rd_options['rdxt_text_field_4'];
		} else {
			$rd_branding = '1972f5';
		}
		$rd_dly = $rd_options['rdxt_select_field_5'];

		echo ('<!-- Reviewdrop Embed Widget Start --><script type="text/javascript">var rdConfig = {id:"' . $rd_id . '",position: "' . $rd_pos . '",bgColor: "' . $rd_branding . '",msgPopMob: "' . $rd_mob_prev . '",msgPop: "' . $rd_prev . '",popDly: "' . $rd_dly . '",}</script><script defer type="text/javascript" src="https://app.reviewdrop.io/app.js"></script><!-- Reviewdrop Embed Widget End -->');
	}
}

//Conversion script
$checkWoo = apply_filters('active_plugins', get_option('active_plugins'));
if (stripos(implode($checkWoo), 'woocommerce.php')) {
	add_action('woocommerce_thankyou', 'rd_service_conversion_tracking');
	function rd_service_conversion_tracking($order_id)
	{

		// Lets grab the order
		$order = new WC_Order($order_id);

		// Order ID
		$order_id = $order->get_order_number();

		//Get RD Options
		$rd_options = get_option('rdxt_settings');

		//Get RD Conversion switch
		$rd_conversions = $rd_options['rdxt_select_field_8'];

		//Get RD ID
		$rd_id = $rd_options['rdxt_text_field_0'];

		//Get RD Token
		$rd_token = $rd_options['rdxt_text_field_6'];

		//Get RD Conversion Email Time
		$rd_time = $rd_options['rdxt_select_field_7'];

		// Order e-mail
		$order_email = $order->billing_email;

		//If conversions enabled, add script
		if ($rd_conversions) {

	?>

			<script>
				var rdConfigConversion = {
					email: "<?php echo $order_email ?>",
					date: "<?php echo $rd_time ?>",
					id: "<?php echo $rd_id ?>",
					token: "<?php echo $rd_token ?>",
					order: "<?php echo $order_id ?>",
				}
			</script>
			<script defer type="text/javascript" src="https://app.reviewdrop.io/conversion.js"></script>
<?php
		}
	}
}
