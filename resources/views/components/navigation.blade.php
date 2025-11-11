<nav class="bg-none w-full">
    <div class="w-full px-4">
        <div class="flex justify-between items-center py-4">
            <div class="flex items-center space-x-4 bg-white px-6 py-4 rounded-[56px]">
                <div><img src="../assets/images/logo.png" alt=""></div>
                <div class="text-lg font-bold text-gray-800">kofiah</div>
            </div>
            
            <div class="hidden md:flex">
                <a href="{{ route('dashboard') }}" class="text-[#353535] bg-white hover:bg-[#353535] hover:text-white font-medium px-6 py-4 rounded-[56px]">Inventory</a>
                <a href="#" class="text-[#353535]  bg-white hover:bg-[#353535] hover:text-white font-medium px-6 py-4 rounded-[56px]">Stock</a>
                <a href="#" class="text-[#353535]  bg-white hover:bg-[#353535] hover:text-white font-medium px-6 py-4 rounded-[56px]">Order</a>
                <a href="#" class="text-[#353535]  bg-white hover:bg-[#353535] hover:text-white font-medium px-6 py-4 rounded-[56px]">Employee</a>
            </div>

            <div class="hidden md:flex space-x-8">
                <div class="flex items-center font-medium px-6 py-4 rounded-[56px] bg-white gap-x-2">
                    <i class="fa-regular fa-calendar"></i>
                    1 January 2025
                </div>

                <div class="flex items-center">
                    <div class="px-6 py-4 rounded-[56px] bg-white">
                        <i class="fa fa-gear"></i>
                    </div>
                    <div class="px-6 py-4 rounded-[56px] bg-white">
                        <i class="fa-regular fa-bell"></i>
                    </div>
                </div>

                <div class=" rounded-[56px] bg-white">
                    <img src="../assets/images/profile.png" alt="">
                </div>
            </div>
        </div>
    </div>
</nav>