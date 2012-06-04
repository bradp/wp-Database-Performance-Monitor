<?php
/*
Plugin Name: Query Performance Monitor
Description: Outputs some database query information on page load for logged in admins
Version: 0.1
Author: Brad Parbs
Author URI: http://bradparbs.com
License: GPL2
*/

function qpm_performance() {
	$stat = sprintf(  '%d database queries in %.3f seconds, using %.2fMB memory',
    
    get_num_queries(),
    
    timer_stop( 0, 3 ),
    
    memory_get_peak_usage() / 1024 / 1024
    
    );

    if(current_user_can('manage_options')){
	    echo "<!-- {$stat} -->" ;
	    ?><script>console.log("<?php echo $stat ?>");</script><?php
	}
}
add_action( 'wp_footer', 'qpm_performance', 20 );