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

    public function getLogo() 
    {
        if (empty($this->_helper->getLogo())) {
            $path = 'wysiwyg/collection/collection-performance.jpg';
        } else {
            $folderName = 'amasty_helloworld/logo';
            $imgName    = $this->_helper->getLogo();
            $path       = $folderName . '/' . $imgName;
        }

        return $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA) . $path;
    }

}
