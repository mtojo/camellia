Camellia
========

Description
-----------

Pure PHP character encoding conversion library.
Supported over 350 character encodings.

Usage
-----

Character encoding conversion:

    $string = 'String encoded by Shift_JIS.';
    $conv = new Camellia_Converter;
    $string = $conv->convert('Shift_JIS', 'UTF-8', $string);
    // -> $string is encoded by UTF-8.

Character encoding detection (Currently supported Japanese only):

    $charset = Camellia_Detector::detect($string, 'Japanese');

Supported Charsets
------------------

Name: Alternativnyj Variant
Internal: alternativnyj
Language: Russian

Name: Amiga-1251
Internal: amiga-1251
Language: Russian
Source: http://www.amiga.ultranet.ru/Amiga-1251.html

Name: ANSEL
Internal: ansel
Language: Platform specifics
Source: http://heiner-eichmann.de/gedcom/ansset.htm

Name: ArmSCII-7
Internal: armscii-7
Language: Armenian
Source: http://pre98.elections.am/Software/

Name: ArmSCII-8
Internal: armscii-8
Language: Armenian
Source: http://pre98.elections.am/Software/

Name: ArmSCII-8 (DOS/Macintosh)
Internal: armscii-8a
Language: Armenian
Source: http://pre98.elections.am/Software/

Name: AST166-7:1997
Internal: ast166-7
Language: Armenian
Source: http://moon.yerphi.am/~hovik/Armenian/Tables.html

Name: AST166-8:1997
Internal: ast166-8
Language: Armenian
Source: http://moon.yerphi.am/~hovik/Armenian/Tables.html

Name: AST166-8:1997 (DOS/Macintosh)
Internal: ast166-8a
Language: Armenian
Source: http://moon.yerphi.am/~hovik/Armenian/Tables.html

Name: Atari ST
Internal: atarist
Language: Platform specifics
Source: http://www.unicode.org/Public/MAPPINGS/

Name: ATASCII
Internal: atascii
Language: Platform specifics
Source: http://raster.infos.cz/atari/chars/atascii.htm
Note: Some characters not compatible with Unicode

Name: Baltic
Internal: baltic
Language: Baltic

Name: Big5:1984
Internal: big5-1984
Language: Traditional Chinese
Source: http://wakaba-web.hp.infoseek.co.jp/

Name: Big5:2003
Internal: big5-2003
Language: Traditional Chinese
Source: http://www.gnu.org/software/libiconv/

Name: Big5-ETen
Internal: big5-eten
Language: Traditional Chinese
Source: http://wakaba-web.hp.infoseek.co.jp/

Name: Big5E
Internal: big5-ext
Language: Traditional Chinese
Source: http://wakaba-web.hp.infoseek.co.jp/

Name: Big5 + GCCS
Internal: big5-gccs
Language: Traditional Chinese
Source: http://wakaba-web.hp.infoseek.co.jp/

Name: Big5-HKSCS:1999
Internal: big5-hkscs-1999
Language: Traditional Chinese
Source: http://wakaba-web.hp.infoseek.co.jp/

Name: Big5-HKSCS:2001
Internal: big5-hkscs-2001
Language: Traditional Chinese
Source: http://wakaba-web.hp.infoseek.co.jp/

Name: Big5+
Internal: big5-plus
Language: Traditional Chinese
Source: http://wakaba-web.hp.infoseek.co.jp/

Name: Bulgarian MIK
Internal: bulgarian-mik
Language: Bulgarian
Source: http://en.wikipedia.org/wiki/MIK_Code_page

Name: CNS 11643-1986
Internal: cns11643-1986
Language: Traditional Chinese
Source: http://www.unicode.org/Public/MAPPINGS/

Name: CNS 11643-1992
Internal: cns11643-1992
Language: Traditional Chinese

Name: IBM037
Internal: cp037
Language: English
Source: http://www.unicode.org/Public/MAPPINGS/

Name: IBM038
Internal: cp038
Language: ?

Name: PTCP154
Internal: cp154
Language: Kazakh

Name: IBM256
Internal: cp256
Language: Western European

Name: IBM273
Internal: cp273
Language: German

Name: IBM274
Internal: cp274
Language: Western European

Name: IBM275
Internal: cp275
Language: Portuguese

Name: IBM277
Internal: cp277
Language: Norwegian

Name: IBM278
Internal: cp278
Language: Swedish

Name: IBM280
Internal: cp280
Language: Western European

Name: IBM281
Internal: cp281
Language: ?

Name: IBM284
Internal: cp284
Language: Western European

