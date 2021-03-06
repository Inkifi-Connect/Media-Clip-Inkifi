<?php
/**
 * Copyright © 2015 Mangoit. All rights reserved.
 */

namespace Mangoit\MediaclipHub\Model;

use Magento\Framework\Exception\ModulesException;

/**
 * Modulestab modules model
 */
class Supplier extends \Magento\Framework\Model\AbstractModel
{

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Model\ResourceModel\AbstractResource $resource
     * @param \Magento\Framework\Data\Collection\Db $resourceCollection
     * @param array $data
     */
    function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * @return void
     */
    function _construct()
    {
        $this->_init('Mangoit\MediaclipHub\Model\ResourceModel\Supplier');
    }
}
