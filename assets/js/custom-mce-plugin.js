(function() {
    console.log('Custom TinyMCE plugin loaded');

    tinymce.PluginManager.add('custom_class_plugin', function(editor, url) {
        editor.ui.registry.addButton('custom_class_button', {
            text: 'Custom Class',
            icon: 'format',
            onAction: function() {
                let selectedText = editor.selection.getContent({format: 'html'});

                if (selectedText) {
                    editor.insertContent('<p class="my-custom-class">' + selectedText + '</p>');
                } else {
                    alert('Please select some text first.');
                }
            }
        });
    });
})();
