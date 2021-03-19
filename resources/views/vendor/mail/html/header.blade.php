<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{asset('source/logo.png')}}" class="logo" alt="Schwarzn Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
