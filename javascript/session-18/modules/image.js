function loadImage(path, width, alt, elem) {
    const img = document.createElement('img');
    img.setAttribute('src', path);
    img.setAttribute('width', width);
    img.setAttribute('alt', alt);
    elem.appendChild(img);
}

export { loadImage }