<style>
  #scroll-indicator {
    height: 30vh;
    width: 20px;
    top: 50%;
    transform: translateY(-50%);
    left: 5px;
    z-index: 5;
    /* border: solid 2px hsla(0, 95%, 35%, 1);
    border-width: 3px 4px 3px 5px;
    border-radius: 95% 4% 92% 5%/4% 95% 6% 95%; */
    /* border-radius: 20px; */
    /* border: 2px solid #7D88BC; */
    display: flex;
    justify-content: center;
  }

  #scroll-indicator__progression-bar {
    background-color: #93C4C7;
    position: absolute;
    transition: height .3s ease-out;
    background-size: cover;
    display: flex;
    flex-direction: column;
    overflow: hidden;
    width: 10px;
    border-radius: 999px;
    /* border-radius: 20px; */
  }



  #scroll-indicator__anchor-wrapper {
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .scroll-indicator__anchor {
    display: block;
    border: 1px solid #7D88BC;
    position: relative;
    transition: background-color .3s linear;
    /*  */
    height: 20px;
    width: 20px;
    border-radius: 50%;
    position: absolute;
    transform: translateY(-50%);
    background-color: #7D88BC;
  }

  .scroll-indicator__anchor:hover {
    background-color: #7D88BC;
    color: #7D88BC;
  }

  .scroll-indicator__anchor:hover::after {
    color: #7D88BC;
  }

  .scroll-indicator__anchor::after {
    transform: translateY(50%);
    content: attr(data-text);
    position: absolute;
    /* top: -5px; */
    left: 30px;
    white-space: nowrap;
    line-height: 10px;
    font-size: 0.5rem;
    color: #93C4C7;
    font-weight: bold;
  }
</style>

<div id="scroll-indicator" class="position-fixed">
  <div id="scroll-indicator__progression-bar"></div>
  <div id="scroll-indicator__anchor-wrapper" class="w-100 h-100"></div>
</div>

<script>
  window.onload = () => {
    const sI = document.getElementById('scroll-indicator');
    const sIProgressionBar = document.getElementById('scroll-indicator__progression-bar');
    const sIAnchorWarpper = document.getElementById('scroll-indicator__anchor-wrapper');
    const mainEl = document.querySelector('main');
    const bodyHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    const clientScreenHeight = document.documentElement.clientHeight;

    const anchors = [
      { id: 'header', text: 'Greetings' },
      { id: 'banner-about-me', text: 'Me' },
      { id: 'features', text: '' },
      { id: 'banner-about-you', text: 'You' },
      { id: 'roles', text: '' },
      { id: 'banner-the-end', text: 'Farewell' }
    ]

    anchors.forEach((anchor, index) => {
      const el = document.getElementById(anchor.id);
      const elToTopDistance = window.pageYOffset + el.getBoundingClientRect().top;
      const elHeight = el.offsetHeight;
      //   sIAnchorWarpper.innerHTML += `<a class="scroll-indicator__anchor" href="#${anchor.id}" style="height: ${index === anchors.length - 1 ? 0 : elHeight / (mainEl.scrollHeight - clientScreenHeight) * 100}%;" data-text="${anchor.text}"></a>`
      sIAnchorWarpper.innerHTML += `
        <a
            class="scroll-indicator__anchor"
            href="#${anchor.id}"
            data-text="${anchor.text}"
            style="top: ${index === 0 ? 0 : elToTopDistance / (mainEl.scrollHeight - clientScreenHeight) * 100}%;"
        ></a>
      `
    });

    window.onscroll = function() { scrollIndicator() };

    function scrollIndicator() {
      const mainEl = document.querySelector('main');
      const scrolledPx = document.documentElement.scrollTop;
      const height = mainEl.scrollHeight - clientScreenHeight;
      let scrolled = (scrolledPx / height) * 100;
      scrolled = scrolled <= 100 ? scrolled : 100;
      sIProgressionBar.style.height = scrolled + "%";
    }
  }
</script>
