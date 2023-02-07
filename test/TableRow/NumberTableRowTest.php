<?php
declare(strict_types=1);

namespace Plaisio\Table\Test\TableRow;

use PHPUnit\Framework\TestCase;
use Plaisio\Table\DetailTable;
use Plaisio\Table\TableRow\NumberTableRow;

/**
 * Test cases for class NumberTableRow.
 */
class NumberTableRowTest extends TestCase
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with an empty value.
   */
  public function testEmptyValue1(): void
  {
    $table = new DetailTable();
    NumberTableRow::addRow($table, 'EmptyNumber1', null, '%f');
    $html = $table->htmlTable();

    self::assertStringContainsString('<td class="dt-cell dt-number"></td>', $html);
    self::assertStringContainsString('<th class="dt-header">EmptyNumber1</th>', $html);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with an empty value.
   */
  public function testEmptyValue2(): void
  {
    $table = new DetailTable();
    NumberTableRow::addRow($table, 'EmptyNumber2', '', '%f');
    $html = $table->htmlTable();

    self::assertStringContainsString('<td class="dt-cell dt-number"></td>', $html);
    self::assertStringContainsString('<th class="dt-header">EmptyNumber2</th>', $html);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with a none number value with HTML entities.
   */
  public function testHtmlEntitiesFormat(): void
  {
    $table = new DetailTable();
    NumberTableRow::addRow($table, 'Not A Number', "&<'\"%s\"'>&", '%f');
    $html = $table->htmlTable();

    self::assertStringContainsString('<td class="dt-cell dt-number">&amp;&lt;&#039;&quot;%s&quot;&#039;&gt;&amp;</td>', $html);
    self::assertStringContainsString('<th class="dt-header">Not A Number</th>', $html);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with a none number value.
   */
  public function testInvalidValue1(): void
  {
    $table = new DetailTable();
    NumberTableRow::addRow($table, 'InvalidValue1', 'qwerty', '%f');
    $html = $table->htmlTable();

    self::assertStringContainsString('<td class="dt-cell dt-number">qwerty</td>', $html);
    self::assertStringContainsString('<th class="dt-header">InvalidValue1</th>', $html);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with an integer.
   */
  public function testValidValue1(): void
  {
    $table = new DetailTable();
    NumberTableRow::addRow($table, 'ValidValue1', 123, '%d');
    $html = $table->htmlTable();

    self::assertStringContainsString('<td class="dt-cell dt-number">123</td>', $html);
    self::assertStringContainsString('<th class="dt-header">ValidValue1</th>', $html);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with a float.
   */
  public function testValidValue2(): void
  {
    $table = new DetailTable();
    NumberTableRow::addRow($table, 'ValidValue1', M_PI, '%.2f');
    $html = $table->htmlTable();

    self::assertStringContainsString('<td class="dt-cell dt-number">3.14</td>', $html);
    self::assertStringContainsString('<th class="dt-header">ValidValue1</th>', $html);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test rounding with a float.
   */
  public function testValidValue3(): void
  {
    $table = new DetailTable();
    NumberTableRow::addRow($table, 'ValidValue1', 1.005, '%.2f');
    $html = $table->htmlTable();

    self::assertStringContainsString('<td class="dt-cell dt-number">1.00</td>', $html);
    self::assertStringContainsString('<th class="dt-header">ValidValue1</th>', $html);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Test with a numeric string.
   */
  public function testValidValue4(): void
  {
    $table = new DetailTable();
    NumberTableRow::addRow($table, 'ValidValue1', '3.1415926535898', '%.2f');
    $html = $table->htmlTable();

    self::assertStringContainsString('<td class="dt-cell dt-number">3.14</td>', $html);
    self::assertStringContainsString('<th class="dt-header">ValidValue1</th>', $html);
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
