Ext.data.JsonP.CKEDITOR_ui_panel_handler({"tagname":"class","name":"CKEDITOR.ui.panel.handler","autodetected":{},"files":[{"filename":"plugin.js","href":"plugin69.html#CKEDITOR-ui-panel-handler"}],"singleton":true,"extends":"CKEDITOR.ui.handlerDefinition","members":[{"name":"contentsElement","tagname":"property","owner":"CKEDITOR.ui.handlerDefinition","id":"property-contentsElement","meta":{"readonly":true}},{"name":"create","tagname":"method","owner":"CKEDITOR.ui.panel.handler","id":"method-create","meta":{}}],"alternateClassNames":[],"aliases":{},"id":"class-CKEDITOR.ui.panel.handler","component":false,"superclasses":["CKEDITOR.ui.handlerDefinition"],"subclasses":[],"mixedInto":[],"mixins":[],"parentMixins":[],"requires":[],"uses":[],"html":"<div><pre class=\"hierarchy\"><h4>Hierarchy</h4><div class='subclass first-child'><a href='#!/api/CKEDITOR.ui.handlerDefinition' rel='CKEDITOR.ui.handlerDefinition' class='docClass'>CKEDITOR.ui.handlerDefinition</a><div class='subclass '><strong>CKEDITOR.ui.panel.handler</strong></div></div><h4>Files</h4><div class='dependency'><a href='source/plugin69.html#CKEDITOR-ui-panel-handler' target='_blank'>plugin.js</a></div></pre><div class='doc-contents'><p>Represents panel handler object.</p>\n</div><div class='members'><div class='members-section'><div class='definedBy'>Defined By</div><h3 class='members-title icon-property'>Properties</h3><div class='subsection'><div id='property-contentsElement' class='member first-child inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><a href='#!/api/CKEDITOR.ui.handlerDefinition' rel='CKEDITOR.ui.handlerDefinition' class='defined-in docClass'>CKEDITOR.ui.handlerDefinition</a><br/><a href='source/ui.html#CKEDITOR-ui-handlerDefinition-property-contentsElement' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.ui.handlerDefinition-property-contentsElement' class='name expandable'>contentsElement</a> : <a href=\"#!/api/CKEDITOR.dom.element\" rel=\"CKEDITOR.dom.element\" class=\"docClass\">CKEDITOR.dom.element</a><span class=\"signature\"><span class='readonly' >readonly</span></span></div><div class='description'><div class='short'>The element in the host page&#39;s document that contains the editor content. ...</div><div class='long'><p>The element in the <a href=\"#!/api/CKEDITOR-property-document\" rel=\"CKEDITOR-property-document\" class=\"docClass\">host page&#39;s document</a> that contains the editor content.\nIf the <a href=\"#!/guide/dev_uitypes-section-fixed-user-interface\">fixed editor UI</a> is used, then it will be set to\n<code>editor.ui.space( 'contents' )</code> &mdash; i.e. the <code>&lt;div&gt;</code> which contains the editor <code>&lt;iframe&gt;</code> (in case of classic editor)\nor <a href=\"#!/api/CKEDITOR.editable\" rel=\"CKEDITOR.editable\" class=\"docClass\">CKEDITOR.editable</a> (in case of inline editor). Otherwise it is set to the <a href=\"#!/api/CKEDITOR.editable\" rel=\"CKEDITOR.editable\" class=\"docClass\">CKEDITOR.editable</a> itself.</p>\n\n<p>Use the position of this element if you need to position elements placed in the host page's document relatively to the\neditor content.</p>\n\n<pre><code>var editor = CKEDITOR.instances.editor1;\nconsole.log( editor.ui.contentsElement.getName() ); // 'div'\n</code></pre>\n        <p>Available since: <b>4.5</b></p>\n</div></div></div></div></div><div class='members-section'><div class='definedBy'>Defined By</div><h3 class='members-title icon-method'>Methods</h3><div class='subsection'><div id='method-create' class='member first-child not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='CKEDITOR.ui.panel.handler'>CKEDITOR.ui.panel.handler</span><br/><a href='source/plugin69.html#CKEDITOR-ui-panel-handler-method-create' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.ui.panel.handler-method-create' class='name expandable'>create</a>( <span class='pre'>definition</span> ) : <a href=\"#!/api/CKEDITOR.ui.panel\" rel=\"CKEDITOR.ui.panel\" class=\"docClass\">CKEDITOR.ui.panel</a><span class=\"signature\"></span></div><div class='description'><div class='short'>Transforms a panel definition in a CKEDITOR.ui.panel instance. ...</div><div class='long'><p>Transforms a panel definition in a <a href=\"#!/api/CKEDITOR.ui.panel\" rel=\"CKEDITOR.ui.panel\" class=\"docClass\">CKEDITOR.ui.panel</a> instance.</p>\n<h3 class=\"pa\">Parameters</h3><ul><li><span class='pre'>definition</span> : Object<div class='sub-desc'>\n</div></li></ul><h3 class='pa'>Returns</h3><ul><li><span class='pre'><a href=\"#!/api/CKEDITOR.ui.panel\" rel=\"CKEDITOR.ui.panel\" class=\"docClass\">CKEDITOR.ui.panel</a></span><div class='sub-desc'>\n</div></li></ul><p>Overrides: <a href=\"#!/api/CKEDITOR.ui.handlerDefinition-method-create\" rel=\"CKEDITOR.ui.handlerDefinition-method-create\" class=\"docClass\">CKEDITOR.ui.handlerDefinition.create</a></p></div></div></div></div></div></div></div>","meta":{}});