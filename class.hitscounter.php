<?php

require_once dirname( __FILE__ ) . '/functions.php';

/**
 * This class provides two main method to install and uninstall the plugin
 */
class HitsCounter
{

    /**
     * Install the plugin
     *
     * @return void
     */
    static function plugin_activation()
    {
        hitscounter_install();
    }

    /**
     * Uninstall the plugin
     *
     * @return void
     */
    static function plugin_deactivation()
    {
        hitscounter_uninstall();
    }

}