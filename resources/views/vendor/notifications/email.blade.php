@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('!')
@else
# @lang('Ciao')
@endif
@endif

{{-- Intro Lines --}}
Fai clic sul pulsante in basso per verificare il tuo indirizzo email.

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
Verifica l'indirizzo email
@endcomponent
@endisset

{{-- Outro Lines --}}
Se non hai creato un account, non sono necessarie ulteriori azioni.

{{-- Salutation --}}
@if (! empty($salutation))
@else
@lang('Saluti'),<br>
{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
    "Se hai problemi cliccando sul bottone \"Verifica l'indirizzo email\", copia e incolla il link sottostante\n".
    'sul tuo browser: ',
    [
        'actionText' => $actionText,
    ]
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
@endslot
@endisset
@endcomponent
