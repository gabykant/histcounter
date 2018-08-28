<?php
global $hitscounter_db_version;
$hitscounter_db_version = '1.0';

function hitscounter_install()
{
    global $wpdb;
    global $hitscounter_db_version;

    $table_name = $wpdb->prefix . 'hitscounter';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE {$table_name} (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		created_at datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		ipaddress tinytext NOT NULL,
		url varchar(55) DEFAULT '' NOT NULL,
		PRIMARY KEY  (id)
	) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );

}

function hitscounter_uninstall()
{
    global $wpdb;

    $table_name = $wpdb->prefix . 'hitscounter';

    $sql = "DROP TABLE IF EXISTS {$table_name}";

    $wpdb->query($sql);
}

function record_visit()
{
    global $wpdb;

    $table_name = $wpdb->prefix . 'hitscounter';

    $incoming_ip = $_SERVER['REMOTE_ADDR'];

    $incoming_url = $_SERVER['REQUEST_URI'];

    $wpdb->insert(
        $table_name,
        array(
            'id' => null,
            'created_at' => date('Y-m-d h:i:s'),
            'ipaddress' => $incoming_ip,
            'url' => $incoming_url
        )
    );

}

function hitscounter_admin_actions()
{
    global $wpdb;
    if (!current_user_can('manage_options')) {
        return;
    }
    add_menu_page(
        "Hits count on post", 
        "Hits Counter", 
        "manage_options", 
        plugin_dir_path(__FILE__) . 'hits-count-admin.php',
        '',
        'dashicons-plus-alt',
        20
    );
}

