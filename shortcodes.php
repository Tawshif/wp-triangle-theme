<?php 

function triangle_heading( $atts, $content){

	$sHeading = shortcode_atts( array(
		'position' => 'left'
		), $attr);

	return "<h1 align='".$sHeading['position']."'>".$content."</h1>";

}

add_shortcode('heading', 'triangle_heading');


function gIcon( $atts ) {
	$gicon = shortcode_atts( array(
		'name' => 'plus',
		'size' => 20
	), $atts );

	return <<<EOT
	<i class="glyphicon glyphicon-{$gicon['name']}" style="font-size:{$gicon['size']}"></i>
EOT;
}

add_shortcode('icon', 'gIcon');



function trImage( $atts, $content ) {
	$image = shortcode_atts( array(
		'height' => 'auto',
		'width'=> 'auto',
		'class'=> 'img-responsive'
	), $atts );

	return <<<EOT
		<img src="$content" alt="" height="{$image['height']}" width="{$image['width']}" class"{$image['class']}">
EOT;
}
add_shortcode('img','trImage');

function ulist( $atts, $content ) {
	$trlist = shortcode_atts( array(
		'class' => 'list-group',
		'liClass'=>'list-group-item'
	), $atts );

	$c = explode(',', $content);

	$mark = '';

	foreach ($c as $key => $value) {
		if ($value != '') {
			$mark .= "<li class=".$trlist['liClass'].">".$value."</li>";
		}
	}
	return "<ul class='".$trlist['class']."'>".$mark."</ul>";


}
add_shortcode('list', 'ulist');


function cpost(	$attr, $content){
	
	

}