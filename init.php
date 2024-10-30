<?php
/*
Plugin Name: JQUERY HORIZONTAL SLIDER
Plugin URI: http://extendyourweb.com/wordpress-theme/plugins/extendyourweb-plugins/horizontal-slider/
Description: Plugin / widget that lets you create fantastic horizontal scroll slider. Made by css5. It has an easy and powerful administration to manage your images to work with the library of images of wordpress.
Version: 2.4
Author: Webpsilon S.C.P.
Author URI: http://extendyourweb.com/wordpress-theme/

Copyright 2013  Webpsilon S.C.P.

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.
*/

function getYTidhorizontalslider($ytURL) {
#
 
#
$ytvIDlen = 11; // This is the length of YouTube's video IDs
#
 
#
// The ID string starts after "v=", which is usually right after
#
// "youtube.com/watch?" in the URL
#
$idStarts = strpos($ytURL, "?v=");
#
 
#
// In case the "v=" is NOT right after the "?" (not likely, but I like to keep my
#
// bases covered), it will be after an "&":
#
if($idStarts === FALSE)
#
$idStarts = strpos($ytURL, "&v=");
#
// If still FALSE, URL doesn't have a vid ID
#
if($idStarts === FALSE)
#
die("YouTube video ID not found. Please double-check your URL.");
#
 
#
// Offset the start location to match the beginning of the ID string
#
$idStarts +=3;
#
 
#
// Get the ID string and return it
#
$ytvID = substr($ytURL, $idStarts, $ytvIDlen);
#
 
#
return $ytvID;
#
 
#
}



function horizontalslider_enqueue_scripts() { 

  

 }

 

function horizontalslider($content){
	$content = preg_replace_callback("/\[horizontalslider ([^]]*)\/\]/i", "horizontalslider_render2", $content);
	return $content;
	
}

function horizontalslider_render2($tag_string){
	return horizontalslider_render($tag_string, "");
}

