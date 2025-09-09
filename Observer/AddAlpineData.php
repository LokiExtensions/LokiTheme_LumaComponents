<?php declare(strict_types=1);

namespace Loki\Theme\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\View\Element\AbstractBlock;

class AddAlpineData implements ObserverInterface
{
    public function __construct(
        private $componentDefinitions = [
            'product.info.details' => 'LumaTabs',
            'form.subscribe' => 'LumaFormSubscribe',
            'messages' => 'LumaMessages',
        ]
    ) {
    }

    public function execute(Observer $observer): void
    {
        $transport = $observer->getEvent()->getTransport();
        $block = $observer->getEvent()->getBlock();
        $html = (string)$transport->getHtml();
        $html = trim($html);
        if (empty($html)) {
            return;
        }

        foreach ($this->componentDefinitions as $blockName => $componentName) {
            if ($blockName === $block->getNameInLayout()) {
                $html = $this->addComponentNameToHtml($html, $componentName, $block);
            }
        }

        $html = "<!-- TEMPLATE: ".$block->getTemplateFile()." -->\n".$html;
        $html = "<!-- BLOCK: ".$block->getNameInLayout()." -->\n".$html;

        $transport->setHtml($html);
    }

    private function addComponentNameToHtml(string $html, string $componentName, AbstractBlock $block): string
    {
        $additional = '';
        $additional .= ' x-data="'.$componentName.'"';

        // @todo: Only when in dev mode
        $blockName = str_replace('.', '-', $block->getNameInLayout());
        $additional .= ' x-title="'.$blockName.'"';

        return preg_replace('/^<([a-z]+)/msi', '<\1 '.$additional, $html);
    }
}
