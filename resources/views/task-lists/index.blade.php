<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('My Task Lists') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Create New Task List Form -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <form action="{{ route('task-lists.store') }}" method="POST">
                        @csrf
                        <div class="space-y-4">
                            <div>
                                <x-input-label for="title" value="New Task List" class="dark:text-gray-300" />
                                <x-text-input 
                                    id="title" 
                                    name="title" 
                                    type="text" 
                                    class="mt-1 block w-full dark:bg-gray-700 dark:text-gray-300" 
                                    required 
                                />
                            </div>
                            <div>
                                <x-primary-button class="w-full justify-center">
                                    Create List
                                </x-primary-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Task Lists -->
            <div class="space-y-4">
                @foreach($taskLists as $list)
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <a href="{{ route('task-lists.show', $list) }}" 
                               class="text-xl font-bold text-gray-800 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400">
                                {{ $list->title }}
                            </a>
                            <div class="mt-4">
                                <div class="text-sm text-gray-600 dark:text-gray-400">
                                    {{ $list->completed_tasks_count }} / {{ $list->tasks_count }} tasks completed
                                </div>
                                <div class="mt-2 w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                                    <div class="bg-blue-600 h-2.5 rounded-full" 
                                         style="width: {{ $list->progressPercentage() }}%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout> 