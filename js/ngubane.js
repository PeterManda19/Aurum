Vue.component('text-slide', {
    template: `
  <transition
    :css="false"
    name="text-slide"
    mode="out-in"
    @enter="enter"
    @leave="leave"
  >
    <slot></slot>
  </transition>
  `,
    data: () => ({
    }),
    methods: {
      enter (el, onComplete) {
        let timeline = anime.timeline({ complete: onComplete })
        timeline.add({
          targets: [
            '.crowd-funding__header__description h1',
            '.crowd-funding__header__description p',
            '.hashtags',
            '.icon',
            'h4',
            '.content',
            'li'
          ],
          translateY: [250, 0],
          easing: 'easeOutSine',
          duration: 500,
          opacity: [0, 1],
          delay: (el, i, l) => i * 50
        })
      },
  
      leave (el, onComplete) {
        let timeline = anime.timeline({
          complete: onComplete
        })
        
        timeline.add({
          targets: [
            '.crowd-funding__header__description h1',
            '.crowd-funding__header__description p',
            '.hashtags',
            '.icon',
            'h4',
            '.content',
            'li'
          ],
          translateY: [0, -250],
          easing: 'easeInExpo',
          duration: 500,
          opacity: [1, 0],
          delay: (el, i, l) => i * 50
        })
      }
    }
  });
  
  
  new Vue({
    el: '#app',
    data: () => ({
      items: [
        {
          mainTitle: `here's the deal.`
        },
        {
          mainTitle: `here's another deal.`
        }
      ],
      activeNum: 0
    }),
    
    computed: {
      activeItem() {
        return this.items[this.activeNum];
      }  
    },
    
    methods: {
      onClick() {
        this.activeNum = this.activeNum >= (this.items.length - 1) ? 0 : ++this.activeNum;
      }
    }
  });