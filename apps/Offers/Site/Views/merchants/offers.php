<div id="alphascroll"  data-title="Isis Sales Tools">

                <div data-role="header" data-position="fixed">
                        <a href="/" data-rel="back" data-icon="back" data-theme="b">Back</a>
                        <h1 class="ui-title" role="heading" aria-level="1"></h1>
                        <a href="http://isismst.com/verizon"  class="ui-btn-right" data-icon="bars"  >Menu</a>
                </div>
                <ul data-role="listview" data-inset="true" style="padding:20px;">
               <?php foreach($list as $item) : ?>
                <?php if(!empty($item->{'offer.title'})) : ?>
                <li class="ui-btn">
                <h2><?=strip_tags($item->{'offer.title'})?></h2>
        <div style="padding:0px;">
                <p style="color:#555!important;">

                <b>Valid: </b><?php if(@$item->{'offer.fromdate_end'} != '0000-00-00')  { echo date('M jS, Y', strtotime(@$item->{'offer.fromdate_start'}))  . ' - ';
                                                                        } ?>
                                                                        <?php if(@$item->{'offer.fromdate_end'} != '0000-00-00')  {
                                                                                echo date('M jS, Y', strtotime(@$item->{'offer.fromdate_end'}));
                                                                        } ?>
                </p>
                                                                        <p><?=strip_tags(@$item->{'offer.description'})?><br>
                                                                        </p>
                </li>
                <?php endif; ?>
                <?php endforeach; ?>
                </ul>


        </div>
</div>