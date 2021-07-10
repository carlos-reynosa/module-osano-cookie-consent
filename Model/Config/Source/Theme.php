<?php

namespace CarlosReynosa\OsanoCookieConsent\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;

/**
 * Class Theme
 * @package CarlosReynosa\OsanoCookieConsent\Model\Config\Source
 */
class Theme implements OptionSourceInterface
{
    /**
     * @return array
     */
    public function toOptionArray() : array
    {
        return [
            ['value' => 'block', 'label' => __('Block')],
            ['value' => 'edgeless', 'label' => __('Edgeless')],
            ['value' => 'classic', 'label' => __('Classic')]
        ];
    }
}