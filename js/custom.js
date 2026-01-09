document.addEventListener('DOMContentLoaded', () => {
  // Testimonial Slider
  const track = document.getElementById('testimonialTrack');
  
  if (track) {
    const cards = track.querySelectorAll('.testimonial-card');
    
    if (cards.length > 0) {
      let currentIndex = 0;
      const slideInterval = 4000; // 4 seconds
      let autoSlideInterval;

      const getVisibleCards = () => {
        if (window.innerWidth >= 1024) return 3;
        if (window.innerWidth >= 768) return 2;
        return 1;
      };

      const updateSlide = () => {
        const visibleCards = getVisibleCards();
        const maxIndex = Math.max(0, cards.length - visibleCards);
        
        // Ensure index is within bounds
        if (currentIndex > maxIndex) currentIndex = 0;
        
        const cardWidth = cards[0].offsetWidth;
        
        // Get gap from computed style
        const trackStyle = window.getComputedStyle(track);
        const gapValue = parseFloat(trackStyle.gap) || 32; // Default to 32px if parsing fails
        
        const moveAmount = (cardWidth + gapValue) * currentIndex;
        track.style.transform = `translateX(-${moveAmount}px)`;
      };

      const nextSlide = () => {
        const visibleCards = getVisibleCards();
        const maxIndex = Math.max(0, cards.length - visibleCards);

        if (currentIndex >= maxIndex) {
          currentIndex = 0;
        } else {
          currentIndex++;
        }
        updateSlide();
      };

      // Start auto slide
      const startSlide = () => {
        if (autoSlideInterval) clearInterval(autoSlideInterval);
        autoSlideInterval = setInterval(nextSlide, slideInterval);
      };

      // Stop auto slide on interaction
      const stopSlide = () => {
        if (autoSlideInterval) clearInterval(autoSlideInterval);
      };

      // Initial setup
      updateSlide();
      startSlide();

      // Event listeners
      window.addEventListener('resize', () => {
        updateSlide();
        startSlide(); // Restart timer to reset interval
      });

      // Pause on hover
      track.addEventListener('mouseenter', stopSlide);
      track.addEventListener('mouseleave', startSlide);
      
      // Touch support for mobile swipe could be added here, but simple auto-slide is requested
    }
  }
});
