class MobileNavbar {
  constructor(mobileMenu, navList, navLinks) {
    this.mobileMenu = document.querySelector(mobileMenu);
    this.navList = document.querySelector(navList);
    this.navLinks = document.querySelectorAll(navLinks);
    this.activeClass = "active";
    this.lockClass = "lock";

    this.handleClick = this.handleClick.bind(this);
  }

  animateLinks() {
    // Implemente a função animateLinks() de acordo com suas necessidades
  }

  handleClick() {
    this.navList.classList.toggle(this.activeClass);
    this.mobileMenu.classList.toggle(this.activeClass);
    this.animateLinks();

    if (this.mobileMenu.classList.contains(this.activeClass)) {
      document.querySelector('section').classList.add(this.lockClass);
    } else {
      document.querySelector('section').classList.remove(this.lockClass);
    }    
  }

  addClickEvent() {
    this.mobileMenu.addEventListener("click", this.handleClick);
  }

  init() {
    if (this.mobileMenu) {
      this.addClickEvent();
    }
    return this;
  }
}

const mobileNavbar = new MobileNavbar(
  ".mobile-menu",
  ".nav-list",
  ".nav-list li"
);
mobileNavbar.init();
