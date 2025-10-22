import './bootstrap';
import '../css/admin-post.css'

import 'bootstrap/dist/css/bootstrap.min.css';
import 'tom-select/dist/css/tom-select.bootstrap5.css';

import initPostForm from "./admin-post.js";
import initTagsSelect from "./admin-tags.js"
document.addEventListener('DOMContentLoaded', () => {
    initPostForm();
    initTagsSelect();
});
