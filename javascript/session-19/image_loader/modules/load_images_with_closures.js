function loadImage(url, callback) {
    let image = new Image();

    image.onload = function() {
        callback(null, image);
    };

    image.onerror = function() {
        const msg = `Could not find the image - url: ${url}`;
        callback(new Error(msg));
    };

    image.src = url;
}

export default loadImage;