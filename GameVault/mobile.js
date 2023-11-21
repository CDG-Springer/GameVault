class MobileNavbar {
  constructor(mobileMenu, navList, navLinks) {
    this.mobileMenu = document.querySelector(mobileMenu);
    this.navList = document.querySelector(navList);
    this.navLinks = document.querySelectorAll(navLinks);
    this.activeClass = "active";
    this.lockClass = "lockScroll";

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
      document.querySelector('body').classList.add('lockScroll');
    } else {
      document.querySelector('body').classList.remove('lockScroll');
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
