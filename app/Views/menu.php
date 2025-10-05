<div class="menu-list">
  <?php foreach ($menus as $menu): ?>
    <div class="menu-item">
      <div class="menu-image-container">
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
      
      <div class="menu-info">
        <div class="menu-title-row">
          <h3 class="menu-title"><?= esc($menu['item']) ?></h3>
          <div class="menu-price">₱<?= esc($menu['price']) ?></div>
        </div>
        <p class="menu-description"><?= esc($menu['description']) ?></p>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<div class="menu-actions">
  <button class="form-button">Order Now</button>
</div>