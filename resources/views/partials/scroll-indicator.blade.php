<style>
  #scroll-indicator {
    height: 30vh;
    width: 15px;
    top: 50%;
    transform: translateY(-50%);
    left: 5px;
    z-index: 5;
    /* border: solid 2px hsla(0, 95%, 35%, 1);
    border-width: 3px 4px 3px 5px;
    border-radius: 95% 4% 92% 5%/4% 95% 6% 95%; */
    /* border-radius: 20px; */
    border: 2px solid #7D88BC;
  }

  #scroll-indicator__progression-bar {
    background-color: #93C4C7;
    position: absolute;
    transition: height .3s ease-out;
    background-size: cover;
    display: flex;
    flex-direction: column;
    /* border-radius: 20px; */
  }

  .scroll-indicator__anchor {
    display: block;
    border: 1px solid #7D88BC;
  }
</style>

<div id="scroll-indicator" class="position-fixed">
  <div id="scroll-indicator__progression-bar" class="w-100"></div>
  <div id="scroll-indicator__anchor-wrapper" class="w-100 h-100 position-absolute"></div>
</div>

<script>
  window.onload = () => {
    const sI = document.getElementById('scroll-indicator');
    const sIProgressionBar = document.getElementById('scroll-indicator__progression-bar');
    const sIAnchorWarpper = document.getElementById('scroll-indicator__anchor-wrapper');
    const bodyHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;

    const anchors = [
      { id: 'header', text: 'Greetings' },
      { id: 'banner-about-me', text: 'Who am I?' },
      { id: 'features', text: 'Explore' },
      { id: 'banner-about-you', text: 'Who are you?' },
      { id: 'roles', text: 'Intro' },
      { id: 'banner-the-end', text: 'Farewell' }
    ]

    anchors.forEach(anchor => {
      const el = document.getElementById(anchor.id);
      const elToTopDistance = window.pageYOffset + el.getBoundingClientRect().top;
      const elHeight = el.offsetHeight;
      console.log(elHeight / document.documentElement.scrollHeight * 100, elHeight, bodyHeight, document.documentElement.scrollHeight);
      //   console.log(elToTopDistance, bodyHeight);
      sIAnchorWarpper.innerHTML += `<a class="scroll-indicator__anchor" href="#${anchor.id}" style="height: ${elHeight / document.documentElement.scrollHeight * 100}%;"></a>`
    })
  }

  window.onscroll = function() { myFunction() };

  function myFunction() {
    const sIProgressionBar = document.getElementById('scroll-indicator__progression-bar');
    const scrolledPx = document.body.scrollTop || document.documentElement.scrollTop;
    const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    const scrolled = ((document.documentElement.scrollTop + document.documentElement.clientHeight) / document.documentElement.scrollHeight) * 100;
    console.log(document.documentElement.scrollTop + document.documentElement.clientHeight)
    sIProgressionBar.style.height = scrolled + "%";
  }
</script>
