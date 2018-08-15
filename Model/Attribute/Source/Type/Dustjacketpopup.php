<?php

/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Mangoit\MediaclipHub\Model\Attribute\Source\Type;

class Dustjacketpopup extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    /**
     * Get all options
     * @return array
     */
    public function getAllOptions()
    {
 //die('ghjg');
        if (!$this->_options) {
            $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
            $helper = $objectManager->create('Mangoit\MediaclipHub\Helper\Data');
            $this->_options = $helper->getDustjacketpopup();
        }
        return $this->_options;
    }
}
