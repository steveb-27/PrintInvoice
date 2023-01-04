<?php

namespace SteveB27\PrintInvoice\Api;

/**
 * Interface RequestItemInterface
 *
 * @api
 */
interface RequestItemInterface
{
   const DATA_ID = 'id';

   /**
    * @return int
    */
   public function getId();

   /**
    * @param int $id
    * @return $this
    */
   public function setId(int $id);
}
