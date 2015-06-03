<?php
$this->pageTitle = 'Product';
?>
<div class="row">
<div class="col-lg-12">


<?php echo CHtml::errorSummary($model, '<div class="alert alert-dismissable alert-warning"> Loi', '</div>'); ?>
<?php
	if (user()->hasFlash('messages'))
	{
		$messages = user()->getFlash('messages');
		echo '<div class="alert alert-dismissable alert-success">'. hsp($messages). '</div><br>';
	}
	?>
<?php
	$form = $this->beginWidget('TbActiveForm', array(
		'action'=>sslUrl('product/edit/'.$model->id),
		'id' => 'add-form',
		'htmlOptions'=>array('enctype' => 'multipart/form-data')
	));
?>
<div class="form-group">
			<?php echo $form->labelEx($model,'cat_id'); ?>
			<?php echo $form->dropDownList($model,'cat_id',array('0'=>'Danh mục cấp 1') + CHtml::listData($category, 'id', 'name'), array('class' => 'form-control cat_id')); ?>
</div>

<div class="form-group cat1_id">
			<?php echo $form->labelEx($model,'cat1_id'); ?>
			<?php echo $form->dropDownList($model,'cat1_id',array('0'=>'Danh mục cấp 2') + CHtml::listData($category1, 'id', 'name'), array('class' => 'form-control')); ?>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model,'name'); ?>
	<?php echo $form->textField($model,'name', array('class' => 'form-control')); ?>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model,'description'); ?>
	<?php echo $form->textArea($model,'description', array('class' => 'form-control', 'rows' => '5')); ?>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model,'image'); ?>
	<?php echo $form->fileField($model,'image', array('value' => $model->image)); ?>
	<?php echo CHtml::image('/uploads/'.$model->image, 'image', array('width' => '50px', 'height' => '50px'))?>
	<?php echo Chtml::hiddenField('hd_img', $model->image); ?>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model,'content'); ?>
	<?php echo $form->textArea($model,'content', array('class' => 'form-control')); ?>
	<script>
	editor = CKEDITOR.replace( 'ProductAR_content', {
		filebrowserBrowseUrl: '/browser/browse.php',
		filebrowserUploadUrl: '/uploader/upload.php',
		filebrowserWindowWidth: '640',
		filebrowserWindowHeight: '480'
	});
	CKFinder.setupCKEditor( editor, '<?php echo app()->baseUrl?>/js/ckfinder/' );
	</script>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model,'status'); ?>
	<?php echo $form->checkBox($model,'status', array('checked' => $model->status)); ?>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model,'order'); ?>
	<?php echo $form->textField($model,'order', array('class' => 'form-control')); ?>
</div>

<button type="submit" class="btn btn-default">Save</button>
<button type="reset" class="btn btn-default">Cancel</button>

<?php
	$this->endWidget();
?>

</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		var url = "<?php echo app()->baseUrl?>";
		$('.cat_id').change(function(){
			id = $(this).val();
			$.ajax({
				url: url + '/category1/ajaxSub2/' + id,
				success: function(html) {
					$('.cat1_id').html(html);
				}
			});
		});

	});
</script>