Name: IBM285
Internal: cp285
Language: English

Name: IBM290
Internal: cp290
Language: Japanese

Name: IBM297
Internal: cp297
Language: Western European

Name: IBM420
Internal: cp420
Language: Arabic

Name: IBM423
Internal: cp423
Language: Greek

Name: IBM424
Internal: cp424
Language: Hebrew
Source: http://www.unicode.org/Public/MAPPINGS/

Name: IBM437
Internal: cp437
Language: English
Source: http://www.unicode.org/Public/MAPPINGS/

Name: IBM500
Internal: cp500
Language: Western European
Source: http://www.unicode.org/Public/MAPPINGS/

Name: IBM708
Internal: cp708
Language: ?

Name: IBM720
Internal: cp720
Language: Arabic

Name: IBM737
Internal: cp737
Language: Greek
Source: http://www.unicode.org/Public/MAPPINGS/

Name: IBM775
Internal: cp775
Language: Baltic
Source: http://www.unicode.org/Public/MAPPINGS/

Name: IBM806
Internal: cp806
Language: Hindi

Name: IBM833
Internal: cp833
Language: Korean

Name: IBM838
Internal: cp838
Language: Thai

Name: IBM849
Internal: cp849
Language: Bulgarian, Byelorussian, Macedonian, Russian, Serbian

Name: IBM850
Internal: cp850
Language: Western European
Source: http://www.unicode.org/Public/MAPPINGS/

Name: IBM851
Internal: cp851
Language: Greek

Name: IBM852
Internal: cp852
Language: Central and Eastern European
Source: http://www.unicode.org/Public/MAPPINGS/

Name: IBM853
Internal: cp853
Language: ?

Name: IBM855
Internal: cp855
Language: Bulgarian, Byelorussian, Macedonian, Russian, Serbian
Source: http://www.unicode.org/Public/MAPPINGS/

Name: IBM856
Internal: cp856
Language: Hebrew
Source: http://www.unicode.org/Public/MAPPINGS/

Name: IBM857
Internal: cp857
Language: Turkish
Source: http://www.unicode.org/Public/MAPPINGS/

Name: IBM00858
Internal: cp858
Language: Western European

Name: IBM860
Internal: cp860
Language: Portuguese
Source: http://www.unicode.org/Public/MAPPINGS/

Name: IBM861
Internal: cp861
Language: Icelandic
Source: http://www.unicode.org/Public/MAPPINGS/

Name: IBM862
Internal: cp862
Language: Hebrew
Source: http://www.unicode.org/Public/MAPPINGS/

Name: IBM863
Internal: cp863
Language: Canadian
Source: http://www.unicode.org/Public/MAPPINGS/

Name: IBM864
Internal: cp864
Language: Arabic
Source: http://www.unicode.org/Public/MAPPINGS/

Name: IBM865
Internal: cp865
Language: Danish, Norwegian
Source: http://www.unicode.org/Public/MAPPINGS/

Name: IBM866
Internal: cp866
Language: Russian
Source: http://www.unicode.org/Public/MAPPINGS/

Name: IBM868
Internal: cp868
Language: Urdu

Name: IBM869
Internal: cp869
Language: Greek
Source: http://www.unicode.org/Public/MAPPINGS/

Name: IBM870
Internal: cp870
Language: Western European

Name: IBM871
Internal: cp871
Language: Icelandic

Name: IBM874
Internal: cp874
Language: Thai
Source: http://www.unicode.org/Public/MAPPINGS/

Name: IBM875
Internal: cp875
Language: Greek
Source: http://www.unicode.org/Public/MAPPINGS/

Name: IBM880
Internal: cp880
Language: Russian

Name: IBM904
Internal: cp904
Language: English

Name: IBM905
Internal: cp905
Language: Turkish

Name: IBM918
Internal: cp918
Language: Urdu

Name: IBM922
Internal: cp922
Language: Estonian

Name: IBM00924
Internal: cp924
Language: Western European

Name: IBM942
Internal: cp942
Language: Japanese

Name: IBM943
Internal: cp943
Language: Japanese

Name: IBM948
Internal: cp948
Language: Traditional Chinese

Name: IBM949
Internal: cp949
Language: Korean
Source: http://www.unicode.org/Public/MAPPINGS/

Name: IBM950
Internal: cp950
Language: Traditional Chinese
Source: http://www.unicode.org/Public/MAPPINGS/

Name: IBM954
Internal: cp954
Language: ?

Name: IBM964
Internal: cp964
Language: Traditional Chinese

Name: IBM1004
Internal: cp1004
Language: Western European

