<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizacao de tipos</title>
</head>

<body>

    <x-app-layout>
        <x-slot name="header">
            <h3 class="text-center font-semibold text-gray-800 dark:text-gray-200">
                {{ __('Atualização de tipos') }}
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

            <form action="{{ url('types/update') }}" method="POST">
                @csrf
                <!-- campo oculto passando o ID como parâmetro no request -->
                <input type="hidden" name="id" value="{{ $type['id'] }}">


                <div>
                    <x-input-label for="name" :value="__('Nome')" />
                    <x-text-input class="w-full" type="text" name="name" id="name" value="{{ $type['name'] }}" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a href="{{ url('/types') }}">
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