function horizontalslider_render($tag_string, $instance){
$contador=rand(9, 9999999);

$widthloading="48"; // Set if change loading image

global $wpdb; 	

if(isset($tag_string[1])) {
	
	
	$table_name = $wpdb->prefix . "horizontalslider";
	
	$auxi1=str_replace(" ", "", $tag_string[1]);
	$myrows = $wpdb->get_results( "SELECT * FROM $table_name WHERE id = ".$auxi1.";" );

	if(count($myrows)<1) $myrows = $wpdb->get_results( "SELECT * FROM $table_name;" );
	
	$conta=0;
$id= $myrows[$conta]->id;
	$title = $myrows[$conta]->title;
		$width = $myrows[$conta]->width;
$height = $myrows[$conta]->height;
$values =$myrows[$conta]->ivalues;

$twidth = $myrows[$conta]->width_thumbnail;

$theight = $myrows[$conta]->height_thumbnail;

$number_thumbnails = $myrows[$conta]->number_thumbnails;



$total = $myrows[$conta]->number_thumbnails;

$border = $myrows[$conta]->border;
$round = $myrows[$conta]->round;
$tborder = $myrows[$conta]->thumbnail_border;
$thumbnail_round = $myrows[$conta]->thumbnail_round;

$sizetitle = $myrows[$conta]->sizetitle;
$sizedescription = $myrows[$conta]->sizedescription;
$sizethumbnail = $myrows[$conta]->sizethumbnail;
$font = $myrows[$conta]->font;
$color1 = $myrows[$conta]->color1;
$color2 = $myrows[$conta]->color2;

$color3 = $myrows[$conta]->color3;

$time = $myrows[$conta]->time;

$animation = $myrows[$conta]->animation;

$mode = $myrows[$conta]->mode;


}

else {
$width = empty($instance['width']) ? '&nbsp;' : apply_filters('widget_width', $instance['width']);
$height = empty($instance['height']) ? '&nbsp;' : apply_filters('widget_height', $instance['height']);
$values = empty($instance['values']) ? '&nbsp;' : apply_filters('widget_values', $instance['values']);
$twidth = empty($instance['width_thumbnail']) ? '&nbsp;' : apply_filters('widget_width_thumbnail', $instance['width_thumbnail']);
$theight = empty($instance['height_thumbnail']) ? '&nbsp;' : apply_filters('widget_height_thumbnail', $instance['height_thumbnail']);


$total = empty($instance['number_thumbnails']) ? '&nbsp;' : apply_filters('widget_number_thumbnails', $instance['number_thumbnails']);

$border = empty($instance['border']) ? '&nbsp;' : apply_filters('widget_border', $instance['border']);
$round = empty($instance['round']) ? '&nbsp;' : apply_filters('widget_round', $instance['round']);
$tborder = empty($instance['thumbnail_border']) ? '&nbsp;' : apply_filters('widget_thumbnail_border', $instance['thumbnail_border']);
$thumbnail_round = empty($instance['thumbnail_round']) ? '&nbsp;' : apply_filters('widget_thumbnail_round', $instance['thumbnail_round']);

$sizetitle = empty($instance['sizetitle']) ? '&nbsp;' : apply_filters('widget_sizetitle', $instance['sizetitle']);
$sizedescription = empty($instance['sizedescription']) ? '&nbsp;' : apply_filters('widget_sizedescription', $instance['sizedescription']);
$sizethumbnail = empty($instance['sizethumbnail']) ? '&nbsp;' : apply_filters('widget_sizethumbnail', $instance['sizethumbnail']);
$font = empty($instance['font']) ? '&nbsp;' : apply_filters('widget_font', $instance['font']);
$color1 = empty($instance['color1']) ? '&nbsp;' : apply_filters('widget_color1', $instance['color1']);
$color2 = empty($instance['color2']) ? '&nbsp;' : apply_filters('widget_color2', $instance['color2']);
$color3 = empty($instance['color3']) ? '&nbsp;' : apply_filters('widget_color3', $instance['color3']);

$time = empty($instance['time']) ? '&nbsp;' : apply_filters('widget_time', $instance['time']);
$animation = empty($instance['animation']) ? '&nbsp;' : apply_filters('widget_animation', $instance['animation']);
$mode = empty($instance['mode']) ? '&nbsp;' : apply_filters('widget_mode', $instance['mode']);


}
$site_url = get_option( 'siteurl' );
$firstisliderimage="";

$items_slider="";
$items_numbers="";
$items_arrow="";
$items_css="";
$cont=0;
			if($values!="") {
				$items=explode("kh6gfd57hgg", $values);
				$cont=1;
				foreach ($items as &$value) {
					if(count($items)>$cont) {
					$item=explode("t6r4nd", $value);
					$mainimage=$item[2];
					if($firstisliderimage=="") $firstisliderimage=$item[2];
					if($item[5]!="") $imageslider=$item[5];
					else $imageslider=$item[2];
					
					

					
					$items_slider.='<span id="image-'.$cont.'">';
               		if($item[0]!="" && $item[3]!="") $items_slider.=' <span class="info"><a href="'.$item[3].'" title="'.$item[6].'">'.$item[0].'</a></span>';
					if($item[0]!="" && $item[3]=="") $items_slider.=' <span class="info"><strontg>'.$item[0].'</strong></span>';
            		$items_slider.='</span>';

					if($cont==1) $items_numbers.='<input type="radio" id="button-'.$cont.'" name="controls" checked />';
					else $items_numbers.='<input type="radio" id="button-'.$cont.'" name="controls" />';	
					$items_arrow.='<label for="button-'.$cont.'" class="arrows" id="arrow-'.$cont.'"></label>';	
					$items_css.=" #image-".$cont." {
							background: url('".$mainimage."');
							-webkit-background-size: cover !important;
							-moz-background-size: cover !important;
							-o-background-size: cover !important;
							background-size: cover !important;
							-webkit-border-radius: 3px;
							-moz-border-radius: 3px;
							border-radius: 3px;
							backface-visibility: hidden;
					}";
					 
					
					 $cont++;
					}
					 
				}
			}


 $cont--;
 

$cantidad=$cont;

$width_thumbs_total=($twidth+1)*($cantidad+1);

$width_window=round($width-(2*$border));

$widthzone=round($total*($twidth+1));
$paggingtop=10;

$timgwidth="";
//$timgwidth="width: ".($twidth*2)."px;";

if($theight>$twidth) $timgwidth="height: ".($theight*2)."px;";	


echo '

<!--Jquery horizontal slider -->
<style>
#slider {
    width: '.$width.';
    height: '.$height.';
}

