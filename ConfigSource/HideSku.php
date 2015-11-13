<?php
namespace Dfe\FrontendTweaks\ConfigSource;
use Magento\Framework\Option\ArrayInterface;
class HideSku implements ArrayInterface {
	/**
	 * 2015-11-13
	 * @override
	 * @see \Magento\Framework\Option\ArrayInterface::toOptionArray()
	 * @return array(array(string => string))
	 */
	public function toOptionArray() {
		return df_map_to_options_t([
			'No'
			, self::FOR_VIRTUAL_AND_DOWNLOADABLE => 'for Virtual and Downloadable Products'
			, self::FOR_ALL => 'for All Products'
		]);
	}

	const FOR_ALL = 'all';
	const FOR_VIRTUAL_AND_DOWNLOADABLE = 'for_virtual_and_downloadable';
}
