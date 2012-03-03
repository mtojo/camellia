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
 * @subpackage Converter
 * @require PHP 4.3.0
 */

/**
 * UCS table directory
 */
define('CAMELLIA_UCSTABLE_DIR', realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'ucstable' . DIRECTORY_SEPARATOR);

/**
 * Replacement Character
 */
define('CAMELLIA_REPLACEMENT_CHARACTER', 0xFFFD);

/**
 * UTF-8 BOM
 */
define('CAMELLIA_UTF8_BOM', "\xEF\xBB\xBF");

/**
 * UTF-16 (Big Endian) BOM
 */
define('CAMELLIA_UTF16BE_BOM', "\xFE\xFF");

/**
 * UTF-16 (Lil Endian) BOM
 */
define('CAMELLIA_UTF16LE_BOM', "\xFF\xFE");

/**
 * UTF-32 (Big Endian) BOM
 */
define('CAMELLIA_UTF32BE_BOM', "\x00\x00\xFE\xFF");

/**
 * UTF-32 (Lil Endian) BOM
 */
define('CAMELLIA_UTF32LE_BOM', "\xFF\xFE\x00\x00");

/**
 * Different charset converter
 */
class Camellia_Converter
{

  /**
   * An array to available charsets
   *
   * @access private
   * @var array $_available_charsets
   */
  var $_available_charsets = array(
    'alternativnyj',
    'amiga-1251',
    'ansel',
    'armscii-7',
    'armscii-8',
    'armscii-8a',
    'ast166-7',
    'ast166-8',
    'ast166-8a',
    'atarist',
    'atascii',
    'baltic',
    'big5-1984',
    'big5-2003',
    'big5-eten',
    'big5-ext',
    'big5-gccs',
    'big5-hkscs-1999',
    'big5-hkscs-2001',
    'big5-plus',
    'bulgarian-mik',
    'cns11643-1986',
    'cns11643-1992',
    'cp037',
    'cp038',
    'cp154',
    'cp256',
    'cp273',
    'cp274',
    'cp275',
    'cp277',
    'cp278',
    'cp280',
    'cp281',
    'cp284',
    'cp285',
    'cp290',
    'cp297',
    'cp420',
    'cp423',
    'cp424',
    'cp437',
    'cp500',
    'cp708',
    'cp720',
    'cp737',
    'cp775',
    'cp806',
    'cp833',
    'cp838',
    'cp849',
    'cp850',
    'cp851',
    'cp852',
    'cp853',
    'cp855',
    'cp856',
    'cp857',
    'cp858',
    'cp860',
    'cp861',
    'cp862',
    'cp863',
    'cp864',
    'cp865',
    'cp866',
    'cp868',
    'cp869',
    'cp870',
    'cp871',
    'cp874',
    'cp875',
    'cp880',
    'cp904',
    'cp905',
    'cp918',
    'cp922',
    'cp924',
    'cp942',
    'cp943',
    'cp948',
    'cp949',
    'cp950',
    'cp954',
    'cp964',
    'cp1004',
    'cp1006',
    'cp1025',
    'cp1026',
    'cp1046',
    'cp1047',
    'cp1051',
    'cp1098',
    'cp1124',
    'cp1125',
    'cp1129',
    'cp1131',
    'cp1132',
    'cp1133',
    'cp1140',
    'cp1141',
    'cp1142',
    'cp1143',
    'cp1144',
    'cp1145',
    'cp1146',
    'cp1147',
    'cp1148',
    'cp1149',
    'cp1160',
    'cp1161',
    'cp1162',
    'cp1163',
    'cp1164',
    'cp1361',
    'cp1370',
    'cp1381',
    'cp1383',
    'cp1386',
    'cp5104',
    'cp5478',
    'cp20001',
    'cp20002',
    'cp20003',
    'cp20004',
    'cp20005',
    'cp20105',
    'cp20261',
    'cp20269',
    'cwi',
    'dec-hanyu',
    'dec-hanzi',
    'dec-kanji',
    'dec-mcs',
    'dk-us',
    'ds2089',
    'ebcdic-at-de',
    'ebcdic-at-de-a',
    'ebcdic-ca-fr',
    'ebcdic-dk-no',
    'ebcdic-dk-no-a',
    'ebcdic-es',
    'ebcdic-es-a',
    'ebcdic-es-s',
    'ebcdic-fi-se',
    'ebcdic-fi-se-a',
    'ebcdic-fr',
    'ebcdic-is-friss',
    'ebcdic-it',
    'ebcdic-pt',
    'ebcdic-uk',
    'ebcdic-us',
    'euc-cn',
    'euc-jis-2004',
    'euc-jisx0213',
    'euc-jp',
    'euc-jp-ms',
    'euc-kr',
    'euc-tw',
    'fieldata',
    'gb2312',
    'gb12345-90',
    'gb18030',
    'gbk',
    'georgian-academy',
    'georgian-ps',
    'geostd8',
    'gsm0338',
    'hp-ccdc',
    'hp-roman8',
    'ia5-german',
    'ia5-irv',
    'ia5-norwegian',
    'ia5-swedish',
    'invariant',
    'iscii-as',
    'iscii-be',
    'iscii-de',
    'iscii-gu',
    'iscii-ka',
    'iscii-ma',
    'iscii-or',
    'iscii-pa',
    'iscii-ta',
    'iscii-te',
    'isiri-3342',
    'iso-646-basic',
    'iso-646-irv',
    'iso-2022-cn',
    'iso-2022-cn-ext',
    'iso-2022-jp',
    'iso-2022-jp-1',
    'iso-2022-jp-2',
    'iso-2022-jp-3',
    'iso-2022-jp-2004',
    'iso-2022-kr',
    'iso-5426',
    'iso-6937',
    'iso-6937-2',
    'iso-8859-1',
    'iso-8859-2',
    'iso-8859-3',
    'iso-8859-4',
    'iso-8859-5',
    'iso-8859-6',
    'iso-8859-7',
    'iso-8859-8',
    'iso-8859-9',
    'iso-8859-10',
    'iso-8859-11',
    'iso-8859-13',
    'iso-8859-14',
    'iso-8859-15',
    'iso-8859-16',
    'iso-8859-supp',
    'iso-10646-ucs-2',
    'iso-10646-ucs-4',
    'iso-ir-4',
    'iso-ir-8-1',
    'iso-ir-8-2',
    'iso-ir-9-1',
    'iso-ir-9-2',
    'iso-ir-10',
    'iso-ir-13',
    'iso-ir-14',
    'iso-ir-15',
    'iso-ir-16',
    'iso-ir-17',
    'iso-ir-18',
    'iso-ir-19',
    'iso-ir-25',
    'iso-ir-27',
    'iso-ir-37',
    'iso-ir-47',
    'iso-ir-49',
    'iso-ir-50',
    'iso-ir-51',
    'iso-ir-54',
    'iso-ir-55',
    'iso-ir-57',
    'iso-ir-60',
    'iso-ir-68',
    'iso-ir-69',
    'iso-ir-70',
    'iso-ir-84',
    'iso-ir-85',
    'iso-ir-86',
    'iso-ir-88',
    'iso-ir-89',
    'iso-ir-90',
    'iso-ir-91',
    'iso-ir-92',
    'iso-ir-93',
    'iso-ir-94',
    'iso-ir-95',
    'iso-ir-96',
    'iso-ir-98',
    'iso-ir-99',
    'iso-ir-102',
    'iso-ir-103',
    'iso-ir-111',
    'iso-ir-121',
    'iso-ir-122',
    'iso-ir-123',
    'iso-ir-128',
    'iso-ir-139',
    'iso-ir-141',
    'iso-ir-142',
    'iso-ir-143',
    'iso-ir-146',
    'iso-ir-147',
    'iso-ir-150',
    'iso-ir-151',
    'iso-ir-152',
    'iso-ir-153',
    'iso-ir-155',
    'iso-ir-165',
    'iso-ir-197',
    'iso-ir-202',
    'iso-ir-209',
    'jis_x0201',
    'jis_x0201c',
    'jis_x0208',
    'jis_x0212',
    'jis_x0213-2000-1',
    'jis_x0213-2000-2',
    'jis_x0213-2004',
    'johab',
    'koi7',
    'koi8-i',
    'koi8-r',
    'koi8-ru',
    'koi8-t',
    'koi8-u',
    'koi8-uni',
    'ksc5601-1987',
    'ksc5601-1992',
    'ksc5636',
    'ksx1001',
    'latin-lap',
    'mac-arabic',
    'mac-ce',
    'mac-celtic',
    'mac-chinesesimp',
    'mac-chinesetrad',
    'mac-croatian',
    'mac-cyrillic',
    'mac-dingbat',
    'mac-farsi',
    'mac-gaelic',
    'mac-greek',
    'mac-hebrew',
    'mac-icelandic',
    'mac-inuit',
    'mac-japanese',
    'mac-korean',
    'mac-roman',
    'mac-romanian',
    'mac-sami',
    'mac-symbol',
    'mac-thai',
    'mac-turkish',
    'mac-ukrainian',
    'mulelao-1',
    'nextstep',
    'osnovnoj',
    'petscii',
    'petscii-shifted',
    'posix',
    'riscos-latin1',
    'rk1048',
    'seascii',
    'shift_jis',
    'shift_jis-2004',
    'shift_jisx0213',
    'spectrum-48k',
    'stdenc',
    'symbol',
    'tcvn5712-1',
    'tcvn5712-2',
    'tds565',
    'tis-620',
    'tscii',
    'ucode',
    'us-ascii',
    'us-ascii-quotes',
    'us-dk',
    'utf-1',
    'utf-5',
    'utf-7',
    'utf-7-imap',
    'utf-8',
    'utf-8n',
    'utf-16',
    'utf-16be',
    'utf-16le',
    'utf-32',
    'utf-32be',
    'utf-32le',
    'viqri',
    'viscii',
    'vni',
    'vps',
    'windows-31j',
    'windows-1250',
    'windows-1251',
    'windows-1252',
    'windows-1253',
    'windows-1254',
    'windows-1255',
    'windows-1256',
    'windows-1257',
    'windows-1258',
    'windows-sami-2',
    'zdingbat',
  );

