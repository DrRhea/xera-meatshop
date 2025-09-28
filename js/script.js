/* ===================== JS ===================== */
document.addEventListener('DOMContentLoaded', () => {
  const navbar = document.getElementById('navbar');
  const hamburger = document.getElementById('hamburger');
  const navMenu = document.getElementById('navMenu');
  const cartBadge = document.querySelector('.cart-count');

  let cartCount = 0;




  // ===================== RESTORE CART =====================
  try {
    const saved = localStorage.getItem('cartCount');
    if (saved) cartCount = Number(saved) || 0;
    if (cartBadge) cartBadge.textContent = String(cartCount);
  } catch (e) {}




  // ===================== NAVBAR SCROLL =====================
  window.addEventListener('scroll', () => {
    if (!navbar) return;
    if (window.scrollY > 10) navbar.classList.add('is-scrolled');
    else navbar.classList.remove('is-scrolled');
  });



  // ===================== HAMBURGER MENU =====================
  if (hamburger && navMenu) {
    hamburger.addEventListener('click', () => {
      navMenu.classList.toggle('active');
      hamburger.classList.toggle('active');
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', (e) => {
      if (!hamburger.contains(e.target) && !navMenu.contains(e.target)) {
        navMenu.classList.remove('active');
        hamburger.classList.remove('active');
      }
    });

    // Close mobile menu when clicking on nav links
    navMenu.addEventListener('click', (e) => {
      if (e.target.tagName === 'A') {
        navMenu.classList.remove('active');
        hamburger.classList.remove('active');
      }
    });

    // Handle dropdown in mobile menu
    const dropdown = navMenu.querySelector('.dropdown');
    if (dropdown) {
      const dropbtn = dropdown.querySelector('.dropbtn');
      const dropdownContent = dropdown.querySelector('.dropdown-content');
      
      dropbtn.addEventListener('click', (e) => {
        e.preventDefault();
        dropdown.classList.toggle('active');
      });
    }
  }




  // ===================== ADD TO CART =====================
  document.querySelectorAll('.add-cart').forEach(btn => {
    btn.addEventListener('click', () => {
      cartCount += 1;
      if (cartBadge) {
        cartBadge.textContent = String(cartCount);
        cartBadge.classList.add('pulse');
        setTimeout(() => cartBadge.classList.remove('pulse'), 400);
      }
      try { localStorage.setItem('cartCount', String(cartCount)); } catch(e){}
    });
  });



  // ===================== HERO ANIMATION =====================
  const hero = document.querySelector('.hero');
  if (hero) {
    const animatedEls = hero.querySelectorAll('.fade-up');
    let staggerTimeouts = [];

    const runStagger = () => {
      staggerTimeouts.forEach(t => clearTimeout(t));
      staggerTimeouts = [];
      animatedEls.forEach(el => el.classList.remove('animate'));
      animatedEls.forEach((el, i) => {
        staggerTimeouts.push(setTimeout(() => el.classList.add('animate'), i * 150));
      });
    };

    const resetStagger = () => {
      staggerTimeouts.forEach(t => clearTimeout(t));
      staggerTimeouts = [];
      animatedEls.forEach(el => el.classList.remove('animate'));
    };

    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => entry.isIntersecting ? runStagger() : resetStagger());
    }, { threshold: 0.35 });

    observer.observe(hero);
  }




// ===================== ABOUT CHECKLIST ANIMATION =====================
const checklistItems = document.querySelectorAll(".checklist li");
window.addEventListener("scroll", () => {
  const triggerBottom = window.innerHeight * 0.85;
  checklistItems.forEach(item => {
    const boxTop = item.getBoundingClientRect().top;
    if (boxTop < triggerBottom) {
      item.classList.add("visible");
    } else {
      item.classList.remove("visible");
    }
  });
});







  // ===================== LIGHTBOX (Gallery + Produk) =====================
  const galleryImgs = document.querySelectorAll('.gallery-item img');
  const productImgs = document.querySelectorAll('.product-grid img');
  const lightbox = document.getElementById('lightbox');
  const lightboxImg = document.getElementById('lightboxImg');
  const closeLightbox = lightbox ? lightbox.querySelector('.close') : null;

  function openLightbox(src) {
    if (!lightbox || !lightboxImg) return;
    lightbox.style.display = 'flex';
    lightboxImg.src = src;
  }

  function closeLb() {
    if (!lightbox || !lightboxImg) return;
    lightbox.style.display = 'none';
    lightboxImg.src = "";
  }

  if (lightbox && lightboxImg && closeLightbox) {
    // gallery
    galleryImgs.forEach(img => {
      img.addEventListener('click', () => openLightbox(img.src));
    });
    // produk
    productImgs.forEach(img => {
      img.addEventListener('click', () => openLightbox(img.src));
    });

    closeLightbox.addEventListener('click', closeLb);
    lightbox.addEventListener('click', (e) => {
      if (e.target === lightbox) closeLb();
    });
  }
});


const contactForm = document.getElementById('contactForm');
if(contactForm){
  contactForm.addEventListener('submit', e => {
    e.preventDefault();
    alert("Pesan berhasil dikirim!");
    contactForm.reset();
  });
}


// ===================== PROMO SLIDER =====================
document.addEventListener("DOMContentLoaded", () => {
  const promoSlider = document.querySelector('.promo-slider');
  const promoItems = document.querySelectorAll('.promo-slider .card');
  const prevBtn = document.querySelector('.promo-btn.prev');
  const nextBtn = document.querySelector('.promo-btn.next');

  let promoIndex = 0;
  const visiblePromo = 4;
  const totalPromo = promoItems.length;

  function getItemWidth() {
    return promoItems[0].getBoundingClientRect().width + 20; // tambahkan jarak antar card
  }

  function updatePromoSlider() {
    const itemWidth = getItemWidth();
    promoSlider.style.transform = `translateX(${-promoIndex * itemWidth}px)`;
    promoSlider.style.transition = "transform 0.5s ease-in-out";
  }

  nextBtn.addEventListener('click', () => {
    if (promoIndex < totalPromo - visiblePromo) {
      promoIndex++;
    } else {
      promoIndex = 0;
    }
    updatePromoSlider();
  });

  prevBtn.addEventListener('click', () => {
    if (promoIndex > 0) {
      promoIndex--;
    } else {
      promoIndex = totalPromo - visiblePromo;
    }
    updatePromoSlider();
  });

  // Auto slide
  setInterval(() => {
    if (promoIndex < totalPromo - visiblePromo) {
      promoIndex++;
    } else {
      promoIndex = 0;
    }
    updatePromoSlider();
  }, 4000);

  // Responsif saat resize
  window.addEventListener("resize", updatePromoSlider);

  updatePromoSlider();
});

// ===================== IMAGE PREVIEW FUNCTION =====================
function previewImage(input) {
  if (input.files && input.files[0]) {
    const reader = new FileReader();
    const preview = document.getElementById('preview_img');
    const previewContainer = document.getElementById('image_preview');
    
    reader.onload = function(e) {
      preview.src = e.target.result;
      previewContainer.classList.remove('hidden');
    };
    
    reader.readAsDataURL(input.files[0]);
  }
}
