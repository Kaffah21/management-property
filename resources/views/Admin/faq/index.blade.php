@extends('layouts.admin')

@section('content')
    <div class="container mx-auto p-6">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="bg-gray-100 p-4 flex justify-between items-center">
                <h3 class="text-xl font-semibold">Faq</h3>
                <a href="{{ route('admin.faq.create') }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 flex items-center">
                    <i class="fas fa-plus fs-2 mr-2"></i> Add Faq
                </a>
            </div>
            <div class="p-6">
                @if (session('success'))
                    <div class="bg-green-100 text-green-800 p-4 rounded-md mb-4">{{ session('success') }}</div>
                @endif

                <table class="table-auto w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Question</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Answer</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>



                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($faqs as $index => $faq)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-700">
                                    {{ $index + 1 + ($faqs->currentPage() - 1) * $faqs->perPage() }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ $faq->question }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ $faq->answer }}</td>
                                <td class="px-6 py-4 whitespace-nowrap flex space-x-2">
                                    <a href="{{ route('admin.faq.edit', $faq) }}"
                                        class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 flex items-center"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                        <i class="fas fa-pencil-alt fs-2"></i>
                                    </a>
                                    <form action="{{ route('admin.faq.destroy', $faq) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 flex items-center"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus"
                                            onclick="return confirm('Yakin ingin menghapus?')">
                                            <i class="fas fa-trash fs-2"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


                <div class="mt-4">
                    {{ $faqs->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection
