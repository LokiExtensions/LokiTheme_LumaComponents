<?php declare(strict_types=1);

namespace Loki\Theme\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class RemoveLegacyHtmlBindings implements ObserverInterface
{
    public function __construct(
        private array $patterns = [
            'x-magento-init' => '/<script\b[^>]*type=(["\'])text\/x-magento-init\1[^>]*>[\s\S]*?<\/script>/i',
            'require.config' => '/<script\b[^>]*>[\s\S]*?require\.config\([\s\S]*?<\/script>/i',
            'require' => '/<script\b[^>]*>[\s\S]*?require\([\s\S]*?<\/script>/i',
            'data-bind' => '/\s*data-bind\s*=\s*"[^"]*"/i',
            'data-mage-init' => '/\s*data-mage-init\s*=\s*\'[^\']*\'/i',
            'knockout-comments' => '/<!--\s*\/?ko[\s\S]*?-->/i',
        ],
    ) {
    }

    public function execute(Observer $observer): void
    {
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
