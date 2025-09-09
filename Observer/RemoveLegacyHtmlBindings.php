<?php declare(strict_types=1);

namespace Loki\Theme\Observer;

use Loki\Theme\Config\ThemeConfig;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class RemoveLegacyHtmlBindings implements ObserverInterface
{
    public function __construct(
        private readonly ThemeConfig $themeConfig,
        private array $patterns = [],
    ) {
    }

    public function execute(Observer $observer): void
    {
        if (false === $this->themeConfig->modifyCurrentTheme()) {
            return;
        }

        $transport = $observer->getEvent()->getTransport();
        $html = $transport->getHtml();
        if (empty($html)) {
            return;
        }

        foreach ($this->patterns as $pattern) {
            $html = $this->removePattern($pattern, $html);
        }

        $transport->setHtml($html);
    }

    private function removePattern(string $pattern, string $html): string
    {
        if (false === preg_match_all($pattern, $html, $matches)) {
            return $html;
        }

        foreach ($matches[0] as $match) {
            $html = str_replace($match, '', $html);
        }

        return $html;
    }
}
