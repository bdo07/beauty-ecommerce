@extends('layouts.app')

@section('content')
<style>
:root {
    --primary: #4CAF50;         /* Vibrant eco-green */
    --primary-light: #81C784;   /* Soft green */
    --primary-dark: #388E3C;    /* Deep green */
    --accent: #FFAB91;          /* Earthy coral */
    --accent-secondary: #FFD54F; /* Warm yellow */
    --neutral: #8D6E63;        /* Natural brown */
    --light: #F8F5F2;          /* Creamy white */
    --dark: #1A1A1A;           /* Rich black */
    --text-dark: #2D3436;       /* Dark gray */
    --text-light: #F5F6FA;      /* Light gray */
    --shadow-sm: 0 1px 3px rgba(0,0,0,0.12);
    --shadow-md: 0 4px 6px rgba(0,0,0,0.1);
    --shadow-lg: 0 10px 25px rgba(0,0,0,0.1);
    --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
}

body {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    background-color: var(--light);
    color: var(--text-dark);
    transition: var(--transition);
}

body.dark-mode {
    background-color: var(--dark);
    color: var(--text-light);
}

/* Glass morphism effect */
.glass {
    background: rgba(255, 255, 255, 0.85);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border: 1px solid rgba(255, 255, 255, 0.18);
}

.dark-mode .glass {
    background: rgba(26, 26, 26, 0.85);
    border-color: rgba(255, 255, 255, 0.05);
}

/* Navigation */
.navbar {
    @apply glass shadow-sm;
    padding: 1rem 2rem;
    position: sticky;
    top: 0;
    z-index: 50;
}

.navbar-brand {
    font-weight: 700;
    font-size: 1.5rem;
    color: var(--primary-dark);
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.dark-mode .navbar-brand {
    color: var(--primary-light);
}

.nav-link {
    font-weight: 500;
    color: var(--text-dark);
    transition: var(--transition);
    padding: 0.5rem 1rem;
    border-radius: 0.5rem;
}

.dark-mode .nav-link {
    color: var(--text-light);
}

.nav-link:hover {
    color: var(--primary);
    background: rgba(76, 175, 80, 0.1);
}

.nav-link.active {
    color: var(--primary);
    font-weight: 600;
}

/* Hero Section */
.hero-container {
    min-height: 90vh;
    display: flex;
    align-items: center;
    position: relative;
    overflow: hidden;
    background: linear-gradient(135deg, rgba(76, 175, 80, 0.05) 0%, rgba(129, 199, 132, 0.05) 100%);
}

.hero-content {
    max-width: 1400px;
    margin: 0 auto;
    padding: 2rem 5vw;
    display: flex;
    align-items: center;
    gap: 4rem;
    position: relative;
    z-index: 2;
}

.hero-text {
    flex: 1;
    max-width: 600px;
}

.hero-image {
    flex: 1;
    position: relative;
    min-height: 500px;
    border-radius: 1.5rem;
    overflow: hidden;
    box-shadow: var(--shadow-lg);
}

.hero-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    transition: var(--transition);
}

.hero-image:hover img {
    transform: scale(1.02);
}

.hero-title {
    font-size: 3.5rem;
    font-weight: 800;
    line-height: 1.2;
    margin-bottom: 1.5rem;
    background: linear-gradient(to right, var(--primary-dark), var(--primary));
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
}

.hero-subtitle {
    font-size: 1.25rem;
    color: var(--text-dark);
    opacity: 0.9;
    margin-bottom: 2rem;
    line-height: 1.6;
}

.dark-mode .hero-subtitle {
    color: var(--text-light);
}

.btn-primary {
    background-color: var(--primary);
    color: white;
    border: none;
    padding: 0.75rem 2rem;
    border-radius: 0.75rem;
    font-weight: 600;
    font-size: 1rem;
    cursor: pointer;
    transition: var(--transition);
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    box-shadow: var(--shadow-sm);
}

