<?php
/*
Plugin Name: Halloween Blogroll Widget
Plugin URI:http://christmas-gifts.makers-online.co.uk
Description: A scary blogroll
Version:3.0	
Author:lukes	
Author URI:http://christmas-gifts.makers-online.co.uk
*/

add_action('plugins_loaded','register_halloween_blogroll_widget');
function register_halloween_blogroll_widget() {
	if (!function_exists('register_sidebar_widget')) {
		return;
	}
	register_sidebar_widget(array('Halloween Blogroll Widget', 'widgets'), 'widget_halloween_blogroll');
}

function widget_halloween_blogroll($args) {
	extract($args);
        echo '<style>';
        echo 'li.widget_halloween_blogroll { position: relative; overflow: hidden; background-image: url(/wp-content/plugins/halloween-blogroll/growth.png); border: 4px solid #cccccc; background-position: bottom; background-repeat: no-repeat; padding-bottom: 50px; }';
        echo 'li.widget_halloween_blogroll ul { background-image: url(/wp-content/plugins/halloween-blogroll/trees.png);background-position: top; background-repeat: no-repeat; }';
        echo '#main .widget-area ul li.widget_halloween_blogroll ul { margin-left: 0px; padding: 0px; list-style: none; }';
        echo '#main .widget-area ul li.widget_halloween_blogroll ul li a { margin-left: 0px; }';
        echo '</style>';
	echo '<script type="text/javascript" charset="utf-8" src="http://yui.yahooapis.com/3.2.0/build/yui/yui-min.js"></script>';
        echo '<script src="/wp-content/plugins/halloween-blogroll/anims.js"></script>';
	echo $before_widget;
    wp_list_bookmarks(array(
                'link_before' => '<img src="/wp-content/plugins/halloween-blogroll/bat.png" alt="ghost" style="width: 30px;" />',
		'title_before' => $before_title, 'title_after' => $after_title,
		'category_before' => '', 'category_after' => '',
		'show_images' => true, 'class' => 'linkcat widget'
	));
	echo $after_widget;
}

?>