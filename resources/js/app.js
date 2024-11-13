import './bootstrap';

document.querySelectorAll('.link-tab').forEach(tab => {
    tab.addEventListener('click', function(e) {
      e.preventDefault();
      
      // Remove active class from all tabs and hide all content
      document.querySelectorAll('.link-tab').forEach(t => t.classList.remove('bg-navy','text-white'));
      document.querySelectorAll('.link-tab').forEach(t => t.classList.add('text-navy'));
      document.querySelectorAll('.tab-content').forEach(content => content.classList.add('hidden'));

      // Add active class to the clicked tab and show its content
      this.classList.add('bg-navy','text-white');
      this.classList.remove('text-navy');
      const target = document.querySelector(this.getAttribute('href'));
      target.classList.remove('hidden');
    });
  });