.btn-primary:hover {
    background-color: var(--primary-dark);
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

/* Categories Section */
.categories-section {
    padding: 6rem 0;
    position: relative;
}

.section-header {
    max-width: 1400px;
    margin: 0 auto 3rem;
    padding: 0 5vw;
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
}

.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--primary-dark);
    position: relative;
    display: inline-block;
}

.section-title::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 0;
    width: 60px;
    height: 4px;
    background: var(--accent);
    border-radius: 2px;
}

.dark-mode .section-title {
    color: var(--primary-light);
}

.categories-container {
    display: flex;
    gap: 2rem;
    padding: 1rem 5vw;
    overflow-x: auto;
    scroll-snap-type: x mandatory;
    scroll-padding: 0 5vw;
    padding-bottom: 2rem;
}

.categories-container::-webkit-scrollbar {
    height: 8px;
}

.categories-container::-webkit-scrollbar-track {
    background: rgba(0,0,0,0.05);
    border-radius: 10px;
}

.categories-container::-webkit-scrollbar-thumb {
    background: var(--primary);
    border-radius: 10px;
}

.category-card {
    scroll-snap-align: start;
    min-width: 320px;
    background: var(--light);
    border-radius: 1.5rem;
    overflow: hidden;
    box-shadow: var(--shadow-md);
    transition: var(--transition);
    display: flex;
    flex-direction: column;
    position: relative;
    border: 1px solid rgba(0,0,0,0.05);
}

.dark-mode .category-card {
    background: rgba(30, 30, 30, 0.8);
    border-color: rgba(255,255,255,0.05);
}

.category-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(76, 175, 80, 0.2);
}

.category-image {
    height: 220px;
    position: relative;
    overflow: hidden;
}

.category-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: var(--transition);
}

.category-card:hover .category-image img {
    transform: scale(1.05);
}

.category-content {
    padding: 1.5rem;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.category-title {
    font-size: 1.25rem;
    font-weight: 700;
    margin-bottom: 0.75rem;
    color: var(--text-dark);
}

.dark-mode .category-title {
    color: var(--text-light);
}

.category-description {
    font-size: 0.95rem;
    color: var(--text-dark);
    opacity: 0.8;
    margin-bottom: 1.5rem;
    line-height: 1.6;
    flex-grow: 1;
}

.dark-mode .category-description {
    color: var(--text-light);
}

.category-link {
    display: inline-flex;
    align-items: center;
    color: var(--primary);
    font-weight: 600;
    text-decoration: none;
    transition: var(--transition);
    margin-top: auto;
}

.category-link i {
    margin-left: 0.5rem;
    transition: var(--transition);
}

.category-link:hover {
    color: var(--primary-dark);
}

.category-link:hover i {
    transform: translateX(5px);
}

.dark-mode .category-link {
    color: var(--primary-light);
}

/* Featured Banner */
.featured-banner {
    padding: 6rem 5vw;
    background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
    color: white;
    margin: 6rem 0;
    position: relative;
    overflow: hidden;
}

.featured-content {
    max-width: 1400px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    gap: 4rem;
    position: relative;
    z-index: 2;
}

.featured-text {
    flex: 1;
    max-width: 600px;
}

.featured-image {
    flex: 1;
    position: relative;
    min-height: 400px;
    border-radius: 1.5rem;
    overflow: hidden;
    box-shadow: var(--shadow-lg);
}

.featured-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
}

.featured-title {
    font-size: 2.5rem;
    font-weight: 800;
    line-height: 1.2;
    margin-bottom: 1.5rem;
}

.featured-description {
    font-size: 1.1rem;
    opacity: 0.9;
    margin-bottom: 2rem;
    line-height: 1.6;
}

.btn-light {
    background-color: white;
    color: var(--primary-dark);
    border: none;
    padding: 0.75rem 2rem;
    border-radius: 0.75rem;
    font-weight: 600;
    font-size: 1rem;
    cursor: pointer;
    transition: var(--transition);
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    box-shadow: var(--shadow-sm);
}

