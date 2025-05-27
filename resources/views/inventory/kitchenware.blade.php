<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kitchenware Category</title>

    @vite('resources/css/app.css')
    @vite(['resources/js/app.js'])

</head>
<body class ="bg-gray-100">

<!-- Navbar Container -->
<div class="navbar-container">
    <div class="navbar-content sticky top-0 bg-white shadow">


        <!-- Logo -->
        <div class="flex items-center">
            <img src="{{ asset('images/original.png') }}" alt="Original Image" class="logo">
        </div>

        <!-- Search Bar Container -->
        <div class="search-container">
            <input type="text" placeholder="Search in VelCommerce" class="search-input">
            
            <!-- Magnifying Glass Search Button -->
            <button class="search-button">
                <svg xmlns="http://www.w3.org/2000/svg" class="search-icon" viewBox="0 0 24 24" fill="none" 
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </button>
        </div>
    </div>
</div>

<!-- Fetching Products -->
<div class="max-w-7xl mx-auto">
    <h2 class="text-4xl font-bold mb-6 text-gray-800 text-center mt-6">Kitchenware</h2>

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">
        @foreach($inventories as $item)
            <div class="bg-white p-4 shadow-md rounded-lg hover:shadow-lg transition">
                @php
                    $imageSrc = filter_var($item->images, FILTER_VALIDATE_URL) ? $item->images : asset('storage/' . $item->images);
                @endphp
                
                <img src="{{ $imageSrc }}" 
                     onerror="this.onerror=null; this.src='{{ asset('images/default.jpg') }}';"
                     alt="{{ $item->name }}" 
                     class="w-full h-40 object-cover rounded">

                <h3 class="text-sm font-semibold mt-2 text-gray-800 truncate hover:text-blue-500 transition">{{ $item->name }}</h3>

                <p class="text-red-600 font-bold text-lg">₱{{ number_format($item->price, 2) }}</p>
                
                <div class="flex justify-between items-center mt-2">
                    <!-- Buy Now Button -->
                    <button class="bg-blue-500 text-white text-sm px-4 py-2 rounded hover:bg-blue-600 transition"
                            onclick="openModal('{{ $item->id }}', '{{ $item->name }}', '{{ $item->price }}', '{{ $imageSrc }}')">
                        Buy Now
                    </button>

                    <!-- Add to Cart Button -->
        <div class="rounded-full cursor-pointer p-2 hover:bg-gray-200 transition duration-300 ease-in-out transform hover:scale-110"

                        onclick="addToCart('{{ $item->id }}', '{{ $item->name }}', '{{ $item->price }}', '{{ $imageSrc }}')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 hover:text-blue-900 transform hover:scale-110" 
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.8 14.3a2 2 0 002 1.7h8a2 2 0 002-1.7L23 6H6"></path>
                        </svg>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


<!-- MODAL -->
<div id="buyModal" class="hidden fixed inset-0  bg-opacity-50 flex justify-center items-center z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-lg font-bold mb-2">Purchase Item</h2>
        <img id="modalImage" class="w-full h-40 object-cover rounded mb-2">
        <p id="modalName" class="text-gray-800 font-semibold"></p>
        <p id="modalPrice" class="text-red-600 font-bold"></p>

        <label for="quantity" class="block text-gray-700 mt-2">Quantity:</label>
        <input type="number" id="quantity" min="1" value="1"
               class="w-full p-2 border rounded mt-1">

        <button onclick="confirmPurchase()" 
                class="bg-green-500 text-white px-4 py-2 rounded mt-4 w-full">
            Confirm Purchase
        </button>

        <button onclick="closeModal()" 
                class="bg-gray-500 text-white px-4 py-2 rounded mt-2 w-full">
            Cancel
        </button>
    </div>
</div>

<footer class="bg-gray-900 text-white py-8 mt-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-gray-400">

            <!-- About Section -->
            <div>
                <h3 class="text-lg font-semibold">About VelCommerce</h3>
                <p class="text-gray-400 mt-2 text-sm">
                    VelCommerce is your one-stop shop for amazing deals and premium products. Experience seamless shopping with us.
                </p>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-lg font-semibold">Quick Links</h3>
                <ul class="mt-2 space-y-2 text-sm">
                    <li><a href="#" class="text-gray-400 hover:text-white">Home</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Shop</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">About Us</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Contact</a></li>
                </ul>
            </div>

            <!-- Customer Support -->
            <div>
                <h3 class="text-lg font-semibold">Customer Support</h3>
                <ul class="mt-2 space-y-2 text-sm">
                    <li><a href="#" class="text-gray-400 hover:text-white">FAQs</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Shipping & Returns</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Privacy Policy</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Terms & Conditions</a></li>
                </ul>
            </div>

            <!-- Newsletter & Socials -->
            <div>
                <h3 class="text-lg font-semibold">Stay Connected</h3>
                <p class="text-gray-400 text-sm mt-2">Subscribe to our newsletter for the latest updates.</p>
                <div class="mt-4 flex">
                    <input type="email" placeholder="Enter your email" class="w-full p-2 rounded-l bg-gray-800 text-white text-sm focus:outline-none">
                    <button class="bg-blue-600 px-4 py-2 text-sm font-semibold rounded-r hover:bg-blue-700">Subscribe</button>
                </div>
                <div class="flex space-x-4 mt-4">
                    <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-700 mt-8 pt-4 text-center text-gray-500 text-sm">
            © 2025 VelCommerce. All rights reserved.
        </div>
    </div>
</footer>

<!--Design and Developed by VelDevX-->
  
</body>
</html>