  /**
   * An array to regular expression to tokenize string
   *
   * @access private
   * @var array $_token_regex (charset => regular expression)
   */
  var $_token_regex = array(
    'big5-1984' => '/[\x00-\x7F]|[\xA1-\xFE][\x40-\x7E\xA1-\xFE]/',
    'big5-2003' => '/[\x00-\x7F]|[\xA1-\xFE][\x40-\x7E\xA1-\xFE]/',
    'big5-eten' => '/[\x00-\x7F]|[\xA1-\xFE][\x40-\x7E\xA1-\xFE]/',
    'big5-ext' => '/[\x00-\x7F]|[\xA1-\xFE][\x40-\x7E\xA1-\xFE]/',
    'big5-gccs' => '/[\x00-\x7F]|[\xA1-\xFE][\x40-\x7E\xA1-\xFE]/',
    'big5-hkscs-1999' => '/[\x00-\x7F]|[\xA1-\xFE][\x40-\x7E\xA1-\xFE]/',
    'big5-hkscs-2001' => '/[\x00-\x7F]|[\xA1-\xFE][\x40-\x7E\xA1-\xFE]/',
    'big5-plus' => '/[\x00-\x7F]|[\xA1-\xFE][\x40-\x7E\xA1-\xFE]/',
    'cp942' => '/\x00[\xFD-\xFF]|[\x00-\x7F]|[\x81-\x9F\xE0-\xFC][\x40-\x7E\x80-\xFC]|[\xA1-\xDF]/',
    'cp943' => '/\x00[\xFD-\xFF]|[\x00-\x7F]|[\x81-\x9F\xE0-\xFC][\x40-\x7E\x80-\xFC]|[\xA1-\xDF]/',
    'cp948' => '/[\x00-\x7F]|../',      // FIXME
    'cp949' => '/[\x00-\x7F]|[\xA1-\xFE]{2}/',
    'cp950' => '/[\x00-\x7F]|[\xA1-\xFE][\x40-\x7E\xA1-\xFE]/',
    'cp954' => '/[\x00-\x7F]|../',      // FIXME
    'cp964' => '/[\x00-\x7F]|../',      // FIXME
    'cp1361' => '/[\x00-\x7F]|../',     // FIXME
    'cp1370' => '/[\x00-\x7F]|../',     // FIXME
    'cp1381' => '/[\x00-\x7F]|../',     // FIXME
    'cp1383' => '/[\x00-\x7F]|../',     // FIXME
    'cp1386' => '/[\x00-\x7F]|../',     // FIXME
    'cp5478' => '/[\x00-\x7F]|../',     // FIXME
    'cp20001' => '/[\x00-\x7F]|../',    // FIXME
    'cp20002' => '/[\x00-\x7F]|../',    // FIXME
    'cp20003' => '/[\x00-\x7F]|../',    // FIXME
    'cp20004' => '/[\x00-\x7F]|../',    // FIXME
    'cp20005' => '/[\x00-\x7F]|../',    // FIXME
    'cp20261' => '/[\x00-\x7F]|../',    // FIXME
    'dec-hanyu' => '/[\x00-\x7F]|../',  // FIXME
    'dec-hanzi' => '/[\x00-\x7F]|../',  // FIXME
    'dec-kanji' => '/[\x00-\x7F]|../',  // FIXME
    'euc-cn' => '/[\x00-\x7F]|[\xA1-\xFE]{2}/',
    'euc-jis-2004' => '/[\x00-\x7F]|[\xA1-\xFE]{2}|\x8E[\xA1-\xDF]|\x8F[\xA1-\xFE]{2}/',
    'euc-jisx0213' => '/[\x00-\x7F]|[\xA1-\xFE]{2}|\x8E[\xA1-\xDF]|\x8F[\xA1-\xFE]{2}/',
    'euc-jp' => '/[\x00-\x7F]|[\xA1-\xFE]{2}|\x8E[\xA1-\xDF]/',
    'euc-jp-ms' => '/[\x00-\x7F]|[\xA1-\xFE]{2}|\x8E[\xA1-\xDF]/',
    'euc-kr' => '/[\x00-\x7F]|[\xA1-\xFE]{2}/',
    'euc-tw' => '/[\x00-\x7F]|[\xA1-\xFE]{2}|\x8E[\xA2-\xB0][\xA1-\xFE]{2}/',
    'gb2312' => '/[\x00-\x7F]|[\xA1-\xFE]{2}/',
    'gbk' => '/[\x00-\x7F]|[\x81-\xFE][\x40-\x7E\x80-\xFE]/',
    'gsm0338' => '/[\x00-\x7F]|../',    // FIXME
    'hp-ccdc' => '/[\x00-\x7F]|../',    // FIXME
    'iso-6937' => '/[\x00-\x7F]|../',   // FIXME
    'iso-6937-2' => '/[\x00-\x7F]|../', // FIXME
    'iso-ir-68' => '/[\x00-\x7F]|../',  // FIXME
    'iso-ir-70' => '/[\x00-\x7F]|../',  // FIXME
    'iso-ir-90' => '/[\x00-\x7F]|../',  // FIXME
    'iso-ir-99' => '/[\x00-\x7F]|../',  // FIXME
    'iso-ir-103' => '/[\x00-\x7F]|../', // FIXME
    'iso-ir-128' => '/[\x00-\x7F]|../', // FIXME
    'iso-ir-142' => '/[\x00-\x7F]|../', // FIXME
    'iso-ir-165' => '/[\x00-\x7F]|../', // FIXME
    'iso-ir-202' => '/[\x00-\x7F]|[\xA1-\xFE]{2}/',
    'johab' => '/[\x00-\x7F]|../',      // FIXME
    'mac-chinesesimp' => '/[\x00-\x7F]|[\xA1-\xFE]{2}/',
    'mac-chinesetrad' => '/[\x00-\x7F]|[\xA1-\xFE][\x40-\x7E\xA1-\xFE]/',
    'mac-japanese' => '/\x00[\xFD-\xFF]|[\x00-\x7F]|[\x81-\x9F\xE0-\xFC][\x40-\x7E\x80-\xFC]|[\xA1-\xDF]/',
    'mac-korean' => '/[\x00-\x7F]|[\xA1-\xFE]{2}/',
    'shift_jis' => '/\x00[\xFD-\xFF]|[\x00-\x7F]|[\x81-\x9F\xE0-\xFC][\x40-\x7E\x80-\xFC]|[\xA1-\xDF]/',
    'shift_jis-2004' => '/\x00[\xFD-\xFF]|[\x00-\x7F]|[\x81-\x9F\xE0-\xFC][\x40-\x7E\x80-\xFC]|[\xA1-\xDF]/',
    'shift_jisx0213' => '/\x00[\xFD-\xFF]|[\x00-\x7F]|[\x81-\x9F\xE0-\xFC][\x40-\x7E\x80-\xFC]|[\xA1-\xDF]/',
    'stdenc' => '/[\x00-\x7F]|../',     // FIXME
    'symbol' => '/[\x00-\x7F]|../',     // FIXME
    'windows-31j' => '/\x00[\xFD-\xFF]|[\x00-\x7F]|[\x81-\x9F\xE0-\xFC][\x40-\x7E\x80-\xFC]|[\xA1-\xDF]/',
    'zdingbat' => '/[\x00-\x7F]|../',   // FIXME
  );

  /**
   * An array to function to charset conversion
   *
   * @access private
   * @var array $_conversion_handlers (conversion rule => callback)
   */
  var $_conversion_handlers = array(
    // JIS based CES
    'euc-jp..iso-2022-jp' => '_EUCJPtoISO2022JP',
    'euc-jp..shift_jis' => '_EUCJPtoSJIS',
    'iso-2022-jp..euc-jp' => '_ISO2022JPtoEUCJP',
    'iso-2022-jp..shift_jis' => '_ISO2022JPtoSJIS',
    'shift_jis..euc-jp' => '_SJIStoEUCJP',
    'shift_jis..iso-2022-jp' => '_SJIStoISO2022JP',

    // ISO-2022 series
    'iso-2022-cn..' => '_decodeISO2022CN',
    '..iso-2022-cn' => '_encodeISO2022CN',
    'iso-2022-cn-ext..' => '_decodeISO2022CNEXT',
    '..iso-2022-cn-ext' => '_encodeISO2022CNEXT',
    'iso-2022-jp..' => '_decodeISO2022JP',
    '..iso-2022-jp' => '_encodeISO2022JP',
    'iso-2022-jp-1..' => '_decodeISO2022JP1',
    '..iso-2022-jp-1' => '_encodeISO2022JP1',
    'iso-2022-jp-2..' => '_decodeISO2022JP2',
    '..iso-2022-jp-2' => '_encodeISO2022JP2',
    'iso-2022-jp-3..' => '_decodeISO2022JP3',
    '..iso-2022-jp-3' => '_encodeISO2022JP3',
    'iso-2022-jp-2004..' => '_decodeISO2022JP2004',
    '..iso-2022-jp-2004' => '_encodeISO2022JP2004',
    'iso-2022-kr..' => '_decodeISO2022KR',
    '..iso-2022-kr' => '_encodeISO2022KR',

    // ISO-10646 series
    'iso-10646-ucs-2..' => '_decodeUCS2',
    '..iso-10646-ucs-2' => '_encodeUCS2',
    'iso-10646-ucs-4..' => '_decodeUCS4',
    '..iso-10646-ucs-4' => '_encodeUCS4',

    // UTF series
    'utf-1..' => '_decodeUTF1',
    '..utf-1' => '_encodeUTF1',
    'utf-5..' => '_decodeUTF5',
    '..utf-5' => '_encodeUTF5',
    'utf-7..' => '_decodeUTF7',
    '..utf-7' => '_encodeUTF7',
    'utf-7-imap..' => '_decodeUTF7IMAP',
    '..utf-7-imap' => '_encodeUTF7IMAP',
    'utf-8..' => '_decodeUTF8',
    '..utf-8' => '_encodeUTF8',
    'utf-8n..' => '_decodeUTF8',
    '..utf-8n' => '_encodeUTF8N',
    'utf-16..' => '_decodeUTF16',
    '..utf-16' => '_encodeUTF16',
    'utf-16be..' => '_decodeUTF16BE',
    '..utf-16be' => '_encodeUTF16BE',
    'utf-16le..' => '_decodeUTF16LE',
    '..utf-16le' => '_encodeUTF16LE',
    'utf-32..' => '_decodeUTF32',
    '..utf-32' => '_encodeUTF32',
    'utf-32be..' => '_decodeUTF32BE',
    '..utf-32be' => '_encodeUTF32BE',
    'utf-32le..' => '_decodeUTF32LE',
    '..utf-32le' => '_encodeUTF32LE',

    // Other
    'viqri..' => '_decodeVIQRI',
    '..viqri' => '_encodeVIQRI',
  );

  /**
   * An array to mapping to VIQRI <=> UCS4
   *
   * @access private
   * @var array $_viqri_mapping (VIQRI => UCS4)
   */
  var $_viqri_mapping = array(
    "\x41\x60" => 0x00C0,
    "\x41\x27" => 0x00C1,
    "\x41\x5E" => 0x00C2,
    "\x41\x7E" => 0x00C3,
    "\x45\x60" => 0x00C8,
    "\x45\x27" => 0x00C9,
    "\x45\x5E" => 0x00CA,
    "\x49\x60" => 0x00CC,
    "\x49\x27" => 0x00CD,
    "\x4F\x60" => 0x00D2,
    "\x4F\x27" => 0x00D3,
    "\x4F\x5E" => 0x00D4,
    "\x4F\x7E" => 0x00D5,
    "\x55\x60" => 0x00D9,
    "\x55\x27" => 0x00DA,
    "\x59\x27" => 0x00DD,
    "\x61\x60" => 0x00E0,
    "\x61\x27" => 0x00E1,
    "\x61\x5E" => 0x00E2,
    "\x61\x7E" => 0x00E3,
    "\x65\x60" => 0x00E8,
    "\x65\x27" => 0x00E9,
    "\x65\x5E" => 0x00EA,
    "\x69\x60" => 0x00EC,
    "\x69\x27" => 0x00ED,
    "\x6F\x60" => 0x00F2,
    "\x6F\x27" => 0x00F3,
    "\x6F\x5E" => 0x00F4,
    "\x6F\x7E" => 0x00F5,
    "\x75\x60" => 0x00F9,
    "\x75\x27" => 0x00FA,
    "\x79\x27" => 0x00FD,
    "\x41\x28" => 0x0102,
    "\x61\x28" => 0x0103,
    "\x49\x7E" => 0x0128,
    "\x69\x7E" => 0x0129,
    "\x55\x7E" => 0x0168,
    "\x75\x7E" => 0x0169,
    "\x4F\x2B" => 0x01A0,
    "\x6F\x2B" => 0x01A1,
    "\x55\x2B" => 0x01AF,
    "\x75\x2B" => 0x01B0,
    "\x41\x2E" => 0x1EA0,
    "\x61\x2E" => 0x1EA1,
    "\x41\x3F" => 0x1EA2,
    "\x61\x3F" => 0x1EA3,
    "\x41\x5E\x27" => 0x1EA4,
    "\x61\x5E\x27" => 0x1EA5,
    "\x41\x5E\x60" => 0x1EA6,
    "\x61\x5E\x60" => 0x1EA7,
    "\x41\x5E\x3F" => 0x1EA8,
    "\x61\x5E\x3F" => 0x1EA8,
    "\x41\x5E\x7E" => 0x1EAA,
    "\x61\x5E\x7E" => 0x1EAB,
    "\x41\x5E\x2E" => 0x1EAC,
    "\x61\x5E\x2E" => 0x1EAD,
    "\x41\x28\x27" => 0x1EAE,
    "\x61\x28\x27" => 0x1EAF,
    "\x41\x28\x60" => 0x1EB0,
    "\x61\x28\x60" => 0x1EB1,
    "\x41\x28\x3F" => 0x1EB2,
    "\x61\x28\x3F" => 0x1EB3,
    "\x41\x28\x7E" => 0x1EB4,
    "\x61\x28\x7E" => 0x1EB5,
    "\x41\x28\x2E" => 0x1EB6,
    "\x61\x28\x2E" => 0x1EB7,
    "\x45\x2E" => 0x1EB8,
    "\x65\x2E" => 0x1EB9,
    "\x45\x3F" => 0x1EBA,
    "\x65\x3F" => 0x1EBB,
    "\x45\x7E" => 0x1EBC,
    "\x65\x7E" => 0x1EBD,
    "\x45\x5E\x27" => 0x1EBE,
    "\x65\x5E\x27" => 0x1EBF,
    "\x45\x5E\x60" => 0x1EC0,
    "\x65\x5E\x60" => 0x1EC1,
    "\x45\x5E\x3F" => 0x1EC2,
    "\x65\x5E\x3F" => 0x1EC3,
    "\x45\x5E\x7E" => 0x1EC4,
    "\x65\x5E\x7E" => 0x1EC5,
    "\x45\x5E\x2E" => 0x1EC6,
    "\x65\x5E\x2E" => 0x1EC7,
    "\x49\x3F" => 0x1EC8,
    "\x69\x3F" => 0x1EC9,
    "\x49\x2E" => 0x1ECA,
    "\x69\x2E" => 0x1ECB,
    "\x4F\x2E" => 0x1ECC,
    "\x6F\x2E" => 0x1ECD,
    "\x4F\x3F" => 0x1ECE,
    "\x6F\x3F" => 0x1ECF,
    "\x4F\x5E\x27" => 0x1ED0,
    "\x6F\x5E\x27" => 0x1ED1,
    "\x4F\x5E\x60" => 0x1ED2,
    "\x6F\x5E\x60" => 0x1ED3,
    "\x4F\x5E\x3F" => 0x1ED4,
    "\x6F\x5E\x3F" => 0x1ED5,
    "\x4F\x5E\x7E" => 0x1ED6,
    "\x6F\x5E\x7E" => 0x1ED7,
    "\x4F\x5E\x2E" => 0x1ED8,
    "\x6F\x5E\x2E" => 0x1ED9,
    "\x4F\x2B\x27" => 0x1EDA,
    "\x6F\x2B\x27" => 0x1EDB,
    "\x4F\x2B\x60" => 0x1EDC,
    "\x6F\x2B\x60" => 0x1EDD,
    "\x4F\x2B\x3F" => 0x1EDE,
    "\x6F\x2B\x3F" => 0x1EDF,
    "\x4F\x2B\x7E" => 0x1EE0,
    "\x6F\x2B\x7E" => 0x1EE1,
    "\x4F\x2B\x2E" => 0x1EE2,
    "\x6F\x2B\x2E" => 0x1EE3,
    "\x55\x2E" => 0x1EE4,
    "\x75\x2E" => 0x1EE5,
    "\x55\x3F" => 0x1EE6,
    "\x75\x3F" => 0x1EE7,
    "\x55\x2B\x27" => 0x1EE8,
    "\x75\x2B\x27" => 0x1EE9,
    "\x55\x2B\x60" => 0x1EEA,
    "\x75\x2B\x60" => 0x1EEB,
    "\x55\x2B\x3F" => 0x1EEC,
    "\x75\x2B\x3F" => 0x1EED,
    "\x55\x2B\x7E" => 0x1EEE,
    "\x75\x2B\x7E" => 0x1EEF,
    "\x55\x2B\x2E" => 0x1EF0,
    "\x75\x2B\x2E" => 0x1EF1,
    "\x59\x60" => 0x1EF2,
    "\x79\x60" => 0x1EF3,
    "\x59\x2E" => 0x1EF4,
    "\x79\x2E" => 0x1EF5,
    "\x59\x3F" => 0x1EF6,
    "\x79\x3F" => 0x1EF7,
    "\x59\x7E" => 0x1EF8,
    "\x79\x7E" => 0x1EF9,
    "\x44\x44" => 0x0110,
    "\x64\x64" => 0x0111,
  );

