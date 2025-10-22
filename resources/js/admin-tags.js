import TomSelect from "tom-select";

export default function initTagsSelect() {
    const tagsEl = document.getElementById('tags');
    if (!tagsEl) return;

    new TomSelect(tagsEl, {
        plugins: ['remove_button'],
        persist: false,
        placeholder: 'Выберите тэги...',
    });
}
