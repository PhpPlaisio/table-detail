<?php
//----------------------------------------------------------------------------------------------------------------------
namespace SetBased\Abc\Table;

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
  protected $row;

  //--------------------------------------------------------------------------------------------------------------------
  /**
   * Adds a row to this table.
   *
   * @param string $row An HTML snippet with a table row.
   */
  public function addRow($row)
  {
    $this->row .= $row;
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
    $ret .= $this->row;
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
