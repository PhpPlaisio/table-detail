<?php

namespace SetBased\Abc\Table\TableRow;

use SetBased\Abc\Table\DetailTable;

/**
 * Table row in a detail table with a date and time.
 */
class DateTimeTableRow
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * The default format of the date-time if the format specifier is omitted in the constructor.
   *
   * @var string
   */
  public static $defaultFormat = 'd-m-Y H:i:s';

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Adds a row with a datetime value to a detail table.
   *
   * @param DetailTable     $table  The detail table.
   * @param string|int|null $header The header text of this table row.
   * @param string|null     $value  The datetime in Y-m-d H:i:s format.
   * @param string|null     $format The format specifier for formatting the content of this table column. If null
   *                                the default format is used.
   */
  public static function addRow(DetailTable $table, $header, ?string $value, ?string $format = null): void
  {
    $date = \DateTime::createFromFormat('Y-m-d H:i:s', $value);

    if ($date)
    {
      // The $value is a valid datetime.      
      $table->addRow($header,
                     ['class'      => 'date',
                      'data-value' => $date->format('Y-m-d H:i:s')],
                     $date->format(($format) ? $format : self::$defaultFormat));
    }
    else
    {
      // The $value is not a valid datetime.
      $table->addRow($header, [], $value);
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
