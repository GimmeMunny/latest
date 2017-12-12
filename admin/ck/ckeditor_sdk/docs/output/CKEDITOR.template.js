Ext.data.JsonP.CKEDITOR_template({"tagname":"class","name":"CKEDITOR.template","autodetected":{},"files":[{"filename":"template.js","href":"template.html#CKEDITOR-template"}],"members":[{"name":"source","tagname":"property","owner":"CKEDITOR.template","id":"property-source","meta":{"readonly":true}},{"name":"constructor","tagname":"method","owner":"CKEDITOR.template","id":"method-constructor","meta":{}},{"name":"output","tagname":"method","owner":"CKEDITOR.template","id":"method-output","meta":{}}],"alternateClassNames":[],"aliases":{},"id":"class-CKEDITOR.template","short_doc":"Lightweight template used to build the output string from variables. ...","component":false,"superclasses":[],"subclasses":[],"mixedInto":[],"mixins":[],"parentMixins":[],"requires":[],"uses":[],"html":"<div><pre class=\"hierarchy\"><h4>Files</h4><div class='dependency'><a href='source/template.html#CKEDITOR-template' target='_blank'>template.js</a></div></pre><div class='doc-contents'><p>Lightweight template used to build the output string from variables.</p>\n\n<pre><code>// HTML template for presenting a label UI.\nvar tpl = new <a href=\"#!/api/CKEDITOR.template\" rel=\"CKEDITOR.template\" class=\"docClass\">CKEDITOR.template</a>( '&lt;div class=\"{cls}\"&gt;{label}&lt;/div&gt;' );\nalert( tpl.output( { cls: 'cke-label', label: 'foo'} ) ); // '&lt;div class=\"cke-label\"&gt;foo&lt;/div&gt;'\n</code></pre>\n</div><div class='members'><div class='members-section'><div class='definedBy'>Defined By</div><h3 class='members-title icon-property'>Properties</h3><div class='subsection'><div id='property-source' class='member first-child not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='CKEDITOR.template'>CKEDITOR.template</span><br/><a href='source/template.html#CKEDITOR-template-property-source' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.template-property-source' class='name expandable'>source</a> : String<span class=\"signature\"><span class='readonly' >readonly</span></span></div><div class='description'><div class='short'><p>The current template source.</p>\n</div><div class='long'><p>The current template source.</p>\n</div></div></div></div></div><div class='members-section'><div class='definedBy'>Defined By</div><h3 class='members-title icon-method'>Methods</h3><div class='subsection'><div id='method-constructor' class='member first-child not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='CKEDITOR.template'>CKEDITOR.template</span><br/><a href='source/template.html#CKEDITOR-template-method-constructor' target='_blank' class='view-source'>view source</a></div><strong class='new-keyword'>new</strong><a href='#!/api/CKEDITOR.template-method-constructor' class='name expandable'>CKEDITOR.template</a>( <span class='pre'>source</span> ) : <a href=\"#!/api/CKEDITOR.template\" rel=\"CKEDITOR.template\" class=\"docClass\">CKEDITOR.template</a><span class=\"signature\"></span></div><div class='description'><div class='short'>Creates a template class instance. ...</div><div class='long'><p>Creates a template class instance.</p>\n<h3 class=\"pa\">Parameters</h3><ul><li><span class='pre'>source</span> : String<div class='sub-desc'><p>The template source.</p>\n</div></li></ul><h3 class='pa'>Returns</h3><ul><li><span class='pre'><a href=\"#!/api/CKEDITOR.template\" rel=\"CKEDITOR.template\" class=\"docClass\">CKEDITOR.template</a></span><div class='sub-desc'>\n</div></li></ul></div></div></div><div id='method-output' class='member  not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='CKEDITOR.template'>CKEDITOR.template</span><br/><a href='source/template.html#CKEDITOR-template-method-output' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.template-method-output' class='name expandable'>output</a>( <span class='pre'>data, [buffer]</span> ) : String/Number<span class=\"signature\"></span></div><div class='description'><div class='short'>Processes the template, filling its variables with the provided data. ...</div><div class='long'><p>Processes the template, filling its variables with the provided data.</p>\n<h3 class=\"pa\">Parameters</h3><ul><li><span class='pre'>data</span> : Object<div class='sub-desc'><p>An object containing properties whose values will be\nused to fill the template variables. The property names must match the\ntemplate variables names. Variables without matching properties will be\nkept untouched.</p>\n</div></li><li><span class='pre'>buffer</span> : Array (optional)<div class='sub-desc'><p>An array that the output data will be pushed into.\nThe number of entries appended to the array is unknown.</p>\n</div></li></ul><h3 class='pa'>Returns</h3><ul><li><span class='pre'>String/Number</span><div class='sub-desc'><p>If <code>buffer</code> has not been provided, the processed\ntemplate output data; otherwise the new length of <code>buffer</code>.</p>\n</div></li></ul></div></div></div></div></div></div></div>","meta":{}});