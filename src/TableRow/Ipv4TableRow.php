<?php
declare(strict_types=1);

namespace Plaisio\Table\TableRow;

use Plaisio\Table\DetailTable;

/**
 * Table row in a detail table with an IPv4 address.
 */
class Ipv4TableRow
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Adds a row with a IPv4 value to a detail table.
   *
   * @param DetailTable     $table      The detail table.
   * @param string|int|null $header     The header text of this table row.
   * @param string|null     $ip4Address The IPv4 address.
   */
  public static function addRow(DetailTable $table, $header, ?string $ip4Address): void
  {
    $table->addRow($header, ['class' => $table->renderWalker->getClasses('ipv4')], $ip4Address);
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