  /**
   * A handler function to process unmappable characters
   *
   * @access private
   * @var callback $_replace_handler
   */
  var $_replace_handler;

  /**
   * Class constructor
   *
   * @access public
   */
  function Camellia_Converter()
  {
    $this->_replace_handler = array(&$this, '_defaultReplaceHandler');
  }

  /**
   * Returns an array of all available charset names
   *
   * @access public
   * @return array
   */
  function availableCharsets()
  {
    return $_available_charsets;
  }

  /**
   * Converts between different charsets
   *
   * @access public
   * @param string $from Charset of the string
   * @param string $to Charset to convert
   * @param string $string String
   * @return string on success; FALSE on failure
   */
  function convert($from, $to, $string)
  {
    if ($from == $to)
    {
      return $string;
    }

    if (!$this->isSupported($from) || !$this->isSupported($to))
    {
      return FALSE;
    }

    $result = '';

    if (isset($this->_conversion_handlers[$from . '..' . $to]))
    {
      $result = $this->{$this->_conversion_handlers[$from . '..' . $to]}($string);
    }
    else
    {
      $ucs = array();

      if (isset($this->_conversion_handlers[$from . '..']))
      {
        $ucs = $this->{$this->_conversion_handlers[$from . '..']}($string);
      }
      else
      {
        if (isset($this->_token_regex[$from]))
        {
          preg_match_all($this->_token_regex[$from], $string, $matches);
          $token = $matches[0];
        }
        else
        {
          $token = preg_split('//', $string, -1, PREG_SPLIT_NO_EMPTY);
        }

        $table = $this->getTable($from);

        if ($table === FALSE)
        {
          return FALSE;
        }

        foreach ($token as $char)
        {
          $n = Camellia_Converter::_bin2dec($char);

          if (isset($table[$n]))
          {
            $ucs[] = $table[$n];
          }
          else
          {
            $ucs[] = CAMELLIA_REPLACEMENT_CHARACTER;
          }
        }
      }

      if (isset($this->_conversion_handlers['..' . $to]))
      {
        $result = $this->{$this->_conversion_handlers['..' . $to]}($ucs);
      }
      else
      {
        $table = $this->getTable($to);

        if ($table === FALSE)
        {
          return FALSE;
        }

        $table = array_flip($table);

        foreach ($ucs as $uni)
        {
          if (isset($table[$uni]))
          {
            $result .= Camellia_Converter::_dec2bin($table[$uni]);
          }
          else
          {
            $result .= call_user_func($this->getReplaceHandler(), $uni);
          }
        }
      }
    }

    return $result;
  }

  /**
   * Sets a handler function to process unmappable characters
   *
   * @access public
   * @param callback $handler Handler function
   * @return boolean TRUE on success; FALSE on failure
   */
  function setReplaceHandler($handler)
  {
    $result = FALSE;

    if (is_callable($handler))
    {
      $this->_replace_handler = $handler;
      $result = TRUE;
    }

    return $result;
  }

  /**
   * Returns a handler function to process unmappable characters
   *
   * @access public
   * @return callback
   */
  function getReplaceHandler()
  {
    return $this->_replace_handler;
  }

  /**
   * Loads an UCS table into an array
   *
   * @access public
   * @return array on success; FALSE on failure
   */
  function getTable($charset)
  {
    $filename = CAMELLIA_UCSTABLE_DIR . $charset . '.map';

    $result = FALSE;

    if (is_file($filename))
    {
      $data = file_get_contents($filename);
      $result = unserialize($data);
    }

    return $result;
  }

  /**
   * Tells whether the named charset is supported
   *
   * @access public
   * @param string $charset Charset
   * @return boolean TRUE if the charset is supported; FALSE otherwise
   */
  function isSupported($charset)
  {
    return in_array($charset, $this->_available_charsets);
  }

  /**
   * Binary to decimal
   *
   * @access private
   * @param string $binary Binary string
   * @return integer
   * @static
   */
  function _bin2dec($binary)
  {
    return hexdec(bin2hex($binary));
  }

  /**
   * Decimal to binary
   *
   * @access private
   * @param integer $number Number
   * @return string
   * @static
   */
  function _dec2bin($number)
  {
    $hex = dechex($number);

    $result = '';

    for ($i = 0, $j = strlen($hex); $i < $j; $i = $i + 2)
    {
      $result .= chr(hexdec(substr($hex, $i, 2)));
    }

    return $result;
  }

  /**
   * Process unmappable characters
   *
   * @access private
   * @param integer $uni Unicode code point
   * @return string
   */
  function _defaultReplaceHandler($uni)
  {
    return '?';
  }

  /**
   * EUC-JP to ISO-2022-JP
   *
   * @access public
   * @param string $string String
   * @return string on success; FALSE on failure
   */
  function _EUCJPtoISO2022JP($string)
  {
    $result = '';
    $mode = 0;

    $b = unpack('C*', $string);

    for ($i = 1, $j = count($b); $i <= $j; ++$i)
    {
      $b1 = $b[$i];

      if ($b1 == 0x8E)
      {
        if ($mode != 2)
        {
          $result .= "\x1B\x28\x49";
          $mode = 2;
        }

        $result .= chr($b[++$i] - 0x80);
      }
      elseif ($b1 > 0x8E)
      {
        if ($mode != 1)
        {
          $result .= "\x1B\x24\x42";
          $mode = 1;
        }

        $result .= chr($b1 - 0x80) . chr($b[++$i] - 0x80);
      }
      else
      {
        if ($mode != 0)
        {
          $result .= "\x1B\x28\x42";
          $mode = 0;
        }

        $result .= chr($b1);
      }
    }

    if ($mode != 0)
    {
      $result .= "\x1B\x28\x42";
    }

    return $result;
  }

  /**
   * EUC-JP to Shift_JIS
   *
   * @access public
   * @param string $string String
   * @return string on success; FALSE on failure
   */
  function _EUCJPtoSJIS($string)
  {
    $result = '';

    $b = unpack('C*', $string);

    for ($i = 1, $j = count($b); $i <= $j; ++$i)
    {
      $b1 = $b[$i];

      if ($b1 > 0x8E)
      {
        $b2 = $b[++$i];

        if (($b1 & 0x01) > 0)
        {
          $b1 >>= 1;

          if ($b1 < 0x6F)
          {
            $b1 += 0x31;
          }
          else
          {
            $b1 += 0x71;
          }

          if ($b2 > 0xDF)
          {
            $b2 -= 0x60;
          }
          else
          {
            $b2 -= 0x61;
          }
        }
        else
        {
          $b1 >>= 1;

          if ($b1 <= 0x6F)
          {
            $b1 += 0x30;
          }
          else
          {
            $b1 += 0x70;
          }

          $b2 -= 0x02;
        }

        $result .= chr($b1) . chr($b2);
      }
      elseif ($b1 == 0x8E)
      {
        $result .= chr($b[++$i]);
      }
      else
      {
        $result .= chr($b1);
      }
    }

    return $result;
  }

  /**
   * ISO-2022-JP to EUC-JP
   *
   * @access public
   * @param string $string String
   * @return string on success; FALSE on failure
   */
  function _ISO2022JPtoEUCJP($string)
  {
    $result = '';
    $mode = 0;

    $b = unpack('C*', $string);

    for ($i = 1, $j = count($b); $i <= $j; ++$i)
    {
      while ($b[$i] == 0x1B)
      {
        if ((($b[$i + 1] == 0x24) && ($b[$i + 2] == 0x42)) || (($b[$i + 1] == 0x24) && ($b[$i + 2] == 0x40)))
        {
          $mode = 1;
        }
        elseif ((($b[$i + 1] == 0x28) && ($b[$i + 2] == 0x49)))
        {
          $mode = 2;
        }
        else
        {
          $mode = 0;
        }

        $i += 3;

        if ($i > $j)
        {
          break 2;
        }
      }

      if ($mode == 1)
      {
        $result .= chr($b[$i] + 0x80) . chr($b[++$i] + 0x80);
      }
      elseif ($mode == 2)
      {
        $result .= "\x8E" . chr($b[$i] + 0x80);
      }
      else
      {
        $result .= chr($b[$i]);
      }
    }

    return $result;
  }

  /**
   * ISO-2022-JP to Shift_JIS
   *
   * @access public
   * @param string $string String
   * @return string on success; FALSE on failure
   */
  function _ISO2022JPtoSJIS($string)
  {
    $result = '';
    $mode = 0;

    $b = unpack('C*', $string);

    for ($i = 1, $j = count($b); $i <= $j; ++$i)
    {
      while ($b[$i] == 0x1B)
      {
        if ((($b[$i + 1] == 0x24) && ($b[$i + 2] == 0x42)) || (($b[$i + 1] == 0x24) && ($b[$i + 2] == 0x40)))
        {
          $mode = 1;
        }
        elseif ((($b[$i + 1] == 0x28) && ($b[$i + 2] == 0x49)))
        {
          $mode = 2;
        }
        else
        {
          $mode = 0;
        }

        $i += 3;

        if ($i > $j)
        {
          break 2;
        }
      }

      if ($mode == 1)
      {
        $b1 = $b[$i];
        $b2 = $b[++$i];

        if (($b1 & 0x01) > 0)
        {
          $b1 >>= 1;

          if ($b1 < 0x2F)
          {
            $b1 += 0x71;
          }
          else
          {
            $b1 -= 0x4F;
          }

          if ($b2 > 0x5F)
          {
            $b2 += 0x20;
          }
          else
          {
            $b2 += 0x1F;
          }
        }
        else
        {
          $b1 >>= 1;

          if ($b1 <= 0x2F)
          {
            $b1 += 0x70;
          }
          else
          {
            $b1 -= 0x50;
          }

          $b2 += 0x7E;
        }

        $result .= chr($b1) . chr($b2);
      }
      elseif ($mode == 2)
      {
        $result .= chr($b[$i] + 0x80);
      }
      else
      {
        $result .= chr($b[$i]);
      }
    }

    return $result;
  }

