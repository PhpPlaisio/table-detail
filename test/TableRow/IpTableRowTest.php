<?php
declare(strict_types=1);

namespace Plaisio\Table\Test\TableRow;

use PHPUnit\Framework\TestCase;
use Plaisio\Table\DetailTable;
use Plaisio\Table\TableRow\IpTableRow;

/**
 * Test cases for table row IpTableRow.
 */
class IpTableRowTest extends TestCase
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with an empty IP address.
   */
  public function testEmptyIpAddress1()
  {
    $table = new DetailTable();
    IpTableRow::addRow($table, 'EmptyIpAddress', null);
    $html = $table->htmlTable();

    self::assertStringContainsString('<td class="dt-cell dt-ip"></td>', $html);
    self::assertStringContainsString('<th class="dt-header">EmptyIpAddress</th>', $html);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with an empty IP address.
   */
  public function testEmptyIpAddress2()
  {
    $table = new DetailTable();
    IpTableRow::addRow($table, 'EmptyIpAddress', '');
    $html = $table->htmlTable();

    self::assertStringContainsString('<td class="dt-cell dt-ip"></td>', $html);
    self::assertStringContainsString('<th class="dt-header">EmptyIpAddress</th>', $html);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with an invalid date.
   */
  public function testInvalidIpAddress1()
  {
    $table = new DetailTable();
    IpTableRow::addRow($table, 'InvalidIp1', 'not an IP address');
    $html = $table->htmlTable();

    self::assertStringContainsString('<td class="dt-cell dt-ip">not an IP address</td>', $html);
    self::assertStringContainsString('<th class="dt-header">InvalidIp1</th>', $html);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with a valid IPv4 address as binary(4).
   */
  public function testValidIpAddress1()
  {
    $table = new DetailTable();
    IpTableRow::addRow($table, 'ValidIp1', inet_pton('127.0.0.1'));
    $html = $table->htmlTable();

    self::assertStringContainsString('<td class="dt-cell dt-ip" data-value="00000000000000000000ffff7f000001">127.0.0.1</td>', $html);
    self::assertStringContainsString('<th class="dt-header">ValidIp1</th>', $html);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with a valid IPv6 address as binary(16).
   */
  public function testValidIpAddress1s3()
  {
    $table = new DetailTable();
    IpTableRow::addRow($table, 'ValidIp1', inet_pton('fe80::8000:777a:8a39:80bd'));
    $html = $table->htmlTable();

    self::assertStringContainsString('<td class="dt-cell dt-ip" data-value="fe800000000000008000777a8a3980bd">fe80::8000:777a:8a39:80bd</td>', $html);
    self::assertStringContainsString('<th class="dt-header">ValidIp1</th>', $html);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with a valid IPv4 address as int.
   */
  public function testValidIpAddress2()
  {
    $table = new DetailTable();
    IpTableRow::addRow($table, 'ValidIp1', 127 * 256 * 256 * 256 + 1);
    $html = $table->htmlTable();

    self::assertStringContainsString('<td class="dt-cell dt-ip" data-value="00000000000000000000ffff7f000001">127.0.0.1</td>', $html);
    self::assertStringContainsString('<th class="dt-header">ValidIp1</th>', $html);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with a valid IPv4 address as string.
   */
  public function testValidIpAddress3()
  {
    $table = new DetailTable();
    IpTableRow::addRow($table, 'ValidIp1', '127.0.0.1');
    $html = $table->htmlTable();

    self::assertStringContainsString('<td class="dt-cell dt-ip" data-value="00000000000000000000ffff7f000001">127.0.0.1</td>', $html);
    self::assertStringContainsString('<th class="dt-header">ValidIp1</th>', $html);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with a valid IPv4 address as string in IPv6 notation.
   */
  public function testValidIpAddress4()
  {
    $table = new DetailTable();
    IpTableRow::addRow($table, 'ValidIp1', '::ffff:7f00:1');
    $html = $table->htmlTable();

    self::assertStringContainsString('<td class="dt-cell dt-ip" data-value="00000000000000000000ffff7f000001">127.0.0.1</td>', $html);
    self::assertStringContainsString('<th class="dt-header">ValidIp1</th>', $html);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with a valid IPv4 address as binary(16)
   */
  public function testValidIpAddress5()
  {
    $table = new DetailTable();
    IpTableRow::addRow($table, 'ValidIp1', inet_pton('::ffff:7f00:1'));
    $html = $table->htmlTable();

    self::assertStringContainsString('<td class="dt-cell dt-ip" data-value="00000000000000000000ffff7f000001">127.0.0.1</td>', $html);
    self::assertStringContainsString('<th class="dt-header">ValidIp1</th>', $html);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with a valid IPv6 address as string.
   */
  public function testValidIpAddress6()
  {
    $table = new DetailTable();
    IpTableRow::addRow($table, 'ValidIp1', 'fe80::8000:777a:8a39:80bd');
    $html = $table->htmlTable();

    self::assertStringContainsString('<td class="dt-cell dt-ip" data-value="fe800000000000008000777a8a3980bd">fe80::8000:777a:8a39:80bd</td>', $html);
    self::assertStringContainsString('<th class="dt-header">ValidIp1</th>', $html);
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