.btn-light:hover {
    background-color: rgba(255,255,255,0.9);
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

/* Footer */
.footer {
    background-color: var(--light);
    color: var(--text-dark);
    padding: 6rem 5vw 3rem;
    position: relative;
}

.dark-mode .footer {
    background-color: var(--dark);
    color: var(--text-light);
}

.footer-container {
    max-width: 1400px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 3rem;
}

.footer-logo {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--primary-dark);
    margin-bottom: 1.5rem;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

.dark-mode .footer-logo {
    color: var(--primary-light);
}

.footer-about {
    margin-bottom: 1.5rem;
    opacity: 0.8;
    line-height: 1.6;
}

.footer-social {
    display: flex;
    gap: 1rem;
}

.social-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: rgba(76, 175, 80, 0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary);
    transition: var(--transition);
}

.social-icon:hover {
    background: var(--primary);
    color: white;
    transform: translateY(-3px);
}

.dark-mode .social-icon {
    background: rgba(129, 199, 132, 0.1);
    color: var(--primary-light);
}

.dark-mode .social-icon:hover {
    background: var(--primary-light);
    color: var(--dark);
}

.footer-links h3 {
    font-size: 1.2rem;
    font-weight: 600;
    margin-bottom: 1.5rem;
    color: var(--primary-dark);
    position: relative;
    display: inline-block;
}

.footer-links h3::after {
    content: '';
    position: absolute;
    bottom: -8px;
    left: 0;
    width: 40px;
    height: 3px;
    background: var(--accent);
    border-radius: 2px;
}

.dark-mode .footer-links h3 {
    color: var(--primary-light);
}

.footer-links ul {
    list-style: none;
    padding: 0;
}

.footer-links li {
    margin-bottom: 0.75rem;
}

.footer-links a {
    color: var(--text-dark);
    text-decoration: none;
    transition: var(--transition);
    opacity: 0.8;
    display: inline-block;
    padding: 0.25rem 0;
}

.footer-links a:hover {
    color: var(--primary);
    opacity: 1;
    transform: translateX(5px);
}

.dark-mode .footer-links a {
    color: var(--text-light);
}

.dark-mode .footer-links a:hover {
    color: var(--primary-light);
}

.footer-contact li {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 1rem;
}

.footer-bottom {
    margin-top: 6rem;
    padding-top: 2rem;
    border-top: 1px solid rgba(0,0,0,0.1);
    text-align: center;
    opacity: 0.7;
    font-size: 0.9rem;
}

.dark-mode .footer-bottom {
    border-top: 1px solid rgba(255,255,255,0.1);
}

/* Dark Mode Toggle */
.dark-mode-toggle {
    background: none;
    border: none;
    cursor: pointer;
    font-size: 1.25rem;
    color: var(--text-dark);
    transition: var(--transition);
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.dark-mode-toggle:hover {
    background: rgba(0,0,0,0.05);
}

.dark-mode .dark-mode-toggle {
    color: var(--text-light);
}

.dark-mode .dark-mode-toggle:hover {
    background: rgba(255,255,255,0.1);
}

/* Responsive */
@media (max-width: 1200px) {
    .hero-title {
        font-size: 3rem;
    }
    
    .featured-title {
        font-size: 2.25rem;
    }
}

@media (max-width: 992px) {
    .hero-content,
    .featured-content {
        flex-direction: column;
        gap: 3rem;
        text-align: center;
    }
    
    .hero-text,
    .featured-text {
        display: flex;
        flex-direction: column;
        align-items: center;
        max-width: 100%;
    }
    
    .hero-image,
    .featured-image {
        width: 100%;
        min-height: 400px;
    }
    
    .section-title {
        font-size: 2.25rem;
    }
    
    .section-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 1rem;
    }
}