  /**
   * Shift_JIS to EUC-JP
   *
   * @access public
   * @param string $string String
   * @return string on success; FALSE on failure
   */
  function _SJIStoEUCJP($string)
  {
    $result = '';

    $b = unpack('C*', $string);

    for ($i = 1, $j = count($b); $i <= $j; ++$i)
    {
      $b1 = $b[$i];

      if (($b1 >= 0xA1) && ($b1 <= 0xDF))
      {
        $result .= "\x8E" . chr($b1);
      }
      elseif ($b1 >= 0x81)
      {
        $b1 <<= 1;
        $b2 = $b[++$i];

        if ($b2 < 0x9F)
        {
          if ($b1 < 0x13F)
          {
            $b1 -= 0x61;
          }
          else
          {
            $b1 -= 0xE1;
          }

          if ($b2 > 0x7E)
          {
            $b2 += 0x60;
          }
          else
          {
            $b2 += 0x61;
          }
        }
        else
        {
          if ($b1 < 0x13F)
          {
            $b1 -= 0x60;
          }
          else
          {
            $b1 -= 0xE0;
          }

          $b2 += 0x02;
        }

        $result .= chr($b1) . chr($b2);
      }
      else
      {
        $result .= chr($b1);
      }
    }

    return $result;
  }

  /**
   * Shift_JIS to ISO-2022-JP
   *
   * @access public
   * @param string $string String
   * @return string on success; FALSE on failure
   */
  function _SJIStoISO2022JP($string)
  {
    $result = '';
    $mode = 0;

    $b = unpack('C*', $string);

    for ($i = 1, $j = count($b); $i <= $j; ++$i)
    {
      $b1 = $b[$i];

      if ((0xA1 <= $b1) && ($b1 <= 0xDF))
      {
        if ($mode != 2)
        {
          $result .= "\x1B\x28\x49";
          $mode = 2;
        }

        $result .= chr($b1 - 0x80);
      }
      elseif ($b1 >= 0x80)
      {
        if ($mode != 1)
        {
          $result .= "\x1B\x24\x42";
          $mode = 1;
        }

        $b1 <<= 1;
        $b2 = $b[++$i];

        if ($b2 < 0x9F)
        {
          if ($b1 < 0x13F)
          {
            $b1 -= 0xE1;
          }
          else
          {
            $b1 -= 0x61;
          }

          if ($b2 > 0x7E)
          {
            $b2 -= 0x20;
          }
          else
          {
            $b2 -= 0x1F;
          }
        }
        else
        {
          if ($b1 < 0x13F)
          {
            $b1 -= 0xE0;
          }
          else
          {
            $b1 -= 0x60;
          }

          $b2 -= 0x7E;
        }

        $result .= chr($b1) . chr($b2);
      }
      else
      {
        if ($mode != 0)
        {
          $result .= "\x1B\x28\x42";
          $mode = 0;
        }

        $result .= chr($b1);
      }
    }

    if ($mode != 0)
    {
      $result .= "\x1B\x28\x42";
    }

    return $result;
  }

  /**
   * Decodes as ISO-2022-CN
   *
   * @access public
   * @param string $string String
   * @return array on success; FALSE on failure
   */
  function _decodeISO2022CN($string)
  {
    $table = array(
      "\x24\x29\x41" => $this->getTable('gb2312'),
      "\x24\x29\x47" => $this->getTable('cns11643-1992'),
      "\x24\x2A\x48" => $this->getTable('cns11643-1992'),
    );

    $result = array();

    $esc = "\x28\x42";

    for ($i = 0, $j = strlen($string); $i < $j; ++$i)
    {
      if ($string[$i] == "\x1B")
      {
        if (($i + 2) < $j)
        {
          $esc = $string[$i + 1] . $string[$i + 2];

          if ($esc == "\x28\x42")
          {
            $i += 2;
            continue;
          }
        }

        if (($i + 3) < $j)
        {
          $esc .= $string[$i + 3];

          if (($esc == "\x24\x29\x41") || ($esc == "\x24\x29\x47") || ($esc == "\x24\x2A\x48"))
          {
            $i += 3;
            continue;
          }
        }

        $result[] = CAMELLIA_REPLACEMENT_CHARACTER;
        continue;
      }

      if ($esc == "\x28\x42")
      {
        $result[] = ord($string[$i]);
      }
      elseif ((($esc == "\x24\x29\x41") || ($esc == "\x24\x29\x47") || ($esc == "\x24\x2A\x48")) && (($i + 1) < $j))
      {
        $n = Camellia_Converter::_bin2dec($string[$i] . $string[++$i]);

        if (isset($table[$esc][$n]))
        {
          $result[] = $table[$esc][$n];
        }
        else
        {
          $result[] = CAMELLIA_REPLACEMENT_CHARACTER;
        }
      }
      else
      {
        $result[] = CAMELLIA_REPLACEMENT_CHARACTER;
      }
    }

    return $result;
  }

  /**
   * Encodes as ISO-2022-CN
   *
   * @access public
   * @param array $ucs UCS array
   * @return string on success; FALSE on failure
   */
  function _encodeISO2022CN($ucs)
  {
    $table = array(
      "\x24\x29\x41" => array_flip($this->getTable('gb2312')),
      "\x24\x29\x47" => array_flip($this->getTable('cns11643-1992')),
      "\x24\x2A\x48" => array_flip($this->getTable('cns11643-1992')),
    );

    $result = '';
    $mode = "\x28\x42";

    for ($i = 0, $j = count($ucs); $i < $j; ++$i)
    {
      foreach ($table as $k => $v)
      {
        if (isset($v[$ucs[$i]]))
        {
          if ($mode != $k)
          {
            $result .= "\x1B" . $k;
            $mode = $k;
          }

          $result .= Camellia_Converter::_dec2bin($v[$ucs[$i]]);

          continue 2;
        }
      }

      if ($mode != "\x28\x42")
      {
        $result .= "\x1B\x28\x42";
        $mode = "\x28\x42";
      }

      if ($ucs[$i] < 0x7F)
      {
        $result .= chr($ucs[$i]);
      }
      else
      {
        $result .= call_user_func($this->getReplaceHandler(), $ucs[$i]);
      }
    }

    if ($mode != "\x28\x42")
    {
      $result .= "\x1B\x28\x42";
    }

    return $result;
  }

  /**
   * Decodes as ISO-2022-CN-EXT
   *
   * @access public
   * @param string $string String
   * @return array on success; FALSE on failure
   */
  function _decodeISO2022CNEXT($string)
  {
    $table = array(
      "\x24\x29\x41" => $this->getTable('gb2312'),
      "\x24\x29\x45" => $this->getTable('iso-ir-165'),
      "\x24\x29\x47" => $this->getTable('cns11643-1992'),
      "\x24\x2A\x48" => $this->getTable('cns11643-1992'),
      "\x24\x2B\x49" => $this->getTable('cns11643-1992'),
      "\x24\x2B\x4A" => $this->getTable('cns11643-1992'),
      "\x24\x2B\x4B" => $this->getTable('cns11643-1992'),
      "\x24\x2B\x4C" => $this->getTable('cns11643-1992'),
      "\x24\x2B\x4D" => $this->getTable('cns11643-1992'),
    );

    $result = array();

    $esc = "\x28\x42";

    for ($i = 0, $j = strlen($string); $i < $j; ++$i)
    {
      if ($string[$i] == "\x1B")
      {
        if (($i + 2) < $j)
        {
          $esc = $string[$i + 1] . $string[$i + 2];

          if ($esc == "\x28\x42")
          {
            $i += 2;
            continue;
          }
        }

        if (($i + 3) < $j)
        {
          $esc .= $string[$i + 3];

          if (($esc == "\x24\x29\x41") || ($esc == "\x24\x29\x45") || ($esc == "\x24\x29\x47") || ($esc == "\x24\x2A\x48") || ($esc == "\x24\x2B\x49") || ($esc == "\x24\x2B\x4A") || ($esc == "\x24\x2B\x4B") || ($esc == "\x24\x2B\x4C") || ($esc == "\x24\x2B\x4D"))
          {
            $i += 3;
            continue;
          }
        }

        $result[] = CAMELLIA_REPLACEMENT_CHARACTER;
        continue;
      }

      if ($esc == "\x28\x42")
      {
        $result[] = ord($string[$i]);
      }
      elseif ((($esc == "\x24\x29\x41") || ($esc == "\x24\x29\x45") || ($esc == "\x24\x29\x47") || ($esc == "\x24\x2A\x48") || ($esc == "\x24\x2B\x49") || ($esc == "\x24\x2B\x4A") || ($esc == "\x24\x2B\x4B") || ($esc == "\x24\x2B\x4C") || ($esc == "\x24\x2B\x4D")) && (($i + 1) < $j))
      {
        $n = Camellia_Converter::_bin2dec($string[$i] . $string[++$i]);

        if (isset($table[$esc][$n]))
        {
          $result[] = $table[$esc][$n];
        }
        else
        {
          $result[] = CAMELLIA_REPLACEMENT_CHARACTER;
        }
      }
      else
      {
        $result[] = CAMELLIA_REPLACEMENT_CHARACTER;
      }
    }

    return $result;
  }

  /**
   * Encodes as ISO-2022-CN-EXT
   *
   * @access public
   * @param array $ucs UCS array
   * @return string on success; FALSE on failure
   */
  function _encodeISO2022CNEXT($ucs)
  {
    $table = array(
      "\x24\x29\x41" => array_flip($this->getTable('gb2312')),
      "\x24\x29\x45" => array_flip($this->getTable('iso-ir-165')),
      "\x24\x29\x47" => array_flip($this->getTable('cns11643-1992')),
      "\x24\x2A\x48" => array_flip($this->getTable('cns11643-1992')),
      "\x24\x2B\x49" => array_flip($this->getTable('cns11643-1992')),
      "\x24\x2B\x4A" => array_flip($this->getTable('cns11643-1992')),
      "\x24\x2B\x4B" => array_flip($this->getTable('cns11643-1992')),
      "\x24\x2B\x4C" => array_flip($this->getTable('cns11643-1992')),
      "\x24\x2B\x4D" => array_flip($this->getTable('cns11643-1992')),
    );

    $result = '';
    $mode = "\x28\x42";

    for ($i = 0, $j = count($ucs); $i < $j; ++$i)
    {
      foreach ($table as $k => $v)
      {
        if (isset($v[$ucs[$i]]))
        {
          if ($mode != $k)
          {
            $result .= "\x1B" . $k;
            $mode = $k;
          }

          $result .= Camellia_Converter::_dec2bin($v[$ucs[$i]]);

          continue 2;
        }
      }

      if ($mode != "\x28\x42")
      {
        $result .= "\x1B\x28\x42";
        $mode = "\x28\x42";
      }

      if ($ucs[$i] < 0x7F)
      {
        $result .= chr($ucs[$i]);
      }
      else
      {
        $result .= call_user_func($this->getReplaceHandler(), $ucs[$i]);
      }
    }

    if ($mode != "\x28\x42")
    {
      $result .= "\x1B\x28\x42";
    }

    return $result;
  }

