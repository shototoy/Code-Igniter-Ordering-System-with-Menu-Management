function loadMenu() {
  fetch('data/menu.json')
    .then(response => {
      if (!response.ok) {
        throw new Error('Failed to load menu');
      }
      return response.json();
    })
    .then(menus => {
      displayMenu(menus);
    })
    .catch(error => {
      console.error('Error loading menu:', error);
      document.getElementById('menuList').innerHTML = 
        '<p style="text-align: center; padding: 20px;">Unable to load menu items. Please try again later.</p>';
    });
}

function displayMenu(menus) {
  const menuList = document.getElementById('menuList');
  
  if (!menus || menus.length === 0) {
    menuList.innerHTML = '<p style="text-align: center; padding: 20px;">No menu items available.</p>';
    return;
  }

  let html = '';
  
  menus.forEach(menu => {
    const itemName = menu.item || 'default';
    const sanitized = itemName.toLowerCase().replace(/[^a-z0-9]/g, '_');
    const imgSrc = `assets/images/${sanitized}.png`;
    const fallbackImg = 'assets/images/my-avatar.png';
    
    html += `
      <div class="menu-item">
        <div class="menu-image-container">
          <img 
            src="${imgSrc}" 
            alt="${escapeHtml(itemName)}" 
            class="dashboard-image"
            onerror="this.src='${fallbackImg}'"
          >
        </div>
        
        <div class="menu-info">
          <div class="menu-title-row">
            <h3 class="menu-title">${escapeHtml(menu.item)}</h3>
            <div class="menu-price">₱${escapeHtml(menu.price)}</div>
          </div>
          <p class="menu-description">${escapeHtml(menu.description)}</p>
        </div>
      </div>
    `;
  });
  
  menuList.innerHTML = html;
}

function escapeHtml(unsafe) {
  if (!unsafe) return '';
  return unsafe
    .toString()
    .replace(/&/g, "&amp;")
    .replace(/</g, "&lt;")
    .replace(/>/g, "&gt;")
    .replace(/"/g, "&quot;")
    .replace(/'/g, "&#039;");
}

document.addEventListener('DOMContentLoaded', loadMenu);