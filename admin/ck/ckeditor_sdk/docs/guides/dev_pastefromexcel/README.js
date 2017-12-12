Ext.data.JsonP.dev_pastefromexcel({"guide":"<!--\nCopyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.\nFor licensing, see LICENSE.md.\n-->\n\n\n<h1 id='dev_pastefromexcel-section-pasting-content-from-microsoft-excel'>Pasting Content from Microsoft Excel</h1>\n<div class='toc'>\n<p><strong>Contents</strong></p>\n<ol>\n<li><a href='#!/guide/dev_pastefromexcel-section-supported-features'>Supported Features</a></li>\n<li>\n<a href='#!/guide/dev_pastefromexcel-section-sample'>Sample</a></li>\n<li>\n<a href='#!/guide/dev_pastefromexcel-section-paste-from-excel-demo'>Paste from Excel Demo</a></li>\n<li>\n<a href='#!/guide/dev_pastefromexcel-section-related-features'>Related Features</a></li></ol>\n</div>\n\n<p class=\"requirements\">\n    This feature was introduced in <strong>CKEditor 4.7</strong>. It is provided through the <a href=\"http://ckeditor.com/addon/pastefromword\">Paste from Word</a> plugin that is included in the Standard and Full presets available from the official CKEditor <a href=\"http://ckeditor.com/download\">Download</a> site. You can also <a href=\"#!/guide/dev_plugins\">add it to your custom build</a> with <a href=\"http://ckeditor.com/builder\">CKBuilder</a>.\n</p>\n\n\n<p>The <a href=\"http://ckeditor.com/addon/pastefromword\">Paste from Word</a> plugin allows you to also paste content from <strong>Microsoft Excel</strong> and maintain original content structure and formatting. As of CKEditor 4.7 some more advanced Excel features are not supported yet and will be added in future CKEditor releases.</p>\n\n<p>When the plugin is enabled, it automatically detects Excel content and transforms its structure and formatting to clean HTML. It also adds the <strong>Paste from Word</strong> toolbar button (<img src=\"guides/dev_pastefromword/pastefromword-button.png\" alt=\"Paste from Word toolbar button\" style=\"vertical-align: bottom;\">) which makes it possible to paste clipboard data this way only on demand.</p>\n\n<h2 id='dev_pastefromexcel-section-supported-features'>Supported Features</h2>\n\n<p>The following formatting will be reatained when pasting from Microsoft Excel:</p>\n\n<ul>\n<li>Text formatting\n\n<ul>\n<li>Text and background colors</li>\n<li>Font name, style and size</li>\n<li>Basic formatting (bold, italic, underline)</li>\n<li>Font effects (strikethrough, superscript, subscript)</li>\n<li>Heading levels</li>\n<li>Text alignment</li>\n</ul>\n</li>\n<li>Cell formatting (size, background, borders, special characters)</li>\n<li>Row and column size</li>\n</ul>\n\n\n<h2 id='dev_pastefromexcel-section-sample'>Sample</h2>\n\n<p>The following sample content from a Microsoft Excel document:</p>\n\n<p><p><img src=\"guides/dev_pastefromexcel/pastefromexcel_01.png\" alt=\"Sample Excel document\" width=\"831\" height=\"418\"></p></p>\n\n<p>will look like below after pasting to CKEditor with the <a href=\"http://ckeditor.com/addon/pastefromword\">Paste from Word</a> plugin enabled:</p>\n\n<p><p><img src=\"guides/dev_pastefromexcel/pastefromexcel_02.png\" alt=\"Excel content pasted into CKEditor\" width=\"947\" height=\"403\"></p></p>\n\n<h2 id='dev_pastefromexcel-section-paste-from-excel-demo'>Paste from Excel Demo</h2>\n\n<p>See the <a href=\"../samples/pastefromexcel.html\">working \"Pasting content from Microsoft Excel\" sample</a> that showcases the using the Paste from Word plugin to paste Excel content.</p>\n\n<h2 id='dev_pastefromexcel-section-related-features'>Related Features</h2>\n\n<p>Refer to the following resources for more information about pasting content:</p>\n\n<ul>\n<li>The <a href=\"#!/guide/dev_pastefromword\">Pasting content from Microsoft Word</a> article contains more information about the Paste from Word plugin and its features.</li>\n<li>The <a href=\"#!/guide/dev_clipboard\">Clipboard Integration</a> article explains how Clipboard API is implemented in CKEditor.</li>\n<li>The <a href=\"#!/guide/dev_file_upload\">Uploading Dropped or Pasted Files</a> article describes drag&amp;drop in CKEditor.</li>\n<li>The <a href=\"#!/guide/dev_acf\">Content Filtering (ACF)</a> is an introduction to CKEditor's unique content filtering system.</li>\n<li>The <a href=\"#!/guide/dev_styles\">Applying Styles to Editor Content</a> article discusses creating more semantically correct text styles.</li>\n</ul>\n\n","title":"Paste from Excel","meta_description":"Pasting content from Microsoft Excel documents into the editor.","meta_keywords":"ckeditor, editor, wysiwyg, paste, insert, excel, pastefromword, spreadsheet"});