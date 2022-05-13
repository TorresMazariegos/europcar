@extends('layouts.template')
@section('content')

<div class="container">
    <div class="offset-md-2 col-md-8">
    <img src="/images/fechaylugar.png" alt="" class="banderilla">    
        <div class="card bg-blue-primary text-white" style="">
            <div class="card-body">                
                
                <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
                <form action="search" method="POST">
                    <!-- <div class="card-title">
                        <h2>Paso 1</h2>
                    </div> -->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                    <input type="hidden" name="SessionId" value="{{ $SessionId }}"></input>
                    <div class="col-md-12 mb20 divFiltro">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h2 class="paso1">Paso 1</h2>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <h2 class="fz18 arialB">OFICINA DE ENTREGA</h2>
                                <div class="row">
                                    <div class="col-md-12 mb20">                                    
                                        <select class="form-control mb5" name="selectStationListIn">
                                            @foreach($stationListIn as $checkIn)
                                                <option value="{{ $checkIn->StationId }}">{{ $checkIn->StationName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control datepicker calendar mb5" value="" name="dateCheckIn">
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control reloj mb5" name="CheckInTime">
                                            <option value="0">00:00</option>
                                            <option value="1">01:00</option>
                                            <option value="2">02:00</option>
                                            <option value="3">03:00</option>
                                            <option value="4">04:00</option>
                                            <option value="5">05:00</option>
                                            <option value="6">06:00</option>
                                            <option value="7">07:00</option>
                                            <option value="8">08:00</option>
                                            <option value="9">09:00</option>
                                            <option value="10" selected="selected">10:00</option>
                                            <option value="11">11:00</option>
                                            <option value="12">12:00</option>
                                            <option value="13">13:00</option>
                                            <option value="14">14:00</option>
                                            <option value="15">15:00</option>
                                            <option value="16">16:00</option>
                                            <option value="17">17:00</option>
                                            <option value="18">18:00</option>
                                            <option value="19">19:00</option>
                                            <option value="20">20:00</option>
                                            <option value="21">21:00</option>
                                            <option value="22">22:00</option>
                                            <option value="23">23:00</option>
                                        </select>
                                    </div>  
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <h2 class="fz18 arialB">OFICINA DE DEVOLUCIÓN</h2>
                                <div class="row">
                                    <div class="col-md-12 mb20">
                                        <select class="form-control mb5" name="selectStationListOut">
                                            @foreach($stationListOut as $checkOut)
                                                <option value="{{ $checkOut->StationId }}">{{ $checkOut->StationName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control datepicker calendar mb5" value="" name="dateCheckOut">
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control reloj mb5" name="CheckOutTime">
                                            <option value="0">00:00</option>
                                            <option value="1">01:00</option>
                                            <option value="2">02:00</option>
                                            <option value="3">03:00</option>
                                            <option value="4">04:00</option>
                                            <option value="5">05:00</option>
                                            <option value="6">06:00</option>
                                            <option value="7">07:00</option>
                                            <option value="8">08:00</option>
                                            <option value="9">09:00</option>
                                            <option value="10" selected="selected">10:00</option>
                                            <option value="11">11:00</option>
                                            <option value="12">12:00</option>
                                            <option value="13">13:00</option>
                                            <option value="14">14:00</option>
                                            <option value="15">15:00</option>
                                            <option value="16">16:00</option>
                                            <option value="17">17:00</option>
                                            <option value="18">18:00</option>
                                            <option value="19">19:00</option>
                                            <option value="20">20:00</option>
                                            <option value="21">21:00</option>
                                            <option value="22">22:00</option>
                                            <option value="23">23:00</option>
                                        </select>
                                    </div>
                                </div>
                            </div>                            
                            <div class="col-md-12">
                            <hr style="border-top: 1px solid rgb(255 255 255); !important"/>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h2 class="fz18 arialB underline">OFICINAS PRINCIPALES</h2>
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <input type="submit" id="btn-continuar" class="btn btn-lg btn-degrade-primary arialB" value="Continuar">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a> -->
            </div>                        
        </div>

        <div class="col-md-12 mt40 bg-gray rent-day text-center">
            <h2 class="trebuchet">Renta desde <span class="fz50 text-primary">$30</span> al día</h2>
        </div>
    </div>
</div>

@endsection