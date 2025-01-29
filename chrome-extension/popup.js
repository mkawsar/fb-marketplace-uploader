document.addEventListener("DOMContentLoaded", () => {
    chrome.runtime.sendMessage({ action: "fetchProducts" }, (response) => {
        const productList = document.getElementById("productList");
        response.products.forEach((product) => {
            let li = document.createElement("li");
            li.textContent = `${product.title} - ${product.price}€`;
            productList.appendChild(li);
        });
    });
});
