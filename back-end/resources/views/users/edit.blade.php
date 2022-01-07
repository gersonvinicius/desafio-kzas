<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Editar usuário') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="px-4 py-4 overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <a href="{{ route('users.index') }}"
                    class="inline-flex items-center px-4 py-2 mx-2 mb-4 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">
                    <- Voltar
                </a>
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                <div class="mb-4">
                    <label for="textname"
                        class="block mb-2 text-sm font-bold text-gray-700">Nome</label>
                    <input type="text"
                        class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                        name="name"
                        value="{{ $user->name }}"
                        placeholder="Enter name" @if($user->isAdmin =! 1) disabled @endif>
                    @error('name') <span class="text-red-500">{{ $message }}
                    </span>@enderror
                </div>
                <div class="mb-4">
                    <label for="permission" class="block mb-2 text-sm font-bold text-gray-700">
                        <input type="hidden" name="permission" value="0">
                        <input type="checkbox" class=" px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" name="permission" value="1"
                        @if($user->permission == 1) checked @endif @if($user->isAdmin == 1) disabled @endif>
                        Permissão para acessar lista
                    </label>
                    @error('name') <span class="text-red-500">{{ $message }}
                    </span>@enderror
                </div>
                <div>
                    <button type="submit"
                    class="inline-flex items-center px-4 py-2 my-3 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">
                        Atualizar
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
