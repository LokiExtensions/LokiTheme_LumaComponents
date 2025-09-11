<?php
declare(strict_types=1);

namespace Loki\Theme\ViewModel;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Store\Model\ScopeInterface;

class CookieConfig implements ArgumentInterface
{
    public function __construct(
        private readonly ScopeConfigInterface $scopeConfig,
    ) {
    }

    public function getLifetime(): int
    {
        return (int)$this->get('web/cookie/cookie_lifetime');
    }

    public function getPath(): string
    {
        return (string)$this->get('web/cookie/cookie_path');
    }

    public function getDomain(): string
    {
        return (string)$this->get('web/cookie/cookie_domain');
    }

    public function isHttpOnly(): int
    {
        return (int)$this->get('web/cookie/cookie_httponly');
    }

    public function getSameSite(): string
    {
        return 'Strict'; // @todo Strict, Lax or None
    }
    private function get(string $path): mixed
    {
        return $this->scopeConfig->getValue($path, ScopeInterface::SCOPE_STORE);
    }
}
