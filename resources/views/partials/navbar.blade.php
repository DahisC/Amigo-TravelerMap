<nav>
  <ul class="d-flex justify-content-between">
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
    @else
      <li>
        <a href="{{ route('sign-in') }}">旅人簽到</a>
      </li>
      <li>
        <a href="{{ route('sign-up') }}">旅発ちます</a>
      </li>
    @endif
  </ul>
</nav>
