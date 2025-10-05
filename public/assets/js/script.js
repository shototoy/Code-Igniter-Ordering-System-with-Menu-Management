'use strict';

document.addEventListener("DOMContentLoaded", () => {
  const elementToggleFunc = function (elem) {
    elem.classList.toggle("active");
  };

  const sidebar = document.querySelector("[data-sidebar]");
  const sidebarBtn = document.querySelector("[data-sidebar-btn]");
  if (sidebarBtn) {
    sidebarBtn.addEventListener("click", () => elementToggleFunc(sidebar));
  }

  const testimonialsItem = document.querySelectorAll("[data-testimonials-item]");
  const modalContainer = document.querySelector("[data-modal-container]");
  const modalCloseBtn = document.querySelector("[data-modal-close-btn]");
  const overlay = document.querySelector("[data-overlay]");
  const modalImg = document.querySelector("[data-modal-img]");
  const modalTitle = document.querySelector("[data-modal-title]");
  const modalText = document.querySelector("[data-modal-text]");

  const testimonialsModalFunc = function () {
    modalContainer.classList.toggle("active");
    overlay.classList.toggle("active");
  };

  testimonialsItem.forEach((item) => {
    item.addEventListener("click", () => {
      modalImg.src = item.querySelector("[data-testimonials-avatar]").src;
      modalImg.alt = item.querySelector("[data-testimonials-avatar]").alt;
      modalTitle.innerHTML = item.querySelector("[data-testimonials-title]").innerHTML;
      modalText.innerHTML = item.querySelector("[data-testimonials-text]").innerHTML;
      testimonialsModalFunc();
    });
  });

  const select = document.querySelector("[data-select]");
  const selectItems = document.querySelectorAll("[data-select-item]");
  const selectValue = document.querySelector("[data-selecct-value]");
  const filterBtn = document.querySelectorAll("[data-filter-btn]");
  const filterItems = document.querySelectorAll("[data-filter-item]");

  const filterFunc = function (selectedValue) {
    filterItems.forEach((item) => {
      item.classList.toggle("active", selectedValue === "all" || item.dataset.category === selectedValue);
    });
  };

  if (select) {
    select.addEventListener("click", () => elementToggleFunc(select));
  }

  selectItems.forEach((item) => {
    item.addEventListener("click", () => {
      const selectedValue = item.innerText.toLowerCase();
      selectValue.innerText = item.innerText;
      elementToggleFunc(select);
      filterFunc(selectedValue);
    });
  });

  let lastClickedBtn = filterBtn[0];
  filterBtn.forEach((btn) => {
    btn.addEventListener("click", () => {
      const selectedValue = btn.innerText.toLowerCase();
      selectValue.innerText = btn.innerText;
      filterFunc(selectedValue);
      lastClickedBtn.classList.remove("active");
      btn.classList.add("active");
      lastClickedBtn = btn;
    });
  });

    const navigationLinks = document.querySelectorAll("[data-nav-link]");
    const pages = document.querySelectorAll("[data-page]");

    navigationLinks.forEach((link) => {
      link.addEventListener("click", () => {
        const target = link.textContent.trim().toLowerCase();

        pages.forEach((page) => {
          page.classList.toggle("active", page.dataset.page === target);
        });

        navigationLinks.forEach((nav) => {
          nav.classList.toggle("active", nav === link);
        });
        if (target === "menu") {
        fetch("./menu")
          .then((res) => res.text())
          .then((html) => {
            const section = document.querySelector('[data-page="menu"] .menu-section');
            if (section) section.innerHTML = html;
          })
          .catch((err) => console.error("Failed to load menu.php:", err));
      }
      });
    });
  });