Name: IBM1006
Internal: cp1006
Language: Urdu

Name: IBM1025
Internal: cp1025
Language: Bulgarian, Byelorussian, Macedonian, Russian, Serbian

Name: IBM1026
Internal: cp1026
Language: Turkish
Source: http://www.unicode.org/Public/MAPPINGS/

Name: IBM1046
Internal: cp1046
Language: Arabic

Name: IBM1047
Internal: cp1047
Language: Western European

Name: IBM1051
Internal: cp1051
Language: Western European

Name: IBM1098
Internal: cp1098
Language: Persian

Name: IBM1124
Internal: cp1124
Language: Bulgarian, Byelorussian, Macedonian, Russian, Serbian

Name: IBM1125
Internal: cp1125
Language: Bulgarian, Byelorussian, Macedonian, Russian, Serbian

Name: IBM1129
Internal: cp1129
Language: Vietnamese

Name: IBM1131
Internal: cp1131
Language: Bulgarian, Byelorussian, Macedonian, Russian, Serbian

Name: IBM1132
Internal: cp1132
Language: Laotian

Name: IBM1133
Internal: cp1133
Language: Laotian

Name: IBM01140
Internal: cp1140
Language: English

Name: IBM01141
Internal: cp1141
Language: German

Name: IBM01142
Internal: cp1142
Language: Norwegian

Name: IBM01143
Internal: cp1143
Language: Swedish

Name: IBM01144
Internal: cp1144
Language: Western European

Name: IBM01145
Internal: cp1145
Language: Western European

Name: IBM01146
Internal: cp1146
Language: English

Name: IBM01147
Internal: cp1147
Language: Western European

Name: IBM01148
Internal: cp1148
Language: Central and Eastern European

Name: IBM01149
Internal: cp1149
Language: Icelandic

Name: IBM1160
Internal: cp1160
Language: Thai

Name: IBM1161
Internal: cp1161
Language: Thai

Name: IBM1162
Internal: cp1162
Language: Thai

Name: IBM1163
Internal: cp1163
Language: Vietnamese

Name: IBM1164
Internal: cp1164
Language: Vietnamese

Name: IBM1361
Internal: cp1361
Language: ?

Name: IBM1370
Internal: cp1370
Language: ?

Name: IBM1381
Internal: cp1381
Language: Simplified Chinese

Name: IBM1383
Internal: cp1383
Language: Simplified Chinese

Name: IBM1386
Internal: cp1386
Language: ?

Name: CP5104
Internal: cp5104
Language: Arabic

Name: CP5478
Internal: cp5478
Language: ?

Name: CP20001
Internal: cp20001
Language: ?

Name: CP20002
Internal: cp20002
Language: Traditional Chinese

Name: CP20003
Internal: cp20003
Language: ?

Name: CP20004
Internal: cp20004
Language: ?

Name: CP20005
Internal: cp20005
Language: ?

Name: CP20105
Internal: cp20105
Language: ?

Name: CP20261
Internal: cp20261
Language: ?

Name: CP20269
Internal: cp20269
Language: ?

Name: CWI
Internal: cwi
Language: ?

Name: DEC Hanyu
Internal: dec-hanyu
Language: Traditional Chinese

Name: DEC Hanji
Internal: dec-hanzi
Language: Simplified Chinese

Name: DEC Kanji
Internal: dec-kanji
Language: Japanese

Name: DEC-MCS
Internal: dec-mcs
Language: Western European

Name: dk-us
Internal: dk-us
Language: ?

Name: DS_2089
Internal: ds2089
Language: ?

Name: EBCDIC-AT-DE
Internal: ebcdic-at-de
Language: ?

Name: EBCDIC-AT-DE-A
Internal: ebcdic-at-de-a
Language: ?

Name: EBCDIC-CA-FR
Internal: ebcdic-ca-fr
Language: ?

Name: EBCDIC-DK-NO
Internal: ebcdic-dk-no
Language: ?

Name: EBCDIC-DK-NO-A
Internal: ebcdic-dk-no-a
Language: ?

Name: EBCDIC-ES
Internal: ebcdic-es
Language: ?

Name: EBCDIC-ES-A
Internal: ebcdic-es-a
Language: ?

Name: EBCDIC-ES-S
Internal: ebcdic-es-s
Language: ?

Name: EBCDIC-FI-SE
Internal: ebcdic-fi-se
Language: ?

Name: EBCDIC-FI-SE-A
Internal: ebcdic-fi-se-a
Language: ?

Name: EBCDIC-FR
Internal: ebcdic-fr
Language: ?

