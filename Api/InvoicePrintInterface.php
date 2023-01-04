<?php

namespace SteveB27\PrintInvoice\Api;

use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Interface InvoicePrintInterface
 *
 * @api
 */
interface InvoicePrintInterface
{
    /**
     * Return a filtered invoice.
     *
     * @param int $id
     * @return ResponseItemInterface
     * @throws NoSuchEntityException
     */
    public function get(int $id);
}
