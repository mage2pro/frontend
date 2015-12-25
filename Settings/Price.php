<?php
namespace Dfe\ProductView\Settings;
use Df\Typography\Font;
class Price extends \Df\Core\Settings {
	/** @return Font */
	public function font() {return $this->_font('font');}
	/**
	 * @override
	 * @used-by \Df\Core\Settings::v()
	 * @return string
	 */
	protected function prefix() {return 'dfe_product_view/price/';}

	/** @return \Dfe\ProductView\Settings\StockStatus */
	public static function s() {static $r; return $r ? $r : $r = df_o(__CLASS__);}
}