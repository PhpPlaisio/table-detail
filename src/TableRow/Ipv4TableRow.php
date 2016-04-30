<?php
//----------------------------------------------------------------------------------------------------------------------
namespace SetBased\Abc\Table\TableRow;

use SetBased\Abc\Helper\Html;
use SetBased\Abc\Table\DetailTable;

//----------------------------------------------------------------------------------------------------------------------
/**
 * Table row in a detail table with an IPv4 address.
 */
class Ipv4TableRow
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Adds a row with a IPv4 value to a detail table.
   *
   * @param DetailTable $table      The (detail) table.
   * @param string      $header     The row header text.
   * @param string      $ip4Address The IPv4 address.
   */
  public static function addRow($table, $header, $ip4Address)
  {
    $row = '<tr><th>';
    $row .= Html::txt2Html($header);
    $row .= '</th><td class="ipv4">';
    $row .= Html::txt2Html($ip4Address);
    $row .= '</td></tr>';

    $table->addRow($row);
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
