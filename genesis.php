/*
	@Action added GENESIS WORDPRESS THEME

 */


add_action( 'genesis_before_loop', 'weedhack_do_post_content_nav' );
function weedhack_do_post_content_nav(){

	wp_link_pages( array(
		'before'           => '<div class="archive-pagination">',
		'after'            =>  '</div>',
		'link_before'      => '<span class="custom-page-links">',
		'link_after'       => '</span>',
		'next_or_number'   => 'number',
		'separator'        => ' ',
		'nextpagelink'     => __( '<span class="prevnext-page">Next page</span>' ),
        'previouspagelink' => __( '<span class="prevnext-page">Previous page</span>' ),
		'pagelink'         => '%',
 		'echo'             => 1
	) );
}
add_filter('wp_link_pages_args', 'weedhack_genesis_style_page_post_pagination');
function weedhack_genesis_style_page_post_pagination($args) {
	 global $page, $numpages, $more, $pagenow;
	 if (!$args['next_or_number'] == 'next_and_number')
	 return $args;
	 $args['next_or_number'] = 'number';
	 if (!$more)
	 return $args; 
	 if($page-1)
	 $args['before'] .= _wp_link_page($page-1) . $args['link_before'] . $args['previouspagelink'] . $args['link_after'] . '</a>';
	 if ($page<$numpages)
	 $args['after'] = _wp_link_page($page+1) . $args['link_before'] . $args['nextpagelink'] . $args['link_after'] . '</a>' . $args['after'];
	 return $args;
}
