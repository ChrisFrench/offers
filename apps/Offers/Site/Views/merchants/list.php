<div id="alphascroll"  data-title="Isis Sales Tools">
	

				<div data-role="header" data-position="fixed">
				<!-- <a href="/" data-rel="back" data-icon="back" data-theme="b">Back</a> -->
					<h1><a href="/" class="ui-title" aria-level="1" role="heading">Isis</a></h1>
					
<a href="http://isismst.com/verizon"  class="ui-btn-right" data-icon="bars"  >Menu</a>


							  <div class="ui-bar">
							   <h2><b>Issuers</b></h2>
							  </div>
				</div>

			
					<div data-role="content">
						<ul id="mylistview" data-role="listview" data-autodividers="true">
							
<?php foreach ($list as $group) :  ?>
<li>
															<a href="<?php echo $PARAMS[0] .'/' ?><?=strip_tags(@$group[0]->{'merchant.slug'})?>"> 
															
																<div class="ui-btn-text">
															 		<h3><?=strip_tags(@$group[0]->{'merchant.title'})?></h3>
																	<div class="card_name"> <?=strip_tags(@$group[0]->{'merchant.payment_type'})?></div>
																</div>
															</a>	

																</li>
<?php  endforeach; ?>		







						</ul>

					</div>
