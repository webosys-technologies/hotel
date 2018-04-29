<?php
$bg_pos_arr = array(
				'top left' => 'Top Left',
				'top center' => 'Top Middle',
				'top right' => 'Top Right',
				'left center' => 'Left Middle',
				'center' => 'Center',
				'right center' => 'Right Middle',
				'bottom left' => 'Bottom Left',
				'bottom center' => 'Bottom Middle',
				'bottom right' => 'Bottom Right'
);

$bg_repeat_arr = array(
				'no-repeat' => 'No',
				'repeat-x' => 'Horizontally',
				'repeat-y' => 'Vertically',
				'repeat' => 'Both'
);

$bg_size_arr = array(
				'auto' => 'None',
				'contain' => 'Contain',
				'cover' => 'Cover'
);
?>

<script type="text/javascript">
$(document).ready(function() {
	<?php if($crop): ?>
	function setInfo(i, e) {
		$('#<?php echo $id; ?>_x').val(e.x1);
		$('#<?php echo $id; ?>_y').val(e.y1);
		$('#<?php echo $id; ?>_w').val(e.width);
		$('#<?php echo $id; ?>_h').val(e.height);
	}
	<?php endif; ?>

	var p = $("#<?php echo $id; ?>_image_preview");

	// prepare instant preview
	$("#<?php echo $id; ?>_image").change(function() {
		$(this).attr('required', 'required');

		var filename = this.files[0].name;
		//$('#<?php echo $id; ?>_filename').html(filename);
		
		// prepare HTML5 FileReader
		var oFReader = new FileReader();
		oFReader.readAsDataURL(document.getElementById("<?php echo $id; ?>_image").files[0]);

		oFReader.onload = function (oFREvent) {
			p.css({'max-width':'none'});
	   		p.attr('src', oFREvent.target.result).load(function() {
				p.fadeIn();
				$('#<?php echo $id; ?>_width').val(this.width);
				$('#<?php echo $id; ?>_height').val(this.height);
				if( this.width > 1000 ) {
					p.addClass('width');
				}
			});
			$('#<?php echo $id; ?>_div').show('fast');
			$('#<?php echo $id; ?>_image_delete').show('fast');

<?php if($crop): ?>
			var <?php echo $id; ?>_ins = $('img#<?php echo $id; ?>_image_preview').imgAreaSelect({
				classPrefix: 'image_cropping imgareaselect',
				parent: '#<?php echo $id; ?>_cropping_div',
<?php if($ratio) : ?>
				aspectRatio: '<?php echo $ratio; ?>',
<?php endif; ?>
				onSelectEnd: setInfo,
				handles: true,
				persistent: true,
				instance: true,
<?php if($crop_max_height): ?>
				maxHeight: <?php echo $crop_max_height; ?>,
<?php endif; ?>
<?php if($crop_min_height): ?>
				minHeight: <?php echo $crop_min_height; ?>,
<?php endif; ?>
			});
			
			setTimeout(function() {
				var coords = {
					x1: 0,
					y1: 0,
					width: <?php echo $crop_min_width; ?>,
					height: <?php echo $crop_min_height; ?>
				};
				setInfo('', coords);

				<?php echo $id; ?>_ins.setSelection(coords.x1, coords.y1, coords.width, coords.height, true);
				<?php echo $id; ?>_ins.setOptions({ show: true });
				<?php echo $id; ?>_ins.update();
			}, 100);
<?php endif; ?>
		};

	});
	
	$('#<?php echo $id; ?>_image_delete input').click(function() {
		$('#<?php echo $id; ?>_image').removeAttr('required');

		$(this).parent().fadeOut('fast');
		$('#<?php echo $id; ?>_div').hide('fast');
		$('#<?php echo $id; ?>_image').val('');
		$(".imgareaselect-selection").parent().hide();
		$(".imgareaselect-outer").hide();
	});
});
</script>

<div class="fileUpload marB10">
    <label for="<?php echo $id; ?>_image" class="btn btn-primary btn-group">
        <i class="fa fa-photo"></i> Choose Image
        <input type="file" id="<?php echo $id; ?>_image" name="<?php echo $id; ?>_image" accept=".JPG,.PNG,.JPEG" <?php echo ($required?'required':''); ?> />
    </label>

    <label id="<?php echo $id; ?>_image_delete" class="btn btn-danger delete" <?php echo (!$image?'style="display:none;"':''); ?>>
    	<i class="fa fa-trash"></i>
        <input type="radio" name="<?php echo $id; ?>_image_clear" value="<?php echo $image; ?>" />
    </label>
    
    <span id="<?php echo $id; ?>_filename" class="btn-group"></span>


<?php if( $crop ): ?>
    <input type="hidden" id="<?php echo $id; ?>_x" name="<?php echo $id; ?>_x" />
    <input type="hidden" id="<?php echo $id; ?>_y" name="<?php echo $id; ?>_y" />
    <input type="hidden" id="<?php echo $id; ?>_w" name="<?php echo $id; ?>_w" />
    <input type="hidden" id="<?php echo $id; ?>_h" name="<?php echo $id; ?>_h" />
<?php endif; ?>
    <input type="hidden" id="<?php echo $id; ?>_width" name="<?php echo $id; ?>_width" />
    <input type="hidden" id="<?php echo $id; ?>_height" name="<?php echo $id; ?>_height" />
</div>

<div id="<?php echo $id; ?>_div" class="image_preview" <?php echo ($image?'':'style="display: none;"'); ?>>
    <img id="<?php echo $id; ?>_image_preview" src="<?php echo $image.'?'.strtotime("now"); ?>" <?php echo 'style="'.($container_max_height?'max-height:'.$container_max_height.';':'').($image?'max-width:'.STORY_THUMB_WIDTH.'px;':'').'"'; ?> />

<?php if($bg_options): ?>    
    <div class="bg_options">
    	<div class="btn-group form-group1">
            <select name="<?php echo $id; ?>_bg_pos" class="selectpicker show-tick" data-width="200px">
            <!--<option disabled="disabled">Background Position</option>-->
            <?php foreach($bg_pos_arr as $key=>$value): ?>
            	<option value="<?php echo $key; ?>" title="Position: <?php echo $value; ?>" <?php echo ($key==$bg_options['pos']?'selected="selected"':''); ?>><?php echo $value; ?></option>
            <?php endforeach; ?>
            </select> &nbsp; 
        </div>

    	<div class="btn-group form-group1">
            <select name="<?php echo $id; ?>_bg_repeat" class="selectpicker show-tick" data-width="170px">
            <!--<option disabled="disabled">Background Repeat</option>-->
            <?php foreach($bg_repeat_arr as $key=>$value): ?>
            	<option value="<?php echo $key; ?>" title="Repeat: <?php echo $value; ?>" <?php echo ($key==$bg_options['repeat']?'selected="selected"':''); ?>><?php echo $value; ?></option>
            <?php endforeach; ?>
            </select> &nbsp; 
        </div>

    	<div class="btn-group form-group1">
            <select name="<?php echo $id; ?>_bg_size" class="selectpicker show-tick" data-width="130px">
            <!--<option disabled="disabled">Background Size</option>-->
            <?php foreach($bg_size_arr as $key=>$value): ?>
            	<option value="<?php echo $key; ?>" title="Size: <?php echo $value; ?>" <?php echo ($key==$bg_options['size']?'selected="selected"':''); ?>><?php echo $value; ?></option>
            <?php endforeach; ?>
            </select>
        </div>
    </div>
<?php endif; ?>

<div id="<?php echo $id; ?>_cropping_div" class="image_cropping_div"></div>

</div>
