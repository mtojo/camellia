<?php

/**
 * Camellia - Pure PHP character encoding conversion library
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public License
 * as published by the Free Software Foundation; either version 2.1
 * of the License, or (at your option) any later version.
 *
 * @copyright Copyright (c) 2006 Masaki Tojo
 * @license http://opensource.org/licenses/lgpl-license.php GNU Lesser General Public License
 * @package Camellia
 * @subpackage Detector
 * @require PHP 4.0.0
 */

/**
 * Charset detector
 */
class Camellia_Detector
{

  /**
   * Detect charset
   *
   * @access public
   * @param string $string String
   * @param string $language A language for a hint of the detection
   * @return string on success; FALSE on failure
   * @static
   */
  function detect($string, $language = 'General')
  {
    switch ($language)
    {
    case 'General':
      return Camellia_Detector::_detectGeneral($string);
    case 'Japanese':
      return Camellia_Detector::_detectJapanese($string);
    default:
      return FALSE;
    }
  }

  /**
   * @ignore
   */
  function _detectGeneral($string)
  {
    if (preg_match('/^[\x09-\x0A\x0D\x20-\x7E]*$/', $string) > 0)
    {
      return 'us-ascii';
    }

    if ((strpos($string, CAMELLIA_UTF32BE_BOM) === 0) || (strpos($string, CAMELLIA_UTF32LE_BOM) === 0))
    {
      return 'utf-32';
    }

    if ((strpos($string, CAMELLIA_UTF16BE_BOM) === 0) || (strpos($string, CAMELLIA_UTF16LE_BOM) === 0))
    {
      return 'utf-16';
    }

    if (strpos($string, CAMELLIA_UTF8_BOM) === 0)
    {
      return 'utf-8';
    }

    if (preg_match('/^(\x00[\x00-\x10][\x00-\xFF]{2})+$/', $string) > 0)
    {
      return 'utf-32be';
    }

    if (preg_match('/^([\x00-\xFF]{2}[\x00-\x10]\x00)+$/', $string) > 0)
    {
      return 'utf-32le';
    }

    if (preg_match('/^([\x00-\x7F]|[\xC0-\xDF][\x80-\xBF]|[\xE0-\xEF][\x80-\xBF]{2}|[\xF0-\xF7][\x80-\xBF]{3})+$/', $string) > 0)
    {
      return 'utf-8n';
    }

    return FALSE;
  }

  /**
   * @ignore
   */
  function _detectJapanese($string)
  {
    if (preg_match('/^[\x09-\x0A\x0D\x20-\x7E]*$/', $string) > 0)
    {
      return 'us-ascii';
    }

    if ((strpos($string, CAMELLIA_UTF32BE_BOM) === 0) || (strpos($string, CAMELLIA_UTF32LE_BOM) === 0))
    {
      return 'utf-32';
    }

    if ((strpos($string, CAMELLIA_UTF16BE_BOM) === 0) || (strpos($string, CAMELLIA_UTF16LE_BOM) === 0))
    {
      return 'utf-16';
    }

    if (strpos($string, CAMELLIA_UTF8_BOM) === 0)
    {
      return 'utf-8';
    }

    if (preg_match('/^(\x00[\x00-\x10][\x00-\xFF]{2})+$/', $string) > 0)
    {
      return 'utf-32be';
    }

    if (preg_match('/^([\x00-\xFF]{2}[\x00-\x10]\x00)+$/', $string) > 0)
    {
      return 'utf-32le';
    }

    if ((strpos($string, "\x1B") !== FALSE) && (preg_match('/^[\x00-\x7F]+$/', $string) > 0))
    {
      return 'iso-2022-jp';
    }

    if (preg_match('/^([\x09-\x0A\x0D\x20-\x7E]|[\xA1-\xFE]{2}|\x8E[\xA1-\xDF])+$/', $string) > 0)
    {
      return 'euc-jp';
    }

    if (preg_match('/^([\x09-\x0A\x0D\x20-\x7E]|[\x81-\x84\x88-\x9F\xE0-\xEA][\x40-\x7E\x80-\xFC]|[\xA1-\xDF])+$/', $string) > 0)
    {
      return 'shift_jis';
    }

    if (preg_match('/^([\x09-\x0A\x0D\x20-\x7E]|[\x81-\x84\x87-\x9F\xE0-\xEE\xFA-\xFC][\x40-\x7E\x80-\xFC]|[\xA1-\xDF])+$/', $string) > 0)
    {
      return 'windows-31j';
    }

    if (preg_match('/^([\x00-\x7F]|[\xC0-\xDF][\x80-\xBF]|[\xE0-\xEF][\x80-\xBF]{2}|[\xF0-\xF7][\x80-\xBF]{3})+$/', $string) > 0)
    {
      return 'utf-8n';
    }

    return FALSE;
  }

}
