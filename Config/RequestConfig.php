<?php
declare(strict_types=1);

namespace LokiTheme\LumaComponents\Config;

use Magento\Framework\App\Request\Http as HttpRequest;

class RequestConfig
{
    public function __construct(
        private HttpRequest $httpRequest,
        private array $allowedRoutes = []
    ) {
    }

    public function allowRoute(): bool
    {
        if (in_array($this->getCurrentUri(), $this->allowedRoutes)) {
            return true;
        }

        return false;
    }

    private function getCurrentUri(): string
    {
        return implode('/', [
            $this->httpRequest->getRouteName(),
            $this->httpRequest->getControllerName(),
            $this->httpRequest->getActionName(),
        ]);
    }
}