Name: EBCDIC-IS-FRISS
Internal: ebcdic-is-friss
Language: ?

Name: EBCDIC-IT
Internal: ebcdic-it
Language: ?

Name: EBCDIC-PT
Internal: ebcdic-pt
Language: ?

Name: EBCDIC-UK
Internal: ebcdic-uk
Language: ?

Name: EBCDIC-US
Internal: ebcdic-us
Language: ?

Name: GB_2312-80
Internal: euc-cn
Language: Simplified Chinese

Name: EUC-JIS-2004
Internal: euc-jis-2004
Language: Japanese
Source: http://x0213.org/

Name: EUC-JISX0213
Internal: euc-jisx0213
Language: Japanese
Source: http://wakaba-web.hp.infoseek.co.jp/

Name: Extended_UNIX_Code_Packed_Format_for_Japanese
Internal: euc-jp
Language: Japanese
Source: http://wakaba-web.hp.infoseek.co.jp/

Name: EUC-JP-MS
Internal: euc-jp-ms
Language: Japanese

Name: EUC-KR
Internal: euc-kr
Language: Korean

Name: EUC-TW
Internal: euc-tw
Language: Traditional Chinese

Name: Fieldata
Internal: fieldata
Language: English
Source: http://en.wikipedia.org/wiki/Fieldata

Name: GB2312
Internal: gb2312
Language: Simplified Chinese

Name: GB12345-90
Internal: gb12345-90
Language: Traditional Chinese

Name: GB18030
Internal: gb18030
Language: Unified Chinese

Name: GBK
Internal: gbk
Language: Unified Chinese

Name: Georgian InfoTech/Academy
Internal: georgian-academy
Language: Georgian

Name: Georgian Parliament
Internal: georgian-ps
Language: Georgian

Name: GEOSTD8
Internal: geostd8
Language: Georgian
Source: Internet-Drafts - draft-giasher-geostd8-01.txt

Name: ETSI GSM 03.38
Internal: gsm0338
Language: Greek
Source: http://www.unicode.org/Public/MAPPINGS/

Name: HP-CCDC
Internal: hp-ccdc
Language: ?

Name: hp-roman8
Internal: hp-roman8
Language: Platform specifics

Name: DIN_66003
Internal: ia5-german
Language: German

Name: IA5
Internal: ia5-irv
Language: Western European

Name: NS_4551-2
Internal: ia5-norwegian
Language: Norwegian

Name: SEN_850200_C
Internal: ia5-swedish
Language: Swedish

Name: INVARIANT
Internal: invariant
Language: ?

Name: x-iscii-as
Internal: iscii-as
Language: Assamese

Name: x-iscii-be
Internal: iscii-be
Language: Bengali

Name: x-iscii-de
Internal: iscii-de
Language: Devanagari

Name: x-iscii-gu
Internal: iscii-gu
Language: Gujarathi

Name: x-iscii-ka
Internal: iscii-ka
Language: Kannada

Name: x-iscii-ma
Internal: iscii-ma
Language: Malayalam

Name: x-iscii-or
Internal: iscii-or
Language: Oriya

Name: x-iscii-pa
Internal: iscii-pa
Language: Panjabi

Name: x-iscii-ta
Internal: iscii-ta
Language: Tamil

Name: x-iscii-te
Internal: iscii-te
Language: Telugu

Name: ISIRI 3342:1992
Internal: isiri-3342
Language: Farsi

Name: ISO_646.basic:1983
Internal: iso-646-basic
Language: ?

Name: ISO_646.irv:1983
Internal: iso-646-irv
Language: ?

Name: ISO-2022-CN
Internal: iso-2022-cn
Language: Traditional Chinese

Name: ISO-2022-CN-EXT
Internal: iso-2022-cn-ext
Language: Traditional Chinese

Name: ISO-2022-JP
Internal: iso-2022-jp
Language: Japanese

Name: ISO-2022-JP-1
Internal: iso-2022-jp-1
Language: Japanese

Name: ISO-2022-JP-2
Internal: iso-2022-jp-2
Language: Japanese, Korean, Simplified Chinese, Western European, Greek

Name: ISO-2022-JP-3
Internal: iso-2022-jp-3
Language: Japanese

Name: ISO-2022-JP-2004
Internal: iso-2022-jp-2004
Language: Japanese

Name: ISO-2022-KR
Internal: iso-2022-kr
Language: Korean

Name: ISO 5426:1980
Internal: iso-5426
Language: ?
Note: Extended Latin for Bibliographic use

Name: ISO-6937
Internal: iso-6937
Language: ?

