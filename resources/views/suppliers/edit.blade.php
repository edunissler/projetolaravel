<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar fornecedor</title>
</head>

<body>

  <form action="{{ url('suppliers/update') }}" method="POST">
    @csrf
    <!-- campo oculto passando o ID como parâmetro no request -->
    <input type="hidden" name="id" value="{{ $supplier['id'] }}">

    <label>Tipo:</label><br>
    <select name="tipo" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white">
      <option value="F" {{ $supplier['tipo'] == 'F' ? 'selected' : '' }}>Pessoa Física</option>
      <option value="J" {{ $supplier['tipo'] == 'J' ? 'selected' : '' }}>Pessoa Jurídica</option>
    </select>
    <br>

    <label>Nome:</label><br>
    <input name="nome_razao" type="text" value="{{ $supplier['nome_razao'] }}" /><br>

    <label>CPF/CNPJ:</label><br>
    <input name="cpf_cnpj" type="text" value="{{ $supplier['cpf_cnpj'] }}" /><br>

    <label>Quantidade:</label><br>
    <input name="telefone" type="number" value="{{ $supplier['telefone'] }}" /><br>

    <input type="submit" value="Salvar" />
  </form>

</body>

</html>