'.$items_css.'
</style>
';
	$output='
	<div id="slider">
		'.$items_numbers.'
		'.$items_arrow.'
		<div id="slides">
			<div class="tk-museo-sans">
				'.$items_slider.'
			</div>
		</div>
	</div>
<!--End Jquery horizontal slider -->
	';
	
return $output;

}


function add_header_horizontalslider() {
	wp_enqueue_style( 'horizontalslider-css', plugin_dir_url( __FILE__ ).'/css/style.css');

}

class wp_horizontalslider extends WP_Widget {
	function wp_horizontalslider() {
		$widget_ops = array('classname' => 'wp_horizontalslider', 'description' => 'Widget for create slider menus or slider galleries with a horizontal JQuery effect. Very easy to use. Load pictures directly from the library of images from your wordpress.' );
		$this->WP_Widget('wp_horizontalslider', 'HORIZONTAL SLIDER', $widget_ops);
	}
	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
		
		$site_url = get_option( 'siteurl' );


		
		//$instance['hide_is_admin']

		
		
			echo $before_widget;
			
			echo horizontalslider_render("", $instance);
			
			
			echo $after_widget;
		
	}
	function update($new_instance, $old_instance) {
		
		
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		
		$instance['width'] = strip_tags($new_instance['width']);
		$instance['height'] = strip_tags($new_instance['height']);
		$instance['border'] = strip_tags($new_instance['border']);
		$instance['round'] = strip_tags($new_instance['round']);
		$instance['width_thumbnail'] = strip_tags($new_instance['width_thumbnail']);
		$instance['height_thumbnail'] = strip_tags($new_instance['height_thumbnail']);
		$instance['thumbnail_border'] = strip_tags($new_instance['thumbnail_border']);
		$instance['thumbnail_round'] = strip_tags($new_instance['thumbnail_round']);
		$instance['number_thumbnails'] = strip_tags($new_instance['number_thumbnails']);
		
		$instance['sizetitle'] = strip_tags($new_instance['sizetitle']);
		$instance['sizedescription'] = strip_tags($new_instance['sizedescription']);
		$instance['sizethumbnail'] = strip_tags($new_instance['sizethumbnail']);
		$instance['font'] = strip_tags($new_instance['font']);
		$instance['color1'] = strip_tags($new_instance['color1']);
		$instance['color2'] = strip_tags($new_instance['color2']);
		$instance['color3'] = strip_tags($new_instance['color3']);
		
		$instance['time'] = strip_tags($new_instance['time']);
		$instance['animation'] = strip_tags($new_instance['animation']);
		$instance['mode'] = strip_tags($new_instance['mode']);
		$instance['op1'] = strip_tags($new_instance['op1']);
		$instance['op2'] = strip_tags($new_instance['op2']);
		$instance['op3'] = strip_tags($new_instance['op3']);
		$instance['op4'] = strip_tags($new_instance['op4']);
		$instance['op5'] = strip_tags($new_instance['op5']);
		
		$total = strip_tags($_POST['total']);
		
		
		$cont=1;
		
		 $sorter=array();
		while($cont<=$total) {
			
			if(!$_POST['item'.$cont] || $_POST['operation']!="2") {
				$valaux=count($sorter);
				$sorter[$valaux]['order']=$_POST['order'.$cont];
				$sorter[$valaux]['cont']=$cont;
			}
		
			$cont++;
		}
		
		
function sortByOrder($a, $b) {
    return $a['order'] - $b['order'];
}

usort($sorter, 'sortByOrder');


		$cont=1;
		
		
		$values="";
		foreach ($sorter as &$value) {
    $cont = $value['cont'];

			if(!$_POST['item'.$cont] || $_POST['operation']!="2") $values.=$_POST['title'.$cont]."t6r4nd".$_POST['description'.$cont]."t6r4nd".$_POST['image'.$cont]."t6r4nd".$_POST['link'.$cont]."t6r4nd".$_POST['video'.$cont]."t6r4nd".$_POST['timage'.$cont]."t6r4nd".$_POST['seo'.$cont]."t6r4nd".$_POST['seol'.$cont]."kh6gfd57hgg";
				
		
			
		}
		

		
		if($_POST['operation']=="1") {
			$values.="new item t6r4nd".""."t6r4nd".plugins_url('images/new.jpg', __FILE__)."t6r4nd".""."t6r4nd".""."t6r4nd".""."t6r4nd".""."t6r4nd".""."kh6gfd57hgg";
			
			$cont++;
		}
		
		$instance['values']=$values;
		
		return $instance;
	}
	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'width' => '100%', 'height' => '200px', 'border' => '10', 'round' => '1', 'width_thumbnail' => '40', 'height_thumbnail' => '50', 'thumbnail_border' => '6', 'thumbnail_round' => '1', 'number_thumbnails' => '4', 'values'=>'', 'sizetitle'=>'18pt Arial', 'sizedescription'=>'12pt Arial', 'sizethumbnail'=>'10pt Arial', 'font'=>'Verdana', 'color1'=>'#333333', 'color2'=>'#888888', 'color3'=>'#dddddd', 'time'=>'5000', 'animation'=>'0', 'mode'=>'0','op1' => '','op2' => '','op3' => '','op4' => '','op5' => '' ) );
		$title = strip_tags($instance['title']);
		$id=rand(0, 99999);
		$width = strip_tags($instance['width']);
		$height = strip_tags($instance['height']);
		$border = strip_tags($instance['border']);
		$round = strip_tags($instance['round']);
		$title = strip_tags($instance['title']);
		$width_thumbnail = strip_tags($instance['width_thumbnail']);
		$height_thumbnail = strip_tags($instance['height_thumbnail']);
		$thumbnail_border = strip_tags($instance['thumbnail_border']);
		$thumbnail_round = strip_tags($instance['thumbnail_round']);
		$number_thumbnails = strip_tags($instance['number_thumbnails']);
		$values = strip_tags($instance['values']);
		
		$sizetitle = strip_tags($instance['sizetitle']);
		$sizedescription = strip_tags($instance['sizedescription']);
		$sizethumbnail = strip_tags($instance['sizethumbnail']);
		$font = strip_tags($instance['font']);
		$color1 = strip_tags($instance['color1']);
		$color2 = strip_tags($instance['color2']);
		$color3 = strip_tags($instance['color3']);
		
		$time = strip_tags($instance['time']);
		$animation = strip_tags($instance['animation']);
		$mode = strip_tags($instance['mode']);
		
		$op1 = strip_tags($instance['op1']);
		$op2 = strip_tags($instance['op2']);
		$op3 = strip_tags($instance['op3']);
		$op4 = strip_tags($instance['op4']);
		$op5 = strip_tags($instance['op5']);

		
		
		$borderround[$round] = 'checked';
		$tborderround[$thumbnail_round] = 'checked';
		
		
		
		
