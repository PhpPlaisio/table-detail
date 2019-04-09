<?php
declare(strict_types=1);

namespace SetBased\Abc\Table\TableRow;

use SetBased\Abc\Helper\Cast;
use SetBased\Abc\Table\DetailTable;

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
    if ($value!==null && $value!=='')
    {
      $table->addRow($header, ['class' => 'integer'], Cast::toOptString($value));
    }
    else
    {
      $table->addRow($header);
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
