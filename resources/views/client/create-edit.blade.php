@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <div style="display: flex; align-items: center; justify-content: space-between">
                    <div> Clientes </div>
                    <div>
                      <a class="btn btn-info" href="{{url('client')}}">Listar Clientes</a>
                    </div> 
                  </div>
                </div>

                <div class="card-body">
                    {!! Form::model($client, ['url' => $action, 'method' => $method]) !!}

                    <div class="contact-form">
                        <div class="form-group form-row">
                            <div class="col-sm-12">
                              {!! Form::label('name', 'Nome') !!}
                              {!! Form::text('name', $client->name, ['id' => 'name', 'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : null), 'placeholder' => 'Nome']) !!}

                              @error('name')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                            </div>
                        </div>

                        <div class="form-group form-row">
                            <div class="col-sm-12 col-md-6 col-sm-6">
                              {!! Form::label('instalation_address', 'Endereço de instalação') !!}
                              {!! Form::text('instalation_address', $client->instalation_address, ['id' => 'instalation_address', 'class' => 'form-control' . ($errors->has('instalation_address') ? ' is-invalid' : null), 'placeholder' => 'Endereço de instalação']) !!}

                              @error('instalation_address')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                            </div>

                            <div class="col-sm-12 col-md-6 col-sm-6">
                              {!! Form::label('galc', 'Galc') !!}
                              {!! Form::text('galc', $client->galc, ['id' => 'galc', 'class' => 'form-control' . ($errors->has('galc') ? ' is-invalid' : null), 'placeholder' => 'Galc']) !!}

                              @error('galc')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                          </div>
                        </div>

                        <div class="form-group form-row">
                          <div class="col-sm-12 col-md-6 col-sm-6">
                            {!! Form::label('port', 'Porta') !!}
                            {!! Form::number('port', $client->port, ['id' => 'port', 'class' => 'form-control' . ($errors->has('port') ? ' is-invalid' : null), 'placeholder' => 'Porta']) !!}

                            @error('port')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>

                          <div class="col-sm-12 col-md-6 col-sm-6">
                            {!! Form::label('speed', 'Velocidade') !!}
                            {!! Form::number('speed', $client->speed, ['id' => 'speed', 'class' => 'form-control' . ($errors->has('speed') ? ' is-invalid' : null), 'placeholder' => 'Velocidade']) !!}

                            @error('speed')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                        </div>
                      </div>
                        
                        <div class="form-group form-row">
                          <div class="col-sm-offset-2 col-sm-10">
                            {!! Form::submit('Salvar', ['class' => 'btn btn-success']) !!}
                          </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
