<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Usuários') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                @if ($message = Session::get('success'))
                <div class="bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 px-4 py-3 shadow-md my-3" role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ $message }}</p>
                        </div>
                    </div>
                </div>
                @endif
                <table class="w-full table-fixed">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 border">Nome</th>
                            <th class="px-4 py-2 border">Email</th>
                            <th class="px-4 py-2 border">Permissão</th>
                            <th class="px-4 py-2 border">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($users))
                            @foreach($users as $row)
                                <tr>
                                    <td class="px-4 py-2 border">{{ $row->name }}</td>
                                    <td class="px-4 py-2 border">{{ $row->email }}</td>
                                    <td class="px-4 py-2 border">
                                        @if ($row->permission == 1)
                                            Acesso permitido a lista
                                        @else
                                            Acesso não permitido a lista
                                        @endif
                                    </td>
                                    @if (Auth::user()->id == 1)
                                        <td class="px-4 py-2 border">
                                            <form action="{{ route('users.destroy', $row->id) }}" method="POST">
                                                <a href="{{ route('users.show', $row->id) }}" class="inline-flex items-center px-4 py-2 mx-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">
                                                    Show
                                                </a>
                                                <a href="{{ route('users.edit', $row->id) }}" class="inline-flex items-center px-4 py-2 mx-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">
                                                    Editar
                                                </a>
                                                @if ($row->id != 1)
                                                @csrf
                                                @method('DELETE')
                                                    <button type="submit" title="delete" class="inline-flex items-center px-4 py-2 mx-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25" onclick="return confirm('Deseja excluir o produto?')">
                                                        Deletar
                                                    </button>
                                                @endif
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        @else
                        <tr>
                            <td class="px-4 py-2 border text-red-500" colspan="3">Usuários não encontrados.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
