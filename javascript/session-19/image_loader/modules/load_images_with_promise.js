function loadImage(url) {
    return new Promise((resolve, reject) => {
        let image = new Image();

        image.onload = function() {
            resolve(image);
        };

        image.onerror = function() {
            const msg = `Could not find the image - url: ${url}`;
            reject(new Error(msg));
        };

        image.src = url;
    });
}

export default loadImage;