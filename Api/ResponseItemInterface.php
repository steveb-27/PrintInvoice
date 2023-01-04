<?php

namespace SteveB27\PrintInvoice\Api;

/**
 * Interface ResponseItemInterface
 *
 * @api
 */
interface ResponseItemInterface
{
    const DATA_ID = 'id';

    const DATA_PDF = 'pdf';

    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getPdf();

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id);

    /**
     * @param string $pdf
     * @return $this
     */
    public function setPdf(string $pdf);
}
