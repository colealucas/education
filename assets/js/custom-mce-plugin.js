(function() {
    if (typeof tinymce !== 'undefined') {
        tinymce.PluginManager.add('custom_class_plugin', function(editor, url) {
            editor.addButton('custom_class_button', {
                text: '',
                icon: 'mce-ico mce-i-notice', 
                tooltip: 'Ignore paragraph', // Added tooltip text
                onclick: function() {
                    let selectedText = editor.selection.getContent({format: 'html'});

                    if (selectedText) {
                        editor.insertContent('<p class="ignore">' + selectedText + '</p>');
                    } else {
                        alert('Selecteaza un paragraf mai intai :)');
                    }
                }
            });
        });
    }
})();