Name: ISO-6937-2
Internal: iso-6937-2
Language: ?

Name: ISO_8859-1:1987
Internal: iso-8859-1
Language: Western European
Source: http://www.unicode.org/Public/MAPPINGS/

Name: ISO_8859-2:1987
Internal: iso-8859-2
Language: Central and Eastern European
Source: http://www.unicode.org/Public/MAPPINGS/

Name: ISO_8859-3:1988
Internal: iso-8859-3
Language: Esperanto, Maltese
Source: http://www.unicode.org/Public/MAPPINGS/

Name: ISO_8859-4:1988
Internal: iso-8859-4
Language: Baltic
Source: http://www.unicode.org/Public/MAPPINGS/

Name: ISO_8859-5:1988
Internal: iso-8859-5
Language: Bulgarian, Byelorussian, Macedonian, Russian, Serbian
Source: http://www.unicode.org/Public/MAPPINGS/

Name: ISO_8859-6:1987
Internal: iso-8859-6
Language: Arabic
Source: http://www.unicode.org/Public/MAPPINGS/

Name: ISO_8859-7:1987
Internal: iso-8859-7
Language: Greek
Source: http://www.unicode.org/Public/MAPPINGS/

Name: ISO_8859-8:1988
Internal: iso-8859-8
Language: Hebrew
Source: http://www.unicode.org/Public/MAPPINGS/

Name: ISO_8859-9:1989
Internal: iso-8859-9
Language: Turkish
Source: http://www.unicode.org/Public/MAPPINGS/

Name: ISO-8859-10
Internal: iso-8859-10
Language: Norwegian
Source: http://www.unicode.org/Public/MAPPINGS/

Name: ISO-8859-11
Internal: iso-8859-11
Language: Thai
Source: http://www.unicode.org/Public/MAPPINGS/

Name: ISO-8859-13
Internal: iso-8859-13
Language: Baltic
Source: http://www.unicode.org/Public/MAPPINGS/

Name: ISO-8859-14
Internal: iso-8859-14
Language: Celtic
Source: http://www.unicode.org/Public/MAPPINGS/

Name: ISO-8859-15
Internal: iso-8859-15
Language: Western European
Source: http://www.unicode.org/Public/MAPPINGS/

Name: ISO-8859-16
Internal: iso-8859-16
Language: Central and Eastern European
Source: http://www.unicode.org/Public/MAPPINGS/

Name: ISO_8859-supp
Internal: iso-8859-supp
Language: ?

Name: ISO-10646-UCS-2
Internal: iso-10646-ucs-2
Language: Full Unicode

Name: ISO-10646-UCS-4
Internal: iso-10646-ucs-4
Language: Full Unicode

Name: BS_4730
Internal: iso-ir-4
Language: ?

Name: NATS-SEFI
Internal: iso-ir-8-1
Language: ?

Name: NATS-SEFI-ADD
Internal: iso-ir-8-2
Language: ?

Name: NATS-DANO
Internal: iso-ir-9-1
Language: ?

Name: NATS-DANO-ADD
Internal: iso-ir-9-2
Language: ?

Name: SEN_850200_B
Internal: iso-ir-10
Language: ?

Name: JIS_C6220-1969-jp
Internal: iso-ir-13
Language: Japanese

Name: JIS_C6220-1969-ro
Internal: iso-ir-14
Language: Japanese

Name: IT
Internal: iso-ir-15
Language: ?

Name: PT
Internal: iso-ir-16
Language: ?

Name: ES
Internal: iso-ir-17
Language: ?

Name: greek7-old
Internal: iso-ir-18
Language: Greek

Name: latin-greek
Internal: iso-ir-19
Language: Greek

Name: NF_Z_62-010_(1973)
Internal: iso-ir-25
Language: ?

Name: Latin-greek-1
Internal: iso-ir-27
Language: Greek

Name: ISO_5427
Internal: iso-ir-37
Language: ?

Name: BS_viewdata
Internal: iso-ir-47
Language: ?

Name: INIS
Internal: iso-ir-49
Language: ?

Name: INIS-8
Internal: iso-ir-50
Language: ?

Name: INIS-cyrillic
Internal: iso-ir-51
Language: ?

Name: ISO_5427:1981
Internal: iso-ir-54
Language: ?

Name: ISO_5428:1980
Internal: iso-ir-55
Language: ?

Name: GB_1988-80
Internal: iso-ir-57
Language: Simplified Chinese

Name: NS_4551-1
Internal: iso-ir-60
Language: ?

