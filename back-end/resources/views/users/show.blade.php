<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes do usuário') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <a href="{{ route('users.index') }}"
                    class="inline-flex items-center px-4 py-2 mx-2 mb-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">
                    <- Voltar
                </a>
                <table class="w-full table-fixed">
                    <tbody>
                        <tr>
                            <td class="px-4 py-2 font-bold">Nome</td>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 font-bold">Email</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 font-bold">Permissão</td>
                            <td>
                                @if ($user->permission == 1)
                                    Acesso permitido a lista
                                @else
                                    Acesso não permitido a lista
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 font-bold">Criado em</td>
                            <td>{{ date_format($user->created_at, 'jS F Y g:i A') }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-2 font-bold">Última atualização</td>
                            <td>{{ date_format($user->updated_at, 'jS F Y g:i A') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
