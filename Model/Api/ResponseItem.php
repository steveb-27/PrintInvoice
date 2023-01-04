<?php

namespace SteveB27\PrintInvoice\Model\Api;

use SteveB27\PrintInvoice\Api\ResponseItemInterface;
use Magento\Framework\DataObject;

/**
 * Class ResponseItem
 */
class ResponseItem extends DataObject implements ResponseItemInterface
{
    /**
     * @return int
     */
    public function getId()
    {
        return $this->_getData(self::DATA_ID);
    }

    public function getPdf()
    {
        return $this->_getData(self::DATA_PDF);
    }

    public function setId(int $id)
    {
        return $this->setData(self::DATA_ID, $id);
    }

    public function setPdf(string $pdf)
    {
        return $this->setData(self::DATA_PDF, $pdf);
    }
}