?>


<style>

.addwindow {
	
	position:relative:
	border: 2px;
	display: none;
	
}
.edititem {
	
	position:relative:
	border: 2px;
	display: none;
	background-color:#CCCCCC;
	margin: 2px;
	padding: 2px;
	
}

INPUT, SUBMIT {
	font:bold 0.95em arial, sans-serif;
	border:0px solid #ddd;
}

INPUT, TEXTAREA {
	padding:0.15em;
	border:1px solid #ddd;
	background:#fafafa;
	font:bold 0.95em arial, sans-serif;
	-moz-border-radius:0.4em;
	-khtml-border-radius:0.4em;
}


INPUT, TEXT {
	padding:0.15em;
	border:1px solid #ddd;
	background:#fafafa;
	font:bold 0.95em arial, sans-serif;
	-moz-border-radius:0.4em;
	-khtml-border-radius:0.4em;
}


SELECT, OPTION {
	font:bold 0.95em arial, sans-serif;
	padding: 2px;
	background-color: #fafafa;
}



input:hover, input:focus {
	border-color:#c5c5c5;
	background:#f6f6f6;
}

fieldset div {
	margin:0.3em 0;
	clear:both;
}

label {
	float:left;
	width:10em;
	text-align:right;
	margin-right:1em;
}
legend {
	color:#0b77b7;
	font-size:1.2em;
}
legend span {
	width:10em;
	text-align:right;
}

 
fieldset {
	border:1px solid #ddd;
	padding:0 0.5em 0.5em;
}

.email {
	width:14em;
}



input.default {
	color:#bbb;
	
}