  /**
   * Decodes as ISO-2022-JP
   *
   * @access public
   * @param string $string String
   * @return array on success; FALSE on failure
   */
  function _decodeISO2022JP($string)
  {
    $table = array(
      "\x24\x40" => $this->getTable('jis_x0208'),
      "\x24\x42" => $this->getTable('jis_x0208'),
      "\x28\x4A" => $this->getTable('jis_x0201'),
    );

    $result = array();

    $esc = "\x28\x42";

    for ($i = 0, $j = strlen($string); $i < $j; ++$i)
    {
      if ($string[$i] == "\x1B")
      {
        if (($i + 2) < $j)
        {
          $esc = $string[$i + 1] . $string[$i + 2];

          if (($esc == "\x28\x42") || ($esc == "\x24\x40") || ($esc == "\x24\x42") || ($esc == "\x28\x4A"))
          {
            $i += 2;
            continue;
          }
        }

        $result[] = CAMELLIA_REPLACEMENT_CHARACTER;
        continue;
      }

      if ($esc == "\x28\x42")
      {
        $result[] = ord($string[$i]);
      }
      elseif ($esc == "\x28\x4A")
      {
        $n = Camellia_Converter::_bin2dec($string[$i]);

        if (isset($table[$esc][$n]))
        {
          $result[] = $table[$esc][$n];
        }
        else
        {
          $result[] = CAMELLIA_REPLACEMENT_CHARACTER;
        }
      }
      elseif ((($esc == "\x24\x40") || ($esc == "\x24\x42")) && (($i + 1) < $j))
      {
        $n = Camellia_Converter::_bin2dec($string[$i] . $string[++$i]);

        if (isset($table[$esc][$n]))
        {
          $result[] = $table[$esc][$n];
        }
        else
        {
          $result[] = CAMELLIA_REPLACEMENT_CHARACTER;
        }
      }
      else
      {
        $result[] = CAMELLIA_REPLACEMENT_CHARACTER;
      }
    }

    return $result;
  }

  /**
   * Encodes as ISO-2022-JP
   *
   * @access public
   * @param array $ucs UCS array
   * @return string on success; FALSE on failure
   */
  function _encodeISO2022JP($ucs)
  {
    $table = array(
      "\x24\x40" => array_flip($this->getTable('jis_x0208')),
      "\x24\x42" => array_flip($this->getTable('jis_x0208')),
      "\x28\x4A" => array_flip($this->getTable('jis_x0201')),
    );

    $result = '';
    $mode = "\x28\x42";

    for ($i = 0, $j = count($ucs); $i < $j; ++$i)
    {
      foreach ($table as $k => $v)
      {
        if (isset($v[$ucs[$i]]))
        {
          if ($mode != $k)
          {
            $result .= "\x1B" . $k;
            $mode = $k;
          }

          $result .= Camellia_Converter::_dec2bin($v[$ucs[$i]]);

          continue 2;
        }
      }

      if ($mode != "\x28\x42")
      {
        $result .= "\x1B\x28\x42";
        $mode = "\x28\x42";
      }

      if ($ucs[$i] < 0x7F)
      {
        $result .= chr($ucs[$i]);
      }
      else
      {
        $result .= call_user_func($this->getReplaceHandler(), $ucs[$i]);
      }
    }

    if ($mode != "\x28\x42")
    {
      $result .= "\x1B\x28\x42";
    }

    return $result;
  }

  /**
   * Decodes as ISO-2022-JP-1
   *
   * @access public
   * @param string $string String
   * @return array on success; FALSE on failure
   */
  function _decodeISO2022JP1($string)
  {
    $table = array(
      "\x24\x40" => $this->getTable('jis_x0208'),
      "\x24\x42" => $this->getTable('jis_x0208'),
      "\x28\x4A" => $this->getTable('jis_x0201'),
      "\x24\x28\x44" => $this->getTable('jis_x0212'),
    );

    $result = array();

    $esc = "\x28\x42";

    for ($i = 0, $j = strlen($string); $i < $j; ++$i)
    {
      if ($string[$i] == "\x1B")
      {
        if (($i + 2) < $j)
        {
          $esc = $string[$i + 1] . $string[$i + 2];

          if (($esc == "\x28\x42") || ($esc == "\x24\x40") || ($esc == "\x24\x42") || ($esc == "\x28\x4A"))
          {
            $i += 2;
            continue;
          }
        }

        if (($i + 3) < $j)
        {
          $esc .= $string[$i + 3];

          if ($esc == "\x24\x28\x44")
          {
            $i += 3;
            continue;
          }
        }

        $result[] = CAMELLIA_REPLACEMENT_CHARACTER;
        continue;
      }

      if ($esc == "\x28\x42")
      {
        $result[] = ord($string[$i]);
      }
      elseif ($esc == "\x28\x4A")
      {
        $n = Camellia_Converter::_bin2dec($string[$i]);

        if (isset($table[$esc][$n]))
        {
          $result[] = $table[$esc][$n];
        }
        else
        {
          $result[] = CAMELLIA_REPLACEMENT_CHARACTER;
        }
      }
      elseif ((($esc == "\x24\x40") || ($esc == "\x24\x42") || ($esc == "\x24\x28\x44")) && (($i + 1) < $j))
      {
        $n = Camellia_Converter::_bin2dec($string[$i] . $string[++$i]);

        if (isset($table[$esc][$n]))
        {
          $result[] = $table[$esc][$n];
        }
        else
        {
          $result[] = CAMELLIA_REPLACEMENT_CHARACTER;
        }
      }
      else
      {
        $result[] = CAMELLIA_REPLACEMENT_CHARACTER;
      }
    }

    return $result;
  }

  /**
   * Encodes as ISO-2022-JP-1
   *
   * @access public
   * @param array $ucs UCS array
   * @return string on success; FALSE on failure
   */
  function _encodeISO2022JP1($ucs)
  {
    $table = array(
      "\x24\x40" => array_flip($this->getTable('jis_x0208')),
      "\x24\x42" => array_flip($this->getTable('jis_x0208')),
      "\x28\x4A" => array_flip($this->getTable('jis_x0201')),
      "\x24\x28\x44" => array_flip($this->getTable('jis_x0212')),
    );

    $result = '';
    $mode = "\x28\x42";

    for ($i = 0, $j = count($ucs); $i < $j; ++$i)
    {
      foreach ($table as $k => $v)
      {
        if (isset($v[$ucs[$i]]))
        {
          if ($mode != $k)
          {
            $result .= "\x1B" . $k;
            $mode = $k;
          }

          $result .= Camellia_Converter::_dec2bin($v[$ucs[$i]]);

          continue 2;
        }
      }

      if ($mode != "\x28\x42")
      {
        $result .= "\x1B\x28\x42";
        $mode = "\x28\x42";
      }

      if ($ucs[$i] < 0x7F)
      {
        $result .= chr($ucs[$i]);
      }
      else
      {
        $result .= call_user_func($this->getReplaceHandler(), $ucs[$i]);
      }
    }

    if ($mode != "\x28\x42")
    {
      $result .= "\x1B\x28\x42";
    }

    return $result;
  }

  /**
   * Decodes as ISO-2022-JP-2
   *
   * @access public
   * @param string $string String
   * @return array on success; FALSE on failure
   */
  function _decodeISO2022JP2($string)
  {
    $table = array(
      "\x24\x40" => $this->getTable('jis_x0208'),
      "\x24\x42" => $this->getTable('jis_x0208'),
      "\x28\x4A" => $this->getTable('jis_x0201'),
      "\x24\x41" => $this->getTable('gb2312'),
      "\x24\x28\x43" => $this->getTable('ksc5601-1987'),
      "\x24\x28\x44" => $this->getTable('jis_x0212'),
      "\x24\x2E\x41" => $this->getTable('iso-8859-1'),
      "\x24\x2E\x46" => $this->getTable('iso-8859-7'),
    );

    $result = array();

    $esc = "\x28\x42";

    for ($i = 0, $j = strlen($string); $i < $j; ++$i)
    {
      if ($string[$i] == "\x1B")
      {
        if (($i + 2) < $j)
        {
          $esc = $string[$i + 1] . $string[$i + 2];

          if (($esc == "\x28\x42") || ($esc == "\x24\x40") || ($esc == "\x24\x42") || ($esc == "\x28\x4A") || ($esc == "\x24\x41"))
          {
            $i += 2;
            continue;
          }
        }

        if (($i + 3) < $j)
        {
          $esc .= $string[$i + 3];

          if (($esc == "\x24\x28\x43") || ($esc == "\x24\x28\x44") || ($esc == "\x24\x2E\x41") || ($esc == "\x24\x2E\x46"))
          {
            $i += 3;
            continue;
          }
        }

        $result[] = CAMELLIA_REPLACEMENT_CHARACTER;
        continue;
      }

      if ($esc == "\x28\x42")
      {
        $result[] = ord($string[$i]);
      }
      elseif (($esc == "\x28\x4A") || ($esc == "\x24\x2E\x41") || ($esc == "\x24\x2E\x46"))
      {
        $n = Camellia_Converter::_bin2dec($string[$i]);

        if (isset($table[$esc][$n]))
        {
          $result[] = $table[$esc][$n];
        }
        else
        {
          $result[] = CAMELLIA_REPLACEMENT_CHARACTER;
        }
      }
      elseif ((($esc == "\x24\x40") || ($esc == "\x24\x42") || ($esc == "\x24\x41") || ($esc == "\x24\x28\x43") || ($esc == "\x24\x28\x44")) && (($i + 1) < $j))
      {
        $n = Camellia_Converter::_bin2dec($string[$i] . $string[++$i]);

        if (isset($table[$esc][$n]))
        {
          $result[] = $table[$esc][$n];
        }
        else
        {
          $result[] = CAMELLIA_REPLACEMENT_CHARACTER;
        }
      }
      else
      {
        $result[] = CAMELLIA_REPLACEMENT_CHARACTER;
      }
    }

    return $result;
  }

  /**
   * Encodes as ISO-2022-JP-2
   *
   * @access public
   * @param array $ucs UCS array
   * @return string on success; FALSE on failure
   */
  function _encodeISO2022JP2($ucs)
  {
    $table = array(
      "\x24\x40" => array_flip($this->getTable('jis_x0208')),
      "\x24\x42" => array_flip($this->getTable('jis_x0208')),
      "\x28\x4A" => array_flip($this->getTable('jis_x0201')),
      "\x24\x41" => array_flip($this->getTable('gb2312')),
      "\x24\x28\x43" => array_flip($this->getTable('ksc5601-1987')),
      "\x24\x28\x44" => array_flip($this->getTable('jis_x0212')),
      "\x24\x2E\x41" => array_flip($this->getTable('iso-8859-1')),
      "\x24\x2E\x46" => array_flip($this->getTable('iso-8859-7')),
    );

    $result = '';
    $mode = "\x28\x42";

    for ($i = 0, $j = count($ucs); $i < $j; ++$i)
    {
      foreach ($table as $k => $v)
      {
        if (isset($v[$ucs[$i]]))
        {
          if ($mode != $k)
          {
            $result .= "\x1B" . $k;
            $mode = $k;
          }

          $result .= Camellia_Converter::_dec2bin($v[$ucs[$i]]);

          continue 2;
        }
      }

      if ($mode != "\x28\x42")
      {
        $result .= "\x1B\x28\x42";
        $mode = "\x28\x42";
      }

      if ($ucs[$i] < 0x7F)
      {
        $result .= chr($ucs[$i]);
      }
      else
      {
        $result .= call_user_func($this->getReplaceHandler(), $ucs[$i]);
      }
    }

    if ($mode != "\x28\x42")
    {
      $result .= "\x1B\x28\x42";
    }

    return $result;
  }

  /**
   * Decodes as ISO-2022-JP-3
   *
   * @access public
   * @param string $string String
   * @return array on success; FALSE on failure
   */
  function _decodeISO2022JP3($string)
  {
    $table = array(
      "\x24\x40" => $this->getTable('jis_x0208'),
      "\x24\x42" => $this->getTable('jis_x0208'),
      "\x24\x28\x4F" => $this->getTable('jis_x0213-2000-1'),
      "\x24\x28\x50" => $this->getTable('jis_x0213-2000-2'),
      "\x28\x49" => $this->getTable('jis_x0201'),
    );

    $result = array();

    $esc = "\x28\x42";

    for ($i = 0, $j = strlen($string); $i < $j; ++$i)
    {
      if ($string[$i] == "\x1B")
      {
        if (($i + 2) < $j)
        {
          $esc = $string[$i + 1] . $string[$i + 2];

          if (($esc == "\x28\x42") || ($esc == "\x24\x40") || ($esc == "\x24\x42") || ($esc == "\x28\x49"))
          {
            $i += 2;
            continue;
          }
        }

        if (($i + 3) < $j)
        {
          $esc .= $string[$i + 3];

          if (($esc == "\x24\x28\x4F") || ($esc == "\x24\x28\x50"))
          {
            $i += 3;
            continue;
          }
        }

        $result[] = CAMELLIA_REPLACEMENT_CHARACTER;
        continue;
      }

      if ($esc == "\x28\x42")
      {
        $result[] = ord($string[$i]);
      }
      elseif ($esc == "\x28\x49")
      {
        $n = Camellia_Converter::_bin2dec($string[$i]) + 0x80;

        if (isset($table[$esc][$n]))
        {
          $result[] = $table[$esc][$n];
        }
        else
        {
          $result[] = CAMELLIA_REPLACEMENT_CHARACTER;
        }
      }
      elseif ((($esc == "\x24\x40") || ($esc == "\x24\x42") || ($esc == "\x24\x28\x4F") || ($esc == "\x24\x28\x50")) && (($i + 1) < $j))
      {
        $n = Camellia_Converter::_bin2dec($string[$i] . $string[++$i]);

        if (isset($table[$esc][$n]))
        {
          $result[] = $table[$esc][$n];
        }
        else
        {
          $result[] = CAMELLIA_REPLACEMENT_CHARACTER;
        }
      }
      else
      {
        $result[] = CAMELLIA_REPLACEMENT_CHARACTER;
      }
    }

    return $result;
  }

