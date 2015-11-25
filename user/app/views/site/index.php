<?php if($product):?>

<div class="row ">
	<div class="loader_page">
		<div id="center_column" class="center_column span9 clearfix">

			<section id="addhomefeatured" class="main_page_products block">
				<h4>
					<span>Sản phẩm mới</span>
				</h4>
				<ul class="row">
					<?php foreach ($product as $v):?>
					<li class="ajax_block_product span3">
						<a class="product_image" href="<?php app()->baseUrl;?>/chi-tiet/<?php echo $v->id?>/<?php echo $v->alias?>.html">
							<img src="<?php echo app()->baseUrl; ?>/uploads/<?php echo $v->image?>" alt="<?php echo $v->name?>" class="main-img" />
						</a>
						<div>
							<h5>
								<a class="product_link" href="<?php app()->baseUrl;?>/chi-tiet/<?php echo $v->id?>/<?php echo $v->alias?>.html"
														title="<?php echo $v->name?>"><?php echo $v->name?></a>
								</h5>
								<p class="product_desc"><?php echo html_entity_decode(cutStr($v->description, 60), ENT_QUOTES, 'UTF-8')?></p>			
						</div>
					</li>
					<?php endforeach;?>
									
				</ul>
			</section>

		</div>

	</div>
</div>
<?php endif;?>
