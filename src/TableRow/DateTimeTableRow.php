<?php
//----------------------------------------------------------------------------------------------------------------------
namespace SetBased\Abc\Table\TableRow;

use SetBased\Abc\Helper\Html;
use SetBased\Abc\Table\DetailTable;

//----------------------------------------------------------------------------------------------------------------------
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
   * @param DetailTable $table  The detail table.
   * @param int|string  $header The row header text or word ID.
   * @param string      $value  The datetime in Y-m-d H:i:s format.
   * @param string|null $format The format specifier for formatting the content of this table column. If null
   *                            the default format is used.
   */
  public static function addRow($table, $header, $value, $format = null)
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
