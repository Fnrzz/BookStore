const title = document.querySelector('#title');
const slug = document.querySelector('#slug');

title.addEventListener('change', function () {
    fetch('/admin/create-product/checkslug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug);
});          