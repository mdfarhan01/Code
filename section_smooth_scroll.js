document.addEventListener('wheel', function(event) {
  const sections = document.querySelectorAll('.fullpage-section-1');
  let current = Math.round(window.scrollY / window.innerHeight);
  if (event.deltaY > 0 && current < sections.length - 1) {
    window.scrollTo({ top: (current + 1) * window.innerHeight, behavior: 'smooth' });
  } else if (event.deltaY < 0 && current > 0) {
    window.scrollTo({ top: (current - 1) * window.innerHeight, behavior: 'smooth' });
  }
});
