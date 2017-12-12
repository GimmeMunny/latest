Ext.data.JsonP.widget_sdk_tutorial_1({"guide":"<!--\nCopyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.\nFor licensing, see LICENSE.md.\n-->\n\n\n<h1 id='widget_sdk_tutorial_1-section-creating-a-simple-ckeditor-widget-%28part-1%29'>Creating a Simple CKEditor Widget (Part 1)</h1>\n<div class='toc'>\n<p><strong>Contents</strong></p>\n<ol>\n<li><a href='#!/guide/widget_sdk_tutorial_1-section-prerequisites'>Prerequisites</a></li>\n<li>\n<a href='#!/guide/widget_sdk_tutorial_1-section-introduction'>Introduction</a></li>\n<li>\n<a href='#!/guide/widget_sdk_tutorial_1-section-widget-plugin-files'>Widget Plugin Files</a></li>\n<li>\n<a href='#!/guide/widget_sdk_tutorial_1-section-widget-source-code'>Widget Source Code</a></li>\n<li>\n<a href='#!/guide/widget_sdk_tutorial_1-section-widget-registration'>Widget Registration</a></li>\n<li>\n<a href='#!/guide/widget_sdk_tutorial_1-section-widget-toolbar-button'>Widget Toolbar Button</a></li>\n<li>\n<a href='#!/guide/widget_sdk_tutorial_1-section-ckeditor-initialization'>CKEditor Initialization</a></li>\n<li>\n<a href='#!/guide/widget_sdk_tutorial_1-section-creating-widget-elements'>Creating Widget Elements</a></li>\n<li>\n<a href='#!/guide/widget_sdk_tutorial_1-section-adding-editable-parts'>Adding Editable Parts</a><ol>\n<li>\n<a href='#!/guide/widget_sdk_tutorial_1-section-nesting-widgets'>Nesting Widgets</a></li>\n</ol>\n<li>\n<a href='#!/guide/widget_sdk_tutorial_1-section-widget-styling'>Widget Styling</a></li>\n<li>\n<a href='#!/guide/widget_sdk_tutorial_1-section-adjusting-advanced-content-filter'>Adjusting Advanced Content Filter</a></li>\n<li>\n<a href='#!/guide/widget_sdk_tutorial_1-section-limiting-available-formatting'>Limiting Available Formatting</a></li>\n<li>\n<a href='#!/guide/widget_sdk_tutorial_1-section-how-does-a-widget-become-a-widget%3F'>How Does a Widget Become a Widget?</a></li>\n<li>\n<a href='#!/guide/widget_sdk_tutorial_1-section-full-source-code'>Full Source Code</a></li>\n<li>\n<a href='#!/guide/widget_sdk_tutorial_1-section-working-example'>Working Example</a></li>\n<li>\n<a href='#!/guide/widget_sdk_tutorial_1-section-further-enhancements'>Further Enhancements</a></li></ol>\n</div>\n\n<p>The aim of this tutorial is to demonstrate <strong>how to create a basic CKEditor widget plugin</strong>.</p>\n\n<h2 id='widget_sdk_tutorial_1-section-prerequisites'>Prerequisites</h2>\n\n<p><a href=\"#!/guide/dev_widgets\">Widgets are an innovative feature</a> that is available since <strong>CKEditor 4.3</strong>. In order to proceed with this tutorial and create your own widget you need the following:</p>\n\n<ul>\n<li>CKEditor 4.3 and above.</li>\n<li>The <a href=\"http://ckeditor.com/addon/widget\">Widget plugin</a> along with its dependencies.</li>\n</ul>\n\n\n<h2 id='widget_sdk_tutorial_1-section-introduction'>Introduction</h2>\n\n<p>We are going to develop a basic template widget that lets the user insert a simple box with a title and comment fields into the document. The widget will create a predefined content structure that will be added to the document when the user clicks a dedicated toolbar button.</p>\n\n<p>Please note that technically <strong>widgets are defined in <a href=\"http://docs.ckeditor.com/#!/guide/plugin_sdk_intro\">CKEditor plugins</a></strong> so all the rules of creating plugins as well as the <a href=\"http://docs.ckeditor.com/#!/api/CKEDITOR.plugins\">Plugin API</a> apply to them. Additionally, widgets also expose a dedicated <a href=\"http://docs.ckeditor.com/#!/api/CKEDITOR.plugins.widget\">Widget API</a> that we are going to use (and explain) in this tutorial.</p>\n\n<p>The widget plugin will be named <code>simplebox</code>.</p>\n\n<h2 id='widget_sdk_tutorial_1-section-widget-plugin-files'>Widget Plugin Files</h2>\n\n<p>Firstly, we will need to create the <code>simplebox</code> directory inside the <code>plugins</code> directory of the CKEditor installation.</p>\n\n<p class=\"tip\">\n    Remember that for CKEditor the name of the plugin directory is important and has to be the same as the name of the plugin, otherwise the editor will not be able to recognize it.\n</p>\n\n\n<p>Inside the newly created <code>simplebox</code> directory we are going to place the <code>plugin.js</code> file that will contain the widget logic. Apart from that, since we will also need a toolbar icon for our widget, we are going to add an <code>icons</code> directory and subsequently place the <code>simplebox.png</code> file inside.</p>\n\n<p>To sum up, we will need the following file structure for our plugin to work:</p>\n\n<ul>\n<li><code>ckeditor root/</code>\n\n<ul>\n<li><code>plugins/</code>\n\n<ul>\n<li><code>simplebox/</code>\n\n<ul>\n<li><code>icons/</code>\n\n<ul>\n<li><code>simplebox.png</code></li>\n</ul>\n</li>\n<li><code>plugin.js</code></li>\n</ul>\n</li>\n</ul>\n</li>\n</ul>\n</li>\n</ul>\n\n\n<h2 id='widget_sdk_tutorial_1-section-widget-source-code'>Widget Source Code</h2>\n\n<p>With the following structure ready, it is time to open the <code>plugin.js</code> file in a text editor and to start creating the source code of our sample widget.</p>\n\n<pre><code><a href=\"#!/api/CKEDITOR.plugins-method-add\" rel=\"CKEDITOR.plugins-method-add\" class=\"docClass\">CKEDITOR.plugins.add</a>( 'simplebox', {\n    // Simple Box widget code.\n} );\n</code></pre>\n\n<p>All CKEditor plugins are created by using the <code><a href=\"#!/api/CKEDITOR.plugins-method-add\" rel=\"CKEDITOR.plugins-method-add\" class=\"docClass\">CKEDITOR.plugins.add</a></code> function. This function should contain the plugin name (again, the same as the directory name, so <code>simplebox</code> in our case) and the plugin logic placed inside the <code><a href=\"#!/api/CKEDITOR.pluginDefinition-method-init\" rel=\"CKEDITOR.pluginDefinition-method-init\" class=\"docClass\">init</a></code> function that is called upon the initialization of the editor instance.</p>\n\n<p>The <code>simplebox</code> plugin is going to define the <code>simplebox</code> widget. To do this, the plugin needs to reference the generic <a href=\"http://ckeditor.com/addon/widget\">Widget plugin</a> that provides the <a href=\"http://docs.ckeditor.com/#!/api/CKEDITOR.plugins.widget\">Widget API</a>. This is done in the <code><a href=\"#!/api/CKEDITOR.pluginDefinition-property-requires\" rel=\"CKEDITOR.pluginDefinition-property-requires\" class=\"docClass\">requires</a></code> property.</p>\n\n<p>Additionally, as we are going to define a toolbar button, the <code>icons</code> property needs to be set and include the name of the icon file.</p>\n\n<p class=\"tip\">\n    Please note the special naming convention for widget toolbar buttons. The Widget API will only be able to automatically add the button to the toolbar if the name of the icon is the same as the widget. In this case this will be <code>simplebox</code>. Do remember that the <code>icons</code> property <strong>accepts a PNG icon file name without an extension</strong>.\n</p>\n\n\n<pre><code><a href=\"#!/api/CKEDITOR.plugins-method-add\" rel=\"CKEDITOR.plugins-method-add\" class=\"docClass\">CKEDITOR.plugins.add</a>( 'simplebox', {\n    requires: 'widget',\n\n    icons: 'simplebox',\n\n    init: function( editor ) {\n        // Plugin logic goes here...\n    }\n} );\n</code></pre>\n\n<h2 id='widget_sdk_tutorial_1-section-widget-registration'>Widget Registration</h2>\n\n<p>We now need to use the Widget API to register the widget with the editor instance. This is done by using the <code><a href=\"#!/api/CKEDITOR.plugins.widget.repository-method-add\" rel=\"CKEDITOR.plugins.widget.repository-method-add\" class=\"docClass\">editor.widgets.add</a></code> method inside the plugin initialization logic.</p>\n\n<pre><code>init: function( editor ) {\n    editor.widgets.add( 'simplebox', {\n        // Widget code.\n    } );\n}\n</code></pre>\n\n<p>The <code>editor.widgets.add</code> method accepts a number of parameters (wrapped as an instance of the <code><a href=\"#!/api/CKEDITOR.plugins.widget.definition\" rel=\"CKEDITOR.plugins.widget.definition\" class=\"docClass\">CKEDITOR.plugins.widget.definition</a></code> class) that let you define the widget properties, including the toolbar button, content required by the widget and allowed in the widget elements, widget building blocks, and its template. Last but not least, we need to define the elements that will be converted into widgets in the editor.</p>\n\n<h2 id='widget_sdk_tutorial_1-section-widget-toolbar-button'>Widget Toolbar Button</h2>\n\n<p>A toolbar button can be added by defining the <code><a href=\"#!/api/CKEDITOR.plugins.widget.definition-property-button\" rel=\"CKEDITOR.plugins.widget.definition-property-button\" class=\"docClass\">button</a></code> property. This property accepts the label for the button and if defined, automatically adds the button (with the icon defined in the <code>icons</code> property of the <code><a href=\"#!/api/CKEDITOR.plugins-method-add\" rel=\"CKEDITOR.plugins-method-add\" class=\"docClass\">CKEDITOR.plugins.add</a></code> method, identical to the widget name, and the label defined here) to the editor toolbar.</p>\n\n<pre><code>editor.widgets.add( 'simplebox', {\n    button: 'Create a simple box'\n} );\n</code></pre>\n\n<p>Please note that normally you would place the label in the <code>editor.lang.simplebox.*</code> property to make it possible to localize it. In this case, however, we will simplify the widget code and add the label text literally as a string.</p>\n\n<h2 id='widget_sdk_tutorial_1-section-ckeditor-initialization'>CKEditor Initialization</h2>\n\n<p>It is now time to initialize a CKEditor instance that will use the Simple Box widget along with its toolbar button.</p>\n\n<p>To register the widget plugin with CKEditor, we have to add it to the <code><a href=\"#!/api/CKEDITOR.config-cfg-extraPlugins\" rel=\"CKEDITOR.config-cfg-extraPlugins\" class=\"docClass\">config.extraPlugins</a></code> list. In this particular case, to make screenshots more clear, we also enhanced the toolbar definition and removed some unnecessary plugins that we will not need in this sample, but you can try it out on any installation package of CKEditor 4.3 and above that contains the Widget plugin.</p>\n\n<p>Open the page that will contain CKEditor in a text editor and insert a CKEditor instance using the following configuration.</p>\n\n<pre><code>&lt;textarea cols=\"80\" id=\"editor1\" name=\"editor1\" rows=\"10\"&gt;&lt;/textarea&gt;\n&lt;script&gt;\n    <a href=\"#!/api/CKEDITOR-method-replace\" rel=\"CKEDITOR-method-replace\" class=\"docClass\">CKEDITOR.replace</a>( 'editor1', {\n        // Load the Simple Box plugin.\n        extraPlugins: 'simplebox'\n    } );\n&lt;/script&gt;\n</code></pre>\n\n<p>After you load the page containing the above CKEditor instance, you should be able to see the new plugin toolbar button along with its tooltip.</p>\n\n<p><p><img src=\"guides/widget_sdk_tutorial_1/simplebox1_button_added.png\" alt=\"Simple Box button added to the editor toolbar\" width=\"968\" height=\"315\"></p></p>\n\n<h2 id='widget_sdk_tutorial_1-section-creating-widget-elements'>Creating Widget Elements</h2>\n\n<p>We now need to create the widget structure. This can be achieved by using the <code><a href=\"#!/api/CKEDITOR.plugins.widget.definition-property-template\" rel=\"CKEDITOR.plugins.widget.definition-property-template\" class=\"docClass\">template</a></code> property of the widget definition.</p>\n\n<p>Each widget consists of one or more HTML elements defined by the widget author. Once set, this structure becomes immutable, which means that it cannot be altered by the user. This ensures that the widget structure remains intact and the user will not be able to accidentally alter it or delete one of its parts.</p>\n\n<p>Let us define a simple widget template that will consist of two fields: a <strong>title</strong> field (using a <code>&lt;h2&gt;</code> element) and a <strong>content</strong> field (using a <code>&lt;div&gt;</code> element).</p>\n\n<pre><code>editor.widgets.add( 'simplebox', {\n    // Code defined before...\n\n    template:\n        '&lt;div class=\"simplebox\"&gt;' +\n            '&lt;h2 class=\"simplebox-title\"&gt;Title&lt;/h2&gt;' +\n            '&lt;div class=\"simplebox-content\"&gt;&lt;p&gt;Content...&lt;/p&gt;&lt;/div&gt;' +\n        '&lt;/div&gt;'\n} );\n</code></pre>\n\n<p>After you reload the page and click the widget toolbar button, you will insert the following structure into the editor.</p>\n\n<p><p><img src=\"guides/widget_sdk_tutorial_1/simplebox1_template_defined.png\" alt=\"Simple Box widget template inserted into the editor\" width=\"966\" height=\"313\"></p></p>\n\n<p>Note the small gray handle (<img class=\"inline\" src=\"guides/widget_sdk_tutorial_1/drag.png\" alt=\"Drag handle\">) in the top left-hand corner of a widget that appears when you hover over or select the widget. If you hover over it with your mouse, a \"move\" cursor will appear. All widgets can be dragged inside the editing area of CKEditor and dropped wherever you want to place them. And since the widget structure is immutable, there is no chance that the widget will become corrupted in the process or otherwise fall apart!</p>\n\n<h2 id='widget_sdk_tutorial_1-section-adding-editable-parts'>Adding Editable Parts</h2>\n\n<p>Note, however, that at the moment Simple Box is of no real use for the user because so far the widget only contains the immutable structure and no editable content.</p>\n\n<p>To change this and allow for some user input, we will need to define the <code><a href=\"#!/api/CKEDITOR.plugins.widget.definition-property-editables\" rel=\"CKEDITOR.plugins.widget.definition-property-editables\" class=\"docClass\">editables</a></code> property of the widget definition. This property uses the <code><a href=\"#!/api/CKEDITOR.plugins.widget.nestedEditable.definition-property-selector\" rel=\"CKEDITOR.plugins.widget.nestedEditable.definition-property-selector\" class=\"docClass\">selector</a></code> parameter to define a CSS selector to be used for finding the particular editable element inside the widget element. In this case the selectors will use the classes that we assigned to the widget fields in the template definition.</p>\n\n<p class=\"tip\">\n    Please note that only elements defined in <code><a href=\"#!/api/CKEDITOR.dtd-property-S-editable\">CKEDITOR.dtd.$editable</a></code> can be converted into editable widget elements.\n</p>\n\n\n\n\n<p class=\"tip alert\">\n    Please note that editables <strong>have to</strong> be defined in the same order as the corresponding elements are placed in DOM. Otherwise, errors may occur when nesting widgets.\n</p>\n\n\n<pre><code>editor.widgets.add( 'simplebox', {\n    // Code defined before...\n\n    editables: {\n        title: {\n            selector: '.simplebox-title'\n        },\n        content: {\n            selector: '.simplebox-content'\n        }\n    }\n} );\n</code></pre>\n\n<p>After you reload the sample page and click the widget toolbar button again, the inserted widget will become editable. When you hover over it with your mouse, you will see the yellow outlines for parts that can be edited.</p>\n\n<p><p><img src=\"guides/widget_sdk_tutorial_1/simplebox1_editables_defined.png\" alt=\"Widget editables defined\" width=\"966\" height=\"313\"></p></p>\n\n<h3 id='widget_sdk_tutorial_1-section-nesting-widgets'>Nesting Widgets</h3>\n\n<p>CKEditor 4.5 brought support for inserting widgets into other widget's nested editable parts. This means that for example an instance of the Simple Box widget can be included in the content of another Simple Box. Enabling this feature does not require any additional steps, but it is important to remember that the widget to be nested must fulfill the rules of the <a href=\"#!/guide/widget_sdk_tutorial_1-section-limiting-available-formatting\">nested editable part's allowed content</a>.</p>\n\n<p>Note that due to limitations of Internet Explorer 8 nested widgets may not be fully functional in this browser.</p>\n\n<h2 id='widget_sdk_tutorial_1-section-widget-styling'>Widget Styling</h2>\n\n<p>Currently the widget does not look very impressive and does not stand out in the editor content. Let us add some styling to the structure it generates to make it more obvious that it constitutes a special unit of content.</p>\n\n<p>Each CKEditor plugin, included widgets, can add its own styles for editor content. Depending on your CKEditor usage scenario (classic vs inline editor) the styles will need to be added to the <a href=\"#!/api/CKEDITOR.config-cfg-contentsCss\">contentsCss</a> setting or added to the page styles.</p>\n\n<p>To simplify the tutorial, let us assume you are using the <a href=\"#!/guide/dev_framed\">classic editor</a>. The styling of classic editor content is done by using the <code>contents.css</code> file. Add the styles below to your default <code>contents.css</code> file:</p>\n\n<pre><code>.simplebox {\n    padding: 8px;\n    margin: 10px;\n    background: #eee;\n    border-radius: 8px;\n    border: 1px solid #ddd;\n    box-shadow: 0 1px 1px #fff inset, 0 -1px 0px #ccc inset;\n}\n.simplebox-title, .simplebox-content {\n    box-shadow: 0 1px 1px #ddd inset;\n    border: 1px solid #cccccc;\n    border-radius: 5px;\n    background: #fff;\n}\n.simplebox-title {\n    margin: 0 0 8px;\n    padding: 5px 8px;\n}\n.simplebox-content {\n    padding: 0 8px;\n}\n</code></pre>\n\n<p>Please note that if you are working with the <a href=\"#!/guide/dev_inline\">inline editor</a>, you need to add these styles to your page that displays the editor. And if you want to share your plugin with others, refer to the <a href=\"#!/guide/plugin_sdk_styles\">Plugin CSS Styles</a> article that explains the recommended way to control plugin styling.</p>\n\n<p>After you reload the page and insert the widget again, you will see that thanks to the styling we added it now stands out from the rest of the editor content.</p>\n\n<p><p><img src=\"guides/widget_sdk_tutorial_1/simplebox1_styling_added.png\" alt=\"Widget styling added\" width=\"966\" height=\"313\"></p></p>\n\n<h2 id='widget_sdk_tutorial_1-section-adjusting-advanced-content-filter'>Adjusting Advanced Content Filter</h2>\n\n<p>You might remember that since the <a href=\"http://docs.ckeditor.com/#!/guide/dev_advanced_content_filter\">introduction of content filtering</a> in CKEditor <a href=\"http://docs.ckeditor.com/#!/guide/plugin_sdk_integration_with_acf\">each plugin that adds editor content must define a list of HTML elements, classes, and styles</a> that need to be added to the filter for the editor to allow them. Additionally, you should also define the <a href=\"#!/api/CKEDITOR.feature-property-requiredContent\" rel=\"CKEDITOR.feature-property-requiredContent\" class=\"docClass\">minimum HTML code</a> that is required for the feature to work which will cause the widget to be disabled if the user configuration overwrites the filtering rules added to the filter by this feature.</p>\n\n<p>The need for these changes might not have been immediately visible so far in our sample since we just kept on reloading the same page and did not try to load the data back into the editor. Let us simulate this scenario now by inserting the widget again, going to Source view and back to WYSIWYG view.</p>\n\n<p>In Source view (opened by clicking the Source button) you can see the following widget code:</p>\n\n<pre><code>&lt;div class=\"simplebox\"&gt;\n&lt;h2 class=\"simplebox-title\"&gt;Title&lt;/h2&gt;\n\n&lt;div class=\"simplebox-content\"&gt;\n&lt;p&gt;Content...&lt;/p&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n</code></pre>\n\n<p>which is exactly what our widget template is. However, when you go back to the WYSIWYG view, you will see that parts of the widget template are gone. Going to Source again will reveal that the widget code is now simply:</p>\n\n<pre><code>&lt;div&gt;\n&lt;h2&gt;Title&lt;/h2&gt;\n\n&lt;div&gt;\n&lt;p&gt;Content...&lt;/p&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n</code></pre>\n\n<p>This is what was left of the Simple Box widget:</p>\n\n<p><p><img src=\"guides/widget_sdk_tutorial_1/simplebox1_styling_stripped.png\" alt=\"Widget styling is stripped\" width=\"966\" height=\"313\"></p></p>\n\n<p>Why is that?</p>\n\n<p>This is because Advanced Content Filter removed all code that does not match your editor configuration and the list of allowed elements, classes, attributes, and styles. Since the elements that the widget introduces (<code>&lt;div&gt;</code>, <code>&lt;h2&gt;</code>, and <code>&lt;p&gt;</code>) are most probably already present in your editor configuration and allowed anyway, they were left intact, but the classes that were defined in these elements were stripped as disallowed.</p>\n\n<p>This means that in the widget plugin code we must take care of adding the elements that the widget creates to the content filter in order to prevent the editor from removing them. This can be done in the <code><a href=\"#!/api/CKEDITOR.plugins.widget.definition-property-allowedContent\" rel=\"CKEDITOR.plugins.widget.definition-property-allowedContent\" class=\"docClass\">allowedContent</a></code> property of the widget definition.</p>\n\n<p>Another widget definition property, <code><a href=\"#!/api/CKEDITOR.plugins.widget.definition-property-requiredContent\" rel=\"CKEDITOR.plugins.widget.definition-property-requiredContent\" class=\"docClass\">requiredContent</a></code>, lets you define the minimum HTML that is required for the widget to work correctly. This ensures that if the global user-defined editor filter overwrites the widget filter settings, the widget will be disabled.</p>\n\n<pre><code>editor.widgets.add( 'simplebox', {\n    // Code defined above...\n\n    allowedContent:\n        'div(!simplebox); div(!simplebox-content); h2(!simplebox-title)',\n\n    requiredContent: 'div(simplebox)'\n} );\n</code></pre>\n\n<p>After reloading the page and repeatedly switching between the Source view and the WYSIWYG view you will see that the building blocks of the widget structure were successfully added to the list of allowed elements and the editor no longer deletes them. You might notice that the whole construct still has some flaws after switching back to WYSIWYG (in fact, it no longer is a widget with all its functionality, but just the immutable template with editable fields), but we will address these issues in a moment.</p>\n\n<h2 id='widget_sdk_tutorial_1-section-limiting-available-formatting'>Limiting Available Formatting</h2>\n\n<p>Advanced Content Filter can also be used for another useful purpose: to <strong>limit the features available in the editable widget elements</strong>. At the moment the user can insert any content that is available in the configuration of the editor instance into both widget fields. This does not make a lot of sense since for example items like an image or a list would actually be undesired in the title field.</p>\n\n<p>Adjusting the content filter for editable widget elements can give the widget author more control and allow him to make sure that the widget can be and will be used for the purposes it was created for.</p>\n\n<p>Content filter adjustments for editable widget parts are done straight in their definitions inside the <code>editables</code> property, through the <code><a href=\"#!/api/CKEDITOR.plugins.widget.nestedEditable.definition-property-allowedContent\" rel=\"CKEDITOR.plugins.widget.nestedEditable.definition-property-allowedContent\" class=\"docClass\">allowedContent</a></code> parameters.</p>\n\n<pre><code>editables: {\n    title: {\n        selector: '.simplebox-title',\n        allowedContent: 'br strong em'\n    },\n    content: {\n        selector: '.simplebox-content',\n        allowedContent: 'p br ul ol li strong em'\n    }\n},\n</code></pre>\n\n<p>In this case we allowed just bold, italic, and line breaks in both fields and additionally lists and paragraphs in the content field.</p>\n\n<p class=\"tip\">\n    Please note that thanks to <a href=\"http://docs.ckeditor.com/#!/guide/dev_advanced_content_filter-section-4\">content transformations</a> with the configuration used above the editor will allow all forms of bold and italic formatting (so for example <code>&lt;strong&gt</code>, <code>&lt;b&gt</code> and <code>&lt;span style=\"font-weight:700|800|900|bold\"&gt</code>). It is enough to list just one of the forms and others will get transformed automatically to the allowed form.\n</p>\n\n\n<p>When you reload the page now, you will see that when you try to edit the widget fields, some toolbar items become greyed out (meaning they are not available in this context) and you will be unable to use them. Likewise, if you used them in Source mode, the editor would cut them out when switching to WYSIWYG view or saving the document.</p>\n\n<p><p><img src=\"guides/widget_sdk_tutorial_1/simplebox1_filtering_defined.png\" alt=\"Content filtering defined for editable widget elements\" width=\"968\" height=\"315\"></p></p>\n\n<h2 id='widget_sdk_tutorial_1-section-how-does-a-widget-become-a-widget%3F'>How Does a Widget Become a Widget?</h2>\n\n<p>A final, but perhaps most important issue is: <strong>How does CKEditor know that a piece of code is actually a widget and needs to be treated accordingly?</strong> After all you could easily insert the same structure that we used as our template straight into the document &mdash; would it become a widget, too?</p>\n\n<p>This can actually be tested in Source mode again. Try pasting our widget template into the Source and switch to WYSIWYG or insert a widget, go to Source and back to WYSIWYG. The structure that you defined in the template is there, but the entire unit is no longer a widget &mdash; the drag icon is gone and you cannot select, move, or delete the entire entity like before.</p>\n\n<p><p><img src=\"guides/widget_sdk_tutorial_1/simplebox1_no_widget.png\" alt=\"Simple Box is no longer a widget.\" width=\"966\" height=\"313\"></p></p>\n\n<p>The answer is then: Each widget definition in the plugin code must include the <code><a href=\"#!/api/CKEDITOR.plugins.widget.definition-property-upcast\" rel=\"CKEDITOR.plugins.widget.definition-property-upcast\" class=\"docClass\">upcast</a></code> property that is responsible for checking whether an element should be converted into a widget. This property defines a function that returns <code>true</code> for an element that needs to become a widget.</p>\n\n<p>In our case we will assume that each <code>&lt;div&gt;</code> element with the <code>simplebox</code> class must be converted into a widget.</p>\n\n<pre><code>editor.widgets.add( 'simplebox', {\n    // Code defined above...\n\n    upcast: function( element ) {\n        return element.name == 'div' &amp;&amp; element.hasClass( 'simplebox' );\n    }\n} );\n</code></pre>\n\n<p>Note that the <code>element</code> argument is an instance of <code><a href=\"#!/api/CKEDITOR.htmlParser.element\" rel=\"CKEDITOR.htmlParser.element\" class=\"docClass\">CKEDITOR.htmlParser.element</a></code>, which means it is not a real DOM element yet. This is caused by the fact that upcasting is performed during data processing which is done on DOM represented by JavaScript objects.</p>\n\n<p>Anyway, this is it. The widget code is complete now and works as intended!</p>\n\n<h2 id='widget_sdk_tutorial_1-section-full-source-code'>Full Source Code</h2>\n\n<p>The full contents of the <code>simplebox/plugin.js</code> file is as follows:</p>\n\n<pre><code><a href=\"#!/api/CKEDITOR.plugins-method-add\" rel=\"CKEDITOR.plugins-method-add\" class=\"docClass\">CKEDITOR.plugins.add</a>( 'simplebox', {\n    requires: 'widget',\n\n    icons: 'simplebox',\n\n    init: function( editor ) {\n        editor.widgets.add( 'simplebox', {\n\n            button: 'Create a simple box',\n\n            template:\n                '&lt;div class=\"simplebox\"&gt;' +\n                    '&lt;h2 class=\"simplebox-title\"&gt;Title&lt;/h2&gt;' +\n                    '&lt;div class=\"simplebox-content\"&gt;&lt;p&gt;Content...&lt;/p&gt;&lt;/div&gt;' +\n                '&lt;/div&gt;',\n\n            editables: {\n                title: {\n                    selector: '.simplebox-title',\n                    allowedContent: 'br strong em'\n                },\n                content: {\n                    selector: '.simplebox-content',\n                    allowedContent: 'p br ul ol li strong em'\n                }\n            },\n\n            allowedContent:\n                'div(!simplebox); div(!simplebox-content); h2(!simplebox-title)',\n\n            requiredContent: 'div(simplebox)',\n\n            upcast: function( element ) {\n                return element.name == 'div' &amp;&amp; element.hasClass( 'simplebox' );\n            }\n        } );\n    }\n} );\n</code></pre>\n\n<p>This should be added to your <code>contents.css</code> file:</p>\n\n<pre><code>.simplebox {\n    padding: 8px;\n    margin: 10px;\n    background: #eee;\n    border-radius: 8px;\n    border: 1px solid #ddd;\n    box-shadow: 0 1px 1px #fff inset, 0 -1px 0px #ccc inset;\n}\n.simplebox-title, .simplebox-content {\n    box-shadow: 0 1px 1px #ddd inset;\n    border: 1px solid #cccccc;\n    border-radius: 5px;\n    background: #fff;\n}\n.simplebox-title {\n    margin: 0 0 8px;\n    padding: 5px 8px;\n}\n.simplebox-content {\n    padding: 0 8px;\n}\n</code></pre>\n\n<p class=\"tip\">\n    You can also <a href=\"https://github.com/ckeditor/ckeditor-docs-samples/tree/master/tutorial-simplebox-1\">download the entire plugin folder</a> including the icon, the fully commented source code, and a working sample. If you have any doubts about the installation process, see the <a href=\"https://github.com/ckeditor/ckeditor-docs-samples/blob/master/README.md\">instructions</a>.\n</p>\n\n\n<h2 id='widget_sdk_tutorial_1-section-working-example'>Working Example</h2>\n\n<p>The widget plugin code is now ready. When you click the \"Create a Simple Box\" button on the editor toolbar, a Simple Box widget will be inserted into the document. The box will contain two editable parts &mdash; a title field and a content field. Both can be edited, with available formatting limited to a subset of editor features.</p>\n\n<p>At the same time the box itself will be immutable, i.e. you will not be able to alter its structure (at least in the editor WYSIWYG view). You will however be able to treat it as a unit inside the editor contents, move by using drag&amp;drop, or select and delete as a whole.</p>\n\n<p><p><img src=\"guides/widget_sdk_tutorial_1/simplebox1_example_1.png\" alt=\"Simple Box widget example\" width=\"966\" height=\"595\"></p></p>\n\n<p>Note that when you edit the widget fields, the only formatting options that are active in the toolbar are the ones that you allowed for these fields in the widget definition.</p>\n\n<p>You can now grab the second box and drag it up. If you drop it somewhere in the middle of the first paragraph, this paragraph will be split into two as Simple Box is a block widget (which means it cannot be pasted inline into another block element).</p>\n\n<p><p><img src=\"guides/widget_sdk_tutorial_1/simplebox1_example_2.png\" alt=\"Changing widget position by drag&amp;amp;drop\" width=\"966\" height=\"595\"></p></p>\n\n<h2 id='widget_sdk_tutorial_1-section-further-enhancements'>Further Enhancements</h2>\n\n<p>In current form the Simple Box widget lets you insert a simple template into the document, but it does not let you customize any properties of the widget structure nor edit it once inserted. Check the <a href=\"#!/guide/widget_sdk_tutorial_2\">second part of the tutorial</a> for information on <strong>how to add a widget dialog window with widget editing capabilities</strong>!</p>\n","title":"Widget Tutorial (Part 1)","meta_description":"CKEditor widget tutorial, part 1.","meta_keywords":"ckeditor, editor, wysiwyg, widgets, widget, plugin, plugins, tutorial, sample, example, sdk"});