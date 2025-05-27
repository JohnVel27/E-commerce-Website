<!--Design and Developed by VelDevX-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Bar with Cart & User Icon</title>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite('resources/css/app.css')
    @vite(['resources/js/app.js'])
</head>
<body class="bg-gray-100">

<!-- Navbar Container -->
<div class="w-full bg-white shadow-md sticky top-0 z-10">
    <div class="max-w-6xl mx-auto flex items-center justify-between py-3 px-4">

       <!-- Logo -->
        <div class="flex items-center">
            <img src="{{ asset('images/original.png') }}" alt="Original Image" class="h-20 w-auto max-w-[180px] object-contain">
        </div>


        <!-- Search Bar Container -->
        <div class="flex items-center w-full max-w-lg">
            <form action="{{ route('inventory.index') }}" method="GET" class="flex items-center w-full max-w-lg">
                <input type="text" name="search" placeholder="Search in VelCommerce"
                    class="w-full p-3 border rounded-l-full bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-900" value="{{ request('search') }}">
            
                <!-- Magnifying Glass Search Button -->
                <button type="submit" class="bg-blue-900 p-3.5 rounded-r-full flex items-center justify-center hover:bg-blue-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 24 24" fill="none" 
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </button>
            </form>
        </div>

        <!-- Icons (Cart & User) -->
        <div class="flex gap-x-6 items-center">

            <!-- Cart Icon -->
            <div class="rounded-full cursor-pointer p-2 hover:bg-gray-200 transition duration-300 ease-in-out">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 hover:text-blue-900 transform hover:scale-110" 
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="9" cy="21" r="1"></circle>
                    <circle cx="20" cy="21" r="1"></circle>
                    <path d="M1 1h4l2.8 14.3a2 2 0 002 1.7h8a2 2 0 002-1.7L23 6H6"></path>
                </svg>
            </div>

            <!-- User Icon -->
            <div class="rounded-full cursor-pointer p-2 hover:bg-gray-200 transition duration-300 ease-in-out">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 hover:text-blue-900 transform hover:scale-110" 
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
            </div>
        </div>

    </div>
