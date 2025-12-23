@extends('layouts.admin')

@section('title', 'Manage Sliders')

@section('content')
<div>
    <div class="mb-6 flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Manage Sliders</h1>
            <p class="text-gray-600 mt-2">Manage home page slider images and content</p>
        </div>
        <a href="{{ route('admin.sliders.create') }}" class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-6 py-3 rounded-lg font-semibold shadow-lg transition flex items-center gap-2">
            <i class="fas fa-plus"></i> Add New Slider
        </a>
    </div>

    @if(session('success'))
    <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg flex items-center">
        <i class="fas fa-check-circle mr-2"></i>
        {{ session('success') }}
    </div>
    @endif

    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Image</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Description</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Order</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-right text-xs font-bold text-gray-700 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($sliders as $slider)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <img src="{{ $slider->image_url }}" alt="{{ $slider->title }}" class="w-32 h-20 object-cover rounded-lg shadow-md">
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm font-bold text-gray-900">{{ $slider->title }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-700 max-w-xs truncate">{{ $slider->description }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1.5 text-xs font-semibold rounded-lg bg-blue-100 text-blue-800">{{ $slider->order }}</span>
                        </td>
                        <td class="px-6 py-4">
                            @if($slider->is_active)
                            <span class="px-3 py-1.5 text-xs font-bold rounded-lg bg-gradient-to-r from-green-100 to-emerald-100 text-green-800 border border-green-200 flex items-center gap-1 w-fit">
                                <i class="fas fa-check-circle"></i> Active
                            </span>
                            @else
                            <span class="px-3 py-1.5 text-xs font-bold rounded-lg bg-gradient-to-r from-red-100 to-pink-100 text-red-800 border border-red-200 flex items-center gap-1 w-fit">
                                <i class="fas fa-times-circle"></i> Inactive
                            </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.sliders.edit', $slider->id) }}" class="px-3 py-1.5 bg-blue-100 text-blue-700 hover:bg-blue-200 rounded-lg transition-colors duration-200 flex items-center gap-1 text-xs font-semibold">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.sliders.destroy', $slider->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this slider?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1.5 bg-red-100 text-red-700 hover:bg-red-200 rounded-lg transition-colors duration-200 flex items-center gap-1 text-xs font-semibold">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                            <i class="fas fa-image text-gray-300 text-6xl mb-4"></i>
                            <p class="text-lg">No sliders found. Create your first slider!</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

