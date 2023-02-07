<?php
declare(strict_types=1);

namespace Plaisio\Table\TableRow;

use Plaisio\Table\DetailTable;

/**
 * Table row in a detail table with an IPv4 or IPv6 address.
 */
class IpTableRow
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Adds a row with a IPv4 value to a detail table.
   *
   * @param DetailTable     $table  The detail table.
   * @param int|string|null $header The header text of this table row.
   * @param int|string|null $ip     The IPv4 or IPv6 address.
   */
  public static function addRow(DetailTable $table, int|string|null $header, int|string|null $ip): void
  {
    if ($ip===null || $ip==='')
    {
      $data = null;
      $text = null;
    }
    else
    {
      if (is_int($ip))
      {
        $text = long2ip($ip);
        $data = bin2hex(inet_pton('::ffff:'.$text));
      }
      else
      {
        switch (true)
        {
          case strlen($ip)===4:
            $text = inet_ntop($ip);
            $data = '00000000000000000000ffff'.bin2hex($ip);
            break;

          case strlen($ip)===16:
            $text = inet_ntop($ip);
            $data = bin2hex($ip);
            if (substr($data, -12, 4)==='ffff')
            {
              $text = substr(strrchr($text, ':'), 1);
            }
            break;

          case preg_match('/^((25[0-5]|(2[0-4]|1\d|[1-9]|)\d)\.?\b){4}$/', $ip)===1:
            $text = $ip;
            $data = '00000000000000000000ffff'.bin2hex(inet_pton($ip));
            break;

          default:
            $bin = inet_pton($ip);
            if ($bin!==false)
            {
              $text = inet_ntop($bin);
              $data = bin2hex($bin);
              if (substr($data, -12, 4)==='ffff')
              {
                $text = substr(strrchr($text, ':'), 1);
              }
            }
            else
            {
              $text = $ip;
              $data = null;
            }
        }
      }
    }

    $table->addRow($header,
                   ['class'      => $table->renderWalker->getClasses(['cell', 'cell-ip']),
                    'data-value' => $data],
                   $text);
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