</div>

        <!-- Carousel Section -->
            <div x-data="{ 
                    currentSlide: 0, 
                    slides: [
                        'https://marketplace.canva.com/EAFTmJ1S4C8/1/0/1600w/canva-black-and-yellow-simple-modern-special-offer-sale-banner-tmQkZmI1a7Q.jpg', 
                        'https://static.vecteezy.com/system/resources/previews/003/503/068/non_2x/promotion-offer-card-for-spring-sale-seasonnd-flowers-decoration-free-vector.jpg', 
                        'https://marketplace.canva.com/EAGgRgfKeUI/1/0/1600w/canva-blue-modern-ramadan-sale-banner-ta2aQs60UxU.jpg'
                    ],
                    autoSlide() {
                        setInterval(() => {
                            this.currentSlide = (this.currentSlide + 1) % this.slides.length;
                        }, 3000); // Change every 3 seconds
                    }
                }" x-init="autoSlide()" class="relative w-full max-w-6xl mx-auto mt-4">
                
                <div class="overflow-hidden rounded-lg relative flex items-center justify-center h-[500px]">
                    <!-- Image Loop -->
                    <template x-for="(slide, index) in slides" :key="index">
                        <img :src="slide" alt="Discount Offer" 
                            class="w-full h-full object-cover transition-opacity duration-500 mx-auto"
                            x-show="currentSlide === index">
                    </template>
                </div>

                <!-- Navigation Buttons -->
                <button @click="currentSlide = (currentSlide - 1 + slides.length) % slides.length"
                    class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full"><</button>
                <button @click="currentSlide = (currentSlide + 1) % slides.length"
                    class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full">></button>
            </div>


            <!-- Handmade Inventory Section -->
            <div class="w-full max-w-6xl mx-auto bg-white shadow-lg p-6 mt-6 rounded-lg flex flex-col md:flex-row items-center justify-between">
                <div class="text-center md:text-left">
                    <h2 class="text-xl font-semibold">Exclusive Handmade Creations.</h2>
                    <p class="text-gray-600 text-lg">Discover beautifully handcrafted items, made with love and care.</p>
                    <button class="mt-4 px-6 py-2 bg-blue-900 text-white rounded-full hover:bg-blue-700 transition">Shop Now ></button>
                </div>
                <img src="https://sell.cratejoy.com/wp-content/uploads/2015/06/crochet.jpg" alt="Handmade Inventory" class="w-64 mt-4 md:mt-0">
            </div>

        <div class="max-w-6xl mx-auto">
        <h2 class="text-4xl font-bold mb-6 mt-6 text-center">SHOP BY CATEGORIES</h2>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
            <!-- Category Card -->
            <a href="{{ route('inventory.index', ['category' => 'Kitchenware']) }}" class="block bg-blue-900 shadow-md rounded-lg overflow-hidden transform hover:scale-105 transition">
                <img src="https://media.istockphoto.com/id/586162072/photo/various-kitchen-utensils.jpg?s=612x612&w=0&k=20&c=auwz9ZHqkG_UlKw5y-8UqvMLznA2PySQ_Jt3ameL1aU=" alt="Kitchenware" class="w-full h-32 object-cover">
                <div class="p-3 text-center">
                    <p class="text-sm font-semibold text-white">Kitchenware</p>
                </div>
            </a>

            <a href="{{ route('inventory.index', ['category' => 'Home Decor']) }}" class="block bg-blue-900 shadow-md rounded-lg overflow-hidden transform hover:scale-105 transition">
                <img src="https://i.pinimg.com/236x/44/b9/36/44b9367c032fdf4c7281549dc27cfc79.jpg" alt="Home Decor" class="w-full h-32 object-cover">
                <div class="p-3 text-center">
                    <p class="text-sm font-semibold text-white">Home Decor</p>
                </div>
            </a>

            <a href="{{ route('inventory.index', ['category' => 'Art']) }}" class="block bg-blue-900 shadow-md rounded-lg overflow-hidden transform hover:scale-105 transition">
                <img src="https://images.squarespace-cdn.com/content/v1/52fd3de8e4b0d3e64dc2180e/1610403108817-483N85FOB1E4YW6M9GDD/Picture1.jpg" alt="Art" class="w-full h-32 object-cover">
                <div class="p-3 text-center">
                    <p class="text-sm font-semibold text-white">Art</p>
                </div>
            </a>

            <a href="{{ route('inventory.index', ['category' => 'Bath & Body']) }}" class="block bg-blue-900 shadow-md rounded-lg overflow-hidden transform hover:scale-105 transition">
                <img src="https://i.ebayimg.com/00/s/MTI0OVgxNjAw/z/SlQAAOSwxC5knYJi/$_57.JPG?set_id=8800005007" alt="Bath & Body" class="w-full h-32 object-cover">
                <div class="p-3 text-center">
                    <p class="text-sm font-semibold text-white">Bath & Body</p>
                </div>
            </a>

            <a href="{{ route('inventory.index', ['category' => 'Accessories']) }}" class="block bg-blue-900 shadow-md rounded-lg overflow-hidden transform hover:scale-105 transition">
                <img src="https://www.bellefixe.com/cdn/shop/collections/Bellebasics_WinterCollection_1920x900_9edc2d4c-e79c-4d1d-ae53-03898d9b5215_1920x.jpg?v=1612034711" alt="Accessories" class="w-full h-32 object-cover">
                <div class="p-3 text-center">
                    <p class="text-sm font-semibold text-white">Accessories</p>
                </div>
            </a>

            <a href="{{ route('inventory.index', ['category' => 'Clothing']) }}" class="block bg-blue-900 shadow-md rounded-lg overflow-hidden transform hover:scale-105 transition">
                <img src="https://cdn.shopify.com/s/files/1/0070/7032/articles/how_20to_20start_20a_20clothing_20brand_1d5af9da-74c2-4c07-985a-0ccd06d85c1b.png?v=1742241241" alt="Clothing" class="w-full h-32 object-cover">
                <div class="p-3 text-center">
                    <p class="text-sm font-semibold text-white">Clothing</p>
                </div>
            </a>

            <a href="{{ route('inventory.index', ['category' => 'Jewelry']) }}" class="block bg-blue-900 shadow-md rounded-lg overflow-hidden transform hover:scale-105 transition">
                <img src="https://hips.hearstapps.com/hmg-prod/images/treasure-royalty-free-image-1689115852.jpg?crop=0.66667xw:1xh;center,top&resize=1120:*" alt="Jewelry" class="w-full h-32 object-cover">
                <div class="p-3 text-center">
                    <p class="text-sm font-semibold text-white">Jewelry</p>
                </div>
            </a>

            <a href="{{ route('inventory.index', ['category' => 'Stationery']) }}" class="block bg-blue-900 shadow-md rounded-lg overflow-hidden transform hover:scale-105 transition">
                <img src="https://mikirei.com/uploads/1afb59e00ce809f5c6de21a2467284b7e68a3a7d.jpg" alt="Stationery" class="w-full h-32 object-cover">
                <div class="p-3 text-center">
                    <p class="text-sm font-semibold text-white">Stationery</p>
                </div>
            </a>

            <a href="{{ route('inventory.index', ['category' => 'Holiday Decor']) }}" class="block bg-blue-900 shadow-md rounded-lg overflow-hidden transform hover:scale-105 transition">
                <img src="https://www.lumina.com.ph/assets/news-and-blogs-photos/5-DIY-Christmas-Decorations-For-a-Lovely-Holiday-Home/5-DIY-Christmas-Decorations-For-a-Lovely-Holiday-Home.webp" alt="Holiday Decor" class="w-full h-32 object-cover">
                <div class="p-3 text-center">
                    <p class="text-sm font-semibold text-white">Holiday Decor</p>
                </div>
            </a>

            <a href="{{ route('inventory.index', ['category' => 'Toys']) }}" class="block bg-blue-900 shadow-md rounded-lg overflow-hidden transform hover:scale-105 transition">
                <img src="https://www.teachearlyyears.com/images/made/images/uploads/article/Early_Years_toys_630_465_int_s_c1.png" alt="Toys" class="w-full h-32 object-cover">
                <div class="p-3 text-center text-white">
                    <p class="text-sm font-semibold">Toys</p>
                </div>
            </a>
        </div>
    </div>

