<?php
namespace Dfe\Frontend\ConfigSource\Visibility\Product;
use Magento\Catalog\Model\Product;
use Magento\Framework\Option\ArrayInterface;
# 2015-11-13
class VD implements ArrayInterface {
	/**
	 * 2015-11-13
	 * @override
	 * @see \Magento\Framework\Option\ArrayInterface::toOptionArray()
	 * @return array(array(string => string))
	 */
	function toOptionArray() {return df_map_to_options_t([
		'Visible'
		,self::$TANGIBLE => 'Visible for tangible products'
		,self::$NONE => 'Hidden'
	]);}

	/**
	 * 2015-12-25
	 * @param Product $product
	 * @param string|null $visibility
	 * @return string
	 */
	static function needHideFor(Product $product, $visibility) {return
		self::$NONE === $visibility || (self::$TANGIBLE === $visibility && !df_tangible($product))
	;}

	/** @var string */
	private static $TANGIBLE = 'tangible';
	/** @var string */
	private static $NONE = 'none';
}
