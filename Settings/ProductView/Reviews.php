<?php
namespace Dfe\Frontend\Settings\ProductView;
use Df\Typography\Font;
/** @method static Reviews s() */
final class Reviews extends \Df\Config\Settings {
	/** @return Font */
	function font() {return $this->_font('font');}
	/**
	 * @override
	 * @see \Df\Config\Settings::prefix()
	 * @used-by \Df\Config\Settings::v()
	 * @return string
	 */
	protected function prefix() {return 'dfe_frontend/product_view/reviews';}
}