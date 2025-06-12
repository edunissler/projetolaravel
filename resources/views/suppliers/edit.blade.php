<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar fornecedor</title>
</head>

<body>

  <x-app-layout>
    <x-slot name="header">
      <h3 class="text-center font-semibold text-gray-800 dark:text-gray-200">
        {{ __('Atualização de fornecedor') }}
      </h3>
    </x-slot>

    <br>

    <div class="max-w-xl mx-auto bg-white dark:bg-gray-800 p-6 rounded-md shadow">

      @if ($errors->any())
      <ul>
      @foreach ($errors->all() as $error)
      <x-input-error :messages="$error" class="mt-2" />
    @endforeach
      </ul>
    @endif
      <br>

      <form action="{{ url('suppliers/update') }}" method="POST">
        @csrf
        <!-- campo oculto com o ID -->
        <input type="hidden" name="id" value="{{ $supplier['id'] }}">

        <div>
          <x-input-label for="tipo" :value="__('Tipo')" />
          <select id="tipo" name="tipo" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white">
            <option value="F" {{ $supplier['tipo'] == 'F' ? 'selected' : '' }}>Pessoa Física</option>
            <option value="J" {{ $supplier['tipo'] == 'J' ? 'selected' : '' }}>Pessoa Jurídica</option>
          </select>
        </div>

        <div>
          <x-input-label for="nome_razao" :value="__('Nome/Razão Social')" />
          <x-text-input class="w-full" type="text" name="nome_razao" id="nome_razao" value="{{ $supplier['nome_razao'] }}" />
        </div>

        <div>
          <x-input-label for="cpf_cnpj" :value="__('CPF/CNPJ')" />
          <x-text-input class="w-full" type="text" name="cpf_cnpj" id="cpf_cnpj" value="{{ $supplier['cpf_cnpj'] }}" />
        </div>

        <div>
          <x-input-label for="telefone" :value="__('Telefone')" />
          <x-text-input class="w-full" type="text" name="telefone" id="telefone" value="{{ $supplier['telefone'] }}" />
        </div>

        <div class="flex items-center justify-end mt-4">
          <a href="{{ url('/suppliers') }}">
            <x-secondary-button>Voltar</x-secondary-button>
          </a>

          <x-primary-button class="ms-4" type="submit">
            {{ __('Salvar') }}
          </x-primary-button>
        </div>
      </form>
    </div>
  </x-app-layout>


</body>

</html>