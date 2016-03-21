{!! Form::model($form_model, ['method' => $form_method, 'route' => $form_route]) !!}
    {!! Form::hidden('_token', csrf_token()) !!}
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                {!! Form::label('date-start', 'Fecha inicio') !!}
                <div class="input-group date" id="datetimepicker1">
                    {!! Form::text('start', null, ['id' => 'date-start', 'class' => 'form-control', 'readonly']) !!}
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                {!! Form::label('date-end', 'Fecha fin') !!}
                <div class="input-group date" id="datetimepicker1">
                    {!! Form::text('end', null, ['id' => 'date-end', 'class' => 'form-control', 'readonly']) !!}
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                {!! Form::label('size', 'Cantidad') !!}
                {!! Form::text('size', null, ['id' => 'size', 'class' => 'form-control', 'maxlength' => 3]) !!}
            </div>
        </div>
    </div>
    <div>
        {!! Form::button(Lang::get('button.' . action_name()), ['type' => 'submit', 'class' => 'btn btn-large']) !!}
    </div>

    <script type="text/javascript">
        $(function() {
            $("#datetimepicker1, #datetimepicker2").datetimepicker({
                format: "DD/MM/YYYY",
                ignoreReadonly: true,
                minDate: moment(),
                //locale: 'en',                
                useCurrent: false                
            });
            $("#datetimepicker1").on("dp.change", function(e) {
                $('#datetimepicker2').data("DateTimePicker").minDate(e.date);
            });
            $("#datetimepicker2").on("dp.change", function(e) {
                $('#datetimepicker1').data("DateTimePicker").maxDate(e.date);
            });            
        });
    </script>
{!! Form::close() !!} 