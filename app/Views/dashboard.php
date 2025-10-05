<!DOCTYPE html>
<html>
<head>
    <title>Malantar-Untua</title>
    <link href="<?= base_url('assets/bootstrap/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/icons/bootstrap-icons.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
    <link rel="icon" href="<?= base_url('assets/favicon.ico') ?>" type="image/x-icon">

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
    </style>
</head>
<body>
  <?= config('App')->baseURL ?>

  <header class="site-header">
  <div class="header-logo-box">
    <img src="<?= base_url('assets/images/my-avatar.png') ?>" alt="logo" class="header-logo">
  </div>
  </header>


<div class="wrapper">
  <main>
    <div class="main-content has-scrollbar">
      <nav class="navbar">
        <ul class="navbar-list">
          <li class="navbar-item">
            <a href="<?= base_url('logout') ?>" class="navbar-link active">Logout</a>
          </li>
        </ul>
      </nav>

      <article class="dashboard active" data-page="dashboard">
        <header>
          <h2 class="h2 article-title">Welcome to Jondelicious Menu Dashboard</h2>
        </header>
        
        <div class="dashboard-section">
          <div class="dashboard-menu-container">
            
            <?php if (isset($menus) && !empty($menus)): ?>
              <?php foreach ($menus as $menu): ?>
                <div class="dashboard-menu-item">
                  <div class="dashboard-item-header">
                    <div class="dashboard-image-container">
                    <?php
                    $itemName = isset($menu['item']) ? $menu['item'] : 'default';
                    $sanitized = strtolower(preg_replace('/[^a-zA-Z0-9]/', '_', $itemName));
                    $imagePath = FCPATH . 'assets/images/' . $sanitized . '.png';
                    $imgSrc = file_exists($imagePath)
                        ? base_url('assets/images/' . $sanitized . '.png')
                        : base_url('assets/images/my-avatar.png');
                    ?>
                    <img src="<?= $imgSrc ?>" alt="<?= esc($itemName) ?>" class="dashboard-image">

                    </div>
                    
                    <div class="dashboard-item-info">
                        <h3 class="dashboard-menu-title"><?= esc($menu['item']) ?></h3>
                        <div class="dashboard-menu-price">₱<?= esc($menu['price']) ?></div>
                        <button class="btn-remove" onclick="removeMenuItem(<?= $menu['id'] ?>, this)">Remove</button>
                    </div>
                  </div>
                  <p class="dashboard-menu-description"><?= esc($menu['description']) ?></p>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>
            
            <!-- Add Menu Card -->
            <div class="add-menu-card" onclick="openAddMenuModal()">
              <div class="add-menu-icon">
                <i class="bi bi-plus-circle"></i>
              </div>
              <div class="add-menu-text">Add New Menu Item</div>
            </div>
            
          </div>
        </div>
      </article>
    </div>
  </main>
</div>

<!-- Add Menu Modal -->
<div class="add-menu-modal" id="addMenuModal">
  <div class="modal-content">
    <div class="modal-header">
      <h3 class="modal-title">Add New Menu Item</h3>
      <button class="modal-close" onclick="closeAddMenuModal()">
        <i class="bi bi-x"></i>
      </button>
    </div>
    
    <form id="addMenuForm" action="<?= base_url('dashboard/add-menu') ?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="item_name" class="form-label">Item Name</label>
        <input type="text" id="item_name" name="item" class="form-input" required>
      </div>
      
      <div class="form-group">
        <label for="item_price" class="form-label">Price (₱)</label>
        <input type="number" id="item_price" name="price" class="form-input" step="0.01" required>
      </div>
      
      <div class="form-group">
        <label for="item_description" class="form-label">Description</label>
        <textarea id="item_description" name="description" class="form-input form-textarea" required></textarea>
      </div>
      
      <div class="form-group">
        <label for="item_image" class="form-label">Image (optional)</label>
        <input type="file" id="item_image" name="image" class="form-input" accept="image/*">
      </div>
      
      <div class="modal-actions">
        <button type="button" class="btn-cancel" onclick="closeAddMenuModal()">Cancel</button>
        <button type="submit" class="btn-submit">Add Menu Item</button>
      </div>
    </form>
  </div>
</div>

<footer class="site-footer footer-ember">
<video autoplay muted loop playsinline>
  <source src="<?= base_url('assets/images/ember.mp4') ?>" type="video/mp4">
</video>
</footer>

<script>
function openAddMenuModal() {
    document.getElementById('addMenuModal').classList.add('active');
}

function closeAddMenuModal() {
    document.getElementById('addMenuModal').classList.remove('active');
    document.getElementById('addMenuForm').reset();
}

document.getElementById('addMenuModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeAddMenuModal();
    }
});

document.getElementById('addMenuForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    
    fetch(this.action, {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            closeAddMenuModal();
            location.reload();
        } else {
            alert(data.message || 'Error adding menu item');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error adding menu item');
    });
});
</script>

<script src="<?= base_url('assets/js/script.js') ?>"></script>
<script src="<?= base_url('assets/js/cursor.js') ?>"></script>
<script src="<?= base_url('assets/bootstrap/bootstrap.bundle.min.js') ?>"></script>
<script>
function removeMenuItem(id, button) {
  if (!confirm('Are you sure you want to delete this item?')) return;

  fetch('<?= base_url('menu/delete') ?>/' + id, {
    method: 'DELETE'
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      button.closest('.dashboard-menu-item').remove();
    } else {
      alert(data.message || 'Failed to delete item');
    }
  })
  .catch(error => {
    console.error('Error deleting item:', error);
    alert('Error deleting item');
  });
}
</script>

</body>
</html>