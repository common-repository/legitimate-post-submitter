<?php
/*
 * Plugin Name: Legitimate Post Submitter
 * Plugin URI: http://www.legitimate.net/wordpress
 * Description: This plugin lets users automatically submit their posts to their Legitimate profile.
 * Version: 1.0.5
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Author: Legitimate
 * Author URI: https://www.legitimate.net
 * Version: 1.0.5
 */


defined( 'ABSPATH' ) or die( 'No script' );

define( 'Legitimate_PLUGIN_FILE', __FILE__ );
define('Legitimate_FILE',plugin_basename(dirname(__FILE__) .'/' .basename(__FILE__)));
define( 'Legitimate_PLUGIN_DIR_PATH', plugin_dir_path(Legitimate_PLUGIN_FILE ));
define( 'Legitimate_PLUGIN_DIR_URL', plugin_dir_url( Legitimate_PLUGIN_FILE ));
require_once __DIR__."/vendor/autoload.php";
use Legitimate\App;
$app = new App();
