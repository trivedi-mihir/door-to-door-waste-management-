<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Door to Door Waste Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css">
    <style>
        /* Add textarea styling */
textarea {
    resize: vertical;
    min-height: 100px;
}

/* Optional: Better scrollbar styling */
::-webkit-scrollbar {
    width: 8px;
}
::-webkit-scrollbar-track {
    background: #f1f1f1;
}
::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 4px;
}
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .scheduling-section, .rewards-section, .points-section {
            min-height: 500px;
        }
        .smooth-transition {
            transition: all 0.3s ease;
        }
        .reward-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        .waste-type-card.selected {
            border: 2px solid #10B981;
            background-color: rgba(16, 185, 129, 0.1);
        }
        .hidden {
            display: none;
        }
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px 20px;
            border-radius: 8px;
            z-index: 1000;
            animation: slideIn 0.5s ease, fadeOut 0.5s ease 2.5s forwards;
        }
        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        @keyframes fadeOut {
            from { opacity: 1; }
            to { opacity: 0; visibility: hidden; }
        }

        /* Profile Button & Modal Styles */
.profile-button {
    cursor: pointer;
    transition: transform 0.2s;
}
.profile-button:hover {
    transform: scale(1.05);
}
#profile-notifications:checked ~ .dot {
    transform: translateX(100%);
    background-color: #10B981; /* green-500 */
}
.dot {
    transition: all 0.3s ease-in-out;
}
.modal-animation {
    animation: modalFade 0.3s ease;
}
@keyframes modalFade {
    from { opacity: 0; transform: translateY(-20px); }
    to { opacity: 1; transform: translateY(0); }
}

    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <!-- Navigation -->
<nav class="bg-white shadow-md">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <div class="flex items-center space-x-2">
                <i class="fas fa-recycle text-green-500 text-2xl"></i>
                <span class="font-bold text-xl text-gray-800">EcoCollect</span>
            </div>
            <div class="hidden md:flex space-x-6 text-gray-600">
                <a href="#home" class="hover:text-green-500 transition-colors">Home</a>
                <a href="#schedule" class="hover:text-green-500 transition-colors">Schedule Pickup</a>
                <a href="#rewards" class="hover:text-green-500 transition-colors">Rewards</a>
                <a href="#about" class="hover:text-green-500 transition-colors">About Us</a>
            </div>
            <div class="flex items-center space-x-4">
                <div class="bg-gray-200 rounded-full px-3 py-1 flex items-center">
                    <i class="fas fa-star text-yellow-500 mr-1"></i>
                    <span id="points-display" class="font-medium">120 Points</span>
                </div>
                <div class="rounded-full bg-green-100 p-2 profile-button" id="profile-button">
                    <i class="fas fa-user text-green-500"></i>
                </div>
            </div>
        </div>
    </div>
