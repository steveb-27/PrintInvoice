<?php

namespace SteveB27\PrintInvoice\Model\Api;

use SteveB27\PrintInvoice\Api\InvoicePrintInterface;
use SteveB27\PrintInvoice\Api\RequestItemInterfaceFactory;
use SteveB27\PrintInvoice\Api\ResponseItemInterfaceFactory;
use Magento\Sales\Model\Order\Pdf\Invoice as InvoicePrinter;
use Magento\Sales\Model\Order\InvoiceFactory;
use Magento\Store\Model\StoreManagerInterface;

/**
 * Class ProductRepository
 */
class InvoicePrint implements InvoicePrintInterface
{
    /**
     * @var \SteveB27\PrintInvoice\Api\RequestItemInterfaceFactory
     */
    private $requestItemFactory;

    /**
     * @var \SteveB27\PrintInvoice\Api\ResponseItemInterfaceFactory
     */
    private $responseItemFactory;

    /**
     * @var InvoiceFactory
     */
    private $invoiceFactory;

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    private $storeManager;

    /**
     * @var InvoicePrinter
     */
    private $invoicePrinter;

    /**
     * @param RequestItemInterfaceFactory $requestItemFactory
     * @param ResponseItemInterfaceFactory $responseItemFactory
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        RequestItemInterfaceFactory $requestItemFactory,
        ResponseItemInterfaceFactory $responseItemFactory,
        InvoiceFactory $invoiceFactory,
        StoreManagerInterface $storeManager,
        InvoicePrinter $invoicePrinter
    ) {
        $this->requestItemFactory = $requestItemFactory;
        $this->responseItemFactory = $responseItemFactory;
        $this->invoiceFactory = $invoiceFactory;
        $this->storeManager = $storeManager;
        $this->invoicePrinter = $invoicePrinter;
    }

    /**
     * {@inheritDoc}
     *
     * @param int $id
     * @return \SteveB27\PrintInvoice\Api\ResponseItemInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function get(int $id)
    {
        $pdf = $this->invoicePrinter
            ->getPdf(array($this->getInvoice($id)))
            ->render();

        /** @var \SteveB27\PrintInvoice\Api\ResponseItemInterface $responseItem */
        $responseItem = $this->responseItemFactory->create();

        $responseItem->setId($id)
            ->setPdf(base64_encode($pdf));

        return $responseItem;
    }

    /**
     * @param int $id
     * @return \Magento\Sales\Model\Order\Invoice\
     */
    private function getInvoice(int $id)
    {
        $invoice = $this->invoiceFactory->create();
        $invoice->load($id);

        return $invoice;
    }
}
