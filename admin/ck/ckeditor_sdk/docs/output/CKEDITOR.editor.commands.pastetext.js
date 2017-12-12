Ext.data.JsonP.CKEDITOR_editor_commands_pastetext({"tagname":"class","name":"CKEDITOR.editor.commands.pastetext","alternateClassNames":[],"members":[{"name":"exec","tagname":"method","owner":"CKEDITOR.editor.commands.pastetext","id":"method-exec","meta":{"private":true}}],"aliases":{},"files":[{"filename":"","href":""}],"component":false,"superclasses":[],"subclasses":[],"mixedInto":[],"mixins":[],"parentMixins":[],"requires":[],"uses":[],"html":"<div><div class='doc-contents'>\n</div><div class='members'><div class='members-section'><div class='definedBy'>Defined By</div><h3 class='members-title icon-method'>Methods</h3><div class='subsection'><div id='method-exec' class='member first-child not-inherited'><a href='#' class='side expandable'><span>&nbsp;</span></a><div class='title'><div class='meta'><span class='defined-in' rel='CKEDITOR.editor.commands.pastetext'>CKEDITOR.editor.commands.pastetext</span><br/><a href='source/plugin72.html#CKEDITOR-editor-commands-pastetext-method-exec' target='_blank' class='view-source'>view source</a></div><a href='#!/api/CKEDITOR.editor.commands.pastetext-method-exec' class='name expandable'>exec</a>( <span class='pre'>editor, [data]</span> )<span class=\"signature\"><span class='private' >private</span></span></div><div class='description'><div class='short'>The Paste as plain text command. ...</div><div class='long'><p>The Paste as plain text command. It will determine its pasted text automatically if possible.</p>\n\n<p>At the time of writing it was working correctly only in Internet Explorer browsers, due to their\n<code>paste</code> support in <code>document.execCommand</code>.</p>\n<h3 class=\"pa\">Parameters</h3><ul><li><span class='pre'>editor</span> : <a href=\"#!/api/CKEDITOR.editor\" rel=\"CKEDITOR.editor\" class=\"docClass\">CKEDITOR.editor</a><div class='sub-desc'><p>An instance of the editor where the command is being executed.</p>\n</div></li><li><span class='pre'>data</span> : Object (optional)<div class='sub-desc'><p>The options object.</p>\n<ul><li><span class='pre'>notification</span> : Boolean/String (optional)<div class='sub-desc'><p>Content for a notification shown after an unsuccessful\npaste attempt. If <code>false</code>, the notification will not be displayed. This parameter was added in 4.7.0.</p>\n<p>Defaults to: <code>true</code></p></div></li></ul></div></li></ul></div></div></div></div></div></div></div>","meta":{}});