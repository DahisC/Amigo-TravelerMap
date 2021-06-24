<div class="dropdown">
  <a class="btn btn-link btn-sm" type="button" id="dd-social-share" data-mdb-toggle="dropdown" aria-expanded="false">
    <i class="fas fa-share text-secondary"></i>
  </a>
  <ul class="dropdown-menu text-dark" aria-labelledby="dd-social-share">
    <li>
      <a class="dropdown-item disabled" href="#">
        分享至社群
      </a>
    </li>
    <li>
      <hr class="dropdown-divider">
    </li>
    <li style="background-color: #3b5998;">
      <a id="btn-facebook-share" class="dropdown-item d-flex justify-content-between align-items-center text-center" href="#" data-id="{{ $f->id }}">
        <i class="fab fa-fw fa-facebook-f"></i>
        Facebook
      </a>
    </li>
    <li style="background-color: #55acee;">
      <a id="btn-twitter-share" class="dropdown-item d-flex justify-content-between align-items-center text-center" href="#">
        <i class="fab fa-fw fa-twitter"></i>
        Twitter
      </a>
    </li>
    <li style="background-color: #ac2bac;">
      <a id="btn-instagram-share" class="dropdown-item d-flex justify-content-between align-items-center text-center" href="#">
        <i class="fab fa-fw fa-instagram"></i>
        Instagram
      </a>
    </li>
  </ul>
</div>

<script>
  //   window.fbAsyncInit = function() {
  //     FB.init({
  //       appId: '400675014493721',
  //       autoLogAppEvents: true,
  //       xfbml: true,
  //       version: 'v11.0'
  //     });
  //   };


  window.fbAsyncInit = function() {
    FB.init({
      appId: '400675014493721',
      xfbml: true,
      version: 'v11.0'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) { return; }
    js = d.createElement(s);
    js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));


  document.getElementById('btn-facebook-share').addEventListener('click', (e) => {
    e.preventDefault();
    const attractionId = e.target.dataset.id;
    FB.ui({
      method: 'share',
      href: `${window.location.origin}/attractions/${attractionId}`,
    }, function(response) {});
  })
</script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
