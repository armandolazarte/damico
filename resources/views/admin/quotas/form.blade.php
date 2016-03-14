{!! Form::model($model, ['method' => 'post', 'route' => 'admin.quotas.store']) !!}
    {{ var_dump($model) }}
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
                //locale: "en",
                useCurrent: false,
                ignoreReadonly: true,
                minDate: moment(),
            });
        });
    </script>        
{!! Form::close() !!} 