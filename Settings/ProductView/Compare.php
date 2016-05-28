<?php
namespace Dfe\Frontend\Settings\ProductView;
use Df\Typography\Font;
class Compare extends \Df\Core\Settings {
	/** @return Font */
	public function font() {return $this->_font('font');}
	/**
	 * @override
	 * @used-by \Df\Core\Settings::v()
	 * @return string
	 */
	protected function prefix() {return 'dfe_frontend/product_view/compare/';}

	/** @return self */
	public static function s() {static $r; return $r ? $r : $r = df_o(__CLASS__);}
}