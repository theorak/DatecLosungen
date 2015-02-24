.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _admin-manual:

Administrator Manual
====================

**Datec Losungen** is installed in a few steps, no additional configuration is required by default.


.. _admin-installation:

Installation
------------

- How does it work?

  Watchwords will be downloaded every year from http://www.brueder-unitaet.de/download/, this download is a packed file (.zip) which will be unpacked into typo3temp.
  The contained XML file is parsed for the current daily watchwords, which are then displayed in a simple frontend plugin.

  This extension is to use out-of-the-box, please follow these steps:
	1. Install the extension via the extension manager (datec_losungen)
 	2. Add a new content element of the type 'plugin' to your homepage and select 'Datec Losungen' as plugin.
	3. Add the static configuration file 'Datec Losungen' to your ROOT configuration template. (`HOW <http://wiki.typo3.org/TypoScript_Templates#Organizing_templates>`)
	4. Check the Configuration section of this manual for any changes you might have to make, by default you shouldn't have to.
	5. DONE!

.. _admin-configuration:

Configuration
-------------

The available configuration options are explained in the Configuration chapter of this document.
