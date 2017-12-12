Ext.data.JsonP.dev_copyformatting({"guide":"<!--\nCopyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.\nFor licensing, see LICENSE.md.\n-->\n\n\n<h1 id='dev_copyformatting-section-using-the-copy-formatting-feature'>Using the Copy Formatting Feature</h1>\n<div class='toc'>\n<p><strong>Contents</strong></p>\n<ol>\n<li><a href='#!/guide/dev_copyformatting-section-sticky-mode'>Sticky Mode</a></li>\n<li>\n<a href='#!/guide/dev_copyformatting-section-copy-formatting-context'>Copy Formatting Context</a></li>\n<li>\n<a href='#!/guide/dev_copyformatting-section-copy-formatting-filter'>Copy Formatting Filter</a></li>\n<li>\n<a href='#!/guide/dev_copyformatting-section-keyboard-shortcuts'>Keyboard Shortcuts</a></li>\n<li>\n<a href='#!/guide/dev_copyformatting-section-copy-formatting-cursors'>Copy Formatting Cursors</a></li>\n<li>\n<a href='#!/guide/dev_copyformatting-section-copy-formatting-demo'>Copy Formatting Demo</a></li>\n<li>\n<a href='#!/guide/dev_copyformatting-section-related-features'>Related Features</a></li></ol>\n</div>\n\n<p class=\"requirements\">\n    This feature was introduced in <strong>CKEditor 4.6</strong>. It is provided through an optional plugin that is included in the Full preset available from the official CKEditor <a href=\"http://ckeditor.com/download\">Download</a> site. You can also <a href=\"#!/guide/dev_plugins\">add it to your custom build</a> with <a href=\"http://ckeditor.com/builder\">CKBuilder</a>.\n</p>\n\n\n<p>The optional <a href=\"http://ckeditor.com/addon/copyformatting\">Copy Formatting</a> plugin provides the ability to easily copy text formatting from one place in the document and apply it to another.</p>\n\n<p>When enabled, the plugin adds the <strong>Copy Formatting</strong> (<img src=\"guides/dev_copyformatting/copyformatting-button.png\" alt=\"Copy Formatting toolbar button\" style=\"vertical-align: bottom;\">) toolbar button. To copy styles, place your cursor inside the text (or select a styled document fragment) and press the button or use the <kbd>Ctrl+Shift+C</kbd> keyboard shortcut. Then place the cursor inside some word or select a part of the text to apply formatting to it. The copied formatting can also be applied by using the <kbd>Ctrl+Shift+V</kbd> keyboard shortcut.</p>\n\n<p><p><img src=\"guides/dev_copyformatting/copyformatting_01.png\" alt=\"Copied formatting being applied to a text fragment\" width=\"942\" height=\"370\"></p></p>\n\n<div class=\"tip\">\n    <p>\n        Note that not all styles can be copied or removed. For example, Copy Formatting will not copy styles from links and will not remove links when you apply formatting to them. The default filter can be adjusted, though &mdash; read more about filter customization below.\n    </p>\n    <p>\n        Copy Formatting only works with <strong>inline styles</strong>, so it will not copy or apply block-level styles (e.g. headers) to text.\n    </p>\n</div>\n\n\n<h2 id='dev_copyformatting-section-sticky-mode'>Sticky Mode</h2>\n\n<p>A special sticky mode allows you to copy formatting once and apply it in more than one place. To enable it, double-click the <img src=\"guides/dev_copyformatting/copyformatting-button.png\" alt=\"Copy Formatting\" style=\"vertical-align: bottom;\"> button or use the <kbd>Ctrl+Shift+C</kbd> keyboard shortcut.</p>\n\n<p>The sticky mode can be switched off by clicking the <img src=\"guides/dev_copyformatting/copyformatting-button.png\" alt=\"Copy Formatting\" style=\"vertical-align: bottom;\"> button again or by pressing the <kbd>Esc</kbd> key.</p>\n\n<h2 id='dev_copyformatting-section-copy-formatting-context'>Copy Formatting Context</h2>\n\n<p>By default, Copy Formatting is supported in the following contexts:</p>\n\n<ul>\n<li>Plain text.</li>\n<li>Lists.</li>\n<li>Tables.</li>\n</ul>\n\n\n<p>This means that depending on the value of the <a href=\"#!/api/CKEDITOR.config-cfg-copyFormatting_allowedContexts\" rel=\"CKEDITOR.config-cfg-copyFormatting_allowedContexts\" class=\"docClass\">CKEDITOR.config.copyFormatting_allowedContexts</a> configuration option Copy Formatting will only support text, list and table styles.</p>\n\n<pre><code>// Default setting: text, lists and tables supported.\nconfig.copyFormatting_allowedContexts = true;\n\n// Only allow text styles to be copied.\nconfig.copyFormatting_allowedContexts = [ 'text' ];\n</code></pre>\n\n<p>Note that if you only allow the <code>'text'</code> context, you will still be able to copy text formatting between text and tables or lists. It will, however, not be possible to copy list- and table-specific styles such as numbering type or table cell settings.</p>\n\n<h2 id='dev_copyformatting-section-copy-formatting-filter'>Copy Formatting Filter</h2>\n\n<p>The Copy Formatting filter is configurable &mdash; you can both explicitly whitelist and blacklist the elements from which fetching styles will be allowed:</p>\n\n<ul>\n<li><a href=\"#!/api/CKEDITOR.config-cfg-copyFormatting_allowRules\" rel=\"CKEDITOR.config-cfg-copyFormatting_allowRules\" class=\"docClass\">CKEDITOR.config.copyFormatting_allowRules</a> &ndash; Sets rules for elements from which the styles can be copied.</li>\n<li><a href=\"#!/api/CKEDITOR.config-cfg-copyFormatting_disallowRules\" rel=\"CKEDITOR.config-cfg-copyFormatting_disallowRules\" class=\"docClass\">CKEDITOR.config.copyFormatting_disallowRules</a> &ndash; Sets rules for elements from which the styles cannot be copied.</li>\n</ul>\n\n\n<p>Both options are using <a href=\"#!/guide/dev_acf\">Advanced Content Filter</a> syntax &mdash; refer to the <a href=\"#!/guide/dev_allowed_content_rules\">Allowed Content Rules</a> article for more information.</p>\n\n<p>Formatting cannot be copied from certain types of elements. By default these elements include:</p>\n\n<ul>\n<li>Links.</li>\n<li>Headings.</li>\n<li>Images.</li>\n<li>Iframes.</li>\n<li>Widgets.</li>\n<li>Media embeds.</li>\n</ul>\n\n\n<p>The example below further limits Copy Formatting to only allow <a href=\"#!/guide/dev_basicstyles\">basic text styles</a> (bold, italic, underline, strikethrough) to be copied:</p>\n\n<pre><code>config.copyFormatting_allowRules = 'b s u i em strong; span{text-decoration,font-weight}';\n</code></pre>\n\n<h2 id='dev_copyformatting-section-keyboard-shortcuts'>Keyboard Shortcuts</h2>\n\n<p>The Copy Formatting feature is fully <a href=\"#!/guide/dev_a11y\">accessible</a>, with dedicated state notifications for screen readers and <a href=\"#!/guide/dev_shortcuts\">keyboard shortcuts</a>.</p>\n\n<p>By default, you can use the following keyboard shortcuts:</p>\n\n<ul>\n<li><kbd>Ctrl+Shift+C</kbd> &ndash; Copies the formatting from a text fragment and enables the sticky mode.</li>\n<li><kbd>Ctrl+Shift+V</kbd> &ndash; Applies the previously copied formatting to a text fragment.</li>\n<li><kbd>Esc</kbd> &ndash; Disables the sticky mode.</li>\n</ul>\n\n\n<p>The first two shortcuts can be customized with the <a href=\"#!/api/CKEDITOR.config-cfg-copyFormatting_keystrokeCopy\" rel=\"CKEDITOR.config-cfg-copyFormatting_keystrokeCopy\" class=\"docClass\">CKEDITOR.config.copyFormatting_keystrokeCopy</a> and <a href=\"#!/api/CKEDITOR.config-cfg-copyFormatting_keystrokePaste\" rel=\"CKEDITOR.config-cfg-copyFormatting_keystrokePaste\" class=\"docClass\">CKEDITOR.config.copyFormatting_keystrokePaste</a> configuration options, respectively.</p>\n\n<p>You can also completely disable keyboard shortcuts for Copy Formatting by setting these configuration options to <code>false</code>. Do note, though, that this is not recommended due to accessibility reasons.</p>\n\n<pre><code>// Changes the keyboard shortcut for copying the formatting to Ctrl+Shift+B.\nconfig.copyFormatting_keystrokeCopy = <a href=\"#!/api/CKEDITOR-property-CTRL\" rel=\"CKEDITOR-property-CTRL\" class=\"docClass\">CKEDITOR.CTRL</a> + <a href=\"#!/api/CKEDITOR-property-SHIFT\" rel=\"CKEDITOR-property-SHIFT\" class=\"docClass\">CKEDITOR.SHIFT</a> + 66;\n\n// Disables the keyboard shortcut for pasting the formatting.\nconfig.copyFormatting_keystrokePaste = false;\n</code></pre>\n\n<h2 id='dev_copyformatting-section-copy-formatting-cursors'>Copy Formatting Cursors</h2>\n\n<p>Once activated (i.e. when a style was copied), the Copy Formatting feature causes the cursor inside the editor to change to <img src=\"guides/dev_copyformatting/copyformatting-cursor.svg\" alt=\"Formatting copied cursor\" style=\"vertical-align: bottom;\">. When the cursor is moved outside the editor, it changes to a dedicated \"disabled\" cursor (<img src=\"guides/dev_copyformatting/copyformatting-cursor-disabled.svg\" alt=\"Applying copied formatting disabled cursor\" style=\"vertical-align: bottom;\">) that indicates you cannot apply the copied formatting there.</p>\n\n<p>The special \"disabled\" cursor can be switched off by setting the <a href=\"#!/api/CKEDITOR.config-cfg-copyFormatting_outerCursor\" rel=\"CKEDITOR.config-cfg-copyFormatting_outerCursor\" class=\"docClass\">CKEDITOR.config.copyFormatting_outerCursor</a> configuration option to <code>false</code>.</p>\n\n<pre><code>config.copyFormatting_outerCursor = false;\n</code></pre>\n\n<p class=\"tip\">\n    More advanced modifications of cursors used by Copy Formatting can be done by adding custom styles to the editor stylesheet.\n</p>\n\n\n<h2 id='dev_copyformatting-section-copy-formatting-demo'>Copy Formatting Demo</h2>\n\n<p>See the <a href=\"../samples/copyformatting.html\">working \"Using the Copy Formatting Feature\" sample</a> that showcases the usage and customization of this feature.</p>\n\n<h2 id='dev_copyformatting-section-related-features'>Related Features</h2>\n\n<p>Refer to the following resources for more information about text styling and formatting:</p>\n\n<ul>\n<li>The <a href=\"#!/guide/dev_advanced_content_filter\">Advanced Content Filer</a> article contains more in-depth technical details about ACF.</li>\n<li>The <a href=\"#!/guide/dev_allowed_content_rules\">Allowed Content Rules</a> article explains the allowed and disallowed content rules format.</li>\n<li>The <a href=\"#!/guide/dev_basicstyles\">Basic Text Styles: Bold, Italic and More</a> article explains how to apply bold, italic, underline, strikethrough, subscript and superscript formatting to text selections.</li>\n<li>The <a href=\"#!/guide/dev_removeformat\">Removing Text Formatting</a> article explains how to quickly remove any text formatting that is applied through inline HTML elements and CSS styles.</li>\n<li>The <a href=\"#!/guide/dev_format\">Applying Block-Level Text Formats</a> article presents how to apply formatting to entire text blocks and not just text selections.</li>\n<li>The <a href=\"#!/guide/dev_styles\">Applying Styles to Editor Content</a> article discusses creating more semantically correct text styles.</li>\n<li>The <a href=\"#!/guide/dev_colorbutton\">Setting Text and Background Color</a> article explains how to use and customize the <strong>Text Color</strong> and <strong>Background Color</strong> features.</li>\n</ul>\n\n","title":"Copying Text Formatting","meta_description":"Copying document formatting with the Copy Formatting feature.","meta_keywords":"ckeditor, editor, wysiwyg, formatting, style, styles, text"});