</style>
    <script type="text/javascript">

        jQuery(document).ready( function () { 
          
		  	var uploadID<?php echo $id; ?> = ''; /*setup the var in a global scope*/

jQuery('.upload-button<?php echo $id; ?>').click(function() {
//uploadID = jQuery('.upload<?php echo $id; ?>'); /*set the uploadID variable to the value of the input before the upload button*/
//uploadID = jQuery(this).prev('input');
uploadID<?php echo $id; ?> = jQuery(this).prev('input');


window.send_to_editor = function(html) {
	

imgurl = jQuery('img',html).attr('src');

uploadID<?php echo $id; ?>.val(imgurl)
tb_remove();
}


tb_show('', 'media-upload.php?type=image&amp;amp;amp;amp;TB_iframe=true&uploadID<?php echo $id; ?>=' + uploadID<?php echo $id; ?>);

return false;
});
		 
	jQuery('.additem').click(function() {
		
		
		
	//jQuery('.widget-wp_horizontalslider-__i__-savewidget').trigger('click');
	jQuery('input[name=operation]').val('1');
	jQuery('.addwindow').show();
	
	
	
	return false;
	
	
})

	jQuery('.deleteitem').click(function() {
		
		
		
	//jQuery('.widget-wp_horizontalslider-__i__-savewidget').trigger('click');
	jQuery('input[name=operation]').val('2');
	jQuery('.addwindow').show();
	
	
	
	return false;
	
	
})

	jQuery('.cancel').click(function() {
		
		
		
	//jQuery('.widget-wp_horizontalslider-__i__-savewidget').trigger('click');
	jQuery('input[name=operation]').val('0');
	jQuery('.addwindow').hide();
	
	
	
	return false;
	
	
})

jQuery('.<?php echo $id; ?>editbutton').click(function() {
		
		
		
	//jQuery('.widget-wp_horizontalslider-__i__-savewidget').trigger('click');
	
	
		if(jQuery('#<?php echo $id; ?>edit'+jQuery(this).attr("rel")).css("display")=="none") { 
		
		jQuery('#<?php echo $id; ?>edit'+jQuery(this).attr("rel")).show()
		jQuery(this).text("-")
	}
	else { 
		jQuery(this).text('+')
		jQuery('#<?php echo $id; ?>edit'+jQuery(this).attr("rel")).css("display", "none")
	}
	

	
	return false;
	
	
})

		  
        });

    </script>

			Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo ($title); ?>" />
       
             
            <br/>
              <input name="operation" type="hidden" id="operation" value="0" />
              <H2>ITEMS</H2>
            <button class="additem">New item</button> <button class="deleteitem">Delete</button> <input type="submit" name="savewidget" id="widget-advertisement-__i__-savewidget" class="button-primary widget-control-save" value="Save"  />
            <div class="addwindow">
             <hr />
            <input type="submit" name="savewidget" id="widget-advertisement-__i__-savewidget" class="button-primary widget-control-save" value="OK"  /><button class="cancel">Cancel</button>
            
            </div>
             <hr />
             
            <ul>
            <?php
			
			// items
			$cont=0;
			if($values!="") {
				$items=explode("kh6gfd57hgg", $values);
				$cont=1;
				foreach ($items as &$value) {
					if(count($items)>$cont) {
					$item=explode("t6r4nd", $value);
					
					 
					 echo '<li><input name="item'.$cont.'" type="checkbox" value="hide" /><img src="'.$item[2].'" width="20px"/><input name="title'.$cont.'" type="text" value="'.$item[0].'" /><button class="'.$id.'editbutton" rel="'.$cont.'">+</button>
					 
					 <div id="'.$id.'edit'.$cont.'" class="edititem">
					  Url image: <br/>
					  <input type="text" name="image'.$cont.'" value="'.$item[2].'" class="upload'.$id.'" />
					 <input class="upload-button'.$id.'" name="wsl-image-add" type="button" value="Change Image" /><br/>
					 Link: <input name="link'.$cont.'" type="text" value="'.$item[3].'" /><br/>
					 Seo alt image tag: <input name="seo'.$cont.'" type="text" value="'.$item[6].'" /><br/>
					 Seo title link tag: <input name="seol'.$cont.'" type="text" value="'.$item[7].'" /><br/>
					  ORDER: <input name="order'.$cont.'" type="text" value="'.$cont.'" size="4"/><br/>
					  <hr />
					  <input type="submit" name="savewidget" id="widget-advertisement-__i__-savewidget" class="button-primary widget-control-save" value="Save"  />
					 </div>
					 </li>';
					 $cont++;
					}
					 
				}
			}
			 $cont--;
			echo '</ul><input class="widefat" name="total" type="hidden" id="total" value="'.$cont.'" />';
			?>
 			<strong>You can enter the url of the images manually or press the button "change image". Pressing the button will load the library wordpress images, select the image you want and click "Insert into Post" to insert the image in the slider.</strong>
            <hr />
            <h2>CONFIGURATION</h2>
                      
            Transition time(in miliseconds): <input id="<?php echo $this->get_field_id('time'); ?>" name="<?php echo $this->get_field_name('time'); ?>" type="text" size="5" value="<?php echo ($time); ?>" />
            <br/>
           
            Slider width: <input  id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" type="text" size="5"  value="<?php echo ($width); ?>" /><br/>
            
            Slider height: <input id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" type="text" size="5"  value="<?php echo ($height); ?>" /><br/>
            
          
            <hr/>
