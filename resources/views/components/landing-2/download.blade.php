@props([
    'version',
])

<div class="bg-white" x-data="{'version': '{{ $version }}', 'genre': ''}">
    <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
        <a name="download"></a>
        <div class="bg-light-blue-700 rounded-lg shadow-xl overflow-hidden lg:grid lg:grid-cols-2 lg:gap-4">
            <div class="pt-10 pb-12 px-6 sm:pt-16 sm:px-16 lg:py-16 lg:pr-0 xl:py-20 xl:px-20">
                <div class="lg:self-center">
                    <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                        <span class="block">Ready to get started?</span>
                        <span class="block text-light-blue-300">Download Nova today.</span>
                    </h2>

                    <div class="mt-6 flex items-center justify-between space-x-6">
                        <div class="flex-1">
                            <div>
                                <label for="version" class="block text-sm font-medium text-light-blue-200">Version</label>
                                <select id="version" x-model="version" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-transparent focus:outline-none focus:ring-light-blue-500 focus:border-light-blue-500 sm:text-sm rounded-md shadow-sm">
                                    <option value="{{ $version }}">{{ $version }} (Latest)</option>
                                    <option value="2.3.2">2.3.2 (Legacy)</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex-1">
                            <div>
                                <label for="genre" class="block text-sm font-medium text-light-blue-200">Genre</label>
                                <select id="genre" x-model="genre" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-transparent focus:outline-none focus:ring-light-blue-500 focus:border-light-blue-500 sm:text-sm rounded-md shadow-sm">
                                    <option value="">Select a genre</option>
                                    <option value="bl5">Babylon 5</option>
                                    <option value="blk">Blank</option>
                                    <option value="bsg">Battlestar Galactica</option>
                                    <option value="dnd">Dungeons and Dragons</option>
                                    <option value="dsv">seaQuest DSV</option>
                                    <option value="sga">Stargate Atlantis</option>
                                    <option value="sg1">Stargate SG-1</option>
                                    <option value="baj">Bajorans (Star Trek)</option>
                                    <option value="crd">Cardassians (Star Trek)</option>
                                    <option value="ds9">Deep Space Nine (Star Trek)</option>
                                    <option value="ent">Enterprise era (Star Trek)</option>
                                    <option value="kli">Klingons (Star Trek)</option>
                                    <option value="mov">Movie era (Star Trek)</option>
                                    <option value="rom">Romulans (Star Trek)</option>
                                    <option value="tos">The Original Series (Star Trek)</option>
                                    <option value="sto">Star Trek Online</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div x-show="version === '2.3.2'" class="mt-8 flex space-x-3 text-white font-medium text-sm leading-6">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-7 w-7 flex-shrink-0 text-amber-400"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                        <span>Nova 2.3.2 is legacy software and intended only for games hosted on a server running PHP 5.2. This version of Nova is no longer receiving updates.</span>
                    </div>

                    <a x-show="genre && version" :href=`/downloads/nova2/nova-${version}-${genre}.zip` class="mt-8 bg-white border border-transparent rounded-md shadow px-6 py-3 inline-flex items-center space-x-3 text-base font-medium text-light-blue-600 hover:bg-light-blue-50">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" /></svg>
                        <span>Download now</span>
                    </a>
                </div>
            </div>
            <div class="-mt-6 aspect-w-5 aspect-h-3 md:aspect-w-2 md:aspect-h-1">
                <img class="transform translate-x-6 translate-y-6 rounded-md object-cover object-left-top sm:translate-x-12 lg:translate-y-20" src="{{ asset('images/nova2-admin.png') }}" alt="App screenshot">
            </div>
        </div>
    </div>
</div>