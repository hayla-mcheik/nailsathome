<template>
  <div class="banner-area brochure-theme position-relative">
    <div class="video-background">
      <video autoplay muted loop playsinline class="bg-video">
        <source src="https://www.nbar.com/wp-content/uploads/2024/02/N.Bar-Website-Main-Video-2024-1.mp4" type="video/mp4">
      </video>
    </div>

    <div class="diagonal-overlay"></div>

    <div class="container-fluid h-100 position-relative content-wrapper">
      <div class="row h-100 align-items-center">
        <div class="col-10 col-md-7 col-lg-5 mt-5">
          <div class="text-content mt-5">
            <h1 class="brand-title">
              LOVE<br>
              YOUR<br>
              NAILS
            </h1>
            <div class="logo-accent-line"></div>
          </div>
        </div>
      </div>
    </div>

    <a href="https://wa.me/97142828385" target="_blank" class="book-online-circle">
      <span class="book-text">BOOK<br>ONLINE</span>
    </a>
  </div>
</template>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&display=swap');

.brochure-theme {
    height: 85vh; /* Desktop banner height */
    width: 100%;
    overflow: hidden;
    background: #000;
}

.video-background {
    position: absolute;
    inset: 0;
    z-index: 1;
}

.bg-video {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Diagonal Overlay styling */
.diagonal-overlay {
    position: absolute;
    inset: 0;
    z-index: 2;
    background-color: #b95c19; /* Signature red */
    /* Angle direction follows the mobile reference */
clip-path: polygon(0 0, 0% 100%, 93% 100%);
    /* Darkens video while keeping the red color bold */
    mix-blend-mode: multiply; 
}

/* Higher z-index prevents the 'multiply' mode from dimming the white text */
.content-wrapper {
    z-index: 3; 
}

.brand-title {
    font-family: 'Oswald', sans-serif;
    color: #ffffff;
    font-size: clamp(2.5rem, 8vw, 5rem);
    font-weight: 400;
    line-height: 0.95;
    text-transform: uppercase;
    text-align: left;
}

.logo-accent-line {
    width: 80px;
    height: 4px;
    background: #ffffff;
    margin-top: 15px;
    border-radius: 4px;
}

.book-online-circle {
    position: absolute;
    bottom: 40px;
    right: 5%;
    width: 125px;
    height: 125px;
    background-color: #b95c19;
    border: 7px solid #fff; /* Thick white border */
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    z-index: 10;
    box-shadow: 0 10px 25px rgba(0,0,0,0.4);
}

.book-text {
    color: #fff;
    font-family: 'Oswald', sans-serif;
    font-weight: 700;
    font-size: 1rem;
    line-height: 1.1;
    text-align: center;
}

/* MOBILE RESPONSIVE UPDATES */
@media (max-width: 991px) {
    .brochure-theme {
        height: 40vh !important; /* Forces max 40vh height on mobile as requested */
    }

    .diagonal-overlay {
        /* Matches the left-leaning slant direction from mobile screenshot */
      clip-path: polygon(0 0, 0% 100%, 69% 100%);
    }

    .brand-title {
        font-size: 2.3rem;
    }

    .book-online-circle {
        width: 85px;
        height: 85px;
        bottom: 15px;
        right: 15px;
        border-width: 4px;
    }

    .book-text {
        font-size: 0.75rem;
    }
}
</style>