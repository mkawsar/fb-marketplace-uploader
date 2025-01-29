function fillFacebookMarketplace(product) {
    console.log(product);
    
    document.querySelector("[aria-label='Title']").value = product.title;
    document.querySelector("[aria-label='Price']").value = product.price;
    document.querySelector("[aria-label='Description']").value = product.description;
    document.querySelector("[aria-label='Location']").value = product.location;
}

chrome.runtime.onMessage.addListener((request) => {
    if (request.action === "uploadProduct") {
        fillFacebookMarketplace(request.product);
    }
});
