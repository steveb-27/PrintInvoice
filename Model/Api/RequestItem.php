<?php

namespace SteveB27\PrintInvoice\Model\Api;

use SteveB27\PrintInvoice\Api\RequestItemInterface;
use Magento\Framework\DataObject;

/**
 * Class RequestItem
 */
class RequestItem extends DataObject implements RequestItemInterface
{
    /**
     * @return int
     */
    public function getId()
    {
        return $this->_getData(self::DATA_ID);
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id)
    {
        return $this->setData(self::DATA_ID, $id);
    }
}