Name: iso-ir-68
Internal: iso-ir-68
Language: ?
Source: http://www.unicode.org/Public/MAPPINGS/

Name: NF_Z_62-010
Internal: iso-ir-69
Language: ?

Name: videotex-suppl
Internal: iso-ir-70
Language: ?

Name: PT2
Internal: iso-ir-84
Language: ?

Name: ES2
Internal: iso-ir-85
Language: ?

Name: MSZ_7795.3
Internal: iso-ir-86
Language: ?

Name: greek7
Internal: iso-ir-88
Language: ?

Name: ASMO_449
Internal: iso-ir-89
Language: ?

Name: iso-ir-90
Internal: iso-ir-90
Language: ?

Name: JIS_C6229-1984-a
Internal: iso-ir-91
Language: Japanese

Name: JIS_C6229-1984-b
Internal: iso-ir-92
Language: Japanese

Name: JIS_C6229-1984-b-add
Internal: iso-ir-93
Language: Japanese

Name: JIS_C6229-1984-hand
Internal: iso-ir-94
Language: Japanese

Name: JIS_C6229-1984-hand-add
Internal: iso-ir-95
Language: Japanese

Name: JIS_C6229-1984-kana
Internal: iso-ir-96
Language: Japanese

Name: ISO_2033-1983
Internal: iso-ir-98
Language: ?

Name: ANSI_X3.110-1983
Internal: iso-ir-99
Language: ?

Name: T.61-7bit
Internal: iso-ir-102
Language: ?

Name: T.61-8bit
Internal: iso-ir-103
Language: ?

Name: ECMA-cyrillic
Internal: iso-ir-111
Language: Russian

Name: CSA_Z243.4-1985-1
Internal: iso-ir-121
Language: ?

Name: CSA_Z243.4-1985-2
Internal: iso-ir-122
Language: ?

Name: CSA_Z243.4-1985-gr
Internal: iso-ir-123
Language: ?

Name: T.101-G2
Internal: iso-ir-128
Language: ?

Name: CSN_369103
Internal: iso-ir-139
Language: ?

Name: JUS_I.B1.002
Internal: iso-ir-141
Language: ?

Name: ISO_6937-2-add
Internal: iso-ir-142
Language: ?

Name: IEC_P27-1
Internal: iso-ir-143
Language: ?

Name: JUS_I.B1.003-serb
Internal: iso-ir-146
Language: ?

Name: JUS_I.B1.003-mac
Internal: iso-ir-147
Language: ?

Name: greek-ccitt
Internal: iso-ir-150
Language: Greek

Name: NC_NC00-10:81
Internal: iso-ir-151
Language: ?

Name: ISO_6937-2-25
Internal: iso-ir-152
Language: ?

Name: GOST_19768-74
Internal: iso-ir-153
Language: ?

Name: ISO_10367-box
Internal: iso-ir-155
Language: ?

Name: iso-ir-165
Internal: iso-ir-165
Language: Simplified Chinese

Name: iso-ir-197
Internal: iso-ir-197
Language: Norwegian

Name: KPS 9566:1997
Internal: iso-ir-202
Language: Korean
Source: http://hangeul.pnu.edu/hangeul/code/hcode.html
Note: Some characters not compatible with Unicode

Name: iso-ir-209
Internal: iso-ir-209
Language: Norwegian

Name: JIS_X0201
Internal: jis_x0201
Language: Japanese
Source: http://hp.vector.co.jp/authors/VA010341/unicode/

Name: JIS_X0201 (alternative)
Internal: jis_x0201c
Language: Japanese
Source: http://hp.vector.co.jp/authors/VA010341/unicode/

Name: JIS_C6226-1983
Internal: jis_x0208
Language: Japanese
Source: http://hp.vector.co.jp/authors/VA010341/unicode/

Name: JIS_X0212-1990
Internal: jis_x0212
Language: Japanese
Source: http://hp.vector.co.jp/authors/VA010341/unicode/

Name: JIS X0213:2000 plane 1
Internal: jis_x0213-2000-1
Language: Japanese
Source: http://wakaba-web.hp.infoseek.co.jp/

Name: JIS X0213:2000 plane 2
Internal: jis_x0213-2000-2
Language: Japanese
Source: http://wakaba-web.hp.infoseek.co.jp/

Name: JIS X0213:2004
Internal: jis_x0213-2004
Language: Japanese
Source: http://x0213.org/

Name: Johab
Internal: johab
Language: Korean

Name: KOI7
Internal: koi7
Language: Russian
Source: http://en.wikipedia.org/wiki/KOI7

Name: KOI8-I
Internal: koi8-i
Language: Russian

