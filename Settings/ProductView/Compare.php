<?php
namespace Dfe\Frontend\Settings\ProductView;
use Df\Typography\Font;
/** @method static Compare s() */
final class Compare extends \Df\Config\Settings {
	/** @used-by \Dfe\Frontend\Block\ProductView\Css::customCss() */
	function font():Font {return $this->_font('font');}
	/**
	 * @override
	 * @see \Df\Config\Settings::prefix()
	 * @used-by \Df\Config\Settings::v()
	 */
	protected function prefix():string {return 'dfe_frontend/product_view/compare';}
}