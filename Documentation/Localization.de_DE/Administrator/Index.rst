.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../../Includes.txt


.. _admin-manual:

Administrator Handbuch
======================

**Datec Losungen** ist in wenigen Schritten installiert, standardmäßig wird keine weitere Konfiguration benötigt.


.. _admin-installation:

Installation
------------

- We funktioniert es?

  Die Losungen werden jährlich von http://www.brueder-unitaet.de/download/ heruntergeladen, dieser Download beinhaltet eine gepackte Datei (.zip) welche in typo3temp entpackt wird.
  Die beinhaltete XML Datei wird nach der aktuellen, täglichen Losung geparst, welche dann über ein Frontend Plugin angezeigt wird.

  Diese Erweiterung ist leicht wie-geliefert einzurichten, bitte folgen Sie diesen Schritten:
	1. Installieren Sie die Erweiterung über den Erweiterungsmanager (datec_losungen)
 	2. Fügen sie ein neues Inhaltelement vom Typ 'plugin' in Ihre Homepage ein und wählen Sie 'Datec Losungen' als Plugin.
	3. Fügen Sie die statische Konfigurationsdatei 'Datec Losungen' in Ihr ROOT-Template ein. (`WIE <http://wiki.typo3.org/TypoScript_Templates#Organizing_templates>`_)
	4. Prüfen Sie die das Kapitel Konfiguration dieses Dokuments um die Installation anzupassen, sollte standardmäßig nicht nötig sein.
	5. DONE!

.. _admin-configuration:

Konfiguration
-------------

Die verfügbaren Konfigurationsoptionen sind im Kapitel Konfiguration dieses Dokuments aufgeführt.
