/**
 * Header Language Switcher
 */
console.log('Header JS loaded!');

document.addEventListener('DOMContentLoaded', function() {
  console.log('DOM ready');
  const langToggle = document.getElementById('lang-toggle');
  const langDropdown = document.getElementById('lang-dropdown');
  
  console.log('langToggle:', langToggle);
  console.log('langDropdown:', langDropdown);
  
  if (!langToggle || !langDropdown) {
    console.error('Elements not found!');
    return;
  }

  // Toggle dropdown on click
  langToggle.addEventListener('click', function(e) {
    e.preventDefault();
    langDropdown.classList.toggle('active');
    
    // Rotate arrow
    const arrow = this.querySelector('.arrow');
    if (arrow) {
      arrow.style.transform = langDropdown.classList.contains('active') 
        ? 'rotate(180deg)' 
        : 'rotate(0)';
    }
  });
  
  // Close dropdown when clicking outside
  document.addEventListener('click', function(e) {
    if (!e.target.closest('.language-switch')) {
      langDropdown.classList.remove('active');
      const arrow = langToggle.querySelector('.arrow');
      if (arrow) arrow.style.transform = 'rotate(0)';
    }
  });
  
  // Handle language selection
  const langLinks = langDropdown.querySelectorAll('a');
  langLinks.forEach(link => {
    link.addEventListener('click', function(e) {
      e.preventDefault();
      
      const langCode = this.getAttribute('data-lang');
      const langText = this.textContent;
      
      // Update displayed language
      const currentLang = langToggle.querySelector('.current-lang');
      if (currentLang) {
        currentLang.textContent = langText;
      }
      
      // Store selected language
      localStorage.setItem('selectedLanguage', langCode);
      
      // Close dropdown
      langDropdown.classList.remove('active');
      const arrow = langToggle.querySelector('.arrow');
      if (arrow) arrow.style.transform = 'rotate(0)';
      
      // Trigger custom event for other scripts to listen to
      document.dispatchEvent(new CustomEvent('languageChanged', { 
        detail: { code: langCode, name: langText } 
      }));
    });
  });
  
  // Restore selected language on page load
  const savedLang = localStorage.getItem('selectedLanguage');
  if (savedLang) {
    const savedLink = langDropdown.querySelector(`a[data-lang="${savedLang}"]`);
    if (savedLink) {
      const currentLang = langToggle.querySelector('.current-lang');
      if (currentLang) {
        currentLang.textContent = savedLink.textContent;
      }
    }
  }
});