  /**
   * Encodes as ISO-2022-JP-3
   *
   * @access public
   * @param array $ucs UCS array
   * @return string on success; FALSE on failure
   */
  function _encodeISO2022JP3($ucs)
  {
    $table = array(
      "\x24\x40" => array_flip($this->getTable('jis_x0208')),
      "\x24\x42" => array_flip($this->getTable('jis_x0208')),
      "\x24\x28\x4F" => array_flip($this->getTable('jis_x0213-2000-1')),
      "\x24\x28\x50" => array_flip($this->getTable('jis_x0213-2000-2')),
      "\x28\x49" => array_flip($this->getTable('jis_x0201')),
    );

    $result = '';
    $mode = "\x28\x42";

    for ($i = 0, $j = count($ucs); $i < $j; ++$i)
    {
      foreach ($table as $k => $v)
      {
        if (isset($v[$ucs[$i]]))
        {
          if ($mode != $k)
          {
            $result .= "\x1B" . $k;
            $mode = $k;
          }

          $result .= Camellia_Converter::_dec2bin($v[$ucs[$i]]);

          continue 2;
        }
      }

      if ($mode != "\x28\x42")
      {
        $result .= "\x1B\x28\x42";
        $mode = "\x28\x42";
      }

      if ($ucs[$i] < 0x7F)
      {
        $result .= chr($ucs[$i]);
      }
      else
      {
        $result .= call_user_func($this->getReplaceHandler(), $ucs[$i]);
      }
    }

    if ($mode != "\x28\x42")
    {
      $result .= "\x1B\x28\x42";
    }

    return $result;
  }

  /**
   * Decodes as ISO-2022-JP-2004
   *
   * @access public
   * @param string $string String
   * @return array on success; FALSE on failure
   */
  function _decodeISO2022JP2004($string)
  {
    $table = array(
      "\x24\x40" => $this->getTable('jis_x0208'),
      "\x24\x42" => $this->getTable('jis_x0208'),
      "\x24\x28\x4F" => $this->getTable('jis_x0213-2000-1'),
      "\x24\x28\x50" => $this->getTable('jis_x0213-2000-2'),
      "\x24\x28\x51" => $this->getTable('jis_x0213-2004'),
      "\x28\x49" => $this->getTable('jis_x0201'),
    );

    $result = array();

    $esc = "\x28\x42";

    for ($i = 0, $j = strlen($string); $i < $j; ++$i)
    {
      if ($string[$i] == "\x1B")
      {
        if (($i + 2) < $j)
        {
          $esc = $string[$i + 1] . $string[$i + 2];

          if (($esc == "\x28\x42") || ($esc == "\x24\x40") || ($esc == "\x24\x42") || ($esc == "\x28\x49"))
          {
            $i += 2;
            continue;
          }
        }

        if (($i + 3) < $j)
        {
          $esc .= $string[$i + 3];

          if (($esc == "\x24\x28\x4F") || ($esc == "\x24\x28\x50") || ($esc == "\x24\x28\x51"))
          {
            $i += 3;
            continue;
          }
        }

        $result[] = CAMELLIA_REPLACEMENT_CHARACTER;
        continue;
      }

      if ($esc == "\x28\x42")
      {
        $result[] = ord($string[$i]);
      }
      elseif ($esc == "\x28\x49")
      {
        $n = Camellia_Converter::_bin2dec($string[$i]) + 0x80;

        if (isset($table[$esc][$n]))
        {
          $result[] = $table[$esc][$n];
        }
        else
        {
          $result[] = CAMELLIA_REPLACEMENT_CHARACTER;
        }
      }
      elseif ((($esc == "\x24\x40") || ($esc == "\x24\x42") || ($esc == "\x24\x28\x4F") || ($esc == "\x24\x28\x50") || ($esc == "\x24\x28\x51")) && (($i + 1) < $j))
      {
        $n = Camellia_Converter::_bin2dec($string[$i] . $string[++$i]);

        if (isset($table[$esc][$n]))
        {
          $result[] = $table[$esc][$n];
        }
        else
        {
          $result[] = CAMELLIA_REPLACEMENT_CHARACTER;
        }
      }
      else
      {
        $result[] = CAMELLIA_REPLACEMENT_CHARACTER;
      }
    }

    return $result;
  }

  /**
   * Encodes as ISO-2022-JP-2004
   *
   * @access public
   * @param array $ucs UCS array
   * @return string on success; FALSE on failure
   */
  function _encodeISO2022JP2004($ucs)
  {
    $table = array(
      "\x24\x40" => array_flip($this->getTable('jis_x0208')),
      "\x24\x42" => array_flip($this->getTable('jis_x0208')),
      "\x24\x28\x4F" => array_flip($this->getTable('jis_x0213-2000-1')),
      "\x24\x28\x50" => array_flip($this->getTable('jis_x0213-2000-2')),
      "\x24\x28\x51" => array_flip($this->getTable('jis_x0213-2004')),
      "\x28\x49" => array_flip($this->getTable('jis_x0201')),
    );

    $result = '';
    $mode = "\x28\x42";

    for ($i = 0, $j = count($ucs); $i < $j; ++$i)
    {
      foreach ($table as $k => $v)
      {
        if (isset($v[$ucs[$i]]))
        {
          if ($mode != $k)
          {
            $result .= "\x1B" . $k;
            $mode = $k;
          }

          $result .= Camellia_Converter::_dec2bin($v[$ucs[$i]]);

          continue 2;
        }
      }

      if ($mode != "\x28\x42")
      {
        $result .= "\x1B\x28\x42";
        $mode = "\x28\x42";
      }

      if ($ucs[$i] < 0x7F)
      {
        $result .= chr($ucs[$i]);
      }
      else
      {
        $result .= call_user_func($this->getReplaceHandler(), $ucs[$i]);
      }
    }

    if ($mode != "\x28\x42")
    {
      $result .= "\x1B\x28\x42";
    }

    return $result;
  }

  /**
   * Decodes as ISO-2022-KR
   *
   * @access public
   * @param string $string String
   * @return array on success; FALSE on failure
   */
  function _decodeISO2022KR($string)
  {
    $table = array(
      "\x24\x29\x43" => $this->getTable('ksc5601-1987'),
    );

    $result = array();

    $esc = "\x28\x42";

    for ($i = 0, $j = strlen($string); $i < $j; ++$i)
    {
      if ($string[$i] == "\x1B")
      {
        if (($i + 2) < $j)
        {
          $esc = $string[$i + 1] . $string[$i + 2];

          if ($esc == "\x28\x42")
          {
            $i += 2;
            continue;
          }
        }

        if (($i + 3) < $j)
        {
          $esc .= $string[$i + 3];

          if ($esc == "\x24\x29\x43")
          {
            $i += 3;
            continue;
          }
        }

        $result[] = CAMELLIA_REPLACEMENT_CHARACTER;
        continue;
      }

      if ($esc == "\x28\x42")
      {
        $result[] = ord($string[$i]);
      }
      elseif (($esc == "\x24\x29\x43") && (($i + 1) < $j))
      {
        $n = Camellia_Converter::_bin2dec($string[$i] . $string[++$i]);

        if (isset($table[$esc][$n]))
        {
          $result[] = $table[$esc][$n];
        }
        else
        {
          $result[] = CAMELLIA_REPLACEMENT_CHARACTER;
        }
      }
      else
      {
        $result[] = CAMELLIA_REPLACEMENT_CHARACTER;
      }
    }

    return $result;
  }

  /**
   * Encodes as ISO-2022-KR
   *
   * @access public
   * @param array $ucs UCS array
   * @return string on success; FALSE on failure
   */
  function _encodeISO2022KR($ucs)
  {
    $table = array(
      "\x24\x29\x43" => array_flip($this->getTable('ksc5601-1987')),
    );

    $result = '';
    $mode = "\x28\x42";

    for ($i = 0, $j = count($ucs); $i < $j; ++$i)
    {
      foreach ($table as $k => $v)
      {
        if (isset($v[$ucs[$i]]))
        {
          if ($mode != $k)
          {
            $result .= "\x1B" . $k;
            $mode = $k;
          }

          $result .= Camellia_Converter::_dec2bin($v[$ucs[$i]]);

          continue 2;
        }
      }

      if ($mode != "\x28\x42")
      {
        $result .= "\x1B\x28\x42";
        $mode = "\x28\x42";
      }

      if ($ucs[$i] < 0x7F)
      {
        $result .= chr($ucs[$i]);
      }
      else
      {
        $result .= call_user_func($this->getReplaceHandler(), $ucs[$i]);
      }
    }

    if ($mode != "\x28\x42")
    {
      $result .= "\x1B\x28\x42";
    }

    return $result;
  }

  /**
   * Decodes as ISO-10646-UCS-2
   *
   * @access public
   * @param string $string String
   * @return array on success; FALSE on failure
   */
  function _decodeUCS2($string)
  {
    return array_merge(unpack('n*', $string));
  }

  /**
   * Encodes as ISO-10646-UCS-2
   *
   * @access public
   * @param array $ucs UCS array
   * @return string on success; FALSE on failure
   */
  function _encodeUCS2($ucs)
  {
    $result = '';

    for ($i = 0, $j = count($ucs); $i < $j; ++$i)
    {
      if ($ucs[$i] <= 0xFFFF)
      {
        $result .= chr(($ucs[$i] & 0xFF00) >> 8) . chr($ucs[$i] & 0x00FF);
      }
      else
      {
        $ucs[$i--] = CAMELLIA_REPLACEMENT_CHARACTER;
      }
    }

    return $result;
  }

  /**
   * Decodes as ISO-10646-UCS-4
   *
   * @access public
   * @param string $string String
   * @return array on success; FALSE on failure
   */
  function _decodeUCS4($string)
  {
    return array_merge(unpack('N*', $string));
  }

  /**
   * Encodes as ISO-10646-UCS-4
   *
   * @access public
   * @param array $ucs UCS array
   * @return string on success; FALSE on failure
   */
  function _encodeUCS4($ucs)
  {
    array_unshift($ucs, 'N*');
    return call_user_func_array('pack', $ucs);
  }

  /**
   * Helper function for _decodeUTF1
   *
   * @access private
   * @ignore
   */
  function _decodeUTF1_U($n)
  {
    if ($n <= 0x20)
    {
      $n = $n + 0xBE;
    }
    elseif ($n <= 0x7E)
    {
      $n = $n - 0x21;
    }
    elseif ($n <= 0x9F)
    {
      $n = $n + 0x60;
    }
    else
    {
      $n = $n - 0x42;
    }

    return $n;
  }

  /**
   * Decodes as UTF-1
   *
   * @access public
   * @param string $string String
   * @return array on success; FALSE on failure
   */
  function _decodeUTF1($string)
  {
    $result = array();

    $b = unpack('C*', $string);

    for ($i = 1, $j = count($b); $i <= $j; ++$i)
    {
      if ($b[$i] < 0xA0)
      {
        $result[] = $b[$i];
      }
      elseif ($b[$i] < 0xA1)
      {
        $result[] = $b[++$i];
      }
      elseif ($b[$i] < 0xF6)
      {
        $result[] = (($b[$i] - 0xA1) * 0xBE) + $this->_decodeUTF1_U($b[++$i]) + 0x100;
      }
      elseif ($b[$i] < 0xFC)
      {
        $result[] = (($b[$i] - 0x00F6) * 0x8D04) + ($this->_decodeUTF1_U($b[++$i]) * 0xBE) + $this->_decodeUTF1_U($b[++$i]) + 0x4016;
      }
      else
      {
        $result[] = (($b[$i] - 0x00FC) * 0x4DAD6810) + ($this->_decodeUTF1_U($b[++$i]) * 0x68A8F8) + ($this->_decodeUTF1_U($b[++$i]) * 0x8D04) + ($this->_decodeUTF1_U($b[++$i]) * 0xBE) + $this->_decodeUTF1_U($b[++$i]) + 0x38E2E;
      }
    }

    return $result;
  }

