console.log("Modal script loaded!"); // Debugging check

// Ensure elements are selected after DOM is loaded
document.addEventListener("DOMContentLoaded", function () {
    console.log("DOM Loaded: Modal script is active.");

    const buyModal = document.getElementById('buyModal');
    // Check if modal exists before trying to query inside it
    if (!buyModal) {
        console.error("Buy Modal element not found!");
        return; 
    }
    const modalContent = buyModal.querySelector('div > div'); // Target the inner div for scaling
    const modalImage = document.getElementById('modalImage');
    const modalName = document.getElementById('modalName');
    const modalPrice = document.getElementById('modalPrice');
    const quantityInput = document.getElementById('quantity');

    // Check if all modal inner elements exist
    if (!modalContent || !modalImage || !modalName || !modalPrice || !quantityInput) {
        console.error("One or more modal content elements not found!");
        return;
    }

    window.openModal = function (id, name, price, imageSrc) {
        modalName.textContent = name;
        // Use toLocaleString for better formatting
        modalPrice.textContent = `₱${parseFloat(price).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })}`;
        modalImage.src = imageSrc;
        quantityInput.value = 1; // Reset quantity

        buyModal.classList.remove('pointer-events-none');
        buyModal.classList.remove('opacity-0', 'scale-95');
        buyModal.classList.add('opacity-100', 'scale-100');
        // Ensure inner content also scales correctly
        modalContent.classList.remove('scale-95');
        modalContent.classList.add('scale-100');
    }

    window.closeModal = function () {
        // Explicitly remove 'visible' classes
        buyModal.classList.remove('opacity-100', 'scale-100');
        modalContent.classList.remove('scale-100');

        // Add 'hidden' classes (these are the defaults in the HTML)
        buyModal.classList.add('opacity-0', 'scale-95');
        modalContent.classList.add('scale-95'); 
        
        // Make it non-interactive after the transition
        setTimeout(() => {
            buyModal.classList.add('pointer-events-none');
        }, 300); // Match transition duration-300
    }

    window.confirmPurchase = function () {
        const quantity = quantityInput.value;
        const name = modalName.textContent;
        // Robust price extraction
        const priceText = modalPrice.textContent.replace(/[^0-9.]/g, ''); 
        const price = parseFloat(priceText);
        
        if (isNaN(price)) {
            console.error("Could not parse price:", modalPrice.textContent);
            alert("Error processing price. Please try again.");
            return;
        }

        console.log(`Confirmed purchase: ${quantity} x ${name} at ₱${price.toFixed(2)} each.`);
        // Add actual purchase logic here (e.g., redirect to checkout, API call)
        
        closeModal(); // Close modal after confirmation
        alert('Purchase confirmed! (Placeholder)'); // Placeholder confirmation
    }

    // Existing search form listener (ensure it doesn't conflict)
    const searchForm = document.querySelector('form'); // Re-select inside DOMContentLoaded
    const inventoryItemsContainer = document.querySelector('.max-w-7xl.mx-auto'); // Adjust selector if needed

    if (searchForm && inventoryItemsContainer) {
        searchForm.addEventListener('submit', function () {
            // Consider if 'fade-in' class exists and does what's intended
            inventoryItemsContainer.classList.add('fade-in'); 
        });
    } else {
        console.warn("Search form or inventory container not found for fade-in effect.");
    }
});
