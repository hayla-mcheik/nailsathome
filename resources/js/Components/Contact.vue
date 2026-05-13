<template>
    <div class="contact-information-area pt-100 pb-70">
        <div class="container">
            <div class="contact-information-max mb-5">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-6">
                        <div class="contact-info-card">
                            <i class="flaticon-telephone"></i>
                            <h3>Exclusive Appointments</h3>
                            <p><a href="tel:042980707">04 298 0707</a></p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="contact-info-card">
                            <i class="ri-whatsapp-line"></i>
                            <h3>WhatsApp Booking</h3>
                            <p><a href="https://wa.me/971504552366">050 455 2366</a></p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="contact-info-card">
                            <i class="flaticon-pin"></i>
                            <h3>Visit Anytime</h3>
                            <p>Dubai</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="barcode-cta-section mt-50">
                <div class="row align-items-center">
                    <div class="col-md-12 text-center">
                        <div class="barcode-display">
                            <div class="barcode-wrapper">
                                <img src="/assets/images/barcode.jpeg" alt="Scan Me" class="barcode-img">
                            </div>
                            <div class="barcode-text">
                                
                                <p>541654165454658</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</template>

<style scoped>
/* Contact Card Styles */
.contact-info-card {
    text-align: center;
    padding: 20px;
    transition: 0.3s;
}

.contact-info-card h3 {
    font-size: 0.8rem;
    margin-top: 10px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.contact-info-card p, .contact-info-card p a {
    font-size: 0.75rem;
    color: #51555A;
    text-decoration: none;
}

/* New Distinct Barcode Area */
.barcode-cta-section {
    border-top: 1px solid #f0f0f0;
    padding-top: 50px;
}

.barcode-display {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.barcode-wrapper {
    background: #fff;
    padding: 15px;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.05); /* Soft shadow for "premium" look */
    margin-bottom: 20px;
    display: inline-block;
}

.barcode-img {
    width: 120px; /* Larger, more readable size */
    height: 120px;
    object-fit: contain;
}

.barcode-text h4 {
    font-size: 0.9rem;
    font-weight: 700;
    margin-bottom: 5px;
}

.barcode-text p {
    font-size: 0.7rem;
    color: #888;
    max-width: 250px;
    margin: 0 auto;
}

@media (max-width: 991px) {
    .contact-info-card {
        margin-bottom: 30px;
    }
}
</style>