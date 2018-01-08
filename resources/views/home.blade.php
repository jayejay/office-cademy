@extends('layouts.excel_layout')

@section('content')
<div class="row">
    <h4 class="title">Excel</h4>
    <p>
        Excel is very powerful, but it can also be quit overwhelming in the beginning.
        There are a lot of course, guides and books outside. The question is where to
        start and what are the things you really need to know. Don't worry you are at
        the right place - we will discover a lot of Excel - functionalities together.
    </p>
    <p>
        We try to keep our language easy and the examples rememberable. Once you
        know how it works you will love it :-)
        In order to get the dryness out of this topic we will organize a party
        together and based on this example case guide you through the most important functionalities.
    </p>
</div>
<div class="row">
    <hr>
</div>
<div class="row">
    <div class="col-md-12 text-center">
        <button class="btn btn-lg btn-info button-modal-quiz" data-toggle="modal" data-target="#modal-quiz">@lang('custom.Test your Excel skills')</button>
    </div>
</div>
@include('shared.modals.quiz')

<div class="row">
   <hr>
    <p>
        Die verwendeten Beispiele sollen möglichst realitätsnah sein, sich also an dem was Du im Business benötigst orientieren.
        Die Beispiel-Business Cases beinhalten daher Themen wie:
    </p>
   <p>
       Wir werden die Themen inhaltlich nicht bis ins letzte Detail behandeln. Es gibt sicherlich genauere,
       wissenschaftlichere und kompliziertere Techniken und Methoden.
       Wir wollen Dich gezielt in Excel fit machen, anhand von praxis-relevanten Beispielen! Hab Spaß und lerne Excel!
   </p>
</div>

@endsection