Name: KOI8-R
Internal: koi8-r
Language: Russian
Source: http://www.unicode.org/Public/MAPPINGS/

Name: KOI8-RU
Internal: koi8-ru
Language: Russian, Ukrainian

Name: KOI8-T
Internal: koi8-t
Language: Tajik

Name: KOI8-U
Internal: koi8-u
Language: Ukrainian

Name: KOI8-Uni
Internal: koi8-uni
Language: Unified Cyrillic

Name: KS_C_5601-1987
Internal: ksc5601-1987
Language: Korean
Source: http://www.unicode.org/Public/MAPPINGS/

Name: KS_C_5601-1992
Internal: ksc5601-1992
Language: Korean
Source: http://www.unicode.org/Public/MAPPINGS/

Name: KSC5636
Internal: ksc5636
Language: Korean

Name: KS X 1001
Internal: ksx1001
Language: Korean

Name: latin-lap
Internal: latin-lap
Language: ?

Name: x-mac-arabic
Internal: mac-arabic
Language: Arabic

Name: x-mac-ce
Internal: mac-ce
Language: Central and Eastern European
Source: http://www.unicode.org/Public/MAPPINGS/

Name: x-mac-celtic
Internal: mac-celtic
Language: Celtic

Name: x-mac-chinesesimp
Internal: mac-chinesesimp
Language: Simplified Chinese

Name: x-mac-chinesetrad
Internal: mac-chinesetrad
Language: Traditional Chinese

Name: x-mac-croatian
Internal: mac-croatian
Language: Croatian

Name: x-mac-cyrillic
Internal: mac-cyrillic
Language: Bulgarian, Byelorussian, Macedonian, Russian, Serbian
Source: http://www.unicode.org/Public/MAPPINGS/

Name: Mac-Dingbat
Internal: mac-dingbat
Language: ?

Name: x-mac-farsi
Internal: mac-farsi
Language: Farsi

Name: x-mac-gaelic
Internal: mac-gaelic
Language: Gaelic

Name: x-mac-greek
Internal: mac-greek
Language: Greek
Source: http://www.unicode.org/Public/MAPPINGS/

Name: x-mac-hebrew
Internal: mac-hebrew
Language: Hebrew

Name: x-mac-icelandic
Internal: mac-icelandic
Language: Icelandic
Source: http://www.unicode.org/Public/MAPPINGS/

Name: x-mac-inuit
Internal: mac-inuit
Language: Inuit

Name: x-mac-japanese
Internal: mac-japanese
Language: Japanese

Name: x-mac-korean
Internal: mac-korean
Language: Korean

Name: macintosh
Internal: mac-roman
Language: Western European
Source: http://www.unicode.org/Public/MAPPINGS/

Name: x-mac-romanian
Internal: mac-romanian
Language: Romanian

Name: Mac-Sami
Internal: mac-sami
Language: Norwegian

Name: Mac-Symbol
Internal: mac-symbol
Language: ?

Name: x-mac-thai
Internal: mac-thai
Language: Thai

Name: x-mac-turkish
Internal: mac-turkish
Language: Turkish
Source: http://www.unicode.org/Public/MAPPINGS/

Name: x-mac-ukrainian
Internal: mac-ukrainian
Language: Ukrainian

Name: MuleLao-1
Internal: mulelao-1
Language: Laotian

Name: NextStep
Internal: nextstep
Language: Platform specifics

Name: Osnovnoj Variant
Internal: osnovnoj
Language: Russian

Name: PETSCII
Internal: petscii
Language: Platform specifics
Source: http://www.df.lth.se/~triad/krad/recode/petscii.html

Name: PETSCII (alternative)
Internal: petscii-shifted
Language: Platform specifics
Source: http://www.df.lth.se/~triad/krad/recode/petscii.html

Name: POSIX standard
Internal: posix
Language: English
Source: http://en.wikipedia.org/wiki/Portable_character_set

Name: RISC OS LATIN1
Internal: riscos-latin1
Language: Platform specifics

Name: RK1048
Internal: rk1048
Language: Russian

Name: Stanford Extended ASCII
Internal: seascii
Language: English
Source: http://www.ietf.org/rfc/rfc698.txt

Name: Shift_JIS
Internal: shift_jis
Language: Japanese
Source: http://wakaba-web.hp.infoseek.co.jp/

Name: Shift_JIS-2004
Internal: shift_jis-2004
Language: Japanese

Name: Shift_JISX0213
Internal: shift_jisx0213
Language: Japanese
Source: http://wakaba-web.hp.infoseek.co.jp/

