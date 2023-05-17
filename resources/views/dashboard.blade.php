<x-app-layout>>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('CRUD->Empresa') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-center"> <strong><u>Lista Empresa</u></strong> </h1>
                    <br>
                    <table class="border-collapse border-100 border-blue-200 text-black bg-blue-100 w-full mt-4">
                        <thead>
                            <tr>
                                <th class="border border-gray-400 text-black bg-yellow-100 px-4 py-2">Nome</th>
                                <th class="border border-gray-400 text-black bg-yellow-100 px-4 py-2">Ramo</th>
                                <th class="border border-gray-400 text-black bg-yellow-100 px-4 py-2">Endereço</th>
                                <th class="border border-gray-400 text-black bg-yellow-100 px-4 py-2">Telefone</th>
                                <th class="border border-gray-400 text-black bg-yellow-100 px-4 py-2">CNPJ</th>
                                <th class="border border-gray-400 text-black bg-yellow-100 px-4 py-2">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Auth::user()->myTasks as $task)
                                <tr class="hover:bg-gray-300">
                                    <td class="border border-gray-400 px-4 py-2">{{ $task->nome }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $task->ramo }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $task->endereco }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $task->telefone }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $task->cnpj }}</td>
                                    <td class="border border-gray-400 px-4 py-2">
                                        <div x-data="{ showDelete: false, showEdit: false }">
                                            <div class="flex gap-2">
                                                <div x-show="!showDelete">
                                                    <x-danger-button @click="showDelete = true">Apagar</x-danger-button>
                                                </div>
                                                <div x-show="!showEdit">
                                                    <x-primary-button @click="showEdit = true">Editar</x-primary-button>
                                                </div>
                                                <template x-if="showEdit">
                                                    <div
                                                        class="fixed top-0 left-0 w-screen h-screen flex items-center justify-center bg-gray-900 bg-opacity-50">
                                                        <div class="bg-gray-400 p-6 rounded-lg">
                                                            <form action="{{ route('task.update', $task) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <x-text-input name="nome" placeholder="Nome"
                                                                    value="{{ $task->nome }}" />
                                                                <x-text-input name="ramo" placeholder="Ramo"
                                                                    value="{{ $task->ramo }}" />
                                                                <x-text-input name="endereco" placeholder="Endereco"
                                                                    value="{{ $task->endereco }}" />
                                                                <x-text-input name="telefone" placeholder="Telefone"
                                                                    value="{{ $task->telefone }}" />
                                                                <x-text-input name="cnpj" placeholder="CNPJ"
                                                                    value="{{ $task->cnpj }}" />
                                                                <x-primary-button>Confirmar Edição</x-primary-button>
                                                            </form>
                                                            <x-primary-button @click="showEdit = false">Cancelar
                                                            </x-primary-button>
                                                        </div>
                                                    </div>
                                                </template>
                                                <template x-if="showDelete">
                                                    <div
                                                        class="fixed top-0 left-0 w-screen h-screen flex items-center justify-center bg-gray-900 bg-opacity-50">
                                                        <div class="bg-gray-400 p-6 rounded-lg">
                                                            <form action="{{ route('task.destroy', $task) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <x-danger-button>Confirmar</x-danger-button>
                                                            </form>
                                                            <x-primary-button @click="showDelete = false">Cancelar
                                                            </x-primary-button>
                                                        </div>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    <br>
                    <div class="bg-purple-950 p-6 rounded-lg text-black">
                        <form action="{{ route('task.store') }}" method="POST">
                            @csrf
                            <h2 class="text-center text-white"><strong><u>Formulário Cadastro</u></strong></h2>
                            <div class="mt-4 flex justify-center">
                                <x-text-input name="nome" placeholder="Nome" class="w-60" />
                            </div>
                            <div class="mt-4 flex justify-center">
                                <select name="ramo" class="border border-gray-300 rounded-md w-60 h-10">
                                    <option value="Comercio">Comercio</option>
                                    <option value="Industria">Industria</option>
                                    <option value="Servicos">Servicos</option>
                                </select>
                            </div>
                            <div class="mt-4 flex justify-center">
                                <x-text-input name="endereco" placeholder="Endereco" class="w-60" />
                            </div>
                            <div class="mt-4 flex justify-center">
                                <x-text-input name="telefone" placeholder="Telefone" class="w-60" />
                            </div>
                            <div class="mt-4 flex justify-center">
                                <x-text-input name="cnpj" placeholder="CNPJ" class="w-60" />
                            </div>
                            <div class="mt-4 flex justify-center">
                                <x-primary-button class="bg-green-500">Save</x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
