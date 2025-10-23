import Quill from 'quill';
import 'quill/dist/quill.snow.css';

export default function initPostForm() {
    const editor = document.getElementById('editor');
    if (!editor) return;

    const toolbarOptions = [
        ['bold', 'italic', 'underline'],
        [{ 'font': [] }],
        ['clean']
    ];

    const quill = new Quill('#editor', {
        modules: { toolbar: toolbarOptions },
        theme: 'snow'
    });

    const hiddenInput = document.querySelector('input[name="content"]');
    if (hiddenInput && hiddenInput.value) {
        quill.root.innerHTML = hiddenInput.value;
    }

    const form = document.getElementById('post-form');
    form?.addEventListener('submit', (e) => {
        hiddenInput.value = quill.root.innerHTML;
        console.log('content:', hiddenInput.value);

        let hasError = false;

        const titleInput = document.querySelector('input[name="title"]');
        let titleError = document.querySelector('#title-error');
        if (titleInput && titleInput.value.trim() === '') {
            e.preventDefault();
            hasError = true;
            if (!titleError) {
                titleError = document.createElement('div');
                titleError.id = 'title-error';
                titleError.className = 'text-danger mt-1';
                titleError.innerText = 'Это поле обязательно для заполнения';
                titleInput.after(titleError);
            }
        } else {
            titleError?.remove();
        }

        const text = quill.getText().trim().replace(/\n/g, '');
        let contentError = document.querySelector('#editor-error');
        if (!text) {
            e.preventDefault();
            hasError = true;
            if (!contentError) {
                contentError = document.createElement('div');
                contentError.id = 'editor-error';
                contentError.className = 'text-danger mt-1';
                contentError.innerText = 'Это поле обязательно для заполнения';
                editor.after(contentError);
            }
        } else {
            contentError?.remove();
        }

        if (hasError) {
            e.preventDefault();
            return;
        }
    });
}
