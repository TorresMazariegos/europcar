@extends('layouts.template')
@section('content')

<div class="container">
    <div class="col-md-12">
    
        <div class="offset-md-2 col-md-9 col-xs-12">            
            <div class="row">
                <div class="col-4 div-step1 text-step1">
                    <span class="trebuchet fz23">Step 1</span><span> Su Itinerario</span>
                </div>
                <div class="col-5 col-md-4 div-step2 text-step2">
                    <span class="trebuchet fz23">Step 2</span><span class="description"> Seleccione su Auto</span>
                </div>
                <div class="col-5 col-md-4 div-step3 text-step3">
                    <span class="trebuchet fz23">Step 3</span><span class="description"> Extras Reserva</span>
                </div>
                <!-- <div class="col-md-4 text-step1">
                    <span class="trebuchet fz25">Step 1</span><span> Su Itinerario</span>
                </div>
                <div class="col-md-4 text-white">
                    <span class="trebuchet fz25">Step 2</span><span> Seleccione su Auto</span>
                </div>
                <div class="col-md-4 text-step3">
                    <span class="trebuchet fz25">Step 3</span><span> Extras Reserva</span>
                </div> -->
            </div>
        </div>
        <div class="card offset-md-2 col-md-8 col-xs-12">
            <div class="card-body">                
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="text-primary fz18">Lugar y Fecha de Entrega</h2>
                        <h4 class="text-secondary fz16">{{ $CheckInStationName }}</h4>
                        <h4 class="text-secondary fz16">{{ $CheckInDate }}</h4>
                    </div>
                    <div class="col-md-6">
                        <h2 class="text-primary fz18">Lugar y Fecha de Devolución</h2>
                        <h4 class="text-secondary fz16">{{ $CheckOutStationName }}</h4>
                        <h4 class="text-secondary fz16">{{ $CheckOutDate }}</h4>
                    </div>
                    <div class="col-md-12 text-center mt10">
                        <button class="btn btn-xs btn-degrade-primary">Modificar Itinerario</button>
                    </div>
                </div>
            </div>                        
        </div>

        <div class="col-md-12 mt40 mb20">
            <div class="offset-md-2 col-md-8 col-xs-12" style="padding-left: 0px !important;">
                <h2 class="fz35 text-primary">Seleccione su Auto</h2>
                <h2 class="fz20 text-primary">CATEGORÍAS DE AUTOS:</h2>

                
                <div id="exTab2" class="" style="padding-left: 0px !important;">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a  href="#1" data-toggle="tab" class="btn btn-xs category">Todas</a>
                        </li>
                        <li><a href="#2" data-toggle="tab" class="btn btn-xs category">Económico</a>
                        </li>
                        <li><a href="#3" data-toggle="tab" class="btn btn-xs category">Compactos</a>
                        </li>
                        <li><a href="#4" data-toggle="tab" class="btn btn-xs category">Intermedios</a>
                        </li>
                        <li><a href="#5" data-toggle="tab" class="btn btn-xs category">Familiares</a>
                        </li>
                        <li><a href="#6" data-toggle="tab" class="btn btn-xs category">SVV</a>
                        </li>
                    </ul>

                    <div class="tab-content ">
                        <div class="tab-pane active" id="1">
                            @foreach($data as $car)
                                <div class="card-car">
                                    <div class="row mt10">
                                        <div class="col-md-6 col-xs-12">
                                            <img src="/images/car-image.png" class="img-fluid">
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <span class="title-car">{{ $car->Group->CarModel }}</span><br>
                                            <span class="subtitle">{{ $car->Group->GroupName }} <span>({{ $car->Group->SippCode }})</span></span>
                                            <div class="col-md-12 mb5 features">
                                                <img src="images/pax.png" alt="" class="mr2"><span class="mr5 text-secondary">{{ $car->Features->Pax }}</span>
                                                <img src="images/doors.png" alt="" class="mr2"><span class="mr5 text-secondary">{{ $car->Features->Doors }}</span>
                                                <img src="images/BigLuggage.png" alt="" class="mr2"><span class="mr5 text-secondary">{{ $car->Features->BigLuggage + $car->Features->SmallLuggage }}</span>
                                                @if ($car->Features->AirCondition == true)
                                                    <img src="images/AirCondition.png" alt="" class="mr2"><span class="mr5"></span>
                                                @endif
                                            </div>
                                            <div class="col-md-12 features">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        @if ($car->Features->Automatic == true)
                                                            <img src="images/Automatic.png" alt="" class="mr2"><span class="mr5 text-secondary">Automatico</span><br>
                                                        @else
                                                            <img src="images/manual.png" alt="" class="mr2"><span class="mr5 text-secondary">Manual</span><br>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-6 text-center">
                                                        <span class="text-secondary">Desde:</span><br>
                                                        <span class="text-primary trebuchet fz38">${{ $car->AmountOnHold->Booking }}</span>
                                                    </div>                                                  
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb20 features">
                                                <div class="row">                                                
                                                    <div class="col-md-6 bookday">
                                                        <a href="#" >Precio por día</a>
                                                    </div>
                                                    <div class="col-md-6 text-center">
                                                        <button id="" class="btn btn-xs btn-degrade-primary fz23">Reservar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="tab-pane" id="2">
                            <h3>Economicos</h3>
                        </div>
                        <div class="tab-pane" id="3">
                            <h3>Compactos</h3>
                        </div>
                        <div class="tab-pane" id="4">
                            <h3>Intermedios</h3>
                        </div>
                        <div class="tab-pane" id="5">
                            <h3>Familiares</h3>
                        </div>
                        <div class="tab-pane" id="6">
                            <h3>SVV</h3>
                        </div>
                    </div>
                </div>                
            </div>

            
        </div>
    </div>
</div>

@endsection