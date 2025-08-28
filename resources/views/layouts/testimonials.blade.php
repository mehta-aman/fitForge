<section class="testimonial-section">
    <div class="container">
        <h2 class="section-title">What Our Users Say</h2>
        <div class="testimonial-grid">
            <div class="testimonial-card">
                <p class="quote">"FitForge helped me stay consistent with my workouts. The habit tracker is a
                    game-changer!"</p>
                <div class="user-info">
                    <img src="/images/clients/client1.jpg" alt="User photo">
                    <div>
                        <h4>Priya S.</h4>
                        <span>Software Engineer</span>
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <p class="quote">"I love tracking my progress visually. The charts and reminders keep me motivated every
                    day."</p>
                <div class="user-info">
                    <img src="/images/clients/client2.jpg" alt="User photo">
                    <div>
                        <h4>Rohan D.</h4>
                        <span>Fitness Coach</span>
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <p class="quote">"The best app I've used to manage my fitness goals. The calendar view is super
                    helpful."</p>
                <div class="user-info">
                    <img src="/images/clients/client3.jpg" alt="User photo">
                    <div>
                        <h4>Anjali K.</h4>
                        <span>College Student</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
.testimonial-section {
  background-color: var(--dark-bg);
  color: var(--font-white);
  padding: var(--space-xl) var(--space-md);
  font-family: var(--font-primary);
  text-align: center;
}

.section-title {
  font-size: var(--font-size-lg);
  font-weight: 600;
  margin-bottom: var(--space-lg);
  color: var(--color-primary);
}

.testimonial-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: var(--space-lg);
  justify-items: center;
}

.testimonial-card {
  background-color: var(--color-dark);
  border-radius: var(--radius-lg);
  padding: var(--space-lg);
  box-shadow: var(--shadow-md);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  max-width: 360px;
  text-align: left;
}

.testimonial-card:hover {
  transform: translateY(-4px);
  box-shadow: var(--shadow-lg);
}
.testimonial-card:hover .user-info img{
    transform: scale(1.7);
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
}

.quote {
  font-size: var(--font-size-md);
  color: var(--font-white);
  font-style: italic;
  margin-bottom: var(--space-md);
  line-height: 1.6;
}

.user-info {
  display: flex;
  align-items: center;
  gap: var(--space-md);
}

.user-info img {
  width: 48px;
  height: 48px;
  object-fit: cover;
  border-radius: 50%;
  border: 2px solid var(--color-primary);
  transition: transform 0.3s ease;
}

.user-info h4 {
  font-size: var(--font-size-md);
  margin: 0;
  color: var(--color-secondary);
  font-weight: 500;
}

.user-info span {
  font-size: var(--font-size-sm);
  color: var(--color-muted);
}


/* Responsive Media Queries */

/* Tablets (768px and up) */
@media (max-width: 1024px) {
  .section-title {
    font-size: calc(var(--font-size-lg) - 2px);
  }

  .quote {
    font-size: var(--font-size-sm);
  }
}

/* Mobile Devices (<= 767px) */
@media (max-width: 767px) {
  .testimonial-grid {
    grid-template-columns: 1fr;
    gap: var(--space-md);
  }

  .testimonial-card {
    max-width: 100%;
    padding: var(--space-md);
  }

  .user-info img {
    width: 40px;
    height: 40px;
  }

  .section-title {
    font-size: 1.5rem;
  }

  .quote {
    font-size: 1rem;
  }

  .user-info h4 {
    font-size: 1rem;
  }

  .user-info span {
    font-size: 0.85rem;
  }
}

</style>