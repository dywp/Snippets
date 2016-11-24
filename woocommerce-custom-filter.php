<?php
add_action('woocommerce_before_shop_loop', 'add_filters',25);

function add_filters() {
 $current = $_GET['current'];
	global $post;
$base  = 'url.com/product-category/cat'; // Add your base category url here

    // Get the URL of this category
	if (is_product_category( 'xxxx' )) // add name/slug of base category
	{
		$args = array(
    'post_type'             => 'product',
    'post_status'           => 'publish',
    'ignore_sticky_posts'   => 1,
    'posts_per_page'        => -1,
    'meta_query'            => array(
        array(
            'key'           => '_visibility',
            'value'         => array('catalog', 'visible'),
            'compare'       => 'IN'
        )
    ),
    'tax_query'             => array(
        array(
            'taxonomy'      => 'product_cat',
            'field' => 'term_id',
            'terms'         => xxx, //Change this to the base category ID
            'operator'      => 'IN'         )
    )
);
$products = get_posts($args);
		if ( !empty($products))
		{
		$id_array = array();

		foreach ( $products as $product )
			{
			$terms = get_the_terms( $product->ID, 'product_cat' );
			foreach ($terms as $term)
				{
				if ($term->slug != 'sale')
					{
					$id_array[] = $term->slug;
					}
				}
			}
		$result = array_unique($id_array);
		echo "<form style='float: right; margin-left: 5px;' class='form-cat-dropdown-select'>";
?>
	<select name="sale_cats" onChange="window.document.location.href=this.options[this.selectedIndex].value;" value="GO" class="select wppp-select">';
 <option value="'.$base.'">All</option>

<?php
			foreach ($result as $link)
			{
			$selected = '';
				if ($current == $link){
				$selected =	'selected="selected"';
				}
			$name = str_ireplace("-"," ",$link);
			$name = ucwords($name);
				echo '
				<option value="'.$base.'+'.$link.'/?current='.$link.'" '.$selected.' >'.$name.'</option>'
;
			}

		echo '</select></form>';




		}
	}


}