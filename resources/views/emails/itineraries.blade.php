@component('mail::message')

@component('mail::panel')
<p style="text-align: center;">{{ $map->name }}</p>
@endcomponent

## 行程摘要
---

<ol>
  @foreach ($map->attractions as $index => $a)
  <li>
    <p><b>{{ $a->position->country }}，{{ $a->name }}</b></p>
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
