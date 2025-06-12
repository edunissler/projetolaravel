@props(['href', 'message' => 'Tem certeza que deseja excluir?', 'label' => 'Excluir'])

<a href="{{ $href }}" onclick="return confirm('{{ $message }}')">
  <x-danger-button>{{ $label }}</x-danger-button>
</a>