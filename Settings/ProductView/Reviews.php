<?php
namespace Dfe\Frontend\Settings\ProductView;
use Df\Typography\Font;
/** @method static Reviews s() */
final class Reviews extends \Df\Config\Settings {
	/** @return Font */
	function font():Font {return $this->_font('font');}
	/**
	 * @override
	 * @see \Df\Config\Settings::prefix()
	 * @used-by \Df\Config\Settings::v()
	 */
	protected function prefix():string {return 'dfe_frontend/product_view/reviews';}
}