</nav>

    <!-- Hero Section -->
    <section id="home" class="py-12 bg-gradient-to-r from-green-500 to-teal-500 text-white">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Sustainable Waste Management Made Easy</h1>
            <p class="text-xl mb-8 max-w-3xl mx-auto">Schedule door-to-door waste collection, reduce your environmental footprint, and earn rewards for your contribution to a cleaner planet.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="#schedule" class="bg-white text-green-500 hover:bg-gray-100 px-6 py-3 rounded-lg font-semibold shadow-lg transition-colors">Schedule Pickup</a>
                <a href="#rewards" class="bg-transparent border-2 border-white hover:bg-white hover:text-green-500 px-6 py-3 rounded-lg font-semibold transition-colors">View Rewards</a>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">How It Works</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="bg-green-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-calendar-alt text-green-500 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-800">Schedule Pickup</h3>
                    <p class="text-gray-600">Select your location, preferred date and time for waste collection.</p>
                </div>
                <div class="text-center">
                    <div class="bg-green-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-truck text-green-500 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-800">We Collect</h3>
                    <p class="text-gray-600">Our team will arrive at your doorstep to collect your waste at the scheduled time.</p>
                </div>
                <div class="text-center">
                    <div class="bg-green-100 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-gift text-green-500 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-gray-800">Earn Rewards</h3>
                    <p class="text-gray-600">Get points for each pickup and redeem them for exciting rewards and coupons.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Scheduling Section -->
    <section id="schedule" class="py-16 bg-gray-50 scheduling-section">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-6 text-gray-800">Schedule Your Waste Pickup</h2>
            <p class="text-center text-gray-600 mb-12 max-w-3xl mx-auto">Choose your location, select the waste type, and pick a convenient time. We'll handle the rest while you earn points!</p>
            
            <div class="bg-white rounded-lg shadow-lg p-6 max-w-4xl mx-auto">
                <div class="mb-8">
                    <h3 class="text-xl font-semibold mb-4 text-gray-800">Select Waste Type</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="waste-type-card cursor-pointer p-4 border rounded-lg text-center" data-type="recyclable" data-points="30">
                            <div class="bg-blue-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-recycle text-blue-500 text-2xl"></i>
                            </div>
                            <h4 class="font-medium mb-1">Recyclable Waste</h4>
                            <p class="text-sm text-gray-500">Paper, Plastic, Glass</p>
                            <p class="text-green-500 mt-2">+30 points</p>
                        </div>
                        <div class="waste-type-card cursor-pointer p-4 border rounded-lg text-center" data-type="organic" data-points="20">
                            <div class="bg-green-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-apple-alt text-green-500 text-2xl"></i>
                            </div>
                            <h4 class="font-medium mb-1">Organic Waste</h4>
                            <p class="text-sm text-gray-500">Food, Garden waste</p>
                            <p class="text-green-500 mt-2">+20 points</p>
                        </div>
                        <div class="waste-type-card cursor-pointer p-4 border rounded-lg text-center" data-type="hazardous" data-points="50">
                            <div class="bg-red-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-skull-crossbones text-red-500 text-2xl"></i>
                            </div>
                            <h4 class="font-medium mb-1">Hazardous Waste</h4>
                            <p class="text-sm text-gray-500">Batteries, Chemicals</p>
                            <p class="text-green-500 mt-2">+50 points</p>
                        </div>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-gray-700 mb-2" name="yourarea" for="area">Your Area</label>
                        <select id="area" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                            <option name="select your area" value="">Select your area</option>
                            <option name="downtown" value="downtown">Downtown</option>
                            <option name="north" value="north">North District</option>
                            <option name="east" value="east">East District</option>
                            <option name="south" value="south">South District</option>
                            <option name="west" value="west">West District</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2" name="address" for="address">Address</label>
                        <input type="text" id="address" placeholder="Enter your full address" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div>
                        <label class="block text-gray-700 mb-2" name="pickup date" for="date">Pickup Date</label>
                        <input type="date" id="date" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2" name="preferred"for="time">Preferred Time</label>
                        <select id="time" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                            <option name="select time" value="">Select time</option>
                            <option name="morning" value="morning">Morning (8:00 AM - 12:00 PM)</option>
                            <option name="afternoon" value="afternoon">Afternoon (12:00 PM - 4:00 PM)</option>
                            <option name="evening" value="evening">Evening (4:00 PM - 8:00 PM)</option>
                        </select>
                    </div>
                </div>
                
                <div class="bg-gray-100 p-4 rounded-lg mb-6">
                    <div class="flex items-start mb-4">
                        <div class="flex items-center h-5">
                            <input id="special-instructions-check" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-green-300">
                        </div>
                        <label for="special-instructions-check" class="ml-2 text-sm font-medium text-gray-900">I have special instructions</label>
                    </div>
                    <div id="special-instructions-container" class="hidden">
                        <textarea id="special-instructions" rows="3" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Any special instructions for the pickup..."></textarea>
                    </div>
                </div>
                
                <div class="flex justify-between items-center">
                    <div class="text-gray-600">
                        <i class="fas fa-info-circle mr-1"></i> You'll earn points after successful pickup
                    </div>
                    <button id="schedule-button" class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-lg font-semibold shadow-md transition-colors focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                        Schedule Pickup
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Upcoming Pickups -->
    <section id="upcoming-pickups" class="py-10 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8 text-gray-800">Your Upcoming Pickups</h2>
            <div id="no-pickups-message" class="text-center py-8">
                <i class="fas fa-calendar-times text-gray-400 text-5xl mb-4"></i>
                <p class="text-gray-500 text-lg">You don't have any scheduled pickups yet.</p>
                <a href="#schedule" class="inline-block mt-4 text-green-500 hover:text-green-600 font-medium">Schedule your first pickup</a>
            </div>
            
            <div id="pickups-container" class="hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white rounded-lg overflow-hidden shadow-lg">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" name="date" >Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" name="time" >Time</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" name="waste type" >Waste Type</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" name="area" >Area</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" name="status" >Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" name="actions" >Actions</th>
                            </tr>
                        </thead>
                        <tbody id="pickups-list" class="divide-y divide-gray-200">
                            <!-- Pickup records will be inserted here by JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Rewards Section -->
    <section id="rewards" class="py-16 bg-gray-50 rewards-section">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-4 text-gray-800">Your Rewards</h2>
            <p class="text-center text-gray-600 mb-8 max-w-3xl mx-auto">Earn points with every waste pickup and redeem them for exciting rewards!</p>
            
            <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-10">
                <div class="p-6 bg-gradient-to-r from-green-500 to-teal-500 text-white">
                    <div class="flex flex-wrap items-center justify-between">
                        <div>
                            <h3 class="text-2xl font-bold mb-2">Your Current Points</h3>
                            <p class="opacity-90">Keep scheduling pickups to earn more points</p>
                        </div>
                        <div class="text-center">
                            <div class="text-4xl font-bold mb-1" id="reward-points-display">120</div>
                            <p>Available Points</p>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <h4 class="font-semibold text-lg mb-4">Points History</h4>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center border-b pb-2">
                            <div>
                                <p class="font-medium">Recyclable Waste Pickup</p>
                                <p class="text-sm text-gray-500">May 10, 2023</p>
                            </div>
                            <span class="text-green-500 font-medium">+30 points</span>
                        </div>
                        <div class="flex justify-between items-center border-b pb-2">
                            <div>
                                <p class="font-medium">Organic Waste Pickup</p>
                                <p class="text-sm text-gray-500">April 28, 2023</p>
                            </div>
                            <span class="text-green-500 font-medium">+20 points</span>
                        </div>
                        <div class="flex justify-between items-center border-b pb-2">
                            <div>
                                <p class="font-medium">Hazardous Waste Pickup</p>
                                <p class="text-sm text-gray-500">April 15, 2023</p>
                            </div>
                            <span class="text-green-500 font-medium">+50 points</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="font-medium">Recyclable Waste Pickup</p>
                                <p class="text-sm text-gray-500">April 2, 2023</p>
                            </div>
                            <span class="text-green-500 font-medium">+30 points</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <h3 class="text-2xl font-bold text-center mb-8 text-gray-800">Available Rewards</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="reward-card bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300">
                    <div class="h-48 bg-blue-50 flex items-center justify-center">
                        <i class="fas fa-shopping-bag text-blue-500 text-6xl"></i>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-2">
                            <h4 class="text-lg font-semibold">10% Off Shopping</h4>
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">Retail</span>
                        </div>
                        <p class="text-gray-600 mb-4">Get 10% off your next purchase at EcoFriendly Stores.</p>
                        <div class="flex justify-between items-center">
                            <span class="font-medium text-gray-800">100 points</span>
                            <button class="redeem-btn bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors" data-points="100">Redeem</button>
                        </div>
                    </div>
                </div>
                
                <div class="reward-card bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300">
                    <div class="h-48 bg-yellow-50 flex items-center justify-center">
                        <i class="fas fa-utensils text-yellow-500 text-6xl"></i>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-2">
                            <h4 class="text-lg font-semibold">Free Coffee</h4>
                            <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded">Food</span>
                        </div>
                        <p class="text-gray-600 mb-4">Enjoy a free coffee at participating eco-cafés in your area.</p>
                        <div class="flex justify-between items-center">
                            <span class="font-medium text-gray-800">80 points</span>
                            <button class="redeem-btn bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors" data-points="80">Redeem</button>
                        </div>
                    </div>
                </div>
                
                <div class="reward-card bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300">
                    <div class="h-48 bg-purple-50 flex items-center justify-center">
                        <i class="fas fa-film text-purple-500 text-6xl"></i>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-2">
                            <h4 class="text-lg font-semibold">Movie Tickets</h4>
                            <span class="bg-purple-100 text-purple-800 text-xs font-medium px-2.5 py-0.5 rounded">Entertainment</span>
                        </div>
                        <p class="text-gray-600 mb-4">Two movie tickets for any show at Green Cinemas.</p>
                        <div class="flex justify-between items-center">
                            <span class="font-medium text-gray-800">200 points</span>
                            <button class="redeem-btn bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors" data-points="200">Redeem</button>
                        </div>
                    </div>
                </div>
                
                <div class="reward-card bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300">
                    <div class="h-48 bg-green-50 flex items-center justify-center">
                        <i class="fas fa-seedling text-green-500 text-6xl"></i>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-2">
                            <h4 class="text-lg font-semibold">Plant a Tree</h4>
                            <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">Environmental</span>
                        </div>
                        <p class="text-gray-600 mb-4">We'll plant a tree in your name in protected forest areas.</p>
                        <div class="flex justify-between items-center">
                            <span class="font-medium text-gray-800">150 points</span>
                            <button class="redeem-btn bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors" data-points="150">Redeem</button>
                        </div>
                    </div>
                </div>
                
                <div class="reward-card bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300">
                    <div class="h-48 bg-red-50 flex items-center justify-center">
                        <i class="fas fa-gift text-red-500 text-6xl"></i>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-2">
                            <h4 class="text-lg font-semibold">Eco Gift Box</h4>
                            <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded">Product</span>
                        </div>
                        <p class="text-gray-600 mb-4">A surprise box of eco-friendly products delivered to your door.</p>
                        <div class="flex justify-between items-center">
                            <span class="font-medium text-gray-800">300 points</span>
                            <button class="redeem-btn bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors" data-points="300">Redeem</button>
                        </div>
                    </div>
                </div>
                
                <div class="reward-card bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300">
                    <div class="h-48 bg-indigo-50 flex items-center justify-center">
                        <i class="fas fa-tshirt text-indigo-500 text-6xl"></i>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-2">
                            <h4 class="text-lg font-semibold">Recycled T-shirt</h4>
                            <span class="bg-indigo-100 text-indigo-800 text-xs font-medium px-2.5 py-0.5 rounded">Fashion</span>
                        </div>
                        <p class="text-gray-600 mb-4">Stylish t-shirt made from 100% recycled materials.</p>
                        <div class="flex justify-between items-center">
                            <span class="font-medium text-gray-800">250 points</span>
                            <button class="redeem-btn bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors" data-points="250">Redeem</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-12 text-center">
                <h3 class="text-2xl font-bold mb-4 text-gray-800">AI-Recommended Rewards for You</h3>
                <p class="text-gray-600 mb-8 max-w-2xl mx-auto">Based on your waste management habits and preferences, our AI system recommends these rewards:</p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl mx-auto">
                    <div class="reward-card bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300 border-2 border-blue-200">
                        <div class="p-2 bg-blue-500 text-white text-xs text-center">
                            AI Recommended
                        </div>
                        <div class="h-40 bg-blue-50 flex items-center justify-center">
                            <i class="fas fa-bicycle text-blue-500 text-6xl"></i>
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-2">
                                <h4 class="text-lg font-semibold">Bike Rental</h4>
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">Transport</span>
                            </div>
                            <p class="text-gray-600 mb-4">Free 2-hour bike rental to explore the city sustainably.</p>
                            <div class="flex justify-between items-center">
                                <span class="font-medium text-gray-800">120 points</span>
                                <button class="redeem-btn bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors" data-points="120">Redeem</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="reward-card bg-white rounded-lg shadow-md overflow-hidden transition-all duration-300 border-2 border-blue-200">
                        <div class="p-2 bg-blue-500 text-white text-xs text-center">
                            AI Recommended
                        </div>
                        <div class="h-40 bg-blue-50 flex items-center justify-center">
                            <i class="fas fa-leaf text-blue-500 text-6xl"></i>
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-2">
                                <h4 class="text-lg font-semibold">Recycling Workshop</h4>
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">Education</span>
                            </div>
                            <p class="text-gray-600 mb-4">Free entry to a recycling workshop at the community center.</p>
                            <div class="flex justify-between items-center">
                                <span class="font-medium text-gray-800">90 points</span>
                                <button class="redeem-btn bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors" data-points="90">Redeem</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- About Section -->
    <section id="about" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8 text-gray-800">About EcoCollect</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div>
                    <p class="text-gray-600 mb-4">EcoCollect is a revolutionary door-to-door waste management system that makes recycling and proper waste disposal effortless for households.</p>
                    <p class="text-gray-600 mb-4">Our mission is to create cleaner communities while rewarding environmentally conscious actions. By scheduling regular pickups through our platform, you contribute to waste reduction and sustainable practices.</p>
                    <p class="text-gray-600 mb-6">We leverage AI technology to optimize collection routes, provide personalized rewards, and analyze waste patterns to continuously improve our service.</p>
                    
                    <div class="flex flex-wrap gap-4">
                        <div class="flex items-center">
                            <div class="bg-green-100 rounded-full p-2 mr-2">
                                <i class="fas fa-check text-green-500"></i>
                            </div>
                            <span class="text-gray-700">Eco-friendly</span>
                        </div>
                        <div class="flex items-center">
                            <div class="bg-green-100 rounded-full p-2 mr-2">
                                <i class="fas fa-check text-green-500"></i>
                            </div>
                            <span class="text-gray-700">Convenient</span>
                        </div>
                        <div class="flex items-center">
                            <div class="bg-green-100 rounded-full p-2 mr-2">
                                <i class="fas fa-check text-green-500"></i>
                            </div>
                            <span class="text-gray-700">Rewarding</span>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h3 class="text-xl font-semibold mb-4 text-gray-800">Our Impact</h3>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-white p-4 rounded-lg shadow-sm text-center">
                            <div class="text-3xl font-bold text-green-500 mb-2">5,280</div>
                            <p class="text-gray-600">Waste Collections Completed</p>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow-sm text-center">
                            <div class="text-3xl font-bold text-green-500 mb-2">12.4 tons</div>
                            <p class="text-gray-600">Waste Properly Recycled</p>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow-sm text-center">
                            <div class="text-3xl font-bold text-green-500 mb-2">3,450</div>
                            <p class="text-gray-600">Satisfied Users</p>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow-sm text-center">
                            <div class="text-3xl font-bold text-green-500 mb-2">4.8/5</div>
                            <p class="text-gray-600">Customer Satisfaction</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <i class="fas fa-recycle text-green-400 text-2xl"></i>
                        <span class="font-bold text-xl">EcoCollect</span>
                    </div>
                    <p class="text-gray-400 mb-4">Making waste management easy and rewarding for a cleaner planet.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#home" class="text-gray-400 hover:text-white transition-colors">Home</a></li>
                        <li><a href="#schedule" class="text-gray-400 hover:text-white transition-colors">Schedule Pickup</a></li>
                        <li><a href="#rewards" class="text-gray-400 hover:text-white transition-colors">Rewards</a></li>
                        <li><a href="#about" class="text-gray-400 hover:text-white transition-colors">About Us</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Services</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Residential Pickup</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Commercial Waste</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">E-Waste Disposal</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Recycling Programs</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Contact Us</h4>
                    <ul class="space-y-2">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-2 text-green-400"></i>
                            <span class="text-gray-400">123 Eco Street, Green City, 10001</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-phone-alt mt-1 mr-2 text-green-400"></i>
                            <span class="text-gray-400">+1 (555) 123-4567</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-envelope mt-1 mr-2 text-green-400"></i>
                            <span class="text-gray-400">info@ecocollect.com</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="mt-8 pt-8 border-t border-gray-700 text-center text-gray-400">
                <p>&copy; 2023 EcoCollect. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Notification -->
    <div id="notification" class="notification hidden"></div>

    <!-- Modal for reward redemption -->
    <div id="reward-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg shadow-xl p-6 w-full max-w-[500px] max-h-[90vh] overflow-y-auto mx-4">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-gray-800">Redeem Reward</h3>
                <button id="close-modal" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div id="reward-details" class="mb-6">
                <!-- Reward details will be inserted here -->
            </div>
            <div class="flex justify-end space-x-3">
                <button id="cancel-redeem" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-100 transition-colors">Cancel</button>
                <button id="confirm-redeem" class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg transition-colors">Confirm Redemption</button>
            </div>
        </div>
    </div>
