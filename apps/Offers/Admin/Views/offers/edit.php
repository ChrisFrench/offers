<script src="./ckeditor/ckeditor.js"></script>
<script>
jQuery(document).ready(function(){
    CKEDITOR.replaceAll( 'wysiwyg' );    
});

</script>

<form id="detail-form" action="" class="form-horizontal" method="post">

    <div class="row">


        <div class="col-md-9">
        
            <div class="form-actions clearfix">

                <div class="pull-right">
                    <div class="btn-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <input id="primarySubmit" type="hidden" value="save_edit" name="submitType" />
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a onclick="document.getElementById('primarySubmit').value='save_close'; document.getElementById('detail-form').submit();" href="javascript:void(0);">Save & Close</a>
                            </li>
                        </ul>
                    </div>

                    &nbsp;
                    <a class="btn btn-default" href="./admin/offers">Cancel</a>
                </div>

            </div>
            <!-- /.form-actions -->
            
            <hr />
        
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#tab-issuer" data-toggle="tab"> Issuer </a>
                </li>
                <li>
                    <a href="#tab-merchant" data-toggle="tab"> Merchant </a>
                </li>

                <li>
                    <a href="#tab-offer" data-toggle="tab"> Offer </a>
                </li>
            </ul>
            
            <div class="tab-content">

                <div class="tab-pane active" id="tab-issuer">
                
                    <div class="form-group">
                        <label class="col-md-3">Issuer Title</label>
        
                        <div class="col-md-7">
                            <select  id="group_filter" name="issuer[title]" class="form-control" >
                            <option value="">-Issuer Filter-</option>
                            <?php foreach (@$issuers as $title) : ?>
                            <option <?php if($flash->old('issuer.title') == $title) { echo 'selected'; } ?> value="<?=$title?>"><?=$title?></option>
                            <?php endforeach; ?>
                            </select>


                           
                        </div>
                        <!-- /.col -->
        
                    </div>
                    <!-- /.form-group -->
        
                    <div class="form-group">
                        <label class="col-md-3">Issuer Slug</label>
        
                        <div class="col-md-7">
                            <input type="text" disabled="disabled" name="issuer[slug]" value="<?php echo $flash->old('issuer.slug'); ?>" class="form-control" />
                        </div>
                        <!-- /.col -->
        
                    </div>
                    <hr>
                     <div class="form-group">
                        <label class="col-md-3">New Issuer</label>
        
                        <div class="col-md-7">
                            <input type="text"  name="issuer[new-title]" value="<?php echo $flash->old('issuer.new-title'); ?>" class="form-control" />
                        </div>
                        <!-- /.col -->
        
                    </div>

                
                                 
                </div>
                <!-- /.tab-pane -->
                
                <div class="tab-pane" id="tab-merchant">
                    
                     <div class="form-group">
                        <label class="col-md-3">Merchant</label>
        
                        <div class="col-md-7">
                            <select  id="group_filter" name="merchant[title]" class="form-control" >
                                <option value="">-Merchant Filter-</option>
                                <?php foreach (@$merchants as $title) : ?>
                                <option <?php if($flash->old('merchant.title') == $title) { echo 'selected'; } ?> value="<?=$title?>"><?=$title?></option>
                                <?php endforeach; ?>
                            </select>




                        </div>
                       </div>
                       <div class="form-group">
                        <label class="col-md-3">Payment Type</label>
        
                        <div class="col-md-7">
                        <?php $types = array('Payments Only', 'Smart Tap'); ?>
                        <select  id="group_filter" name="merchant[payment_type]" class="form-control" >
                                <option value="">-Select Payment Type-</option>
                                <?php foreach (@$types as $type) : ?>
                                <option <?php if($flash->old('merchant.payment_type') == $type) { echo 'selected'; } ?> value="<?=$type?>"><?=$type?></option>
                                  <?php endforeach; ?>
                        </select>
                       
                     </div> <!-- /.col -->
                        
              
                        
                    
                 
                    </div>
                    <!-- /.form-group -->
        
                    <div class="form-group">
                        <label class="col-md-3">Merchant Slug</label>
        
                        <div class="col-md-7">
                            <input type="text" disabled="disabled" name="issuer[slug]" value="<?php echo $flash->old('merchant.slug'); ?>" class="form-control" />
                        </div>
                        <!-- /.col -->
        
                    </div>
                   <hr>
                     <div class="form-group">
                        <label class="col-md-3">New Merchant</label>
        
                        <div class="col-md-7">
                            <input type="text"  name="issuer[new-title]" value="<?php echo $flash->old('issuer.new-title'); ?>" class="form-control" />
                        </div>
                        <!-- /.col -->
        
                    </div>
                
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="tab-offer">
                    <div class="form-group">  
                     <label class="col-md-2">Offer Title</label>
        
                        <div class="col-md-7">
                            <input type="text"  name="offer[title]" value="<?php echo $flash->old('offer.title'); ?>" class="form-control" />
                        </div>
                        <br> <br>
                     <div class="col-md-9">
                        
                        <textarea name="offer[description]" class="form-control wysiwyg"><?php echo $flash->old('offer.description'); ?></textarea>
                        </div>
                    </div>



                    
                <!-- /.tab-pane -->
                
               
            </div>
            <!-- /.tab-content -->
            
        </div>
 <!-- /.tab-content -->
  <hr>
            <div class="form-group">
             <label class="col-md-3">Published:</label>
             <div class="col-md-7">
                        <select name="published" class="form-control" >
                            <option value="1" <?php if ($flash->old('published') == '1') { echo "selected='selected'"; } ?>>Published</option>
                            <option value="-1" <?php if ($flash->old('published') == '-1') { echo "selected='selected'"; } ?>>Trashed</option>
                            <option value="0" <?php if ($flash->old('published') == '0') { echo "selected='selected'"; } ?>>Unpublished</option>
                        </select>  
                        </div>
                        </div>
                         <div class="form-group">
             <label class="col-md-3">Start Date </label>
        
                        <div class="col-md-7">
                        <input type="text"  name="offer[fromdate_start]" value="<?php echo $flash->old('offer.fromdate_start', date('Y-m-d') ); ?>" class="ui-datepicker form-control" type="text" data-date-format="yyyy-mm-dd" data-date-today-highlight="true" data-date-today-btn="true"/>
                        </div>
                        </div>
                         <div class="form-group">
              <label class="col-md-3">End Date </label><br>
        
                        <div class="col-md-7">
                        <input type="text"  name="offer[fromdate_end]" value="<?php echo $flash->old('offer.fromdate_end', date('Y-m-d') ); ?>" class="ui-datepicker form-control" type="text" data-date-format="yyyy-mm-dd" data-date-today-highlight="true" data-date-today-btn="true"/>
                        </div>     
                        </div>
        
    </div>

</form>
