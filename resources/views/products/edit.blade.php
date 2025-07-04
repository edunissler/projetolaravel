<x-app-layout>
    <x-slot name="header">
        <h3 class="text-center font-semibold text-gray-800 dark:text-gray-200">
            {{ __('Atualização de produto') }}
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

        <form action="{{ url('products/update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="id" value="{{ $product->id }}">

            <div>
                <x-input-label for="name" :value="__('Nome')" />
                <x-text-input class="w-full" type="text" name="name" value="{{ old('name', $product->name) }}" />
            </div>

            <div>
                <x-input-label for="description" :value="__('Descrição')" />
                <textarea id="description" name="description" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white" rows="5">{{ old('description', $product->description) }}</textarea>
            </div>

            <div>
                <x-input-label for="quantity" :value="__('Quantidade')" />
                <x-text-input class="w-full" type="number" name="quantity" value="{{ old('quantity', $product->quantity) }}" />
            </div>

            <div>
                <x-input-label for="price" :value="__('Preço')" />
                <x-text-input class="w-full" type="number" name="price" step="0.01" value="{{ old('price', $product->price) }}" />
            </div>

            <div>
                <x-input-label for="image" :value="__('Imagem')" />
                <input id="image" name="image" type="file" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white">
            </div>

            <div>
                <x-input-label for="type_id" :value="__('Tipo')" />
                <select id="type_id" name="type_id" class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white">
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ old('type_id', $product->type_id) == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ url('/products') }}">
                    <x-secondary-button>Voltar</x-secondary-button>
                </a>

                <x-primary-button class="ms-4" type="submit">
                    {{ __('Salvar') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>