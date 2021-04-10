<?php
declare(strict_types=1);

namespace Plaisio\Table\TableRow;

use Plaisio\Table\DetailTable;
use SetBased\Helper\Cast;

/**
 * Table row in a detail table with an integer.
 */
class IntegerTableRow
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Adds a row with an integer value to a detail table.
   *
   * @param DetailTable     $table  The detail table.
   * @param string|int|null $header The header text of this table row.
   * @param int|null        $value  The integer value.
   */
  public static function addRow(DetailTable $table, $header, ?int $value): void
  {
    $table->addRow($header,
                   ['class' => $table->renderWalker->getClasses(['cell', 'integer'])],
                   Cast::toOptString($value));
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
