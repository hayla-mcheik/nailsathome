<template>

        <!-- Footer Area -->
        <footer class="footer-area footer-bg">
            <div class="container pt-100 pb-70">
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <div class="footer-widget pe-5">
                            <div class="footer-logo">
                                <Link href="index.html">
                                    <img src="/assets/images/logo.png" class="footer-logo1" alt="Images">
                                </Link>
                                <Link href="index.html">
                                    <img src="/assets/images/logo.png" class="footer-logo2" alt="Images">
                                </Link>
                            </div>
                            <p>
                           The Nails At Home service covers all areas within Dubai. 
                            </p>
              
                        </div>
                    </div>

        

                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-widget ps-4">
                            <h3>Salon Hours</h3>
                            <ul class="salon-hours">
                                <li>
                                    <div class="content">
                                        <h3>Monday - Friday</h3>
                                        <span>09:00 AM - 8:00 PM </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="content">
                                        <h3>Saturday - Sunday</h3>
                                        <span>10:00 AM - 8:00 PM </span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-widget ps-3">
                            <h3>Get In Touch</h3>
                            <ul class="footer-contact">
                                <li>
                                    <i class="flaticon-telephone"></i>
                                    <div class="content">
                                        <h4>Contact Us</h4>
                                        <span><Link href="tel:04 282 8385" target="_blank">04 282 8385</Link></span>
                              
                                    </div>
                                </li>

                                <li>
                                    <i class="flaticon-pin"></i>
                                    <div class="content">
                                        <h4>Address</h4>
                                        <span>Dubai</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer Area End -->

        <!-- Copyright Area -->
        <div class="copyright-area">
            <div class="container">
                <div class="copy-right-text text-center">
                    <p>
 All Rights Reserved 
                        <Link href="" target="_blank">Webgenix</Link> 
                    </p>
                </div>
            </div>
        </div>
        <!-- Copyright Area End -->

        <!-- QuickView Modal Area -->
        <div class="modal fade productsQuickView" id="productsQuickView" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <buthrefn type="buthrefn" class="btn-close-on" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class='flaticon-close'></i></span>
                    </buthrefn>
                    <div class="product-details-desc">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-12">
                                <div class="products-quickView-image">
                                    <img src="assets/images/products/product-details.png" alt="Product Details">
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="product-desc mb-30 pl-20">
                                    <h3>Nail Polish Removers </h3>
                                    <div class="price">
                                        <span class="old-price">$140.00 </span>
                                        <span class="new-price">- $110.00</span>
                                    </div>
                                    <div class="product-review">
                                        <div class="rating">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-line"></i>
                                            <i class="ri-star-line"></i>
                                        </div>
                                        <div class="rating-count">255 Reviews</div>
                                    </div>
                                    <p>
                                        Voluptatem accusantium doloremque laudantium, hreftam rem aperiam, eaque ipsa quae ab illo invenhrefre veritatis et quasi.
                                    </p>
                                    <ul class="product-category-list">
                                        <li>Availablity: <span>In Shrefck</span></li>
                                        <li>Tags: <span>Nail, Lover</span> </li>
                                    </ul>
                                    <div class="input-counter-area">
                                        <h4>Quantity</h4>
                                        <div class="input-counter">
                                            <span class="minus-btn"><i class="ri-add-fill"></i></span>
                                            <input type="text" value="1">
                                            <span class="plus-btn"><i class="ri-subtract-line"></i></span>
                                        </div>
                                    </div>
                                    
                                    <div class="product-add-btn">
                                        <buthrefn type="submit" class="default-btn border-radius-5">
                                            Add href Cart <i class="flaticon-shopping-cart-empty-side-view"></i>
                                        </buthrefn>
                                        <ul class="products-action">
                                            <li><Link href="compare.html"> <i class="ri-arrow-left-right-line"></i></Link></li>
                                            <li><Link href="wishlist.html"><i class="ri-heart-line"></i></Link></li>
                                        </ul>
                                    </div>
                                    <div class="product-share">
                                        <ul>
                                            <li>
                                                <span>Share:</span>
                                            </li>
                                            <li>
                                                <Link href="https://twitter.com/" target="_blank">
                                                    <i class="ri-twitter-fill"></i>
                                                </Link>
                                            </li>
                                            <li>
                                                <Link href="https://www.linkedin.com/" target="_blank">
                                                    <i class="ri-linkedin-fill"></i>
                                                </Link>
                                            </li>
                                            <li>
                                                <Link href="https://www.facebook.com/" target="_blank">
                                                    <i class="ri-facebook-fill"></i>
                                                </Link>
                                            </li>
                                            <li>
                                                <Link href="https://vimeo.com/" target="_blank">
                                                    <i class="ri-vimeo-fill"></i>
                                                </Link>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- QuickView Modal Area End -->
</template>

<script setup>
import { Link } from '@inertiajs/vue3';


</script>

<style scoped>

</style>