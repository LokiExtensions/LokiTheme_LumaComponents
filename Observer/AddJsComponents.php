<?php declare(strict_types=1);

namespace Loki\Theme\Observer;

use Loki\Theme\Config\ThemeConfig;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class AddJsComponents implements ObserverInterface
{
    public function __construct(
        private readonly ThemeConfig $themeConfig,
        private array $componentDefinitions = []
    ) {
    }

    public function execute(Observer $observer): void
    {
        if (false === $this->themeConfig->modifyCurrentTheme()) {
            return;
        }

        $transport = $observer->getEvent()->getTransport();
        $block = $observer->getEvent()->getBlock();
        $html = (string)$transport->getHtml();
        $html = trim($html);
        if (empty($html)) {
            return;
        }

        foreach ($this->componentDefinitions as $blockName => $componentName) {
            if (false === $componentName) {
                continue;
            }

            if ($blockName === $block->getNameInLayout()) {
                $html = $this->addComponentNameToHtml($html, $componentName);
            }
        }

        $transport->setHtml($html);
    }

    private function addComponentNameToHtml(
        string $html,
        string $componentName,
    ): string {
        $additional = 'data-js-component="'.$componentName.'"';

        return preg_replace('/^<([a-z]+)/msi', '<\1 '.$additional, $html);
    }
}
