<?php
/**
 * Template Name: Page Mots
 */

get_header(); 

global $wpdb;

// Récupérer tous les mots depuis la table words
$words = $wpdb->get_results("SELECT id, word, image_path FROM words ORDER BY word ASC");
?>

<main class="page-mots">
  <div class="mots-hero">
    <h1>Les mots</h1>
    <div class="search-container">
      <span class="search-icon">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <circle cx="11" cy="11" r="8" stroke="#839c16" stroke-width="2"/>
          <path d="M21 21L16.65 16.65" stroke="#839c16" stroke-width="2" stroke-linecap="round"/>
        </svg>
      </span>
      <input type="text" id="search-mots" class="search-input" placeholder="Rechercher un mot">
    </div>
  </div>

  <div class="mots-content">
    <?php if ($words) : ?>
      <div class="mots-grid" id="mots-grid">
        <?php foreach ($words as $word) : ?>
          <div class="mot-card" data-word="<?php echo esc_attr(strtolower($word->word)); ?>">
            <?php if ($word->image_path) : ?>
              <div class="mot-image">
                <img src="<?php echo esc_url(site_url('/' . $word->image_path)); ?>" alt="<?php echo esc_attr($word->word); ?>">
              </div>
            <?php endif; ?>
            <p class="mot-label"><?php echo esc_html($word->word); ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    <?php else : ?>
      <p class="no-results">Aucun mot disponible.</p>
    <?php endif; ?>
  </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const searchInput = document.getElementById('search-mots');
  const motCards = document.querySelectorAll('.mot-card');
  
  searchInput.addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase().trim();
    
    motCards.forEach(card => {
      const wordText = card.getAttribute('data-word');
      if (wordText.includes(searchTerm)) {
        card.style.display = 'block';
      } else {
        card.style.display = 'none';
      }
    });
  });
});
</script>

<?php get_footer(); ?>
