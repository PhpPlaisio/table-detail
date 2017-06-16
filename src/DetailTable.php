<?php
//----------------------------------------------------------------------------------------------------------------------
namespace SetBased\Abc\Table;

use SetBased\Abc\Babel\Babel;
use SetBased\Abc\Helper\Html;
use SetBased\Abc\HtmlElement;

//----------------------------------------------------------------------------------------------------------------------
/**
 * Class for generating tables with the details of an entity.
 */
class DetailTable extends HtmlElement
{
  //--------------------------------------------------------------------------------------------------------------------
  /**
   * The HTML snippet with all rows of this table.
   *
   * @var string
   */
  protected $rows;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the HTML code for the header of the row.
   *
   * @param int|string $header The header text of this table row. We distinguish 2 case:
   *                           <ul>
   *                           <li>string: the value is the header text of this table row,
   *                           <li>int: the value is a word ID to be resolved to a text using Babel.
   *                           </ul>
   *
   * Note: 14 is a word ID and '14' is a header text.
   *
   * @return string
   */
  protected static function getHtmlRowHeader($header)
  {
    $html = '<th>';
    $html .= (is_int($header)) ? Babel::getInstance()->getWord($header) : $header;
    $html .= '</th>';

    return $html;
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * @param int|string $header     The header text of this table row. We distinguish 2 case:
   *                               <ul>
   *                               <li>string: the value is the header text of this table row,
   *                               <li>int: the value is a word ID to be resolved to a text using Babel.
   *                               </ul>
   * @param array      $attributes The attributes of the data cell. Special characters in the attributes will be
   *                               replaced with HTML entities.
   * @param string     $innerText  The inner text of data cell.
   * @param bool       $isHtml     If true the inner text is a HTML snippet, otherwise special characters in the inner
   *                               text will be replaced with HTML entities.
   */
  public function addRow($header, $attributes = [], $innerText = '', $isHtml = false)
  {
    $row = '<tr>';
    $row .= self::getHtmlRowHeader($header);
    $row .= Html::generateElement('td', $attributes, $innerText, $isHtml);
    $row .= '</tr>';

    $this->addRowSnippet($row);
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Adds a row to this table.
   *
   * @param string $row An HTML snippet with a table row.
   */
  public function addRowSnippet($row)
  {
    $this->rows .= $row;
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the HTML code of this table.
   *
   * @return string
   */
  public function getHtmlTable()
  {
    $ret = $this->getHtmlPrefix();

    $ret .= Html::generateTag('table', $this->attributes);

    // Generate HTML code for the table header.
    $ret .= '<thead>';
    $ret .= $this->getHtmlHeader();
    $ret .= '</thead>';

    // Generate HTML code for the table header.
    $ret .= '<tfoot>';
    $ret .= $this->getHtmlFooter();
    $ret .= '</tfoot>';

    // Generate HTML code for the table body.
    $ret .= '<tbody>';
    $ret .= $this->rows;
    $ret .= '</tbody>';

    $ret .= '</table>';

    $ret .= $this->getHtmlPostfix();

    return $ret;
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the inner HTML code of the footer for this table.
   *
   * @return string
   */
  protected function getHtmlFooter()
  {
    return '';
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns the inner HTML code of the header for this table.
   *
   * @return string
   */
  protected function getHtmlHeader()
  {
    return '';
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns HTML code inserted before the HTML code of the table.
   *
   * @return string
   */
  protected function getHtmlPostfix()
  {
    return '';
  }

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Returns HTML code appended after the HTML code of the table.
   *
   * @return string
   */
  protected function getHtmlPrefix()
  {
    return '';
  }

  //--------------------------------------------------------------------------------------------------------------------
}

//----------------------------------------------------------------------------------------------------------------------
