import gsap from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);
// import Scrollbar from 'smooth-scrollbar';
import Scrollbar, { ScrollbarPlugin } from "smooth-scrollbar";

export default () => {
  class lockPlugin extends ScrollbarPlugin {
    transformDelta(delta) {
      return this.options.isLocked ? {x: 0, y: 0} : delta;
    }
    onRender(remainMomentum) {
      this._remain = {
        ...remainMomentum,
      };
      if (this.options.isLocked) {
        this.scrollbar.setMomentum(0, 0);
      }
    }
  }

  _defineProperty(lockPlugin, "pluginName", "lock");

  _defineProperty(lockPlugin, "defaultOptions", {
    isLocked: false,
  });

  Scrollbar.use(lockPlugin);

  function _defineProperty(obj, key, value) {
    if (key in obj) {
      Object.defineProperty(obj, key, {
        value: value,
        enumerable: true,
        configurable: true,
        writable: true,
      });
    } else {
      obj[key] = value;
    }
    return obj;
  }


  const scroller = document.querySelector('.scroll-wrapper');
  const bodyScrollBar = Scrollbar.init(scroller, {
    damping: 0.1,
    delegateTo: document,
    alwaysShowTracks: false,
    syncCallbacks: true,
  });
  
  // bodyScrollBar.track.xAxis.element.remove();

  ScrollTrigger.scrollerProxy(".scroll-wrapper", {
    scrollTop(value) {
      if (arguments.length) {
        bodyScrollBar.scrollTop = value;
      }
      return bodyScrollBar.scrollTop;
    }
  });

  bodyScrollBar.addListener(ScrollTrigger.update);

  bodyScrollBar.addListener(({ offset }) => {

    let fixed = document.querySelectorAll('.js-fixed');
    if (fixed.length) {
      gsap.set(fixed, {
        top: offset.y + 'px'
      })
    }
  });
  ScrollTrigger.defaults({ scroller: scroller });
}

export function setScrollLock(isLocked) {
  let scrollbar = Scrollbar.get(document.querySelector('.scroll-wrapper'));
  scrollbar.updatePluginOptions('lock', { isLocked: isLocked });
}