@media (max-width: 768px) {
    .hero-title {
        font-size: 2.5rem;
    }
    
    .hero-subtitle,
    .featured-description {
        font-size: 1.1rem;
    }
    
    .category-card {
        min-width: 280px;
    }
    
    .footer-container {
        grid-template-columns: 1fr 1fr;
    }
}

@media (max-width: 576px) {
    .hero-title {
        font-size: 2rem;
    }
    
    .hero-subtitle {
        font-size: 1rem;
    }
    
    .section-title {
        font-size: 1.75rem;
    }
    
    .featured-title {
        font-size: 1.75rem;
    }
    
    .footer-container {
        grid-template-columns: 1fr;
    }
    
    .navbar {
        padding: 1rem;
    }
}
</style>




<li class="nav-item ms-2">
                    <button id="darkModeToggle" class="dark-mode-toggle">
                        <i class="fas fa-moon"></i>
                    </button>
                </li>


<!-- Hero Section -->
<section class="hero-container">
    <div class="hero-content">
        <div class="hero-text">
            <h1 class="hero-title">Découvrez Nos Univers Beauté</h1>
            <p class="hero-subtitle">
                Explorez nos collections soigneusement sélectionnées pour une beauté naturelle et responsable. 
                Des produits éco-conçus qui prennent soin de vous et de la planète.
            </p>
            <a href="#categories" class="btn-primary">
                Explorer maintenant <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        <div class="hero-image">
            <img src="https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?auto=format&fit=crop&w=1200&q=80" alt="Beauty Products">
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="categories-section" id="categories">
    <div class="section-header">
        <h2 class="section-title">Nos Catégories</h2>
        <div class="scroll-hint">
            <span>Faites défiler pour découvrir</span>
            <i class="fas fa-long-arrow-alt-right ml-2"></i>
        </div>
    </div>
    
    <div class="categories-container">
        @forelse($categories as $category)
        <div class="category-card">
            <div class="category-image">
                <img src="https://source.unsplash.com/random/600x400/?beauty,{{ strtolower(str_replace(' ', '', $category->name)) }}" alt="{{ $category->name }}">
            </div>
            <div class="category-content">
                <h3 class="category-title">{{ $category->name }}</h3>
                <p class="category-description">
                    {{ $category->description ?? 'Des produits naturels formulés avec soin pour votre bien-être quotidien.' }}
                </p>
                <a href="#" class="category-link">
                    Voir les produits <i class="fas fa-chevron-right"></i>
                </a>
            </div>
        </div>
        @empty
        <div class="empty-state">
            <i class="fas fa-seedling" style="font-size: 3rem; color: var(--primary);"></i>
            <h3>Aucune catégorie disponible</h3>
            <p>Nous préparons de nouvelles collections pour vous.</p>
        </div>
        @endforelse
    </div>
</section>

