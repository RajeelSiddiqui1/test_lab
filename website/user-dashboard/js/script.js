document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const toggleButton = document.getElementById('toggleSidebar');
  
    toggleButton.addEventListener('click', function() {
      // Toggle the sidebar collapse state
      sidebar.classList.toggle('collapsed');
    });
  });
  