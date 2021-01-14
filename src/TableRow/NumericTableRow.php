<?php
declare(strict_types=1);

namespace Plaisio\Table\TableRow;

use Plaisio\Table\DetailTable;

/**
 * Table row in a detail table with a number.
 */
class NumericTableRow
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Adds a row with a numeric value to a detail table.
   *
   * @param DetailTable     $table  The detail table.
   * @param string|int|null $header The header text of this table row.
   * @param string|null     $value  The value.
   * @param string          $format The formatting string (see sprintf).
   */
  public static function addRow(DetailTable $table, $header, ?string $value, string $format): void
  {
    if ($value!==null && $value!=='')
    {
      $table->addRow($header, ['class' => $table->renderWalker->getClasses('number')], sprintf($format, $value));
    }
    else
    {
      $table->addRow($header, ['class' => $table->renderWalker->getClasses()]);
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
