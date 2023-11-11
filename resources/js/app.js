import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
// Navbar dropdown
        const btn = document.querySelector("#buttons");
        const menu = document.querySelector("#menus");

        btn.addEventListener("click", () => {
            menu.classList.toggle("hidden");
        });
      //   Homepage Slider using Tiny Slider

          var slider = tns({
        container: '#my-slider',
        items: 1,
        slideBy: 'page',
              autoplay: true,
              autoplayHoverPause: true,
              autoplayText: ['', ''],
        autoplayPosition: "bottom",
        mouseDrag: true,
        animateIn: "tns-zoomIn",
        animateOut: "rollOut",
        navAsThumbnails: true,
              controls: false,
        nav:true,

          });


  

