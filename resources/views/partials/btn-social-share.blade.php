<button class="btn btn-outline-dark btn-sm" type="button" id="dd-social-share" data-mdb-toggle="dropdown" aria-expanded="false">
  <i class="fas fa-share"></i>
  分享
</button>
<ul class="dropdown-menu text-dark" aria-labelledby="dd-social-share">
  <li style="background-color: #3b5998;">
    <a id="btn-facebook-share" class="dropdown-item d-flex justify-content-between align-items-center text-center" href="#">
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

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId: '400675014493721',
      autoLogAppEvents: true,
      xfbml: true,
      version: 'v11.0'
    });
  };

  document.getElementById('btn-facebook-share').addEventListener('click', (e) => {
    e.preventDefault();
    FB.ui({
      method: 'share',
      href: 'https://developers.facebook.com/docs/',
    }, function(response) {});
  })
</script>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