  /**
   * Helper function for _encodeUTF1
   *
   * @access private
   * @ignore
   */
  function _encodeUTF1_T($n)
  {
    if ($n <= 0x5D)
    {
      $n = $n + 0x21;
    }
    elseif ($n <= 0xBD)
    {
      $n = $n + 0x42;
    }
    elseif ($n <= 0xDE)
    {
      $n = $n - 0xBE;
    }
    else
    {
      $n = $n - 0x60;
    }

    return $n;
  }

  /**
   * Encodes as UTF-1
   *
   * @access public
   * @param array $ucs UCS array
   * @return string on success; FALSE on failure
   */
  function _encodeUTF1($ucs)
  {
    $result = '';

    for ($i = 0, $j = count($ucs); $i < $j; ++$i)
    {
      if ($ucs[$i] <= 0x009F)
      {
        $result .= chr($ucs[$i]);
      }
      elseif ($ucs[$i] <= 0x00FF)
      {
        $result .= "\xA0" . chr($ucs[$i]);
      }
      elseif ($ucs[$i] <= 0x4015)
      {
        $result .= chr((($ucs[$i] - 0x100) / 0xBE) + 0xA1) . chr($this->_encodeUTF1_T(($ucs[$i] - 0x100) % 0xBE));
      }
      elseif ($ucs[$i] <= 0x38E2D)
      {
        $result .= chr((($ucs[$i] - 0x4016) / 0x8D04) + 0xF6) . chr($this->_encodeUTF1_T((($ucs[$i] - 0x4016) / 0xBE) % 0xBE)) . chr($this->_encodeUTF1_T(($ucs[$i] - 0x4016) % 0xBE));
      }
      else
      {
        $result .= chr((($ucs[$i] - 0x38E2E) / 0x4DAD6810) + 0xFC) . chr($this->_encodeUTF1_T(($ucs[$i] - 0x38E2E) / 0x68A8F8 % 0xBE)) . chr($this->_encodeUTF1_T(($ucs[$i] - 0x38E2E) / 0x8D04 % 0xBE)) . chr($this->_encodeUTF1_T(($ucs[$i] - 0x38E2E) / 0xBE % 0xBE)) . chr($this->_encodeUTF1_T(($ucs[$i] - 0x38E2E) % 0xBE));
      }
    }

    return $result;
  }

  /**
   * Decodes as UTF-5
   *
   * @access public
   * @param string $string String
   * @return array on success; FALSE on failure
   */
  function _decodeUTF5($string)
  {
    static $table = '0123456789ABCDEFGHIJKLMNOPQRSTUV';

    $result = array();

    $uni = 0;

    for ($i = 0, $j = strlen($string); $i < $j; ++$i)
    {
      $n = strpos($table, $string[$i]);

      if ($n >= 0x10)
      {
        if ($uni > 0)
        {
          $result[] = $uni;
        }

        $uni = $n & 0x0F;
      }
      else
      {
        $uni = ($uni << 4) | $n;
      }
    }

    if ($uni > 0)
    {
      $result[] = $uni;
    }

    return $result;
  }

  /**
   * Encodes as UTF-5
   *
   * @access public
   * @param array $ucs UCS array
   * @return string on success; FALSE on failure
   */
  function _encodeUTF5($ucs)
  {
    static $table = '0123456789ABCDEFGHIJKLMNOPQRSTUV';

    $result = '';

    foreach ($ucs as $uni)
    {
      if ($uni < 0x0010)
      {
        $result .= $table[($uni & 0x0F) | 0x10];
      }
      elseif ($uni < 0x0100)
      {
        $result .= $table[(($uni >> 4) & 0x0F) | 0x10] . $table[$uni & 0x0F];
      }
      elseif ($uni < 0x1000)
      {
        $result .= $table[(($uni >> 8) & 0x0F) | 0x10] . $table[($uni >> 4) & 0x0F] . $table[$uni & 0x0F];
      }
      elseif ($uni < 0x10000)
      {
        $result .= $table[(($uni >> 12) & 0x0F) | 0x10] . $table[($uni >> 8) & 0x0F] . $table[($uni >> 4) & 0x0F] . $table[$uni & 0x0F];
      }
      elseif ($uni < 0x100000)
      {
        $result .= $table[(($uni >> 16) & 0x0F) | 0x10] . $table[($uni >> 12) & 0x0F] . $table[($uni >> 8) & 0x0F] . $table[($uni >> 4) & 0x0F] . $table[$uni & 0x0F];
      }
      elseif ($uni < 0x1000000)
      {
        $result .= $table[(($uni >> 20) & 0x0F) | 0x10] . $table[($uni >> 16) & 0x0F] . $table[($uni >> 12) & 0x0F] . $table[($uni >> 8) & 0x0F] . $table[($uni >> 4) & 0x0F] . $table[$uni & 0x0F];
      }
      elseif ($uni < 0x10000000)
      {
        $result .= $table[(($uni >> 24) & 0x0F) | 0x10] . $table[($uni >> 20) & 0x0F] . $table[($uni >> 16) & 0x0F] . $table[($uni >> 12) & 0x0F] . $table[($uni >> 8) & 0x0F] . $table[($uni >> 4) & 0x0F] . $table[$uni & 0x0F];
      }
      else
      {
        $result .= $table[(($uni >> 28) & 0x0F) | 0x10] . $table[($uni >> 24) & 0x0F] . $table[($uni >> 20) & 0x0F] . $table[($uni >> 16) & 0x0F] . $table[($uni >> 12) & 0x0F] . $table[($uni >> 8) & 0x0F] . $table[($uni >> 4) & 0x0F] . $table[$uni & 0x0F];
      }
    }

    return $result;
  }

  /**
   * Decodes as UTF-7
   *
   * @access public
   * @param string $string String
   * @return array on success; FALSE on failure
   */
  function _decodeUTF7($string)
  {
    $result = array();

    $b = unpack('C*', $string);

    for ($i = 1, $j = count($b); $i <= $j; ++$i)
    {
      if ($b[$i] == 0x2B)
      {
        $pos = strpos($string, "\x2D", $i) - $i;

        if (++$i == ($pos + $i))
        {
          $result[] = 0x002B;
        }
        else
        {
          $result = array_merge($result, $this->_decodeUTF16BE(base64_decode(substr($string, $i - 1, $pos))));
          $i += $pos;
        }
      }
      else
      {
        $result[] = $b[$i];
      }
    }

    return $result;
  }

  /**
   * Encodes as UTF-7
   *
   * @access public
   * @param array $ucs UCS array
   * @return string on success; FALSE on failure
   */
  function _encodeUTF7($ucs)
  {
    $result = '';

    $temp = array();

    for ($i = 0, $j = count($ucs); $i < $j; ++$i)
    {
      if ($ucs[$i] <= 0x007F)
      {
        if (count($temp) > 0)
        {
          $result .= "\x2B" . str_replace("\x3D", '', base64_encode($this->_encodeUTF16BE($temp))) . "\x2D";
          $temp = array();
        }

        if ($ucs[$i] == 0x002B)
        {
          $result .= "\x2B\x2D";
        }
        else
        {
          $result .= chr($ucs[$i] & 0x7F);
        }
      }
      else
      {
        $temp[] = $ucs[$i];
      }
    }

    if (count($temp) > 0)
    {
      $result .= "\x2B" . str_replace("\x3D", '', base64_encode($this->_encodeUTF16BE($temp))) . "\x2D";
      $temp = array();
    }

    return $result;
  }

  /**
   * Decodes as IMAP4 modified UTF-7
   *
   * @access public
   * @param string $string String
   * @return array on success; FALSE on failure
   */
  function _decodeUTF7IMAP($string)
  {
    $result = array();

    $b = unpack('C*', $string);

    for ($i = 1, $j = count($b); $i <= $j; ++$i)
    {
      if ($b[$i] == 0x26)
      {
        $pos = strpos($string, "\x2D", $i) - $i;

        if (++$i == ($pos + $i))
        {
          $result[] = 0x0026;
        }
        else
        {
          $result = array_merge($result, $this->_decodeUTF16BE(base64_decode(str_replace("\x2C", "\x2F", substr($string, $i - 1, $pos)))));
          $i += $pos;
        }
      }
      else
      {
        $result[] = $b[$i];
      }
    }

    return $result;
  }

  /**
   * Encodes as IMAP4 modified UTF-7
   *
   * @access public
   * @param array $ucs UCS array
   * @return string on success; FALSE on failure
   */
  function _encodeUTF7IMAP($ucs)
  {
    $result = '';

    $temp = array();

    for ($i = 0, $j = count($ucs); $i < $j; ++$i)
    {
      if ($ucs[$i] <= 0x007F)
      {
        if (count($temp) > 0)
        {
          $result .= "\x26" . str_replace("\x2F", "\x2C", str_replace("\x3D", '', base64_encode($this->_encodeUTF16BE($temp)))) . "\x2D";
          $temp = array();
        }

        if ($ucs[$i] == 0x0026)
        {
          $result .= "\x26\x2D";
        }
        else
        {
          $result .= chr($ucs[$i] & 0x7F);
        }
      }
      else
      {
        $temp[] = $ucs[$i];
      }
    }

    if (count($temp) > 0)
    {
      $result .= "\x26" . str_replace("\x2F", "\x2C", str_replace("\x3D", '', base64_encode($this->_encodeUTF16BE($temp)))) . "\x2D";
      $temp = array();
    }

    return $result;
  }

  /**
   * Decodes as UTF-8
   *
   * @access public
   * @param string $string String
   * @return array on success; FALSE on failure
   */
  function _decodeUTF8($string)
  {
    $result = array();

    if (strpos($string, CAMELLIA_UTF8_BOM) === 0)
    {
      $string = substr($string, 3);
    }

    $b = unpack('C*', $string);

    for ($i = 1, $j = count($b); $i <= $j; ++$i)
    {
      if (($b[$i] & 0x80) == 0x00)
      {
        $result[] = $b[$i];
      }
      elseif ((($b[$i] & 0xE0) == 0xC0) && isset($b[$i + 1]))
      {
        $result[] = (($b[$i] & 0x1F) << 6) | ($b[++$i] & 0x3F);
      }
      elseif ((($b[$i] & 0xF0) == 0xE0) && isset($b[$i + 2]))
      {
        $result[] = (($b[$i] & 0x0F) << 12) | (($b[++$i] & 0x3F) << 6) | ($b[++$i] & 0x3F);
      }
      elseif ((($b[$i] & 0xF8) == 0xF0) && isset($b[$i + 3]))
      {
        $result[] = (($b[$i] & 0x07) << 18) | (($b[++$i] & 0x3F) << 12) | (($b[++$i] & 0x3F) << 6) | ($b[++$i] & 0x3F);
      }
      elseif ((($b[$i] & 0xFC) == 0xF8) && isset($b[$i + 4]))
      {
        // NOTE: From Unicode 3.1, non-shortest form is illegal
        $result[] = (($b[$i] & 0x03) << 24) | (($b[++$i] & 0x3F) << 18) | (($b[++$i] & 0x3F) << 12) | (($b[++$i] & 0x3F) << 6) | ($b[++$i] & 0x3F);
      }
      elseif ((($b[$i] & 0xFE) == 0xFC) && isset($b[$i + 5]))
      {
        // NOTE: From Unicode 3.1, non-shortest form is illegal
        $result[] = (($b[$i] & 0x01) << 30) | (($b[++$i] & 0x3F) << 24) | (($b[++$i] & 0x3F) << 18) | (($b[++$i] & 0x3F) << 12) | (($b[++$i] & 0x3F) << 6) | ($b[++$i] & 0x3F);
      }
      else
      {
        $result[] = CAMELLIA_REPLACEMENT_CHARACTER;
      }
    }

    return $result;
  }

  /**
   * Encodes as UTF-8
   *
   * @access public
   * @param array $ucs UCS array
   * @return string on success; FALSE on failure
   */
  function _encodeUTF8($ucs)
  {
    return CAMELLIA_UTF8_BOM . $this->_encodeUTF8N($ucs);
  }

