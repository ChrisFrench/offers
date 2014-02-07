<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers');

JHtml::_('behavior.caption');
?>
<style>
.disclaimer {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 7px;
	color: #000;
	text-align: center;
}
.disclaimer2 {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 7px;
	color: #000;
}
.plan-header {
	font-family: Verdana, Helvetica, Arial, sans-serif;
	font-size: 16px;
	color: #818181;
	font-style: normal;
	font-weight: normal;
	line-height: 17px;
}
.GREYsubhead {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 15px;
	color: #666;
	font-style: normal;
	font-weight: normal;
}
.GREYsubheadSMALL {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
	color: #666;
	font-style: normal;
	font-weight: normal;
}
.WHITEsubheadSMALL {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 13px;
	color: #FFF;
	font-style: normal;
	font-weight: normal;
}
.SUBnav {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 16px;
	color: #FFF;
	font-style: normal;
	font-weight: normal;
	text-decoration: none;
	vertical-align: middle;
	line-height: 15px;
}
.SUBnavDARK {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 16px;
	color: #999999;
	font-style: normal;
	font-weight: normal;
	text-decoration: none;
	vertical-align: middle;
	line-height: 15px;
}
.Pagetitle {
	font-family: "Omnes", Verdana, Geneva, sans-serif;
	font-size: 21px;
	color: #FFF;
	font-style: normal;
	font-weight: normal;
	text-decoration: none;
	line-height: 20px;
}
.PagetitleSMALLER {
	font-family: "Omnes", Verdana, Geneva, sans-serif;
	font-size: 19px;
	color: #FFF;
	font-style: normal;
	font-weight: normal;
	text-decoration: none;
	line-height: 18px;
}
.MAINnav {
	font-family: "Omnes", Verdana, Helvetica, Arial, sans-serif !important;
	font-size: 32px !important;
	color: #FFF !important;
	font-style: normal !important;
	font-weight: normal !important;
	text-decoration: none !important;
	text-align: center !important;
	vertical-align: middle !important;
	letter-spacing: -1px !important;
	line-height: 30px !important;
	/* [disabled]padding-left: 72px; */
	/* [disabled]padding-right: 72px; */
}
.MAINnavDARK {
	font-family: "Omnes", Verdana, Helvetica, Arial, sans-serif;
	font-size: 32px;
	color: #666;
	font-style: normal;
	font-weight: normal;
	text-decoration: none;
	text-align: center;
	vertical-align: middle;
	letter-spacing: -1px;
	line-height: 30px;
	/* [disabled]padding-left: 72px; */
	/* [disabled]padding-right: 72px; */
}
.MAINnavSMALLER {
	font-family: "Omnes", Verdana, Helvetica, Arial, sans-serif;
	font-size: 20px;
	color: #FFF;
	font-style: normal;
	font-weight: normal;
	text-decoration: none;
	text-align: center;
	vertical-align: middle;
	letter-spacing: -1px;
	/* [disabled]padding-left: 72px; */
	/* [disabled]padding-right: 72px; */
	word-spacing: 2px;
}
.BUTTONnav {
	font-family: "Omnes", Verdana, Helvetica, Arial, sans-serif;
	font-size: 14px;
	color: #FFF;
	font-style: normal;
	font-weight: normal;
	text-decoration: none;
	text-align: center;
	vertical-align: middle;
	letter-spacing: -1px;
	word-spacing: 2px;
}
.SUBnavCONDENSED {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 14px;
	color: #FFF;
	font-style: normal;
	font-weight: normal;
	text-decoration: none;
	text-align: center;
	vertical-align: middle;
}
.pricing {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 15px;
	color: #F6831F;
	font-style: normal;
	font-weight: normal;
}
.pricingBlue {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 15px;
	color: #063B78;
	font-style: normal;
	font-weight: normal;
}
.orangeSUBHEAD {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 18px;
	color: #F6831F;
	font-style: normal;
	font-weight: normal;
}
.blueSUBHEAD {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 18px;
	color: #0297D6;
	font-style: normal;
	font-weight: normal;
}
.pricingPROMO {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 25px;
	color: #F6831F;
	font-style: normal;
	font-weight: normal;
}
.promoTitle {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 30px;
	color: #F6831F;
	font-style: italic;
	font-weight: normal;
}
.PageHeads {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 22px;
	color: #FE7600;
	font-style: normal;
	font-weight: normal;
}
.SubHead {
	font-size: 12px;
	color: #0297D6;
	font-style: normal;
	font-weight: bold;
	line-height: 22px;
}
.SubHeadTIGHT {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 14px;
	color: #0297D6;
	font-style: normal;
	font-weight: bold;
}
.SubHeadTIGHTblue {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 14px;
	color: #0297D6;
	font-style: normal;
	font-weight: bold;
}
.SubHeadTIGHTorange {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 14px;
	color: #F57B1E;
	font-style: normal;
	font-weight: bold;
}
.SubHeadTIGHTmagenta {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 14px;
	color: #BA1E60;
	font-style: normal;
	font-weight: bold;
}
.SubHeadTIGHTgreen {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 14px;
	color: #7EC240;
	font-style: normal;
	font-weight: bold;
}
.SubHeadTIGHTpurple {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 14px;
	color: #9900CC;
	font-style: normal;
	font-weight: bold;
}
.PromoSubHead {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 13px;
	color: #0297D6;
	font-style: normal;
}
.BodyCopy {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 10px;
	color: #000;
	font-style: normal;
	font-weight: normal;
}
.SAVINGS {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 10px;
	color: #093;
	font-style: italic;
	font-weight: bold;
}
.BodyCopyORANGE {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 10px;
	color: #FE7600;
	font-style: normal;
	font-weight: normal;
}
.BodyCopyORANGEBOLD {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 11px;
	color: #FE7600;
	font-style: normal;
	font-weight: bold;
}
.BodyCopyBlueBOLD {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 11px;
	color: #063B78;
	font-style: normal;
	font-weight: bold;
}
.PromoFeatures {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 9px;
	color: #999;
	font-style: normal;
	font-weight: normal;
}
.PromoFeaturesWHITE {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 9px;
	color: #FFF;
	font-style: normal;
	font-weight: normal;
}
.Price {
	font-family: verdana;
	font-size: 12px;
	font-style: normal;
	color: #000;
	font-weight: bold;
}
.SmallType {
	font-size: 9px;
	font-family: Arial, Helvetica, sans-serif;
	color: #000;
}
.MEDType {
	font-size: 10px;
	font-family: Arial, Helvetica, sans-serif;
	color: #000;
}
.SmallTypeWHITE {
	font-size: 9px;
	font-family: Arial, Helvetica, sans-serif;
	color: #FFF;
}
.header {	font-family: verdana;
	font-size: 12px;
	font-style: italic;
	color: #FFF;
	font-weight: bold;
}
.headerSMALLER {
	font-family: verdana;
	font-size: 10px;
	font-style: italic;
	color: #FFF;
	font-weight: bold;
}
.headerLARGER {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 14px;
	font-weight: bold;
	color: #FFF;
}
.headerLARGEST {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 22px;
	font-weight: normal;
	color: #FFF;
}


</style>


<div data-role="header" data-position="fixed">
		<h1>Isis</h1>
	</div>
	

	<?php $leadingcount = 0; ?>
	<?php if (!empty($this->lead_items)) : ?>
	<div class="items-leading clearfix">
		<?php foreach ($this->lead_items as &$item) : ?>
		<div class="leading-<?php echo $leadingcount; ?><?php echo $item->state == 0 ? ' system-unpublished' : null; ?>">
			<?php
				$this->item = &$item;
				echo $this->loadTemplate('item');
			?>
		</div>
		<?php
			$leadingcount++;
		?>
		<?php endforeach; ?>
	</div><!-- end items-leading -->
	<?php endif; ?>






	