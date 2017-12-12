Ext.data.JsonP.CKEDITOR_dialog_definition_html({"tagname":"class","name":"CKEDITOR.dialog.definition.html","autodetected":{},"files":[{"filename":"dialogDefinition.js","href":"dialogDefinition.html#CKEDITOR-dialog-definition-html"}],"extends":"CKEDITOR.dialog.definition.uiElement","members":[{"name":"align","tagname":"property","owner":"CKEDITOR.dialog.definition.uiElement","id":"property-align","meta":{}},{"name":"className","tagname":"property","owner":"CKEDITOR.dialog.definition.uiElement","id":"property-className","meta":{}},{"name":"commit","tagname":"property","owner":"CKEDITOR.dialog.definition.uiElement","id":"property-commit","meta":{}},{"name":"html","tagname":"property","owner":"CKEDITOR.dialog.definition.html","id":"property-html","meta":{}},{"name":"id","tagname":"property","owner":"CKEDITOR.dialog.definition.uiElement","id":"property-id","meta":{}},{"name":"onHide","tagname":"property","owner":"CKEDITOR.dialog.definition.uiElement","id":"property-onHide","meta":{}},{"name":"onLoad","tagname":"property","owner":"CKEDITOR.dialog.definition.uiElement","id":"property-onLoad","meta":{}},{"name":"onShow","tagname":"property","owner":"CKEDITOR.dialog.definition.uiElement","id":"property-onShow","meta":{}},{"name":"requiredContent","tagname":"property","owner":"CKEDITOR.dialog.definition.uiElement","id":"property-requiredContent","meta":{}},{"name":"setup","tagname":"property","owner":"CKEDITOR.dialog.definition.uiElement","id":"property-setup","meta":{}},{"name":"style","tagname":"property","owner":"CKEDITOR.dialog.definition.uiElement","id":"property-style","meta":{}},{"name":"title","tagname":"property","owner":"CKEDITOR.dialog.definition.uiElement","id":"property-title","meta":{}},{"name":"type","tagname":"property","owner":"CKEDITOR.dialog.definition.uiElement","id":"property-type","meta":{}}],"alternateClassNames":[],"aliases":{},"id":"class-CKEDITOR.dialog.definition.html","short_doc":"The definition of a raw HTML element. ...","component":false,"superclasses":["CKEDITOR.dialog.definition.uiElement"],"subclasses":[],"mixedInto":[],"mixins":[],"parentMixins":[],"requires":[],"uses":[],"html":"<div><pre class=\"hierarchy\"><h4>Hierarchy</h4><div class='subclass first-child'><a href='#!/api/CKEDITOR.dialog.definition.uiElement' rel='CKEDITOR.dialog.definition.uiElement' class='docClass'>CKEDITOR.dialog.definition.uiElement</a><div class='subclass '><strong>CKEDITOR.dialog.definition.html</strong></div></div><h4>Files</h4><div class='dependency'><a href='source/dialogDefinition.html#CKEDITOR-dialog-definition-html' target='_blank'>dialogDefinition.js</a></div></pre><div class='doc-contents'><p>The definition of a raw HTML element.</p>\n\n<p>This class is not really part of the API. It just illustrates the properties\nthat developers can use to define and create elements made from raw HTML code.</p>\n\n<p>Once the dialog is opened, the created element becomes a <a href=\"#!/api/CKEDITOR.ui.dialog.html\" rel=\"CKEDITOR.ui.dialog.html\" class=\"docClass\">CKEDITOR.ui.dialog.html</a> object\nand can be accessed with <a href=\"#!/api/CKEDITOR.dialog-method-getContentElement\" rel=\"CKEDITOR.dialog-method-getContentElement\" class=\"docClass\">CKEDITOR.dialog.getContentElement</a>.</p>\n\n<p>For a complete example of dialog definition, please check <a href=\"#!/api/CKEDITOR.dialog-static-method-add\" rel=\"CKEDITOR.dialog-static-method-add\" class=\"docClass\">CKEDITOR.dialog.add</a>.\nTo access HTML elements use <a href=\"#!/api/CKEDITOR.dom.document-method-getById\" rel=\"CKEDITOR.dom.document-method-getById\" class=\"docClass\">CKEDITOR.dom.document.getById</a>.</p>\n\n<pre><code>// There is no constructor for this class, the user just has to define an\n// object with the appropriate properties.\n\n// Example 1:\n{\n    type: 'html',\n    html: '&lt;h3&gt;This is some sample HTML content.&lt;/h3&gt;'\n}\n\n// Example 2:\n// Complete sample with document.getById() call when the \"Ok\" button is clicked.\nvar dialogDefinition = {\n    title: 'Sample dialog',\n    minWidth: 300,\n    minHeight: 200,\n    onOk: function() {\n        // \"this\" is now a <a href=\"#!/api/CKEDITOR.dialog\" rel=\"CKEDITOR.dialog\" class=\"docClass\">CKEDITOR.dialog</a> object.\n        var document = this.getElement().getDocument();\n        // document = <a href=\"#!/api/CKEDITOR.dom.document\" rel=\"CKEDITOR.dom.document\" class=\"docClass\">CKEDITOR.dom.document</a>\n        var element = &lt;b&gt;document.getById( 'myDiv' );&lt;/b&gt;\n        if ( element )\n            alert( element.getHtml() );\n    },\n    contents: [\n        {\n            id: 'tab1',\n            label: '',\n            title: '',\n            elements: [\n                {\n                    type: 'html',\n                    html: '&lt;div id=\"myDiv\"&gt;Sample &lt;b&gt;text&lt;/b&gt;.&lt;/div&gt;&lt;div id=\"otherId\"&gt;Another div.&lt;/div&gt;'\n                }\n            ]\n        }\n    ],\n    buttons: [ <a href=\"#!/api/CKEDITOR.dialog-static-method-cancelButton\" rel=\"CKEDITOR.dialog-static-method-cancelButton\" class=\"docClass\">CKEDITOR.dialog.cancelButton</a>, <a href=\"#!/api/CKEDITOR.dialog-static-method-okButton\" rel=\"CKEDITOR.dialog-static-method-okButton\" class=\"docClass\">CKEDITOR.dialog.okButton</a> ]\n};\n</code></pre>\n</div><div class='members'><div class='members-section'><div class='definedBy'>Defined By</div><h3 class='members-title icon-property'>Properties</h3><div class='subsection'><div id='property-align' class='member first-child inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><a href='#!/api/CKEDITOR.dialog.definition.uiElement' rel='CKEDITOR.dialog.definition.uiElement' class='defined-in docClass'>CKEDITOR.dialog.definition.uiElement</a><br/><a href='source/dialogDefinition.html#CKEDITOR-dialog-definition-uiElement-property-align' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.dialog.definition.uiElement-property-align' class='name expandable'>align</a> : String<span class=\"signature\"></span></div><div class='description'><div class='short'><p>Horizontal alignment (in container) of the UI element.</p>\n</div><div class='long'><p>Horizontal alignment (in container) of the UI element.</p>\n</div></div></div><div id='property-className' class='member  inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><a href='#!/api/CKEDITOR.dialog.definition.uiElement' rel='CKEDITOR.dialog.definition.uiElement' class='defined-in docClass'>CKEDITOR.dialog.definition.uiElement</a><br/><a href='source/dialogDefinition.html#CKEDITOR-dialog-definition-uiElement-property-className' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.dialog.definition.uiElement-property-className' class='name expandable'>className</a> : String<span class=\"signature\"></span></div><div class='description'><div class='short'><p>CSS class names to append to the UI element.</p>\n</div><div class='long'><p>CSS class names to append to the UI element.</p>\n</div></div></div><div id='property-commit' class='member  inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><a href='#!/api/CKEDITOR.dialog.definition.uiElement' rel='CKEDITOR.dialog.definition.uiElement' class='defined-in docClass'>CKEDITOR.dialog.definition.uiElement</a><br/><a href='source/dialogDefinition.html#CKEDITOR-dialog-definition-uiElement-property-commit' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.dialog.definition.uiElement-property-commit' class='name expandable'>commit</a> : Function<span class=\"signature\"></span></div><div class='description'><div class='short'>Function to execute whenever the UI element's parent\ndialog's CKEDITOR.dialog.commitContent method is executed. ...</div><div class='long'><p>Function to execute whenever the UI element's parent\ndialog's <a href=\"#!/api/CKEDITOR.dialog-method-commitContent\" rel=\"CKEDITOR.dialog-method-commitContent\" class=\"docClass\">CKEDITOR.dialog.commitContent</a> method is executed.\nIt usually takes care of the respective UI element as a standalone element.</p>\n</div></div></div><div id='property-html' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='CKEDITOR.dialog.definition.html'>CKEDITOR.dialog.definition.html</span><br/><a href='source/dialogDefinition.html#CKEDITOR-dialog-definition-html-property-html' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.dialog.definition.html-property-html' class='name expandable'>html</a> : String<span class=\"signature\"></span></div><div class='description'><div class='short'><p>(Required) HTML code of this element.</p>\n</div><div class='long'><p>(Required) HTML code of this element.</p>\n</div></div></div><div id='property-id' class='member  inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><a href='#!/api/CKEDITOR.dialog.definition.uiElement' rel='CKEDITOR.dialog.definition.uiElement' class='defined-in docClass'>CKEDITOR.dialog.definition.uiElement</a><br/><a href='source/dialogDefinition.html#CKEDITOR-dialog-definition-uiElement-property-id' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.dialog.definition.uiElement-property-id' class='name expandable'>id</a> : String<span class=\"signature\"></span></div><div class='description'><div class='short'><p>The id of the UI element.</p>\n</div><div class='long'><p>The id of the UI element.</p>\n</div></div></div><div id='property-onHide' class='member  inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><a href='#!/api/CKEDITOR.dialog.definition.uiElement' rel='CKEDITOR.dialog.definition.uiElement' class='defined-in docClass'>CKEDITOR.dialog.definition.uiElement</a><br/><a href='source/dialogDefinition.html#CKEDITOR-dialog-definition-uiElement-property-onHide' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.dialog.definition.uiElement-property-onHide' class='name expandable'>onHide</a> : Function<span class=\"signature\"></span></div><div class='description'><div class='short'><p>Function to execute whenever the UI element's parent dialog is closed.</p>\n</div><div class='long'><p>Function to execute whenever the UI element's parent dialog is closed.</p>\n</div></div></div><div id='property-onLoad' class='member  inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><a href='#!/api/CKEDITOR.dialog.definition.uiElement' rel='CKEDITOR.dialog.definition.uiElement' class='defined-in docClass'>CKEDITOR.dialog.definition.uiElement</a><br/><a href='source/dialogDefinition.html#CKEDITOR-dialog-definition-uiElement-property-onLoad' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.dialog.definition.uiElement-property-onLoad' class='name expandable'>onLoad</a> : Function<span class=\"signature\"></span></div><div class='description'><div class='short'><p>Function to execute the first time the UI element is displayed.</p>\n</div><div class='long'><p>Function to execute the first time the UI element is displayed.</p>\n</div></div></div><div id='property-onShow' class='member  inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><a href='#!/api/CKEDITOR.dialog.definition.uiElement' rel='CKEDITOR.dialog.definition.uiElement' class='defined-in docClass'>CKEDITOR.dialog.definition.uiElement</a><br/><a href='source/dialogDefinition.html#CKEDITOR-dialog-definition-uiElement-property-onShow' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.dialog.definition.uiElement-property-onShow' class='name expandable'>onShow</a> : Function<span class=\"signature\"></span></div><div class='description'><div class='short'><p>Function to execute whenever the UI element's parent dialog is displayed.</p>\n</div><div class='long'><p>Function to execute whenever the UI element's parent dialog is displayed.</p>\n</div></div></div><div id='property-requiredContent' class='member  inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><a href='#!/api/CKEDITOR.dialog.definition.uiElement' rel='CKEDITOR.dialog.definition.uiElement' class='defined-in docClass'>CKEDITOR.dialog.definition.uiElement</a><br/><a href='source/dialogDefinition.html#CKEDITOR-dialog-definition-uiElement-property-requiredContent' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.dialog.definition.uiElement-property-requiredContent' class='name expandable'>requiredContent</a> : String/Object/<a href=\"#!/api/CKEDITOR.style\" rel=\"CKEDITOR.style\" class=\"docClass\">CKEDITOR.style</a><span class=\"signature\"></span></div><div class='description'><div class='short'>The content that needs to be allowed to enable this UI element. ...</div><div class='long'><p>The content that needs to be allowed to enable this UI element.\nAll formats accepted by <a href=\"#!/api/CKEDITOR.filter-method-check\" rel=\"CKEDITOR.filter-method-check\" class=\"docClass\">CKEDITOR.filter.check</a> may be used.</p>\n\n<p>When all UI elements in a tab are disabled, this tab will be disabled automatically.</p>\n</div></div></div><div id='property-setup' class='member  inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><a href='#!/api/CKEDITOR.dialog.definition.uiElement' rel='CKEDITOR.dialog.definition.uiElement' class='defined-in docClass'>CKEDITOR.dialog.definition.uiElement</a><br/><a href='source/dialogDefinition.html#CKEDITOR-dialog-definition-uiElement-property-setup' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.dialog.definition.uiElement-property-setup' class='name expandable'>setup</a> : Function<span class=\"signature\"></span></div><div class='description'><div class='short'>Function to execute whenever the UI element's parent\ndialog's CKEDITOR.dialog.setupContent method is executed. ...</div><div class='long'><p>Function to execute whenever the UI element's parent\ndialog's <a href=\"#!/api/CKEDITOR.dialog-method-setupContent\" rel=\"CKEDITOR.dialog-method-setupContent\" class=\"docClass\">CKEDITOR.dialog.setupContent</a> method is executed.\nIt usually takes care of the respective UI element as a standalone element.</p>\n</div></div></div><div id='property-style' class='member  inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><a href='#!/api/CKEDITOR.dialog.definition.uiElement' rel='CKEDITOR.dialog.definition.uiElement' class='defined-in docClass'>CKEDITOR.dialog.definition.uiElement</a><br/><a href='source/dialogDefinition.html#CKEDITOR-dialog-definition-uiElement-property-style' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.dialog.definition.uiElement-property-style' class='name expandable'>style</a> : String<span class=\"signature\"></span></div><div class='description'><div class='short'><p>Inline CSS classes to append to the UI element.</p>\n</div><div class='long'><p>Inline CSS classes to append to the UI element.</p>\n</div></div></div><div id='property-title' class='member  inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><a href='#!/api/CKEDITOR.dialog.definition.uiElement' rel='CKEDITOR.dialog.definition.uiElement' class='defined-in docClass'>CKEDITOR.dialog.definition.uiElement</a><br/><a href='source/dialogDefinition.html#CKEDITOR-dialog-definition-uiElement-property-title' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.dialog.definition.uiElement-property-title' class='name expandable'>title</a> : String<span class=\"signature\"></span></div><div class='description'><div class='short'><p>The popup label of the UI element.</p>\n</div><div class='long'><p>The popup label of the UI element.</p>\n</div></div></div><div id='property-type' class='member  inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><a href='#!/api/CKEDITOR.dialog.definition.uiElement' rel='CKEDITOR.dialog.definition.uiElement' class='defined-in docClass'>CKEDITOR.dialog.definition.uiElement</a><br/><a href='source/dialogDefinition.html#CKEDITOR-dialog-definition-uiElement-property-type' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.dialog.definition.uiElement-property-type' class='name expandable'>type</a> : String<span class=\"signature\"></span></div><div class='description'><div class='short'>The type of the UI element. ...</div><div class='long'><p>The type of the UI element. Required.</p>\n</div></div></div></div></div></div></div>","meta":{}});