<!-- Fetching Products -->
<div class="max-w-7xl mx-auto">
    <h2 class="text-4xl font-bold mb-6 text-gray-800 text-center mt-6">Just For You</h2>

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

                <h3 class="text-sm font-semibold mt-2 text-gray-800 truncate">{{ $item->name }}</h3>
                <p class="text-red-600 font-bold text-lg">₱{{ number_format($item->price, 2) }}</p>
                
                <div class="flex justify-between items-center mt-2">
                    <!-- Buy Now Button -->
                    <button class="bg-blue-500 text-white text-sm px-4 py-2 rounded hover:bg-blue-600 transition"
                            onclick="openModal('{{ $item->id }}', '{{ $item->name }}', '{{ $item->price }}', '{{ $imageSrc }}')">
                        Buy Now
                    </button>

                    <!-- Add to Cart Button (Styled Like Cart Icon) -->
                    <div class="rounded-full cursor-pointer p-2 hover:bg-gray-200 transition duration-300 ease-in-out"
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
<div id="buyModal" 
     class="fixed inset-0  bg-opacity-60 flex justify-center items-center z-50 transition-opacity duration-300 ease-in-out opacity-0 scale-95 pointer-events-none">
    <div class="bg-white p-6 rounded-lg shadow-xl w-full max-w-md transform transition-transform duration-300 ease-in-out scale-95">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold text-gray-800">Purchase Item</h2>
            <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
        </div>
        <img id="modalImage" class="w-full h-48 object-cover rounded-md mb-4 shadow-sm">
        <p id="modalName" class="text-gray-900 font-semibold text-lg mb-1"></p>
        <p id="modalPrice" class="text-red-600 font-bold text-xl mb-4"></p>

        <label for="quantity" class="block text-sm font-medium text-gray-700 mb-1">Quantity:</label>
        <input type="number" id="quantity" name="quantity" min="1" value="1"
               class="w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 transition">

        <div class="mt-6 space-y-3">
            <button onclick="confirmPurchase()" 
                    class="w-full bg-gradient-to-r from-green-500 to-green-600 text-white px-4 py-2.5 rounded-md shadow-md hover:from-green-600 hover:to-green-700 transition duration-300 ease-in-out transform hover:-translate-y-0.5">
                Confirm Purchase
            </button>

            <button onclick="closeModal()" 
                    class="w-full bg-gray-200 text-gray-700 px-4 py-2.5 rounded-md hover:bg-gray-300 transition duration-300 ease-in-out">
                Cancel
            </button>
        </div>
    </div>
</div>


<footer class="bg-gray-900 text-white py-8 mt-5">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
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
<!-- Note: Modal JS functions (openModal, closeModal, confirmPurchase) are now in resources/js/script.js -->
</body>
</html>
