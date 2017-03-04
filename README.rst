=============
Documentation
=============

----------------
What does it do?
----------------

This extension renders banner records (image with link) in random order.
Randomization is done with JavaScript, so the contents of this plugin can be cached.
The clicks on the banners are counted for current and last month (with AJAX and eID mechanism).
Every month, an email with the click statistics is sent to the sponsor of the banner, if the banner record has an email address.


-----------
Screenshots
-----------

TODO


-------------
Configuration
-------------

1) Add the static template of this extension in field "Include static (from extensions)" in your ROOT page.
2) Create a scheduler job for this extension.


-----
Usage
-----

1) Create some banner records
2) Create a plugin and select the page with your banners.


---------
ChangeLog
---------

See file **ChangeLog** in the extension directory.