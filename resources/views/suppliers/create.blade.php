<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fornecedores</title>
</head>

<body>

  <x-app-layout>
    <x-slot name="header">
      <h3 class="text-center font-semibold text-gray-800 dark:text-gray-200 ">
        {{ __('Manutenção de Fornecedores') }}
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

      <form action="{{ url('suppliers/new') }}" method="POST">
        @csrf
        <div>
          <x-input-label for="tipo" :value="__('Tipo')" />
          <select name="tipo" id="type" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white">
            <option value="">Selecione o tipo</option>
            <option value="F" {{ old('tipo') == 'F' ? 'selected' : '' }}>Pessoa Física</option>
            <option value="J" {{ old('tipo') == 'J' ? 'selected' : '' }}>Pessoa Jurídica</option>
          </select>

        </div>

        <div>
          <x-input-label for="nome_razao" :value="__('Nome')" />
          <textarea id="nome_razao" name="nome_razao" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white" rows="2"></textarea>
        </div>

        <div>
          <x-input-label for="cpf_cnpj" :value="__('CPF/CNPJ')" />
          <x-text-input class="w-full" name="cpf_cnpj" />
        </div>

        <div>
          <x-input-label for="telefone" :value="__('Telefone')" />
          <x-text-input class="w-full" name="telefone" />
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