<!-- Profile Modal -->
<div id="profile-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50 p-4">
    <div class="bg-white rounded-lg shadow-xl p-6 max-w-md w-full mx-auto">
        <!-- Header -->
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold text-gray-800">Edit Profile</h3>
            <button id="close-profile-modal" class="text-gray-400 hover:text-gray-600 transition-colors">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Form -->
        <form id="profile-form" class="space-y-4">
            <!-- Name -->
            <div>
                <label for="profile-name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                <input type="text" id="profile-name" name="name" placeholder="name"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <!-- Email -->
            <div>
                <label for="profile-email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                <input type="email" id="profile-email"name="email" placeholder="email"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <!-- Phone -->
            <div>
                <label for="profile-phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                <input type="tel" id="profile-phone" name="phone" placeholder="phone"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <!-- Address -->
            <div>
                <label for="profile-address" class="block text-sm font-medium text-gray-700 mb-1">Default Address</label>
                <textarea id="profile-address" rows="3" name="address" placeholder="address"
                          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>
            </div>

            <!-- Submit Buttons -->
            <div class="flex flex-col-reverse sm:flex-row sm:justify-end gap-2 mt-5">
                <button type="button" id="cancel-profile-button"
                        class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-100 transition-colors">
                    Cancel
                </button>
                <button type="submit" name="savechanges" 
                        class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg transition-colors">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
