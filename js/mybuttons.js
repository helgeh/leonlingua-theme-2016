(function() {
     /* Register the buttons */
     tinymce.create('tinymce.plugins.MyButtons', {
          init : function(ed, url) {
               /**
               * Inserts shortcode content
               */
               // ed.addButton( 'button_eek', {
               //      title : 'Insert shortcode',
               //      image : '../wp-includes/images/smilies/icon_eek.gif',
               //      onclick : function() {
               //           ed.selection.setContent('[myshortcode]');
               //      }
               // });
               /**
               * Adds HTML tag to selected content
               */
               ed.addButton( 'button_lightbox', {
                    title : 'Toggle Lightbox',
                    // image : '/wp-content/themes/leonlingua-theme01.1/assets/lightbox_icon.gif', // '../wp-includes/images/smilies/icon_mrgreen.gif',
                    cmd: 'button_lightbox_cmd'
               });
               ed.addCommand( 'button_lightbox_cmd', function() {
                    // var selected_text = ed.selection.getContent();
                    // var return_text = '';
                    // return_text = selected_text; // '<h1>' + selected_text + '</h1>';
                    var  selectedNode = ed.selection.getNode(),
                         linkNode = ed.dom.getParent( selectedNode, 'a[href]' );
                    if (selectedNode.nodeName === 'P') {
                         var range = ed.selection.getRng();
                         if (range.startContainer.nodeType === 3)
                              range.selectNode(range.startContainer);
                         else if (range.endContainer.nodeType === 3)
                              range.selectNode(range.endContainer);
                         selectedNode = range.commonAncestorContainer;
                    }
                    if (jQuery(selectedNode).hasClass('fancybox'))
                         jQuery(selectedNode).removeClass('fancybox');
                    else
                         jQuery(selectedNode).addClass('fancybox');
               });
               ed.onNodeChange.add(function(ed, cm, e) {
                    var  selectedNode = ed.selection.getNode();
                    cm.setActive('button_lightbox', jQuery(selectedNode).hasClass('fancybox'));
                });
          },
          createControl : function(n, cm) {
               return null;
          },
     });
     /* Start the buttons */
     tinymce.PluginManager.add( 'my_button_script', tinymce.plugins.MyButtons );
})();