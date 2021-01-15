<x-nav>
    <div>
        <div class="px-3">
            <div class="relative rounded-lg shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <!-- Heroicon name: search -->
                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input type="text" name="email" id="email" class="focus:ring-light-blue-500 focus:border-light-blue-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-lg" placeholder="Find an item...">
            </div>
        </div>
    </div>

    <div>
        <h5 class="px-3 mb-3 lg:mb-3 uppercase tracking-wide font-semibold text-sm lg:text-xs text-gray-900">
            Type
        </h5>

        <ul class="space-y-1">
            <li class="px-3 relative flex items-center">
                <label class="space-x-1 font-medium" for="type_theme">
                    <input type="checkbox" id="type_theme" class="rounded text-light-blue-500 border-gray-300" checked>
                    <span>Themes</span>
                </label>
            </li>
            <li class="px-3 relative flex items-center">
                <label class="space-x-1 font-medium" for="type_extension">
                    <input type="checkbox" id="type_extension" class="rounded text-light-blue-500 border-gray-300" checked>
                    <span>Extensions</span>
                </label>
            </li>
            <li class="px-3 relative flex items-center">
                <label class="space-x-1 font-medium" for="type_rank">
                    <input type="checkbox" id="type_rank" class="rounded text-light-blue-500 border-gray-300" checked>
                    <span>Rank Images</span>
                </label>
            </li>
            <li class="px-3 relative flex items-center">
                <label class="space-x-1 font-medium" for="type_genre">
                    <input type="checkbox" id="type_genre" class="rounded text-light-blue-500 border-gray-300" checked>
                    <span>Genres</span>
                </label>
            </li>
        </ul>
    </div>

    <div>
        <h5 class="px-3 mb-3 lg:mb-3 uppercase tracking-wide font-semibold text-sm lg:text-xs text-gray-900">
            Nova Version
        </h5>
    </div>

    <div>
        <h5 class="px-3 mb-3 lg:mb-3 uppercase tracking-wide font-semibold text-sm lg:text-xs text-gray-900">
            Ratings
        </h5>
    </div>
</x-nav>