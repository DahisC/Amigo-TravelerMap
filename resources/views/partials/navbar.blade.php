<style>
  nav {
    background-color: var(--bs-secondary);
    padding: 20px;
  }

  nav>ul {
    list-style-type: none;
    padding-left: 0;
  }

</style>

<nav>
  <ul class="d-flex justify-content-between mb-0">
    <li>臨時導覽列</li>
    <li>
      <a href="/">Logo</a>
    </li>
    <li>
      <a href="{{ route('maps.index') }}">附近有什麼好玩的？</a>
    </li>
    <li>
      <a href="{{ route('itineraries.index') }}">我關注的地點</a>
    </li>
    @if (Auth::check())
      <li>
        <a href="{{ route('traveler.index') }}">{{ Auth::user()->name }}</a>
      </li>
      <li>
        <a href="#" onclick="logout_form.submit();">
          登出
        </a>

        <form id="logout_form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </li>
    @else
      <li>
        <a href="{{ route('sign-in') }}">旅人簽到</a>
      </li>
      <li>
        <a href="{{ route('sign-up') }}">新手上路</a>
      </li>
    @endif
  </ul>
</nav>
