chrome.runtime.onMessage.addListener((request, sender, sendResponse) => {
    if (request.action === "fetchProducts") {
        fetch("http://127.0.0.1:8000/api/products")
            .then(response => response.json())
            .then(data => sendResponse({ products: data }))
            .catch(error => console.error("Error:", error));
        return true;
    }
});

chrome.action.onClicked.addListener((tab) => {
    chrome.scripting.executeScript({
        target: { tabId: tab.id },
        files: ["content.js"]
    });
});
