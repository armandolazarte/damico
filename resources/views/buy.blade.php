<form class="row mt20 mb20" action="{{ route('buy') }}">

    <input type="hidden" name="titulo" value="{{ $data->title }}" />
    <input type="hidden" name="precio_unitario" value="{{ $data->unit_price }}" />
    <input type="hidden" name="dimensiones" value="{{ $data->dimensions }}" />
    <input type="hidden" name="nombre_img" value="{{ $data->picture_name }}" />

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
    <div class="col-md-6">
        <!--<div class="input-group">
            <input type="text" class="form-control text-right" placeholder="Ingrese el código postal" maxlength="8" />
            <span class="input-group-btn">
                <button class="btn btn-default" type="button">Calcular costo de envío</button>
            </span>
        </div>-->
        <div class="alert alert-warning alert-shipping-cost">
            El costo de envío será informado a continuación.
        </div>
        <p class="mt20">
            <input type="checkbox" name="sarasa" value="1" id="coco" onclick="$(this).closest('.row').find('.alert-shipping-cost').toggleClass('hide');" /> 
            <label for="coco">Prefiero retirar personalmente</label>
        </p>
    </div>
</form>