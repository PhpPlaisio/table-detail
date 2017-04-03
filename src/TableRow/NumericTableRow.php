<?php
//----------------------------------------------------------------------------------------------------------------------
namespace SetBased\Abc\Table\TableRow;

use SetBased\Abc\Table\DetailTable;

//----------------------------------------------------------------------------------------------------------------------
/**
 * Table row in a detail table with a number.
 */
class NumericTableRow
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Adds a row with a numeric value to a detail table.
   *
   * @param DetailTable $table  The detail table.
   * @param int|string  $header The row header text or word ID.
   * @param string      $value  The text.
   * @param string      $format The formatting string (see sprintf).
   */
  public static function addRow($table, $header, $value, $format)
  {
    if ($value!==null && $value!==false && $value!=='')
    {
      $table->addRow($header, ['class' => 'number'], sprintf($format, $value));
    }
    else
    {
      $table->addRow($header);
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
