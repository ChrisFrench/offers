<?php //echo \Dsc\Debug::dump( $state, false ); ?>
<?php //echo \Dsc\Debug::dump( $list ); ?>

<form id="list-form" action="" method="post">

    <div class="row datatable-header">
        <div class="col-sm-6">
            <div class="row row-marginless">
                <?php if (!empty($list['subset'])) { ?>
                <div class="col-sm-4">
                    <?php echo $pagination->getLimitBox( $state->get('list.limit') ); ?>
                </div>
                <?php } ?>
				<?php if (!empty($list['count']) && $list['count'] > 1) { ?>                                
                <div class="col-sm-8">
                    <?php echo $pagination->serve(); ?>
                </div>
                <?php } ?>
            </div>
        </div>    
        <div class="col-sm-6">
            <div class="input-group">
                <input class="form-control" type="text" name="filter[keyword]" placeholder="Keyword" maxlength="200" value="<?php echo $state->get('filter.keyword'); ?>"> 
                <span class="input-group-btn">
                    <input class="btn btn-primary" type="submit" onclick="this.form.submit();" value="Search" />
                    <button class="btn btn-danger" type="button" onclick="Dsc.resetFormFilters(this.form);">Reset</button>
                </span>
            </div>
        </div>
    </div>
    
    <input type="hidden" name="list[order]" value="<?php echo $state->get('list.order'); ?>" />
    <input type="hidden" name="list[direction]" value="<?php echo $state->get('list.direction'); ?>" />

    
    <div class="table-responsive datatable">
    
    <table class="table table-striped table-bordered table-hover table-highlight table-checkable">
		<thead>
			<tr>
                <?php switch (@$PARAMS['type']) {
                    case 'merchant': 
                    echo '<th data-sortable="merchant.title">Merchant</th>';
                        break;
                    case 'issuer':
                       echo '<th data-sortable="issuer.title">Issuer</th>';
                        break;
                    default:
                     echo '   <th data-sortable="issuer.title">Issuer</th>
                <th data-sortable="merchant.title">Merchant</th>';
                        break;
                } ?>
             
                
                <th>Offer</th>

                <th data-sortable="offer.enddate_start">Start Date</th>
                <th data-sortable="offer.enddate_start">End Date</th>
                <th>Published</th>
               
            </tr>
			<tr class="filter-row">
				  <?php switch (@$PARAMS['type']) {
                    case 'merchant': 
                    ?>
                     <th>
<select  id="group_filter" name="filter[merchant.title]" class="form-control" >
                <option value="">-Merchant Filter-</option>
                <?php foreach (@$merchants as $title) : ?>
                <option <?php if($state->get('filter.merchant.title') == $title) { echo 'selected'; } ?> value="<?=$title?>"><?=$title?></option>
                <?php endforeach; ?>
            </select>                </th>

                    <?php

                 
                        break;
                    case 'issuer':
                       ?>
   <th>
                <select  id="group_filter" name="filter[issuer.title]" class="form-control" >
                <option value="">-Issuer Filter-</option>
                <?php foreach (@$issuers as $title) : ?>
                <option <?php if($state->get('filter.issuer.title') == $title) { echo 'selected'; } ?> value="<?=$title?>"><?=$title?></option>
                <?php endforeach; ?>
            </select>
                </th>

                    <?php
                        break;
                    default:
                     ?>
                         <th>
                <select  id="group_filter" name="filter[issuer.title]" class="form-control" >
                <option value="">-Issuer Filter-</option>
                <?php foreach (@$issuers as $title) : ?>
                <option <?php if($state->get('filter.issuer.title') == $title) { echo 'selected'; } ?> value="<?=$title?>"><?=$title?></option>
                <?php endforeach; ?>
            </select>
                </th>
                <th>
<select  id="group_filter" name="filter[merchant.title]" class="form-control" >
                <option value="">-Merchant Filter-</option>
                <?php foreach (@$merchants as $title) : ?>
                <option <?php if($state->get('filter.merchant.title') == $title) { echo 'selected'; } ?> value="<?=$title?>"><?=$title?></option>
                <?php endforeach; ?>
            </select>                </th>


                    <?php
                        break;
                } ?> 




            
                <th></th>
                <th></th>
                <th>
                </th>
                <th><button class="btn " type="sumbit">Filter</button></th>
            </tr>
		</thead>
		<tbody>    
        
        <?php if (!empty($list['subset'])) { ?>
    
            <?php foreach ($list['subset'] as $item) { ?>
                <tr>
	                         
                    
                    <?php switch (@$PARAMS['type']) {
                    case 'merchant': 
                    ?>
                     <td class="">
                        <?php echo @$item->{'merchant.title'}; ?>
                    </td>

                    <?php

                 
                        break;
                    case 'issuer':
                       ?>
  
                  <td class="">
                        <h5>
                        <a href="./admin/offers/edit/<?php echo $item->id; ?>">
                            <?php echo @$item->{'issuer.title'}; ?>
                        </a>
                        </h5>
                    </td>

                    <?php
                        break;
                    default:
                     ?>
                         <td class="">
                        <h5>
                        <a href="./admin/offers/edit/<?php echo $item->id; ?>">
                            <?php echo @$item->{'issuer.title'}; ?>
                        </a>
                        </h5>
                    </td>
                    <td class="">
                        <?php echo @$item->{'merchant.title'}; ?>
                    </td>
               
                    <?php
                        break;
                } ?> 


                    <td class="">
                       <?php echo @$item->{'offer.title'}; ?>
                    </td>
                    <td class="">
                        <?php echo @$item->{'offer.fromdate_start'}; ?>
                    </td>
                    <td class="">
                    <?php echo @$item->{'offer.fromdate_end'}; ?>
                        
                    </td>
                    <td class="text-center">
                        <a class="btn btn-xs btn-secondary" href="./admin/offers/edit/<?php echo $item->id; ?>">
                            <i class="fa fa-pencil"></i>
                        </a>
	                    &nbsp;
	                    <a class="btn btn-xs btn-danger" data-bootbox="confirm" href="./admin/offers/delete/<?php echo $item->id; ?>">
	                        <i class="fa fa-times"></i>
	                    </a>
                    </td>
                </tr>
            <?php } ?>
        
        <?php } else { ?>
            <tr>
            <td colspan="100">
                <div class="">No items found.</div>
            </td>
            </tr>
        <?php } ?>

        </tbody>
    </table>
    
    </div>
    
    <div class="row datatable-footer">
        <?php if (!empty($list['count']) && $list['count'] > 1) { ?>
        <div class="col-sm-10">
            <?php echo (!empty($list['count']) && $list['count'] > 1) ? $pagination->serve() : null; ?>
        </div>
        <?php } ?>
        <div class="col-sm-2 pull-right">
            <div class="datatable-results-count pull-right">
            <?php echo $pagination ? $pagination->getResultsCounter() : null; ?>
            </div>
        </div>
    </div>    
    
</form>
