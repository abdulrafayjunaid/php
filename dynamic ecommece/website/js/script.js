// Sample product data
const products = {
    keyboards: [
        {
            id: 1,
            name: "Mechanical Keyboard Pro",
            price: 129.99,
            originalPrice: 149.99,
            image: "images/keyboard1.jpg",
            rating: 4.5,
            reviews: 42,
            description: "Premium mechanical keyboard with Cherry MX switches and RGB lighting."
        },
        {
            id: 2,
            name: "Wireless Keyboard Slim",
            price: 79.99,
            originalPrice: 89.99,
            image: "images/keyboard2.jpg",
            rating: 4.2,
            reviews: 28,
            description: "Ultra-slim wireless keyboard with quiet low-profile keys."
        },
        {
            id: 3,
            name: "Gaming Keyboard X9",
            price: 99.99,
            image: "images/keyboard3.jpg",
            rating: 4.7,
            reviews: 65,
            description: "Designed for gamers with anti-ghosting and macro keys."
        },
        {
            id: 4,
            name: "Ergonomic Keyboard Pro",
            price: 119.99,
            image: "images/keyboard4.jpg",
            rating: 4.3,
            reviews: 37,
            description: "Split design reduces strain for comfortable typing all day."
        }
    ],
    mice: [
        {
            id: 5,
            name: "Wireless Mouse Pro",
            price: 49.99,
            originalPrice: 59.99,
            image: "images/mouse1.jpg",
            rating: 4.6,
            reviews: 53,
            description: "Precision wireless mouse with customizable buttons."
        },
        {
            id: 6,
            name: "Gaming Mouse X7",
            price: 69.99,
            image: "images/mouse2.jpg",
            rating: 4.8,
            reviews: 78,
            description: "High DPI gaming mouse with RGB lighting and weights."
        },
        {
            id: 7,
            name: "Vertical Ergonomic Mouse",
            price: 59.99,
            image: "images/mouse3.jpg",
            rating: 4.4,
            reviews: 32,
            description: "Reduces wrist strain with natural hand position."
        }
    ],
    monitors: [
        {
            id: 8,
            name: "27\" 4K Monitor",
            price: 399.99,
            originalPrice: 449.99,
            image: "images/monitor1.jpg",
            rating: 4.7,
            reviews: 64,
            description: "Ultra HD resolution with HDR support."
        },
        {
            id: 9,
            name: "32\" Curved Gaming Monitor",
            price: 499.99,
            image: "images/monitor2.jpg",
            rating: 4.9,
            reviews: 89,
            description: "144Hz refresh rate with AMD FreeSync."
        },
        {
            id: 10,
            name: "24\" Full HD Monitor",
            price: 179.99,
            image: "images/monitor3.jpg",
            rating: 4.3,
            reviews: 47,
            description: "Affordable full HD monitor with IPS panel."
        }
    ],
    printers: [
        {
            id: 11,
            name: "All-in-One Wireless Printer",
            price: 199.99,
            originalPrice: 229.99,
            image: "images/printer1.jpg",
            rating: 4.2,
            reviews: 56,
            description: "Print, scan, copy and fax with wireless connectivity."
        },
        {
            id: 12,
            name: "Laser Printer Pro",
            price: 299.99,
            image: "images/printer2.jpg",
            rating: 4.5,
            reviews: 42,
            description: "Fast monochrome laser printer for office use."
        }
    ],
    speakers: [
        {
            id: 13,
            name: "Bluetooth Speaker System",
            price: 149.99,
            originalPrice: 179.99,
            image: "images/speaker1.jpg",
            rating: 4.4,
            reviews: 38,
            description: "Powerful sound with deep bass and wireless streaming."
        },
        {
            id: 14,
            name: "Computer Soundbar",
            price: 89.99,
            image: "images/speaker2.jpg",
            rating: 4.1,
            reviews: 27,
            description: "Slim design with clear audio for your desktop."
        }
    ],
    joysticks: [
        {
            id: 15,
            name: "Flight Simulator Joystick",
            price: 129.99,
            image: "images/joystick1.jpg",
            rating: 4.6,
            reviews: 51,
            description: "Precision control for flight simulation games."
        },
        {
            id: 16,
            name: "Game Controller Pro",
            price: 59.99,
            image: "images/joystick2.jpg",
            rating: 4.3,
            reviews: 34,
            description: "Ergonomic design for PC and console gaming."
        }
    ],
    laptops: [
        {
            id: 17,
            name: "Ultrabook Pro",
            price: 1299.99,
            originalPrice: 1399.99,
            image: "images/laptop1.jpg",
            rating: 4.8,
            reviews: 92,
            description: "Lightweight and powerful with long battery life."
        },
        {
            id: 18,
            name: "Gaming Laptop XT",
            price: 1799.99,
            image: "images/laptop2.jpg",
            rating: 4.9,
            reviews: 78,
            description: "High-performance gaming with RTX graphics."
        },
        {
            id: 19,
            name: "2-in-1 Convertible Laptop",
            price: 999.99,
            image: "images/laptop3.jpg",
            rating: 4.5,
            reviews: 63,
            description: "Transform between laptop and tablet modes."
        }
    ]
};

// Cart functionality
let cart = [];

