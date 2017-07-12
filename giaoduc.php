// Link giá của bài post
function mycred_get_content_price_for_shortcode($atts) {
	extract(shortcode_atts(array('post_id' => 1,), $atts));
	if ( mycred_post_is_for_sale( $post_id ) ) {
		if ( mycred_user_paid_for_content(get_current_user_id(), $post_id) ) {
			$link_content = 'Xem';
		} else {
			$link_content = 'Mua với giá '.mycred_get_content_price( $post_id, MYCRED_DEFAULT_TYPE_KEY).'000 đ';
		}	
		return '<a href="'.get_permalink($post_id).'">'.$link_content.'</a>';
	} else {
		return 'No price was set to post:'.$post_id;
	}
}
add_shortcode('mycred_content_price', 'mycred_get_content_price_for_shortcode');
