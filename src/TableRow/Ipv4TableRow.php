<?php

namespace SetBased\Abc\Table\TableRow;

use SetBased\Abc\Table\DetailTable;

/**
 * Table row in a detail table with an IPv4 address.
 */
class Ipv4TableRow
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Adds a row with a IPv4 value to a detail table.
   *
   * @param DetailTable $table      The detail table.
   * @param int|string  $header     The row header text or word ID.
   * @param string|null $ip4Address The IPv4 address.
   */
  public static function addRow(DetailTable $table, $header, ?string $ip4Address): void
  {
    if ($ip4Address!==null && $ip4Address!=='')
    {
      $table->addRow($header, ['class' => 'ipv4'], $ip4Address);
    }
    else
    {
      $table->addRow($header);
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
