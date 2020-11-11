require('./bootstrap');

window.tagify = require('@yaireo/tagify');

var inputElement = document.querySelector('input');
new Tagify(inputElement);

console.log('w1');
