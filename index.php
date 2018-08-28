<?php
/*
Plugin Name:  Count Hits
Plugin URI:   https://ksoft-solutions.com/wp/plugins/hitscounter
Description:  Count hits on your contents
Version:      20180820
Author:       Kwaye Kant (@the_sniper) - Senior Web Developer at K Soft Solutions)
Author URI:   https://portfolio.ksoft-solutions.com/gabykant
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  hitscounter
Domain Path:  /languages
*/

require_once dirname(__FILE__) . '/class.hitscounter.php';

require_once dirname(__FILE__) . '/functions.php';

register_activation_hook(__FILE__, array('HitsCounter', 'plugin_activation'));

register_deactivation_hook(__FILE__, array('HitsCounter', 'plugin_deactivation'));

add_action('wp_footer', 'hitscounter_record_visit');

add_action('admin_menu', 'hitscounter_admin_actions');

wp_enqueue_script('bootstrap', plugins_url('assets/bootstrap/js/bootstrap.min.js', __FILE__), array('jquery'), null, true);

wp_enqueue_style('bootstrap', plugins_url('assets/bootstrap/css/bootstrap.min.css', __FILE__));

wp_enqueue_style('ksoftStyle', plugins_url('assets/style.css', __FILE__));