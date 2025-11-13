@extends('layouts.app')

@section('content')
<div class="px-4 py-8">
    <div class="flex justify-between items-end mb-8">
        <div>
            <p class="text-[#353535] font-semibold text-[40px]">Hello, Jayyid</p>
            <p class="text-gray-600">This is your cafe food stock in this day</p>
        </div>
    
        <div class="relative">
            <div class="flex items-center py-4 rounded-3xl bg-white border border-gray-300 hover:border-gray-400 transition duration-200 pr-16 pl-12">
                <i class="fas fa-search text-gray-500 absolute left-4"></i>
                <input 
                    type="text" 
                    placeholder="Search products..." 
                    class="bg-transparent border-none outline-none text-gray-600 placeholder-gray-400 w-full"
                >
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Main Content Layout -->
    <div class="flex flex-col lg:flex-row gap-4">
        <!-- Stats Cards di Kiri -->
        <div class="lg:w-80 flex flex-col gap-4">
        <div class="bg-white border border-gray-200 rounded-3xl p-5 text-center flex flex-col justify-center h-full">
            <h3 class="text-3xl font-semibold text-gray-700">All Product</h3>
            <p class="text-[64px] font-medium text-[#F9744B]">{{ $totalProducts }}</p>
        </div>
        <div class="bg-white border border-gray-200 rounded-3xl p-5 text-center flex flex-col justify-center h-full">
            <h3 class="text-3xl font-semibold text-gray-700">Empty Product</h3>
            <p class="text-[64px] font-medium text-[#F9744B]">{{ $emptyProducts }}</p>
        </div>
        <div class="bg-white border border-gray-200 rounded-3xl p-5 text-center flex flex-col justify-center h-full">
            <h3 class="text-3xl font-semibold text-gray-700">Need Restock</h3>
            <p class="text-[64px] font-medium text-[#F9744B]">{{ $needRestock }}</p>
        </div>
    </div>

        <div class="flex-1">
            <div class="bg-white border border-gray-200 rounded-3xl overflow-hidden">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold text-gray-800">Featured Product</h3>
                        <a href="{{ route('products.create') }}" class="flex items-center gap-[17px] px-6 py-4 rounded-[32px] bg-[#F9744B] text-white hover:bg-[#e8653a] transition duration-200 text-base font-medium">
                            <i class='fa-regular fa-plus'></i>
                            Add Product
                        </a>
                    </div>

                    <!-- Tabel dengan border dan rounded -->
                    <div class="overflow-x-auto border border-gray-200 rounded-2xl">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-base font-medium text-gray-500 uppercase tracking-wider border-b border-gray-200 first:rounded-tl-2xl">Product Name</th>
                                    <th class="px-6 py-3 text-left text-base font-medium text-gray-500 uppercase tracking-wider border-b border-gray-200">Category</th>
                                    <th class="px-6 py-3 text-left text-base font-medium text-gray-500 uppercase tracking-wider border-b border-gray-200">Price</th>
                                    <th class="px-6 py-3 text-left text-base font-medium text-gray-500 uppercase tracking-wider border-b border-gray-200">Amount</th>
                                    <th class="px-6 py-3 text-left text-base font-medium text-gray-500 uppercase tracking-wider border-b border-gray-200 last:rounded-tr-2xl">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($featuredProducts as $product)
                                <tr class="last:border-b-0">
                                    <td class="px-6 py-4 whitespace-nowrap text-base font-medium text-gray-900 border-b border-gray-200">{{ $product->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-base text-gray-500 border-b border-gray-200">{{ $product->category }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-base text-gray-500 border-b border-gray-200">${{ number_format($product->price, 2) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-base text-gray-500 border-b border-gray-200">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium 
                                            {{ $product->amount == 0 ? 'bg-red-100 text-red-800' : 
                                               ($product->amount < 10 ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800') }}">
                                            {{ $product->amount }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-base font-medium border-b border-gray-200 last:border-b-0">
                                        <div class="flex gap-4 w-full">
                                            <!-- Edit Button -->
                                            <a href="{{ route('products.edit', $product->id) }}" class="flex items-center justify-center gap-1 px-4 py-2 rounded-[24px] bg-[#196BE6] text-white hover:bg-[#155bc7] transition duration-200 text-base font-medium flex-1 min-w-0">
                                                Edit
                                            </a>
                                            
                                            <!-- Delete Button -->
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline flex-1 min-w-0" onsubmit="return confirmDelete()">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="flex items-center justify-center gap-1 w-full px-4 py-2 rounded-[24px] bg-[#E63838] text-white hover:bg-[#d32f2f] transition duration-200 text-base font-medium">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-base text-gray-500 border-b border-gray-200 last:border-b-0 last:rounded-b-2xl">No products found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-6">
                        {{ $featuredProducts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection