@php
    $tabs = [
       ['title' => 'Informações','link' => route('tools.edit',['tool' => $tool->id])],
       ['title' => 'Documentos','link' => route('tools.toolkit',['tool' => $tool->id])],
    ]
@endphp

<div class="text-right">
    {!! Button::link('Listar recursos')->asLinkTo(route('tools.index')) !!}
</div>
{!! \Navigation::tabs($tabs) !!}
<div>
    {!! $slot !!}
</div>