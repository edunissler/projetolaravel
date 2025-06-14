<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tela Inicial</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    <header class="bg-white shadow p-4 flex items-center justify-between">
        <!-- Logo e nome -->
        <div class="flex items-center gap-2">
            <div class="w-10 h-10 bg-gray-300"></div>
            <span class="text-lg font-semibold">Logotipo e nome da Empresa</span>
        </div>

        <!-- Botões login/register -->
        <div class="space-x-2">
            <a href="{{ route('login') }}">
                <button class="px-4 py-1 border border-gray-400 rounded">{{ __('Login') }}
                </button>
            </a>
            <a href="{{ route('register') }}">
                <button class="px-4 py-1 border border-gray-400 rounded"> {{ __('Register') }}</button>
            </a>
        </div>
    </header>

    <!-- Filtros -->
    <nav class="bg-gray-50 p-4 flex justify-center space-x-4">
        <a href="{{ url('/') }}" class="px-4 py-2 border rounded {{ empty($selectedType) ? 'bg-gray-200' : '' }}">
            Todos
        </a>
        @foreach ($types as $type)
            <a href="{{ url('/?type=' . $type->id) }}" class="px-4 py-2 border rounded {{ $selectedType == $type->id ? 'bg-gray-200' : '' }}">
                {{ $type->name }}
            </a>
        @endforeach
    </nav>


    <!-- Lista de produtos -->
    <main class="p-6">
        <div class="text-center mb-6">
            <button class="px-6 py-2 bg-gray-200 rounded">Lista de produtos</button>
        </div>

        <!-- Grade de produtos -->
        <section class="grid grid-cols-3 gap-4 mb-6">
            @foreach($products as $product)
                <div class="border rounded overflow-hidden bg-white shadow p-4 flex flex-col items-center">
                    <div class="aspect-square w-full mb-2">
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover rounded">
                        @else
                            <span class="text-gray-400 flex items-center justify-center h-full">Sem imagem</span>
                        @endif
                    </div>
                    <h3 class="text-lg font-semibold mb-1">{{ $product->name }}</h3>
                    <p class="text-gray-700 mb-1">Preço: R$ {{ number_format($product->price, 2, ',', '.') }}</p>
                    <p class="text-gray-600">Qtd: {{ $product->quantity }}</p>
                </div>
            @endforeach
        </section>
    </main>

</body>

</html>