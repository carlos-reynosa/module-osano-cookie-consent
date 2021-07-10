<?php

namespace CarlosReynosa\OsanoCookieConsent\Block\Init;

use Magento\Framework\View\Element\Block\ArgumentInterface;

/**
 * Class reading system configuration for the cookie consent plugin
 * and transforming it into a format understood by the plugin.
 * @package CarlosReynosa\OsanoCookieConsent\Block\Init
 */
class Config implements ArgumentInterface
{
    protected $scopeConfig;
    protected $jsonSerializer;
    protected $helperData;

    /**
     * Config constructor.
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     * @param \Magento\Framework\Serialize\Serializer\Json $jsonSerializer
     * @param \CarlosReynosa\OsanoCookieConsent\Helper\Data $helperData
     * TODO: Check jsonSerializer dependency
     */
    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Framework\Serialize\Serializer\Json $jsonSerializer,
        \CarlosReynosa\OsanoCookieConsent\Helper\Data $helperData
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->jsonSerializer = $jsonSerializer;
        $this->helperData = $helperData;
    }

    /**
     * Return the plugin init configuration as json.
     *
     * @return bool|false|string
     */
    public function getConfigJson()
    {
        $initConfig = $this->systemConfigToInitConfig();
        return $this->jsonSerializer->serialize($initConfig);
    }

    /**
     * Convert system config values into array structure that can be easily turned into the js plugin init configuration
     *
     * @return array
     * @see https://www.osano.com/cookieconsent/documentation/javascript-api/
     */
    protected function systemConfigToInitConfig()
    {
        return [
            'palette' => [
                'popup' => [
                    'background' => $this->helperData->getAppearanceConfig('popup_background')
                ],
                'button' => [
                    'background' => $this->helperData->getAppearanceConfig('popup_button_background')
                ]
            ],
            'position' => $this->helperData->getAppearanceConfig('position'),
            'theme' => $this->helperData->getAppearanceConfig('theme'),
            'revokable' => $this->helperData->getGeneralConfig('revokable'),
            'type' => $this->helperData->getGeneralConfig('type'),
            'secure' => $this->helperData->getGeneralConfig('secure'),
            'content' => [
                'header'  => __('We use cookies to make your experience better.'),
                'message' => __(
                    'To comply with the new e-Privacy directive, we need to ask for your consent to set the cookies.'
                ),
                'dismiss' => __('Got it!'),
                'allow'   => __('Allow Cookies'),
                'deny'    => __('Deny'),
                'link'    => __('Learn more'),
                'href'    => $this->helperData->getGeneralConfig('href'),
                'policy'  => __('Privacy and Cookie Policy'),
                'target'  => '_blank'
            ]
        ];
    }
}
