@component('mail::message')

<p>
  嗨！{{$user->name}} 安安！

  很高興看到你來！
</p> 
<p>你選了好多有趣的活動！
我已經把他們都排好，等不及要讓你看看這些地點了！</p> 
<p>準備好收拾行囊，開啟下一段旅程了嗎?</p> 


@component('mail::panel')
<p style="text-align: center;">{{ $map->name }}</p>
@endcomponent

## 行程摘要
---
<ol>
  @foreach ($map->attractions as $index => $a)
  <li>
    {{-- {{dd($a)}} --}}
    {{-- {{dd($user)}} --}}
    <a href="{{ url("$a->website") }}"><p><b>{{ $a->position->country }}，{{ $a->name}}</b></p></a>

    @if (!empty($a->time->startDate) && !empty($a->time->endDate))
    <p><small>時間　{{ $a->time->startDate }} ~ {{ $a->time->endDate }}</small></p>
    @endif
    <p><small>地址　{{ $a->position->address }}</small></p>
  </li>
  @endforeach
</ol>



---

<img src="{{ asset('images/email/as_Traveler.png') }}" alt="旅人裝備" />

---

<div style="text-align: center;" style="margin-bottom: 10px;">
  <small>
    這封信件是來自 <a href="www.amigo.com">www.amigo.com</a> 提供的個人行程資訊
  </small>
</div>
<div style="text-align: center;">
  <small>請透過附件的 PDF 檔案確認詳細的行程內容</small>
</div>

---

<p style="text-align: right; margin-bottom: 0;"><small><i>匯出時間 {{ date('Y-m-d H:i:s') }}</i></small></p>

@component('mail::button', ['url' => ''])
查看地圖
@endcomponent

@endcomponent
