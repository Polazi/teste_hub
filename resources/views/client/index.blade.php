@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <div style="display: flex; align-items: center; justify-content: flex-end">
                    <div style="margin-right: auto">
                      Clientes
                    </div>
                      <div style="margin-right: 20px">
                        <a class="btn btn-info" href="{{url('client/create')}}">Cadastrar Novo Cliente</a>
                      </div>
                      <div>
                        {!! Form::open(['url' => route('client.index'), 'method' => 'GET']) !!}
                          {!! Form::submit('Exportar Xls', ['class' => 'btn btn-info', 'name' => 'export']) !!}
                        {!! Form::close() !!}
                      </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-vcenter">
                        <th>Nome</th>
                        <th>Endereço de instalação</th>
                        <th>Velocidade</th>
                        <th></th>
                        <tbody>
                            @foreach($clients as $client)
                            <tr>
                                <td>{{ $client->name }}</td>
                                <td>{{ $client->instalation_address }}</td>
                                <td>{{ $client->speed }}</td>
                                <td style="text-align: right">
                                
                                  <a href="client/{{ $client->id }}/edit" class="btn btn-info">Editar</a>

                                  <button onclick="return confirmaDelete('{{ $client->id }}')" type="submit" id="deleteBn" class="btn btn-danger">Excluir</button>
                                  <form id="formDelete.{{$client->id}}" method="POST" action="{{ route('client.destroy', ['client' => $client->id]) }}" style="display: inline">
                                    @method('delete')
                                    @csrf
                                  </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination">
                      {{ $clients->onEachSide(2)->links() }}
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('post-script')
  <script>
    function confirmaDelete(id)
    {
      return Swal.fire({
      title: 'Tem ceteza?',
      text: "Deseja remover o usuário",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sim, Tenho certeza!',
      cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.value) {
          const form = document.getElementById(`formDelete.${id}`)
          form.submit()
        }
      })
    }
  </script>
@endsection