<p><a href="http://www.extendyourweb.com/product/horizontal-slider-2/">Horizontal slider manual and samples</a></p>
<p><a href="http://www.extendyourweb.com/">Visit our page and see more premium plugins!</a></p>
           
           
            
         
				
<?php










	}
}


function horizontalslider_panel(){
	global $wpdb; 
	$table_name = $wpdb->prefix . "horizontalslider";	
	
	if(isset($_POST['crear'])) {
		$re = $wpdb->query("select * from $table_name");
		
		
//autos  no existe
if(empty($re))
{
	

	
	
  $sql = " CREATE TABLE $table_name(
	id mediumint( 9 ) NOT NULL AUTO_INCREMENT ,
	title longtext NOT NULL ,
	width longtext NOT NULL ,
	height longtext NOT NULL ,
	border longtext NOT NULL ,
	round longtext NOT NULL ,
	width_thumbnail longtext NOT NULL ,
	height_thumbnail longtext NOT NULL ,
	thumbnail_border longtext NOT NULL ,
	thumbnail_round longtext NOT NULL ,
	number_thumbnails longtext NOT NULL ,
	ivalues longtext NOT NULL ,
	sizetitle longtext NOT NULL ,
	sizedescription longtext NOT NULL ,
	sizethumbnail longtext NOT NULL ,
	font longtext NOT NULL ,
	color1 longtext NOT NULL ,
	color2 longtext NOT NULL ,
	color3 longtext NOT NULL ,
	time longtext NOT NULL ,
	animation longtext NOT NULL ,
	mode longtext NOT NULL ,
	op1 longtext NOT NULL ,
	op2 longtext NOT NULL ,
	op3 longtext NOT NULL ,
	op4 longtext NOT NULL ,
	op5 longtext NOT NULL ,
	
		PRIMARY KEY ( `id` )	
	) ;";
	$wpdb->query($sql);
	
}

		
	$sql = "INSERT INTO $table_name (title, width, height, border, round, width_thumbnail, height_thumbnail, thumbnail_border, thumbnail_round, number_thumbnails, ivalues, sizetitle, sizedescription, sizethumbnail, font, color1, color2, color3, time, animation, mode, op1, op2, op3, op4, op5) VALUES ('', '100%', '300px', '10', '1', '40', '50',  '6', '1', '4', '', '16', '12', '10', 'Verdana', '#333333', '#888888', '#dddddd', '5000', '0', '0','', '', '', '', '');";
	$wpdb->query($sql);
	}
	
