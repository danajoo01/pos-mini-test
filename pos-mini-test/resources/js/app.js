require("./bootstrap");
require("@coreui/coreui/dist/js/coreui.bundle.min");

import ClassicEditor from "@ckeditor/ckeditor5-build-classic";

try {
    ClassicEditor.defaultConfig = {
        toolbar: {
            items: ["heading", "|", "bold", "italic", "undo", "redo"],
        },
        language: "en",
    };

    const editor = document.querySelector("#editor");
    if (!!editor) {
        ClassicEditor.create(editor).then((editor) => {
            window.editor = editor;
        });
    }
} catch (error) {}