Name: Sinclair ZX Spectrum+ 48K Character Set
Internal: spectrum-48k
Language: Platform specifics
Source: http://eclecticsatyr.hostultra.com/speccs.htm

Name: Adobe-Standard-Encoding
Internal: stdenc
Language: Platform specifics
Source: http://www.unicode.org/Public/MAPPINGS/

Name: Adobe-Symbol-Encoding
Internal: symbol
Language: Platform specifics
Source: http://www.unicode.org/Public/MAPPINGS/

Name: TCVN 5712-1:1993
Internal: tcvn5712-1
Language: Vietnamese
Source: http://www.vnet.org/vanlangsj/mozilla/

Name: TCVN 5712-2:1993
Internal: tcvn5712-2
Language: Vietnamese
Source: http://www.vnet.org/vanlangsj/mozilla/

Name: TDS 565
Internal: tds565
Language: Turkish

Name: TIS-620
Internal: tis-620
Language: Thai
Source: http://www.nectec.or.th/it-standards/std620/std620.htm

Name: TSCII
Internal: tscii
Language: Tamil

Name: U-Code
Internal: ucode
Language: Russian

Name: ANSI_X3.4-1968
Internal: us-ascii
Language: English

Name: ANSI_X3.4-1968 (alternative)
Internal: us-ascii-quotes
Language: English
Source: http://www.unicode.org/Public/MAPPINGS/

Name: us-dk
Internal: us-dk
Language: ?

Name: ISO-10646-UTF-1
Internal: utf-1
Language: Full Unicode

Name: UTF-5
Internal: utf-5
Language: Full Unicode

Name: UTF-7
Internal: utf-7
Language: Full Unicode

Name: IMAP4 modified UTF-7
Internal: utf-7-imap
Language: Full Unicode

Name: UTF-8
Internal: utf-8
Language: Full Unicode

Name: UTF-8 Normal
Internal: utf-8n
Language: Full Unicode

Name: UTF-16
Internal: utf-16
Language: Full Unicode

Name: UTF-16 (Big Endian)
Internal: utf-16be
Language: Full Unicode

Name: UTF-16 (Lil Endian)
Internal: utf-16le
Language: Full Unicode

Name: UTF-32
Internal: utf-32
Language: Full Unicode

Name: UTF-32 (Big Endian)
Internal: utf-32be
Language: Full Unicode

Name: UTF-32 (Lil Endian)
Internal: utf-32le
Language: Full Unicode

Name: VIQR
Internal: viqri
Language: Vietnamese
Source: http://www.vnet.org/vanlangsj/mozilla/

Name: VISCII
Internal: viscii
Language: Vietnamese
Source: http://www.vnet.org/vanlangsj/mozilla/

Name: VNI
Internal: vni
Language: Vietnamese

Name: VPS
Internal: vps
Language: Vietnamese
Source: http://www.vnet.org/vanlangsj/mozilla/

Name: Windows-31J
Internal: windows-31j
Language: Japanese

Name: windows-1250
Internal: windows-1250
Language: Central and Eastern European
Source: http://www.unicode.org/Public/MAPPINGS/

Name: windows-1251
Internal: windows-1251
Language: Bulgarian, Byelorussian, Macedonian, Russian, Serbian
Source: http://www.unicode.org/Public/MAPPINGS/

Name: windows-1252
Internal: windows-1252
Language: Western European
Source: http://www.unicode.org/Public/MAPPINGS/

Name: windows-1253
Internal: windows-1253
Language: Greek
Source: http://www.unicode.org/Public/MAPPINGS/

Name: windows-1254
Internal: windows-1254
Language: Turkish
Source: http://www.unicode.org/Public/MAPPINGS/

Name: windows-1255
Internal: windows-1255
Language: Hebrew
Source: http://www.unicode.org/Public/MAPPINGS/

Name: windows-1256
Internal: windows-1256
Language: Arabic
Source: http://www.unicode.org/Public/MAPPINGS/

Name: windows-1257
Internal: windows-1257
Language: Baltic
Source: http://www.unicode.org/Public/MAPPINGS/

Name: windows-1258
Internal: windows-1258
Language: Vietnamese
Source: http://www.unicode.org/Public/MAPPINGS/

Name: Windows-Sámi-2
Internal: windows-sami-2
Language: Norwegian
Source: http://www.hum.uit.no/a/trond/ws2t.html

Name: Adobe-Zapf-Dingbats-Encoding
Internal: zdingbat
Language: Platform specifics
Source: http://www.unicode.org/Public/MAPPINGS/

License
-------

GPL2
