<form class="row mt20 mb20" action="{{ route('buy') }}" method="post">

    <?php echo csrf_field(); ?>
    <input type="hidden" name="codigo" value="{{ $data->code }}" />

    <div class="col-md-6">
        <!--<div class="input-group">
            <input type="text" class="form-control text-right" placeholder="Ingrese el código postal" maxlength="8" />
            <span class="input-group-btn">
                <button class="btn btn-default" type="button">Calcular costo de envío</button>
            </span>
        </div>-->
        <div class="alert alert-info alert-shipping-cost">
            El costo de envío será informado a continuación.
        </div>
        <div class="checkbox mt20">
            <label>
                <input type="checkbox" name="pickup" value="1" id="pickup-{{ $data->code }}" onclick="$(this).closest('.row').find('.alert-shipping-cost').toggleClass('hide');" /> 
                Prefiero retirar personalmente (zona Adrogué)
            </label>
        </div>        
         
        @if (strpos($data->code, 'pla-') !== false)
            <div class="checkbox mt20">
                <label>
                    <input type="checkbox" name="interlock" value="300" id="interlock-{{ $data->code }}" /> 
                    Opcional alimentación directa a 220v por cable interlock (${{ config('app.interlock_additional_cost') }})
                </label>
            </div>
        @endif
    </div>
    <div class="col-md-6 text-center">
        <p class="mb20">
            <button type="submit" class="btn btn-lg btn-block btn-primary">
                <span class="glyphicon glyphicon-shopping-cart"></span> Comprar
            </button>
        </p>
        <p>
            <small class="ml20">Procesado por</small> &nbsp;
            <img src="img/logo-mercadopago.png" style="width: 96px;" />
        </p>
    </div>    
</form>

<div class="alert alert-warning">
    <h3>¡Importante!</h3>
    <p>El tiempo de entrega está sujeto a disposición de stock.</p>
</div>