</form>

    <script>
        // Global variables
        let currentPoints = 120; // Initial points
        let selectedWasteType = null;
        let scheduledPickups = [];
        let redeemingReward = null;

        // DOM Elements
        const pointsDisplayElements = document.querySelectorAll('#points-display, #reward-points-display');
        const wasteTypeCards = document.querySelectorAll('.waste-type-card');
        const specialInstructionsCheck = document.getElementById('special-instructions-check');
        const specialInstructionsContainer = document.getElementById('special-instructions-container');
        const scheduleButton = document.getElementById('schedule-button');
        const pickupsContainer = document.getElementById('pickups-container');
        const noPickupsMessage = document.getElementById('no-pickups-message');
        const pickupsList = document.getElementById('pickups-list');
        const notification = document.getElementById('notification');
        const redeemButtons = document.querySelectorAll('.redeem-btn');
        const rewardModal = document.getElementById('reward-modal');
        const closeModal = document.getElementById('close-modal');
        const cancelRedeem = document.getElementById('cancel-redeem');
        const confirmRedeem = document.getElementById('confirm-redeem');
        const rewardDetails = document.getElementById('reward-details');

        // Initialize the page
        document.addEventListener('DOMContentLoaded', function() {
            updatePointsDisplay();
            initializeWasteTypeSelection();
            initializeSpecialInstructions();
            initializeScheduleButton();
            initializeRewardButtons();
            initializeModalButtons();
            loadSavedData();
        });

        // Function to update points display
        function updatePointsDisplay() {
            pointsDisplayElements.forEach(element => {
                element.textContent = `${currentPoints} Points`;
            });
        }

        // Initialize waste type selection
        function initializeWasteTypeSelection() {
            wasteTypeCards.forEach(card => {
                card.addEventListener('click', function() {
                    // Clear previous selection
                    wasteTypeCards.forEach(c => c.classList.remove('selected'));
                    // Select current card
                    this.classList.add('selected');
                    selectedWasteType = {
                        type: this.dataset.type,
                        points: parseInt(this.dataset.points)
                    };
                });
            });
        }

        // Initialize special instructions checkbox
        function initializeSpecialInstructions() {
            specialInstructionsCheck.addEventListener('change', function() {
                if (this.checked) {
                    specialInstructionsContainer.classList.remove('hidden');
                } else {
                    specialInstructionsContainer.classList.add('hidden');
                }
            });
        }

        // Initialize schedule button
        function initializeScheduleButton() {
            scheduleButton.addEventListener('click', function() {
                // Validate inputs
                const area = document.getElementById('area').value;
                const address = document.getElementById('address').value;
                const date = document.getElementById('date').value;
                const time = document.getElementById('time').value;
                
                if (!area || !address || !date || !time || !selectedWasteType) {
                    showNotification('Please fill all required fields and select a waste type.', 'error');
                    return;
                }
                
                // Create new pickup
                const pickup = {
                    id: Date.now(),
                    area: area,
                    address: address,
                    date: date,
                    time: time,
                    wasteType: selectedWasteType.type,
                    points: selectedWasteType.points,
                    status: 'Scheduled',
                    specialInstructions: document.getElementById('special-instructions').value
                };
                
                // Add to pickups array
                scheduledPickups.push(pickup);
                
                // Add points
                currentPoints += pickup.points;
                updatePointsDisplay();
                
                // Update UI
                renderPickups();
                
                // Reset form
                document.getElementById('area').value = '';
                document.getElementById('address').value = '';
                document.getElementById('date').value = '';
                document.getElementById('time').value = '';
                document.getElementById('special-instructions').value = '';
                specialInstructionsCheck.checked = false;
                specialInstructionsContainer.classList.add('hidden');
                wasteTypeCards.forEach(card => card.classList.remove('selected'));
                selectedWasteType = null;
                
                // Show notification
                showNotification(`Pickup scheduled successfully! You earned ${pickup.points} points.`, 'success');
                
                // Save data
                saveData();
            });
        }

        // Initialize reward buttons
        function initializeRewardButtons() {
            redeemButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const requiredPoints = parseInt(this.dataset.points);
                    const rewardName = this.parentElement.parentElement.querySelector('h4').textContent;
                    const rewardCategory = this.parentElement.parentElement.querySelector('span').textContent;
                    
                    redeemingReward = {
                        name: rewardName,
                        category: rewardCategory,
                        points: requiredPoints
                    };
                    
                    // Populate modal
                    rewardDetails.innerHTML = `
                        <div class="text-center mb-4">
                            <i class="fas fa-gift text-green-500 text-4xl mb-3"></i>
                            <h4 class="font-semibold text-xl mb-1">${rewardName}</h4>
                            <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded">${rewardCategory}</span>
                        </div>
                        <p class="text-gray-600 mb-4">You are about to redeem this reward for <strong>${requiredPoints} points</strong>.</p>
                        <div class="flex items-center justify-between bg-gray-50 p-3 rounded-lg">
                            <div>
                                <p class="text-sm text-gray-500">Your current points</p>
                                <p class="font-semibold">${currentPoints} points</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">After redemption</p>
                                <p class="font-semibold">${currentPoints - requiredPoints} points</p>
                            </div>
                        </div>
                    `;
                    
                    // Show/hide confirm button based on available points
                    if (currentPoints >= requiredPoints) {
                        confirmRedeem.disabled = false;
                        confirmRedeem.classList.remove('opacity-50', 'cursor-not-allowed');
                    } else {
                        confirmRedeem.disabled = true;
                        confirmRedeem.classList.add('opacity-50', 'cursor-not-allowed');
                        rewardDetails.innerHTML += `
                            <div class="mt-4 text-red-500">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                You don't have enough points to redeem this reward.
                            </div>
                        `;
                    }
                    
                    // Show modal
                    rewardModal.classList.remove('hidden');
                });
            });
        }

        // Initialize modal buttons
        function initializeModalButtons() {
            closeModal.addEventListener('click', closeRewardModal);
            cancelRedeem.addEventListener('click', closeRewardModal);
            
            confirmRedeem.addEventListener('click', function() {
                if (redeemingReward && currentPoints >= redeemingReward.points) {
                    // Deduct points
                    currentPoints -= redeemingReward.points;
                    updatePointsDisplay();
                    
                    // Show notification
                    showNotification(`Reward '${redeemingReward.name}' redeemed successfully!`, 'success');
                    
                    // Close modal
                    closeRewardModal();
                    
                    // Save data
                    saveData();
                    
                    // Generate and display coupon code
                    setTimeout(() => {
                        const couponCode = generateCouponCode();
                        showNotification(`Your coupon code: ${couponCode}`, 'info', 5000);
                    }, 1000);
                }
            });
        }

        // Function to close reward modal
        function closeRewardModal() {
            rewardModal.classList.add('hidden');
            redeemingReward = null;
        }

        // Render pickups
        function renderPickups() {
            if (scheduledPickups.length === 0) {
                pickupsContainer.classList.add('hidden');
                noPickupsMessage.classList.remove('hidden');
                return;
            }
            
            pickupsContainer.classList.remove('hidden');
            noPickupsMessage.classList.add('hidden');
            
            // Sort pickups by date (newest first)
            scheduledPickups.sort((a, b) => new Date(b.date) - new Date(a.date));
            
            // Clear list
            pickupsList.innerHTML = '';
            
            // Add pickups
            scheduledPickups.forEach(pickup => {
                const formattedDate = new Date(pickup.date).toLocaleDateString('en-US', {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });
                
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">${formattedDate}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-500">${getTimeLabel(pickup.time)}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${getWasteTypeBadgeClass(pickup.wasteType)}">
                            ${capitalizeFirstLetter(pickup.wasteType)}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        ${capitalizeFirstLetter(pickup.area)}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${getStatusBadgeClass(pickup.status)}">
                            ${pickup.status}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <button class="text-indigo-600 hover:text-indigo-900 mr-3" onclick="viewPickupDetails(${pickup.id})">
                            View
                        </button>
                        <button class="text-red-600 hover:text-red-900" onclick="cancelPickup(${pickup.id})">
                            Cancel
                        </button>
                    </td>
                `;
                
                pickupsList.appendChild(row);
            });
        }

        // Utility functions for pickup display
        function getTimeLabel(time) {
            const timeLabels = {
                'morning': 'Morning (8:00 AM - 12:00 PM)',
                'afternoon': 'Afternoon (12:00 PM - 4:00 PM)',
                'evening': 'Evening (4:00 PM - 8:00 PM)'
            };
            return timeLabels[time] || time;
        }

        function getWasteTypeBadgeClass(type) {
            const classes = {
                'recyclable': 'bg-blue-100 text-blue-800',
                'organic': 'bg-green-100 text-green-800',
                'hazardous': 'bg-red-100 text-red-800'
            };
            return classes[type] || 'bg-gray-100 text-gray-800';
        }

        function getStatusBadgeClass(status) {
            const classes = {
                'Scheduled': 'bg-yellow-100 text-yellow-800',
                'Completed': 'bg-green-100 text-green-800',
                'Cancelled': 'bg-red-100 text-red-800'
            };
            return classes[status] || 'bg-gray-100 text-gray-800';
        }

        function capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }

        // View pickup details
        function viewPickupDetails(id) {
            const pickup = scheduledPickups.find(p => p.id === id);
            if (pickup) {
                alert(`Pickup Details:\n
                Date: ${new Date(pickup.date).toLocaleDateString()}\n
                Time: ${getTimeLabel(pickup.time)}\n
                Waste Type: ${capitalizeFirstLetter(pickup.wasteType)}\n
                Area: ${capitalizeFirstLetter(pickup.area)}\n
                Address: ${pickup.address}\n
                Special Instructions: ${pickup.specialInstructions || 'None'}\n
                Status: ${pickup.status}\n
                Points: +${pickup.points}`);
            }
        }

        // Cancel pickup
        function cancelPickup(id) {
            if (confirm('Are you sure you want to cancel this pickup?')) {
                const index = scheduledPickups.findIndex(p => p.id === id);
                if (index !== -1) {
                    const pickup = scheduledPickups[index];
                    
                    // Only deduct points if the pickup was not already completed
                    if (pickup.status === 'Scheduled') {
                        currentPoints -= pickup.points;
                        updatePointsDisplay();
                    }
                    
                    // Update status or remove
                    scheduledPickups[index].status = 'Cancelled';
                    
                    // Update UI
                    renderPickups();
                    
                    // Show notification
                    showNotification('Pickup cancelled successfully.', 'info');
                    
                    // Save data
                    saveData();
                }
            }
        }

        // Show notification
        function showNotification(message, type = 'info', duration = 3000) {
            // Clear any existing notification
            clearTimeout(window.notificationTimeout);
            
            // Set type-specific styles
            let bgColor, textColor;
            
            switch (type) {
                case 'success':
                    bgColor = 'bg-green-500';
                    textColor = 'text-white';
                    icon = '<i class="fas fa-check-circle mr-2"></i>';
                    break;
                case 'error':
                    bgColor = 'bg-red-500';
                    textColor = 'text-white';
                    icon = '<i class="fas fa-exclamation-circle mr-2"></i>';
                    break;
                case 'info':
                default:
                    bgColor = 'bg-blue-500';
                    textColor = 'text-white';
                    icon = '<i class="fas fa-info-circle mr-2"></i>';
            }
            
            // Set notification content
            notification.className = `notification ${bgColor} ${textColor}`;
            notification.innerHTML = `${icon}${message}`;
            
            // Show notification
            notification.classList.remove('hidden');
            
            // Hide after duration
            window.notificationTimeout = setTimeout(() => {
                notification.classList.add('hidden');
            }, duration);
        }

        // Generate coupon code
        function generateCouponCode() {
            const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            let code = 'ECO-';
            for (let i = 0; i < 8; i++) {
                code += chars.charAt(Math.floor(Math.random() * chars.length));
            }
            return code;
        }

        // Local storage functions
        function saveData() {
            const data = {
                points: currentPoints,
                pickups: scheduledPickups
            };
            localStorage.setItem('ecoCollectData', JSON.stringify(data));
        }

        function loadSavedData() {
            const savedData = localStorage.getItem('ecoCollectData');
            if (savedData) {
                const data = JSON.parse(savedData);
                currentPoints = data.points || 120;
                scheduledPickups = data.pickups || [];
                
                updatePointsDisplay();
                renderPickups();
            }
        }

        // Make these functions accessible globally
        window.viewPickupDetails = viewPickupDetails;
        window.cancelPickup = cancelPickup;
  
    </script>
    <script>
        // DOM Elements
        const profileButton = document.getElementById('profile-button');
        const profileModal = document.getElementById('profile-modal');
        const closeProfileModal = document.getElementById('close-profile-modal');
        const cancelProfileButton = document.getElementById('cancel-profile-button');
        const profileForm = document.getElementById('profile-form');
    
        const profileNameInput = document.getElementById('profile-name');
        const profileEmailInput = document.getElementById('profile-email');
        const profilePhoneInput = document.getElementById('profile-phone');
        const profileAddressInput = document.getElementById('profile-address');
    
        // Open modal
        profileButton.addEventListener('click', () => {
            profileModal.classList.remove('hidden');
            loadProfileData(); // Load saved data into form
        });
    
        // Close modal
        function closeProfileModalFunction() {
            profileModal.classList.add('hidden');
        }
    
        closeProfileModal.addEventListener('click', closeProfileModalFunction);
        cancelProfileButton.addEventListener('click', closeProfileModalFunction);
    
        // Save profile
        profileForm.addEventListener('submit', function (e) {
            e.preventDefault();
    
            const profileData = {
                name: profileNameInput.value.trim(),
                email: profileEmailInput.value.trim(),
                phone: profilePhoneInput.value.trim(),
                address: profileAddressInput.value.trim()
            };
    
            localStorage.setItem('ecoCollectProfile', JSON.stringify(profileData));
            closeProfileModalFunction();
            showNotification("Profile saved successfully!", "success");
        });
    
        // Load saved data
        function loadProfileData() {
            const saved = localStorage.getItem('ecoCollectProfile');
            if (saved) {
                const data = JSON.parse(saved);
                profileNameInput.value = data.name || '';
                profileEmailInput.value = data.email || '';
                profilePhoneInput.value = data.phone || '';
                profileAddressInput.value = data.address || '';
            }
        }
    
        // Show notification (optional)
        function showNotification(message, type = 'success') {
            let notification = document.getElementById('notification-toast');
            if (!notification) {
                notification = document.createElement('div');
                notification.id = 'notification-toast';
                notification.className = `
                    fixed bottom-4 right-4 px-6 py-3 rounded-lg shadow-lg text-white transform transition-all duration-300
                    ${type === 'success' ? 'bg-green-500' : 'bg-red-500'}
                    hidden`;
                notification.textContent = message;
                document.body.appendChild(notification);
            } else {
                notification.textContent = message;
                notification.className = `
                    fixed bottom-4 right-4 px-6 py-3 rounded-lg shadow-lg text-white transform transition-all duration-300
                    ${type === 'success' ? 'bg-green-500' : 'bg-red-500'}
                    translate-y-0 opacity-100`;
            }
    
            notification.classList.remove('hidden');
            setTimeout(() => {
                notification.classList.add('translate-y-10', 'opacity-0');
                setTimeout(() => notification.classList.add('hidden'), 500);
            }, 3000);
        }
    </script>
</body>
</html>

<?php
include 'conn.php';

if(isset($_POST['save changes'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
}
// Check if the email already exists in the database
$stmt = $conn->prepare("SELECT * FROM user WHERE email = email");
$stmt->bind_param("s", var: $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Update existing user
    $stmt = $conn->prepare("UPDATE user SET name = name, phone = phone, address = address WHERE email = email");
    $stmt->bind_param("ssss", $name, $phone, $address, $email);
} else {
    // Insert new user
    $stmt = $conn->prepare("INSERT INTO user (name, email, phone, address) VALUES (`name`,`email`,`phone`,`address`)");
    $stmt->bind_param("ssss", $name, $email, $phone, $address);
}

// Execute the prepared statement
if ($stmt->execute()) {
    echo "Data stored successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>