if(isset($_POST['borrar'])) {
		$sql = "DELETE FROM $table_name WHERE id = ".$_POST['borrar'].";";
	$wpdb->query($sql);
	}
	if(isset($_POST['id'])){	
	
	
	
	$total = strip_tags($_POST['total']);


$cont=1;
		
		 $sorter=array();
		while($cont<=$total) {
			
			if(!isset($_POST['item'.$cont]) || $_POST['operation']!="2") {
				$valaux=count($sorter);
				$sorter[$valaux]['order']=$_POST['order'.$cont];
				$sorter[$valaux]['cont']=$cont;
			}
		
			$cont++;
		}


function sortByOrder($a, $b) {
    return $a['order'] - $b['order'];
}

usort($sorter, 'sortByOrder');


		$cont=1;
		
		
		$values="";
		foreach ($sorter as &$value) {
    $cont = $value['cont'];

			if(!isset($_POST['item'.$cont]) || $_POST['operation']!="2") $values.=$_POST['title'.$cont]."t6r4nd".''."t6r4nd".$_POST['image'.$cont]."t6r4nd".$_POST['link'.$cont]."t6r4nd".''."t6r4nd".''."t6r4nd".$_POST['seo'.$cont]."t6r4nd".""."kh6gfd57hgg";
				
		
			
		}
		
		if($_POST['operation']=="1") {
			$values.="new item t6r4nd".""."t6r4nd".plugins_url('images/new.jpg', __FILE__)."t6r4nd".""."t6r4nd".""."t6r4nd".""."t6r4nd".""."t6r4nd".""."kh6gfd57hgg";
			
			$cont++;
		}
		

	
	


$sql= "UPDATE $table_name SET `ivalues` = '".$values."', `title` = '".$_POST["stitle".$_POST['id']]."', `width` = '".$_POST["width".$_POST['id']]."', `height` = '".$_POST["height".$_POST['id']]."', `round` = '', `width_thumbnail` = '', `height_thumbnail` = '', `thumbnail_border` = '', `thumbnail_round` = '', `number_thumbnails` = '', `sizetitle` = '', `sizedescription` = '', `sizethumbnail` = '', `font` = '', `color1` = '', `color2` = '', `color3` = '', `time` = '".$_POST["time".$_POST['id']]."', `border` = '', `animation` = '', `mode` = '', `op1` = '', `op2` = '', `op3` = '', `op4` = '', `op5` = '' WHERE `id` =  ".$_POST["id"]." LIMIT 1";
		
			
			
			$wpdb->query($sql);
	}
	$myrows = $wpdb->get_results( "SELECT * FROM $table_name" );
$conta=0;



include('template/cabezera_panel.html');
while($conta<count($myrows)) {
	$id= $myrows[$conta]->id;
	$title = $myrows[$conta]->title;
		$width = $myrows[$conta]->width;
$height = $myrows[$conta]->height;
$values =$myrows[$conta]->ivalues;

$twidth = $myrows[$conta]->width_thumbnail;

$theight = $myrows[$conta]->height_thumbnail;

$number_thumbnails = $myrows[$conta]->number_thumbnails;



//$total = $myrows[$conta]->total;

$border = $myrows[$conta]->border;
$round = $myrows[$conta]->round;
$tborder = $myrows[$conta]->thumbnail_border;
$thumbnail_round = $myrows[$conta]->thumbnail_round;

$sizetitle = $myrows[$conta]->sizetitle;
$sizedescription = $myrows[$conta]->sizedescription;
$sizethumbnail = $myrows[$conta]->sizethumbnail;
$font = $myrows[$conta]->font;
$color1 = $myrows[$conta]->color1;
$color2 = $myrows[$conta]->color2;

$color3 = $myrows[$conta]->color3;

$animation = $myrows[$conta]->animation;
$time = $myrows[$conta]->time;
$mode = $myrows[$conta]->mode;
$op1 = $myrows[$conta]->op1;
$op2 = $myrows[$conta]->op2;
$op3 = $myrows[$conta]->op3;
$op4 = $myrows[$conta]->op4;
$op5 = $myrows[$conta]->op5;


	include('template/panel.php');			
	$conta++;
	}
include('template/footer.php');
}




function horizontalslider_add_menu(){	
	if (function_exists('add_options_page')) {
		//add_menu_page
		add_options_page('horizontalslider', 'Horizontal Slider', 'manage_options', basename(__FILE__), 'horizontalslider_panel');
	}
}


if (function_exists('add_action')) {
	add_action('admin_menu', 'horizontalslider_add_menu'); 
}

remove_filter('the_content', 'wpautop');

add_action( 'widgets_init', create_function('', 'return register_widget("wp_horizontalslider");') );
add_action('init', 'add_header_horizontalslider');
add_filter('the_content', 'horizontalslider');
add_action('admin_head', 'horizontalslider_enqueue_scripts');
?>
