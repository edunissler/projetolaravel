<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de tipos</title>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h3 class="font-semibold text-gray-800 dark:text-gray-200">
                {{ __('Lista de Tipos') }}
            </h3>
        </x-slot>

        <div class="py-4 px-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

                {{-- Ações principais --}}
                <div class="flex justify-between items-center">
                    {{-- Botão Voltar --}}
                    <a href="{{ url('/') }}">
                        <x-secondary-button>Voltar</x-secondary-button>
                    </a>

                    {{-- Botão Adicionar --}}
                    <a href="{{ url('/types/new') }}">
                        <x-primary-button>Adicionar</x-primary-button>
                    </a>
                </div>

                {{-- Mensagens de status --}}
                @if (session('status'))
                    <div class="p-4 bg-green-100 dark:bg-green-800 text-green-800 dark:text-green-100 rounded">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($message = Session::get('error'))
                    <div class="p-4 bg-red-100 dark:bg-red-800 text-red-800 dark:text-red-100 rounded">
                        {{ $message }}
                    </div>
                @endif

                {{-- Tabela de tipos --}}
                <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <table class="w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Nome
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Ações
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($types as $type)
                                <tr>
                                    <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100">
                                        {{ $type->name }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-100 space-x-2">
                                        <a href="{{ url('/types/update', ['id' => $type->id]) }}">
                                            <x-primary-button class="bg-indigo-600 hover:bg-indigo-700">Editar</x-primary-button>
                                        </a>

                                        <x-confirm-button :href="url('/types/delete', ['id' => $type->id])" message="Deseja excluir este tipo?" />

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </x-app-layout>


</body>

</html>