@extends('app')
@section('content')
<div class="container">
   <div class="row">
           <div class="panel panel-default">
             <div class="panel-heading"><h3 class="panel-title">Gracias por tu tiempo!</h3></div>
             <div class="panel-body">
               <h4>Tu mensaje ha sido enviado, pronto responderemos a tu solicitud.</h4>
             </div>
             <div class="panel-footer">
                 <a href="{{ route('contact.index') }}" class="btn btn-primary btn-xs">Volver</a>
              </div>
           </div>
   </div>
</div>
@endsection
