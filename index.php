<?php require_once 'includes/header.php'; ?>

<!-- Hero Section -->
<header class="hero text-white text-center">
    <div class="container">
        <h1 class="display-4">Connecting Generosity with Need</h1>
        <p class="lead">A seamless way for donors to connect with NGOs and make a real impact.</p>
        <a href="register.php" class="btn btn-primary btn-lg">Get Started</a>
        <a href="#how-it-works" class="btn btn-secondary btn-lg">Learn More</a>
    </div>
</header>

<!-- About Section -->
<section id="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2>About DonateConnect</h2>
                <p>We bridge the gap between those willing to give and organizations in need. Our platform simplifies the process of donating goods, ensuring that your contributions reach the right people efficiently.</p>
            </div>
            <div class="col-md-6">
                <img src="https://picsum.photos/seed/donate2/800/600" class="img-fluid rounded" alt="A group of volunteers sorting donations.">
            </div>
        </div>
    </div>
</section>

<!-- How it Works Section -->
<section id="how-it-works" class="bg-light">
    <div class="container">
        <h2 class="text-center mb-5">How It Works</h2>
        <div class="row">
            <div class="col-md-4 text-center">
                <i data-feather="user-plus" width="48" height="48" class="text-primary"></i>
                <h3>1. Register</h3>
                <p>Create an account as a donor or an NGO.</p>
            </div>
            <div class="col-md-4 text-center">
                <i data-feather="send" width="48" height="48" class="text-primary"></i>
                <h3>2. Send/Receive Requests</h3>
                <p>Donors can send donation requests, and NGOs can view and manage them.</p>
            </div>
            <div class="col-md-4 text-center">
                <i data-feather="gift" width="48" height="48" class="text-primary"></i>
                <h3>3. Make a Difference</h3>
                <p>Your donations directly support communities in need.</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials">
    <div class="container">
        <h2 class="text-center mb-5">What People Are Saying</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <p class="card-text">"DonateConnect made it so easy to find a local charity that needed the exact items I had to give. The process was incredibly smooth."</p>
                        <footer class="blockquote-footer">Jane Doe, Donor</footer>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <p class="card-text">"As an NGO, managing donations used to be a logistical challenge. This platform has streamlined everything for us."</p>
                        <footer class="blockquote-footer">John Smith, NGO Coordinator</footer>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Contact Us</h2>
        <div class="row">
            <div class="col-md-8 mx-auto">
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>