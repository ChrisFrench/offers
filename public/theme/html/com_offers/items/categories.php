<div id="alphascroll"  data-title="Isis Sales Tools">
	

				<div data-role="header" data-position="fixed">
				<!-- <a href="/" data-rel="back" data-icon="back" data-theme="b">Back</a> -->
					<h1><a href="/" class="ui-title" aria-level="1" role="heading">Isis</a></h1>
					
<a href="http://isismst.com/verizon"  class="ui-btn-right" data-icon="bars"  >Menu</a>


							  <div class="ui-bar">
							   <h2><b><?=$this->categories->title;?></b></h2>
							  </div>
				</div>

			
					<div data-role="content">
						<ul id="mylistview" data-role="listview" data-autodividers="true">
							<?php
$cats = $this->categories->getChildren();
$list = array();
foreach ($cats as $category) :  ?>
<?php $list[] = array('link' => str_replace("https:/", "https://", str_replace('//', '/', JURI::current().'/'.$category->alias)), 'title' => $category->title, 'description' => $category->description);  ?>
<?php  endforeach; ?>

<?php
usort($list, function ($elem1, $elem2) {
     return strcmp($elem1['link'], $elem2['link']);
});



 ?>
<?php foreach ($list as $item) :  ?>
<li > 
															<a href="<?php echo $item['link']; ?>"> 
															
																<div class="ui-btn-text">
															 		<h3><?php echo $item['title'] ; ?> </h3>
																	<div class="card_name"> <?php echo $item['description'] ; ?></div>
																</div>
															</a>	

																</li>
<?php  endforeach; ?>		







						</ul>

					</div>


