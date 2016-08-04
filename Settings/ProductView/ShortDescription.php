<?php
namespace Dfe\Frontend\Settings\ProductView;
use Df\Typography\Font;
/** @method static ShortDescription s() */
class ShortDescription extends \Df\Core\Settings {
	/** @return Font */
	public function font() {return $this->_font('font');}
	/**
	 * @override
	 * @see \Df\Core\Settings::prefix()
	 * @used-by \Df\Core\Settings::v()
	 * @return string
	 */
	protected function prefix() {return 'dfe_frontend/product_view/short_description/';}
}