function updateCartCount() {
    const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
    document.querySelectorAll('.cart-count').forEach(el => {
        el.textContent = totalItems;
    });
}

function addToCart(productId, quantity = 1) {
    const allProducts = Object.values(products).flat();
    const product = allProducts.find(p => p.id === productId);
    
    if (!product) return;
    
    const existingItem = cart.find(item => item.id === productId);
    
    if (existingItem) {
        existingItem.quantity += quantity;
    } else {
        cart.push({
            id: productId,
            name: product.name,
            price: product.price,
            image: product.image,
            quantity: quantity
        });
    }
    
    updateCartCount();
    alert(`${product.name} has been added to your cart!`);
}

// Product card template
function createProductCard(product) {
    const discount = product.originalPrice 
        ? Math.round(((product.originalPrice - product.price) / product.originalPrice) * 100)
        : 0;
    
    return `
        <div class="product-card" data-id="${product.id}">
            <div class="product-image">
                <img src="${product.image}" alt="${product.name}">
            </div>
            <div class="product-info">
                <h3>${product.name}</h3>
                <div class="product-price">
                    <span class="current-price">$${product.price.toFixed(2)}</span>
                    ${product.originalPrice ? `
                        <span class="original-price">$${product.originalPrice.toFixed(2)}</span>
                        ${discount > 0 ? `<span class="discount">${discount}% off</span>` : ''}
                    ` : ''}
                </div>
                <div class="product-rating">
                    ${createRatingStars(product.rating)}
                    <span class="review-count">(${product.reviews})</span>
                </div>
                <div class="product-actions">
                    <button class="btn add-to-cart-btn">Add to Cart</button>
                    <button class="btn btn-outline view-details-btn">Details</button>
                </div>
            </div>
        </div>
    `;
}

function createRatingStars(rating) {
    const fullStars = Math.floor(rating);
    const hasHalfStar = rating % 1 >= 0.5;
    const emptyStars = 5 - fullStars - (hasHalfStar ? 1 : 0);
    
    let stars = '';
    
    for (let i = 0; i < fullStars; i++) {
        stars += '<i class="fas fa-star"></i>';
    }
    
    if (hasHalfStar) {
        stars += '<i class="fas fa-star-half-alt"></i>';
    }
    
    for (let i = 0; i < emptyStars; i++) {
        stars += '<i class="far fa-star"></i>';
    }
    
    return stars;
}

// Initialize featured products on home page
function initFeaturedProducts() {
    const featuredGrid = document.querySelector('.featured-products .products-grid');
    if (!featuredGrid) return;
    
    // Get 4 random products from all categories
    const allProducts = Object.values(products).flat();
    const shuffled = allProducts.sort(() => 0.5 - Math.random());
    const featured = shuffled.slice(0, 4);
    
    featuredGrid.innerHTML = featured.map(createProductCard).join('');
}

// Initialize products by category
function initCategoryProducts() {
    for (const category in products) {
        const grid = document.querySelector(`.${category}-grid`);
        if (!grid) continue;
        
        grid.innerHTML = products[category].map(createProductCard).join('');
    }
}

// Initialize related products on product detail page
function initRelatedProducts() {
    const relatedGrid = document.querySelector('.related-products .products-grid');
    if (!relatedGrid) return;
    
    // Get 4 random products excluding the current one
    const allProducts = Object.values(products).flat();
    const shuffled = allProducts.sort(() => 0.5 - Math.random());
    const related = shuffled.slice(0, 4);
    
    relatedGrid.innerHTML = related.map(createProductCard).join('');
}

// Event delegation for add to cart buttons
function setupEventDelegation() {
    document.addEventListener('click', function(e) {
        // Add to cart button
        if (e.target.classList.contains('add-to-cart-btn') || e.target.closest('.add-to-cart-btn')) {
            const productCard = e.target.closest('.product-card');
            if (productCard) {
                const productId = parseInt(productCard.dataset.id);
                addToCart(productId);
            }
        }
        
        // View details button
        if (e.target.classList.contains('view-details-btn') || e.target.closest('.view-details-btn')) {
            const productCard = e.target.closest('.product-card');
            if (productCard) {
                const productId = parseInt(productCard.dataset.id);
                // In a real app, this would redirect to the product detail page with the ID
                window.location.href = `product-detail.html?id=${productId}`;
            }
        }
        
        // Quantity buttons
        if (e.target.classList.contains('qty-minus')) {
            const input = e.target.nextElementSibling;
            if (input && input.value > 1) {
                input.value = parseInt(input.value) - 1;
            }
        }
        
        if (e.target.classList.contains('qty-plus')) {
            const input = e.target.previousElementSibling;
            if (input) {
                input.value = parseInt(input.value) + 1;
            }
        }
        
        // Add to cart on product detail page
        if (e.target.classList.contains('add-to-cart') && document.querySelector('.product-detail')) {
            const quantity = parseInt(document.querySelector('.quantity-selector input').value);
            // In a real app, you'd get the actual product ID from the page
            addToCart(1, quantity); // Using 1 as placeholder for product ID
        }
    });
}

// Initialize the page
document.addEventListener('DOMContentLoaded', function() {
    initFeaturedProducts();
    initCategoryProducts();
    initRelatedProducts();
    setupEventDelegation();
    updateCartCount();
});