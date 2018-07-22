<?php
/**
 * @author Amasty Team
 * @copyright Copyright (c) 2015 Amasty (http://www.amasty.com)
 * @package Amasty_HelloWorld
 */
namespace Amasty\HelloWorld\Block\Catalog\Product;

class HelloWorld extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Amasty\HelloWorld\Helper\Data
     */
    protected $_helper;

    protected $_storeManager;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = [],
        \Amasty\HelloWorld\Helper\Data $helper,
        \Magento\Store\Model\StoreManagerInterface $storeManager
    ) {
        parent::__construct($context, $data);

        $this->_helper
            = $helper;
        $this->_storeManager = $storeManager;
    }

    public function getBlockLabel() 
    {
        if (empty($this->_helper->getBlockLabel())) {
            $path = 'wysiwyg/collection/collection-performance.jpg';
        } else {
            $folderName = 'amasty_helloworld/block_label';
            $imgName    = $this->_helper->getBlockLabel();
            $path       = $folderName . '/' . $imgName;
        }

        return $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA) . $path;
    }

    public function getTextAlign() 
    {
        $position = $this->_helper->getTextAlign();
        $style    = "";

        if ($position == "center") {
            $style = "margin: 0 auto;";
        } elseif ($position == "right") {
            $style = "margin-left: auto;";
        }
        return $style;
    }

    protected function _toHtml()
    {
       if ($this->_helper->getEnable()){
            return parent::_toHtml();
       }
        else {
            return '';
        }
    }

}
