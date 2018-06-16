<?php

namespace SetBased\Abc\Table\TableRow;

use SetBased\Abc\Table\DetailTable;

/**
 * Table row in a detail table with a date.
 */
class DateTableRow
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * The default format of the date if the format specifier is omitted in the constructor.
   *
   * @var string
   */
  public static $defaultFormat = 'd-m-Y';

  /**
   * Many (database) systems use a certain value for empty dates or open end dates. Such a value must be shown as an
   * empty table cell.
   *
   * @var string
   */
  public static $openDate = '9999-12-31';

  //--------------------------------------------------------------------------------------------------------------------

  /**
   * Adds a row with a date value to a detail table.
   *
   * @param DetailTable $table  The detail table.
   * @param int|string  $header The row header text or word ID.
   * @param string|null $value  The date in YYYY-MM-DD format.
   * @param string|null $format The format specifier for formatting the content of this table column. If null the
   *                            default format is used.
   */
  public static function addRow(DetailTable $table, $header, ?string $value, ?string $format = null): void
  {
    if ($value!==null && $value!=self::$openDate)
    {
      $date = \DateTime::createFromFormat('Y-m-d', $value);

      if ($date)
      {
        // The $value is a valid date.
        $table->addRow($header,
                       ['class'      => 'date',
                        'data-value' => $date->format('Y-m-d')],
                       $date->format(($format) ? $format : self::$defaultFormat));
      }
      else
      {
        // The $value is not a valid date.
        $table->addRow($header, [], $value);
      }
    }
    else
    {
      $table->addRow($header);
    }
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
