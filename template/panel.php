<style>

.addwindow {
	
	position:relative:
	border: 2px;
	display: none;
	
}
.horizontalitemfull<?php echo $id; ?> {
	
	margin: 10px;
	padding: 10px;
	border: 2px solid #555;
	<?php
	if($_POST['id']!=$id) {
		echo 'display: none;';
	}
	?>
	
}


.sliderdelete<?php echo $id; ?>{
	
	
	display: none;
	
}
.edititem {
	
	position:relative:
	border: 2px;
	display: none;
	margin: 8px;
	line-height:250%;
	padding: 8px;
	background-color:#CCC;
	
}
</style>
    <script type="text/javascript">

        jQuery(document).ready( function () { 
		
		
		var uploadID<?php echo $id; ?> = ''; /*setup the var in a global scope*/

jQuery('.upload-button<?php echo $id; ?>').click(function() {
	
	

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



		
		
          
	jQuery('.editslider<?php echo $id; ?>').click(function() {
		
		
	if(jQuery('.horizontalitemfull<?php echo $id; ?>').css("display")=="none") jQuery('.horizontalitemfull<?php echo $id; ?>').show();
	else jQuery('.horizontalitemfull<?php echo $id; ?>').css("display", "none")
	
	
	
	return false;
	
	
})
	

	jQuery('.deletebuton<?php echo $id; ?>').click(function() {
		
		
		
			if(jQuery('.sliderdelete<?php echo $id; ?>').css("display")=="none") jQuery('.sliderdelete<?php echo $id; ?>').show();
	else jQuery('.sliderdelete<?php echo $id; ?>').css("display", "none")
		

	
	
	
	return false;
	
	
})	
		 
	jQuery('.additem').click(function() {
		
		
		
	//jQuery('.widget-wp_sliderpro-__i__-savewidget').trigger('click');
	jQuery('input[name=operation]').val('1');
	jQuery('.addwindow').show();
	
	
	
	return false;
	
	
})

	jQuery('.deleteitem').click(function() {
		
		
		
	//jQuery('.widget-wp_sliderpro-__i__-savewidget').trigger('click');
	jQuery('input[name=operation]').val('2');
	jQuery('.addwindow').show();
	
	
	
	return false;
	
	
})

	jQuery('.cancel').click(function() {
		
		
		
	//jQuery('.widget-wp_sliderpro-__i__-savewidget').trigger('click');
	jQuery('input[name=operation]').val('0');
	jQuery('.addwindow').hide();
	
	
	
	return false;
	
	
})

jQuery('.<?php echo $id; ?>editbutton').click(function() {
		
		
		
	//jQuery('.widget-wp_sliderpro-__i__-savewidget').trigger('click');
	

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

		  
       
		
		
		
		// media library functions

//var clicked = null;

jQuery('.upload_image_button<?php echo $id; ?>').click(function() {
 

 clicked = jQuery(this);
 
 formfield = jQuery(this).prev('input').attr('name');
 
 
 
if(formfield.search("vid")!=-1) tb_show('', 'media-upload.php?type=video&amp;TB_iframe=true');
else tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
 
 return false;
});

window.send_to_editor = function(html) {
 //imgurl = jQuery('img',html).attr('src');
 //clicked.prev('input').val(imgurl);
 //tb_remove();
 
 
 var textt=html;


if(textt.search("img")!=-1) imgurl = jQuery('img',html).attr('src');

else {

	imgurl = jQuery(html).attr('href');

}


//clicked.prev('input').val(imgurl);
+
clicked.prev('input').val(imgurl);

tb_remove();
 
 
 
}

		  
        });

    </script>


	  <legend>HORIZONTAL SLIDER <?php echo $id; ?>. Write in your Pages or Posts: <strong>[horizontalslider <?php echo $id; ?> /]</strong>. To embed this slider directly in templates, copy the following php code: <textarea readonly rows="5"> <?php echo "<?php echo apply_filters( 'the_content','[horizontalslider ".$id." /]'); ?>"; ?></textarea> <button class="editslider<?php echo $id; ?>">EDIT</button></legend> 



<div class="horizontalitemfull<?php echo $id; ?>"> 
	<form method="post" action="">
		<fieldset>
<label >Title: </label><input id="stitle<?php echo $id; ?>" name="stitle<?php echo $id; ?>" type="text" value="<?php echo $title; ?>" />
              <hr />
             
              <input name="operation" type="hidden" id="operation" value="0" />
               <input name="itemselect<?php echo $id; ?>" type="hidden" id="itemselect<?php echo $id; ?>" value="" />
<h2>ITEMS:</h2>     

<?php
$bst="";
if($values!="") $contitems=substr_count ($values, "kh6gfd57hgg");
if(isset($contitems) && $contitems>4) $bst=' style="display:none;"';
?>          
            <button class="additem" <?php echo $bst; ?>>Add Item</button> <button class="deleteitem">Delete Items</button> <input type='submit' name='' value='Save' />
            <div class="addwindow">
             <hr />
           <input type='submit' name='' value='OK' /><button class="cancel">Cancel</button>
            
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
					
					 
					 echo '<li><input name="item'.$cont.'" type="checkbox" value="hide" /><img src="'.$item[2].'" width="60px"/><input name="title'.$cont.'" type="text" value="'.$item[0].'" /><button class="'.$id.'editbutton" rel="'.$cont.'">+</button>
					 
					 <div id="'.$id.'edit'.$cont.'" class="edititem">
					 Url image:<br/>
					 <input type="text" name="image'.$cont.'" value="'.$item[2].'" class="upload'.$id.'" size="70"/>
					 <input class="upload_image_button'.$id.'" name="wsl-image-add" type="button" value="Change Image" /><br/>
					 ';
					 
					
					echo '
					 Link: <input name="link'.$cont.'" type="text" value="'.$item[3].'" size="70" /><br/>
					 Seo link title: <input name="seo'.$cont.'" type="text" value="'.$item[6].'" size="70" /><br/>
					 ORDER: <input name="order'.$cont.'" type="text" value="'.$cont.'" size="4"/><br/>
					  <hr />
					  <input type=\'submit\' name=\'\' value=\'Save\' />
					 </div>
					 </li>';
					 $cont++;
					}
					 
				}
			}
			 $cont--;
			echo '</ul><input class="widefat" name="total" type="hidden" id="total" value="'.$cont.'" />';
			?>
 
            <hr />
<h2>CONFIGURATION:</h2>            
           <label>Slider width(number with px or %): </label> <input type='text' id='width<?php echo $id; ?>'  name='width<?php echo $id; ?>'  value='<?php echo $width; ?>' size="6"/>
            
       		<label>Slider height(number with px or %): </label> <input type='text' id='height<?php echo $id; ?>'  name='height<?php echo $id; ?>'  value='<?php echo $height; ?>' size="6"/>
          
      <br/>  <br/>      

<input name="id" type="hidden" id="id" value="<?php echo $id; ?>" /></td>
	<input type='submit' name='' value='SAVE SLIDER' />
		 
      </fieldset>
	</form>		 <br/>
    <hr />
  <form method="post" action="">
	  <input name="borrar" type="hidden" id="borrar" value="<?php echo $id; ?>">
      <button class="deletebuton<?php echo $id; ?>">Delete slider</button>
      <div class="sliderdelete<?php echo $id; ?>">
      <button class="deletebuton<?php echo $id; ?>">CANCEL</button>
     <input type='submit' name='' value='OK' />
     </div>
    </form>
  <hr />
  </div>