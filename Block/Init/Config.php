<?php

namespace CarlosReynosa\OsanoCookieConsent\Block\Init;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Serialize\Serializer\Json;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class Config implements ArgumentInterface
{
    protected $scopeConfig;
    protected $jsonSerializer;

    /**
     * Config constructor.
     * @param ScopeConfigInterface $scopeConfig
     * @param Json $jsonSerializer
     * TODO: Check jsonSerializer dependency
     */
    public function __construct(ScopeConfigInterface $scopeConfig, Json $jsonSerializer)
    {
        $this->scopeConfig=$scopeConfig;
        $this->jsonSerializer =$jsonSerializer;
    }

    /**
     * Return the plugin configuration.
     *
     * @return array js plugin inti configuration
     */
    public function getConfig()
    {
        return $this->scopeConfig->getValue('carlos_reynosa')['osano_cookie_consent'];
    }

    /**
     * Return the plugin init configuration as json.
     *
     * @return bool|false|string
     */
    public function getConfigJson()
    {
        return $this->jsonSerializer->serialize($this->getConfig());
    }
}
