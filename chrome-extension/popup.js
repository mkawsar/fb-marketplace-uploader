document.getElementById('fetchProduct').addEventListener('click', async function () {
    const response = await fetch('http://127.0.0.1:8000/api/products');
    const product = await response.json();
    document.getElementById('productDetails').innerHTML = `
        <p data-id="${product.id}"></p>
        <p>Name: ${product.title}</p>
        <p>Price: ${product.price}</p>
        <p>Description: ${product.description}</p>
    `;

    document.getElementById('uploadProduct').disabled = false;
});

document.getElementById('uploadProduct').addEventListener('click', async function () {
    let div = document.getElementById('productDetails').querySelector('p');

    let value = div.getAttribute('data-id');
    const product = {
        id: value
    };

    const response = await fetch('http://127.0.0.1:8000/api/products', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(product)
    });

    if (response.ok) {
        alert('Product uploaded to Facebook Marketplace');
    } else {
        alert('Failed to upload product');
    }
});
