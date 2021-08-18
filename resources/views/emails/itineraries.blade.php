@component('mail::message')

## 哈囉！旅人 <b>{{$user->name}}</b>
---
<p>
  日安！正在計劃下一次的旅行嗎？
</p>
<p>
  你選了好多有趣的活動！
  我已經把它們都排好，等不及要讓你看看這些地點了！
</p>
<p>準備好收拾行囊，開啟下一段旅程了嗎？</p>

@component('mail::button', ['url' => route('maps.show', ['map' => $map->id])])
查看地圖
@endcomponent

## 行程摘要
---
@component('mail::panel')
<p style="text-align: center;">{{ $map->name }}</p>
@endcomponent
<ol>
  @foreach ($map->attractions as $index => $a)
  <li>
    <p><b>{{ $a->position->country }}，{{ $a->name}}</b></p>
    @if (!empty($a->time->startDate) && !empty($a->time->endDate))
    <p><small>時間　{{ $a->time->startDate }} ~ {{ $a->time->endDate }}</small></p>
    @endif
    <p><small>地址　{{ $a->position->address }}</small></p>
  </li>
  @endforeach
</ol>



---

<img src="{{ asset('images/email/as_traveler.png') }}" alt="旅人裝備" />

---

<div style="text-align: center;" style="margin-bottom: 10px;">
  <small>
    這封信件是來自 <a href="www.amigo.com">www.amigo.com</a> 提供的個人行程資訊
  </small>
</div>
<div style="text-align: center;">
  <small>請透過附件的 PDF 檔案確認詳細的行程內容</small>
</div>

@component('mail::button', ['url' => route('maps.show', ['map' => $map->id])])
輸出為 PDF
@endcomponent

---

<p style="text-align: right; margin-bottom: 0;"><small><i>匯出時間 {{ date('Y-m-d H:i:s') }}</i></small></p>

@endcomponent
