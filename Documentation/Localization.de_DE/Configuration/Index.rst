.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../../Includes.txt


.. _configuration:

Konfigurations Referenz
=======================

Die Erweterung is konfiguriert die Losungen von www.losungen.de zu laden, wie es durch die Nutzungsbedingungen bestimmt ist(NUTZUNGSBEDINGUNGEN.pdf).
Falls notwendig, können die Server URL und Dateinamen angepasst werden.

Ebenso können Templates und Partials zur Anpassung ausgetauscht werden.

.. _configuration-typoscript:

TypoScript Referenz
-------------------

Eigenschaften
^^^^^^^^^^^^^

.. container:: ts-properties


	================================================    =============   ==========================================================================   ===========
	Eigenschaft                                         Datentyp        Beschreibung                                                                 Standardwert
	================================================    =============   ==========================================================================   ===========
	view.templateRootPath                               string          Konstante, Pfad zu den Templates.                                            EXT:datec_losungen/Resources/Private/Templates/
	view.partialRootPath                                string          Konstante, Pfad zu den Partials.                                             EXT:datec_losungen/Resources/Private/Partials/
	view.layoutRootPath                                 string          Konstante, Pfad zu den Layouts.                                              EXT:datec_losungen/Resources/Private/Layouts/
	settings.display.dateFormat                         string          Datumsformat, kompatibel mit PHP-Funktion date(). Nur wenn angegeben.
	settings.display.licenses                           array           Liste aus Lizenzen mit URL und text                                          2 default licenses
	settings.xmlConf.serverUrl                          string          Serveradresse, von diesem werden die Losungen geladen                        http://www.brueder-unitaet.de/download/
	settings.xmlConf.zipName                            string          Name der ZIP file, enthält YEAR um jährlich zu aktulisieren.                 Losung_YEAR_XML.zip
	settings.xmlConf.xmlName                            string          Name der XML file, enthält YEAR um jährlich zu aktulisieren.                 Losungen Free YEAR.xml
	settings.xmlConf.termsName                          string          Name der Nutzungsbedingungen Datei.                                          Nutzungsbedingungen.pdf
	settings.xmlConf.encoding                           string          Encoding der XML Datei, decodiert iso oder utf8.                             iso
	settings.xmlConf.xmlTree.rootNode                   string          Name der root node in XML.                                                   FreeXml
	settings.xmlConf.xmlTree.treeNode                   string          Name der tree node in XML.                                                   Losungen
	settings.xmlConf.xmlTree.branchDate                 string          Name der Losung DATE branch node in XML.                                     Datum
	settings.xmlConf.xmlTree.branchWeekday              string          Name der Losung WEEKDAY branch node in XML.                                  Wtag
	settings.xmlConf.xmlTree.branchSunday               string          Name der Losung SUN/-HOLYDAY branch node in XML.                             Sonntag
	settings.xmlConf.xmlTree.branchWatchwordText        string          Name der Losung WATCHWORD TEXT branch node in XML.                           Losungstext
	settings.xmlConf.xmlTree.branchWatchwordVerse       string          Name der Losung WATCHWORD VERSE branch node in XML.                          Losungsvers
	settings.xmlConf.xmlTree.branchDidactictextText     string          Name der Losung DIDACTIC-TEXT TEXT branch node in XML.                       Lehrtext
	settings.xmlConf.xmlTree.branchDidactictextVerse    string          Name der Losung DIDACTIC-TEXT VERSE branch node in XML.                      Lehrtextvers
	================================================    =============   ==========================================================================   ===========


Eigenschaften Details
^^^^^^^^^^^^^^^^^^^^^

Schreibe **settings.display.licenses** folgendermaßen:

.. code-block:: typoscript

  licenses {
    0 {
      text = lizenzname
      url = http://www.ebu.de/
    }
    1 {
      ...
    }
  }
