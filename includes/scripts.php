<?php
/**
 * Includes scripts and styles (through wp_head())
 * Register ALL of your scripts in this function to prevent conflicts...
 */
function registerScripts() {
	
	 // Ckeck if Google's jQuery CDN is working and if it is load their jQuery library, if it is not, fallback to a local jQuery library script
	 
	if(!is_admin()) {
		
		$url = 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'; // The URL to check against
		$test_url = @fopen($url,'r'); // Test parameters
		
		// Test if the URL exists
		if($test_url !== false) { 
    		function load_external_jQuery() {
        		
        		// Load external file
        		wp_deregister_script( 'jquery' ); // Deregisters the default WordPress jQuery
        		wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'); // Register the external file. * be sure to update version numbers whenever there is a newer version of jQuery
        		wp_enqueue_script('jquery'); // Enqueue the external file
        		
        	}
		
		add_action('wp_enqueue_scripts', 'load_external_jQuery'); // Initiate the function
		
		} else { 
    		
    		// Load the local fallback version of jQuery
    		function load_local_jQuery() {
        		
        		wp_deregister_script('jquery'); // Initiate the function
        		wp_register_script('jquery', get_bloginfo('template_directory').'/js/libs/jquery-1.7.1.min.js', __FILE__, false, '1.7.1', true); // Register the local file
        		wp_enqueue_script('jquery'); // Enqueue the local file
        	
        	}
		
		add_action('wp_enqueue_scripts', 'load_local_jQuery'); // Initiate the function
		
		}

		// Load all other scripts you may need...
		
		// Always include Modernizr when using HTML5 * You should always redownload a minified/minimal version of Modernizr when pushing to a live site @ http://modernizr.com/download/
		wp_register_script('modernizer', get_bloginfo('template_directory') .'/js/modernizr.js','jquery'); 
		wp_enqueue_script('modernizer'); // Load Modernizr into the header site wide 
		
		 // Load only if you need to use the jQuery UI library.  You will need to upload your own custom script to the themes js folder
		//wp_register_script( 'ui', get_bloginfo('template_directory') .'/js/jquery-ui-1.8.18.custom.min.js','jquery');
		
		// Whenver possible, try to include any scripts bellow this comment in the footer and not the header...
	
	}
}

add_action( 'init', 'registerScripts' );

?>