  /**
   * Encodes as UTF-8 Normal
   *
   * @access public
   * @param array $ucs UCS array
   * @return string on success; FALSE on failure
   */
  function _encodeUTF8N($ucs)
  {
    $result = '';

    for ($i = 0, $j = count($ucs); $i < $j; ++$i)
    {
      if ($ucs[$i] <= 0x007F)
      {
        $result .= chr($ucs[$i] & 0x7F);
      }
      elseif ($ucs[$i] <= 0x07FF)
      {
        $result .= chr(($ucs[$i] >> 6) | 0xC0) . chr(($ucs[$i] & 0x3F) | 0x80);
      }
      elseif ($ucs[$i] <= 0xFFFF)
      {
        $result .= chr(($ucs[$i] >> 12) | 0xE0) . chr((($ucs[$i] >> 6) & 0x3F) | 0x80) . chr(($ucs[$i] & 0x003F) | 0x80);
      }
      elseif ($ucs[$i] <= 0x10FFFF)
      {
        $result .= chr(($ucs[$i] >> 18) | 0xF0) . chr((($ucs[$i] >> 12) & 0x3F) | 0x80) . chr((($ucs[$i] >> 6) & 0x3F) | 0x80) . chr(($ucs[$i] & 0x3F) | 0x80);
      }
      else
      {
        $ucs[$i--] = CAMELLIA_REPLACEMENT_CHARACTER;
      }
    }

    return $result;
  }

  /**
   * Decodes as UTF-16
   *
   * @access public
   * @param string $string String
   * @return array on success; FALSE on failure
   */
  function _decodeUTF16($string)
  {
    if (strpos($string, CAMELLIA_UTF16BE_BOM) === 0)
    {
      return $this->_decodeUTF16BE(substr($string, 2));
    }
    elseif (strpos($string, CAMELLIA_UTF16LE_BOM) === 0)
    {
      return $this->_decodeUTF16LE(substr($string, 2));
    }
    else
    {
      return $this->_decodeUTF16BE($string);
    }
  }

  /**
   * Encodes as UTF-16
   *
   * @access public
   * @param array $ucs UCS array
   * @return string on success; FALSE on failure
   */
  function _encodeUTF16($ucs)
  {
    return CAMELLIA_UTF16BE_BOM . $this->_encodeUTF16BE($ucs);
  }

  /**
   * Decodes as UTF-16BE
   *
   * @access public
   * @param string $string String
   * @return array on success; FALSE on failure
   */
  function _decodeUTF16BE($string)
  {
    // Input length must be dividable by 2
    if (strlen($string) % 2)
    {
      return false;
    }

    $result = array();

    $b = unpack('C*', $string);

    for ($i = 1, $j = count($b); $i <= $j; $i += 2)
    {
      $hi = (($b[$i] << 8) & 0xFFFF) | $b[$i + 1];

      if (($hi >= 0xD800) && ($hi <= 0xDBFF) && (($i + 3) <= $j))
      {
        $lo = (($b[$i + 2] << 8) & 0xFFFF) | $b[$i + 3];

        if (($lo >= 0xDC00) && ($lo <= 0xDFFF))
        {
          $result[] = ($hi - 0xD800) * 0x400 + ($lo - 0xDC00) + 0x10000;
          $i += 2;
          continue;
        }
      }

      if ($hi <= 0xFFFF)
      {
        $result[] = $hi;
      }
      else
      {
        $result[] = CAMELLIA_REPLACEMENT_CHARACTER;
      }
    }

    return $result;
  }

  /**
   * Encodes as UTF-16BE
   *
   * @access public
   * @param array $ucs UCS array
   * @return string on success; FALSE on failure
   */
  function _encodeUTF16BE($ucs)
  {
    $result = '';

    for ($i = 0, $j = count($ucs); $i < $j; ++$i)
    {
      if ($ucs[$i] <= 0xFFFF)
      {
        $result .= chr(($ucs[$i] & 0xFF00) >> 8) . chr($ucs[$i] & 0x00FF);
      }
      elseif ($ucs[$i] <= 0x10FFFF)
      {
        $s = $ucs[$i] - 0x10000;
        $hi = ((($s & 0x1FFC00) >> 10) & 0xFFFF) | 0xD800;
        $lo = (($s & 0x03FF) & 0xFFFF) | 0xDC00;
        $result .= chr(($hi & 0xFF00) >> 8) . chr($hi & 0x00FF) . chr(($lo & 0xFF00) >> 8) . chr($lo & 0x00FF);
      }
      else
      {
        $ucs[$i--] = CAMELLIA_REPLACEMENT_CHARACTER;
      }
    }

    return $result;
  }

  /**
   * Decodes as UTF-16LE
   *
   * @access public
   * @param string $string String
   * @return array on success; FALSE on failure
   */
  function _decodeUTF16LE($string)
  {
    // Input length must be dividable by 2
    if (strlen($string) % 2)
    {
      return false;
    }

    $result = array();

    $b = unpack('C*', $string);

    for ($i = 1, $j = count($b); $i <= $j; $i += 2)
    {
      $hi = (($b[$i + 1] << 8) & 0xFFFF) | $b[$i];

      if (($hi >= 0xD800) && ($hi <= 0xDBFF) && (($i + 3) <= $j))
      {
        $lo = (($b[$i + 3] << 8) & 0xFFFF) | $b[$i + 2];

        if (($lo >= 0xDC00) && ($lo <= 0xDFFF))
        {
          $result[] = ($hi - 0xD800) * 0x400 + ($lo - 0xDC00) + 0x10000;
          $i += 2;
          continue;
        }
      }

      if ($hi <= 0xFFFF)
      {
        $result[] = $hi;
      }
      else
      {
        $result[] = CAMELLIA_REPLACEMENT_CHARACTER;
      }
    }

    return $result;
  }

  /**
   * Encodes as UTF-16LE
   *
   * @access public
   * @param array $ucs UCS array
   * @return string on success; FALSE on failure
   */
  function _encodeUTF16LE($ucs)
  {
    $result = '';

    for ($i = 0, $j = count($ucs); $i < $j; ++$i)
    {
      if ($ucs[$i] <= 0xFFFF)
      {
        $result .= chr($ucs[$i] & 0x00FF) . chr(($ucs[$i] & 0xFF00) >> 8);
      }
      elseif ($ucs[$i] <= 0x10FFFF)
      {
        $s = $ucs[$i] - 0x10000;
        $hi = ((($s & 0x1FFC00) >> 10) & 0xFFFF) | 0xD800;
        $lo = (($s & 0x03FF) & 0xFFFF) | 0xDC00;
        $result .= chr($hi & 0x00FF) . chr(($hi & 0xFF00) >> 8) . chr($lo & 0x00FF) . chr(($lo & 0xFF00) >> 8);
      }
      else
      {
        $ucs[$i--] = CAMELLIA_REPLACEMENT_CHARACTER;
      }
    }

    return $result;
  }

  /**
   * Decodes as UTF-32
   *
   * @access public
   * @param string $string String
   * @return array on success; FALSE on failure
   */
  function _decodeUTF32($string)
  {
    if (strpos($string, CAMELLIA_UTF32BE_BOM) === 0)
    {
      return $this->_decodeUTF32BE(substr($string, 4));
    }
    elseif (strpos($string, CAMELLIA_UTF32LE_BOM) === 0)
    {
      return $this->_decodeUTF32LE(substr($string, 4));
    }
    else
    {
      return $this->_decodeUTF32BE($string);
    }
  }

  /**
   * Encodes as UTF-32
   *
   * @access public
   * @param array $ucs UCS array
   * @return string on success; FALSE on failure
   */
  function _encodeUTF32($ucs)
  {
    return CAMELLIA_UTF32BE_BOM . $this->_encodeUTF32BE($ucs);
  }

  /**
   * Decodes as UTF-32BE
   *
   * @access public
   * @param string $string String
   * @return array on success; FALSE on failure
   */
  function _decodeUTF32BE($string)
  {
    // Input length must be dividable by 4
    if (strlen($string) % 4)
    {
      return false;
    }

    $result = array();

    $b = unpack('C*', $string);

    for ($i = 1, $j = count($b); $i <= $j; $i += 4)
    {
      $uni = $b[$i + 3] + ($b[$i + 2] << 8) + ($b[$i + 1] << 16) + ($b[$i] << 24);

      if ($uni <= 0x10FFFF)
      {
        $result[] = $uni;
      }
      else
      {
        $result[] = CAMELLIA_REPLACEMENT_CHARACTER;
      }
    }

    return $result;
  }

  /**
   * Encodes as UTF-32BE
   *
   * @access public
   * @param array $ucs UCS array
   * @return string on success; FALSE on failure
   */
  function _encodeUTF32BE($ucs)
  {
    $result = '';

    for ($i = 0, $j = count($ucs); $i < $j; ++$i)
    {
      if ($ucs[$i] <= 0x10FFFF)
      {
        $result .= chr(($ucs[$i] & 0xFF000000) >> 24) . chr(($ucs[$i] & 0xFF0000) >> 16) . chr(($ucs[$i] & 0xFF00) >> 8) . chr($ucs[$i] & 0x00FF);
      }
      else
      {
        $ucs[$i--] = CAMELLIA_REPLACEMENT_CHARACTER;
      }
    }

    return $result;
  }

  /**
   * Decodes as UTF-32LE
   *
   * @access public
   * @param string $string String
   * @return array on success; FALSE on failure
   */
  function _decodeUTF32LE($string)
  {
    // Input length must be dividable by 4
    if (strlen($string) % 4)
    {
      return false;
    }

    $result = array();

    $b = unpack('C*', $string);

    for ($i = 1, $j = count($b); $i <= $j; $i += 4)
    {
      $uni = $b[$i] + ($b[$i + 1] << 8) + ($b[$i + 2] << 16) + ($b[$i + 3] << 24);

      if ($uni <= 0x10FFFF)
      {
        $result[] = $uni;
      }
      else
      {
        $result[] = CAMELLIA_REPLACEMENT_CHARACTER;
      }
    }

    return $result;
  }

  /**
   * Encodes as UTF-32LE
   *
   * @access public
   * @param array $ucs UCS array
   * @return string on success; FALSE on failure
   */
  function _encodeUTF32LE($ucs)
  {
    $result = '';

    for ($i = 0, $j = count($ucs); $i < $j; ++$i)
    {
      if ($ucs[$i] <= 0x10FFFF)
      {
        $result .= chr($ucs[$i] & 0x00FF) . chr(($ucs[$i] & 0xFF00) >> 8) . chr(($ucs[$i] & 0xFF0000) >> 16) . chr(($ucs[$i] & 0xFF000000) >> 24);
      }
      else
      {
        $ucs[$i--] = CAMELLIA_REPLACEMENT_CHARACTER;
      }
    }

    return $result;
  }

  /**
   * Decodes as VIQRI
   *
   * @access public
   * @param string $string String
   * @return array on success; FALSE on failure
   */
  function _decodeVIQRI($string)
  {
    $result = array();

    $table = $this->_viqri_mapping;

    for ($i = 0, $j = strlen($string); $i < $j; ++$i)
    {
      if (($i + 2) <= $j)
      {
        $k = $string[$i] . $string[$i + 1] . $string[$i + 2];

        if (isset($table[$k]))
        {
          $result[] = $table[$k];
          $i += 2;
          continue;
        }
      }

      if (($i + 1) <= $j)
      {
        $k = $string[$i] . $string[$i + 1];

        if (isset($table[$k]))
        {
          $result[] = $table[$k];
          ++$i;
          continue;
        }
      }

      $uni = ord($string[$i]);

      if ($uni <= 0x7F)
      {
        $result[] = $uni;
      }
      else
      {
        $result[] = CAMELLIA_REPLACEMENT_CHARACTER;
      }
    }

    return $result;
  }

  /**
   * Encodes as VIQRI
   *
   * @access public
   * @param array $ucs UCS array
   * @return string on success; FALSE on failure
   */
  function _encodeVIQRI($ucs)
  {
    $result = '';

    $table = array_flip($this->_viqri_mapping);

    foreach ($ucs as $uni)
    {
      if (isset($table[$uni]))
      {
        $result .= $table[$uni];
      }
      elseif ($uni <= 0x007F)
      {
        $result .= chr($uni);
      }
      else
      {
        $result .= call_user_func($this->getReplaceHandler(), $uni);
      }
    }

    return $result;
  }

}
