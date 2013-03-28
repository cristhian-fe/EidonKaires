<?php
/*
 * ARI Image Slider Joomla! module
 *
 * @package		ARI Image Slider Joomla! module.
 * @version		1.0.0
 * @author		ARI Soft
 * @copyright	Copyright (c) 2009 www.ari-soft.com. All rights reserved
 * @license		GNU/GPL (http://www.gnu.org/copyleft/gpl.html)
 * 
 */

defined('ARI_FRAMEWORK_LOADED') or die('Direct Access to this location is not allowed.');

$baseUri = JURI::base(true);
$cssClass = $params->get('cssClass');
$startSlide = intval($params->get('opt_startSlide'), 10);
if ($startSlide < 0 || $startSlide > count($slides) - 1) $startSlide = 0;

$controlNav = (bool)$params->get('opt_controlNav');
?>
<div id="<?php echo $sliderId; ?>_wrapper" class="ari-image-slider-wrapper<?php if ($cssClass):?> <?php echo $cssClass; ?><?php endif; ?><?php if ($controlNav):?> ari-image-slider-wCtrlNav<?php endif; ?>">
	<div id="<?php echo $sliderId; ?>" class="ari-image-slider">
	<?php
	$slideIdx = 0;
	foreach ($slides as $slide):
		$isLink = !empty($slide['link']);
		$imgAttrs = $slide['imgAttrs'];
		
		if ($slideIdx != $startSlide)
		{
			if (!isset($imgAttrs['style']))
				$imgAttrs['style'] = array();
			$imgAttrs['style']['display'] = 'none';
		}
	?>
		<?php
			if ($isLink):
		?>
			<a<?php echo AriHtmlHelper::getAttrStr($slide['lnkAttrs']); ?>>
		<?php
			endif;
		?>
		<img<?php echo AriHtmlHelper::getAttrStr($imgAttrs); ?> />
		<?php
			if ($isLink):
		?>
			</a>
		<?php
			endif; 
		?>
	<?php
		++$slideIdx;
	endforeach;
	?>
	</div>
</div>