<!-- Featured Banner -->
<section class="featured-banner">
    <div class="featured-content">
        <div class="featured-text">
            <h2 class="featured-title">Nouvelle Collection Éco-Responsable</h2>
            <p class="featured-description">
                Découvrez notre gamme de produits fabriqués à partir d'ingrédients 100% naturels 
                et d'emballages recyclables. Une beauté qui respecte votre peau et l'environnement.
            </p>
            <a href="#" class="btn-light">
                Découvrir <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        <div class="featured-image">
            <img src="https://images.unsplash.com/photo-1556228578-8c89e6adf883?auto=format&fit=crop&w=1200&q=80" alt="Featured Collection">
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer">
    <div class="footer-container">
        <div class="footer-about">
            <a href="/" class="footer-logo">
                <i class="fas fa-leaf"></i>
                <span>Beauty Eco</span>
            </a>
            <p class="footer-about">
                Des produits de beauté naturels et éco-responsables pour prendre soin de vous 
                tout en préservant notre belle planète.
            </p>
            <div class="footer-social">
                <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-pinterest-p"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
        
        <div class="footer-links">
            <h3>Navigation</h3>
            <ul>
                <li><a href="/">Accueil</a></li>
                <li><a href="/products">Produits</a></li>
                <li><a href="/categories">Catégories</a></li>
                <li><a href="/about">À propos</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
        </div>
        
        <div class="footer-links">
            <h3>Informations</h3>
            <ul>
                <li><a href="#">Livraison</a></li>
                <li><a href="#">Paiement sécurisé</a></li>
                <li><a href="#">Engagements</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">CGV</a></li>
            </ul>
        </div>
        
        <div class="footer-links footer-contact">
            <h3>Contact</h3>
            <ul>
                <li>
                    <i class="fas fa-map-marker-alt"></i>
                    <span>123 Rue Écolo, 75000 Paris</span>
                </li>
                <li>
                    <i class="fas fa-phone"></i>
                    <span>+33 1 23 45 67 89</span>
                </li>
                <li>
                    <i class="fas fa-envelope"></i>
                    <span>contact@beautyeco.com</span>
                </li>
            </ul>
        </div>
    </div>
    
    <div class="footer-bottom">
        <p>&copy; {{ date('Y') }} Beauty Eco. Tous droits réservés.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
<script>
// Dark mode toggle
const darkModeToggle = document.getElementById('darkModeToggle');
const body = document.body;

function setDarkMode(enabled) {
    if (enabled) {
        body.classList.add('dark-mode');
        darkModeToggle.innerHTML = '<i class="fas fa-sun"></i>';
        localStorage.setItem('darkMode', '1');
    } else {
        body.classList.remove('dark-mode');
        darkModeToggle.innerHTML = '<i class="fas fa-moon"></i>';
        localStorage.setItem('darkMode', '0');
    }
}

darkModeToggle.addEventListener('click', () => {
    setDarkMode(!body.classList.contains('dark-mode'));
});

// Check for saved preference
if (localStorage.getItem('darkMode') === '1') {
    setDarkMode(true);
}

// Horizontal scroll animation
const categoriesContainer = document.querySelector('.categories-container');
let isDown = false;
let startX;
let scrollLeft;

categoriesContainer.addEventListener('mousedown', (e) => {
    isDown = true;
    startX = e.pageX - categoriesContainer.offsetLeft;
    scrollLeft = categoriesContainer.scrollLeft;
    categoriesContainer.style.cursor = 'grabbing';
});

categoriesContainer.addEventListener('mouseleave', () => {
    isDown = false;
    categoriesContainer.style.cursor = 'grab';
});

categoriesContainer.addEventListener('mouseup', () => {
    isDown = false;
    categoriesContainer.style.cursor = 'grab';
});

categoriesContainer.addEventListener('mousemove', (e) => {
    if(!isDown) return;
    e.preventDefault();
    const x = e.pageX - categoriesContainer.offsetLeft;
    const walk = (x - startX) * 2;
    categoriesContainer.scrollLeft = scrollLeft - walk;
});

// Add grab cursor
categoriesContainer.style.cursor = 'grab';

// Animation on scroll
const animateOnScroll = () => {
    const elements = document.querySelectorAll('.category-card, .hero-text, .featured-text');
    
    elements.forEach(element => {
        const elementPosition = element.getBoundingClientRect().top;
        const screenPosition = window.innerHeight / 1.2;
        
        if (elementPosition < screenPosition) {
            element.style.opacity = '1';
            element.style.transform = 'translateY(0)';
        }
    });
};

// Set initial state
document.querySelectorAll('.category-card, .hero-text, .featured-text').forEach(el => {
    el.style.opacity = '0';
    el.style.transform = 'translateY(20px)';
    el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
});

// Add event listener
window.addEventListener('scroll', animateOnScroll);
// Trigger once on load
window.addEventListener('load', animateOnScroll);
</script>
@endsection