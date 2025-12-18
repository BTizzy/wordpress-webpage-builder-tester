<footer class="footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-col">
                <h4>TRILLIUM HIRING SERVICES</h4>
                <p class="footer-tagline">People Ops for Your Business</p>
            </div>
            <div class="footer-col">
                <h5>Quick Links</h5>
                <ul>
                    <li><a href="<?php echo home_url('/about/'); ?>">About Us</a></li>
                    <li><a href="<?php echo home_url('/resources/'); ?>">Resources</a></li>
                    <li><a href="<?php echo home_url('/thr-smb/'); ?>">Small Business</a></li>
                    <li><a href="<?php echo home_url('/thr-hgs/'); ?>">High-Growth Startups</a></li>
                    <li><a href="<?php echo home_url('/contact/'); ?>">Contact</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h5>Contact</h5>
                <p><a href="mailto:info@trilliumhiring.com">info@trilliumhiring.com</a></p>
                <p class="footer-response">Response within one business day</p>
            </div>
            <div class="footer-col footer-newsletter">
                <h5>Newsletter</h5>
                <p class="footer-newsletter-copy">Monthly hiring intel. One email, zero fluff.</p>
                <div class="footer-newsletter-inline">
                    <?php echo do_shortcode('[wpforms id="203"]'); ?>
                    <p class="newsletter-trust">Unsubscribe anytime.</p>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> Trillium Hiring Services. All rights reserved.</p>
            <div class="footer-social">
                <!-- Add your social media links here -->
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>