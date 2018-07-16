@component('mail::message')
# Dear {{$userName}},

{{$currencyName}} exchange rate has been changed from {{$old}} to {{$new}}!<br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
