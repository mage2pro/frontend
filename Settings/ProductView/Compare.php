<?php
namespace Dfe\Frontend\Settings\ProductView;
use Df\Typography\Font;
/** @method static Compare s() */
class Compare extends \Df\Core\Settings {
	/** @return Font */
	public function font() {return $this->_font('font');}
	/**
	 * @override
	 * @used-by \Df\Core\Settings::v()
	 * @return string
	 */
	protected function prefix() {return 'dfe_frontend/product_view/compare/';}
}