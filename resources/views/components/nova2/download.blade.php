@props([
    'version',
])

<div x-data="{'version': '{{ $version }}', 'genre': ''}">
    <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
        <a name="download"></a>
        <div class="bg-gradient-to-br from-orange-500 to-amber-500 rounded-2xl shadow-xl overflow-hidden lg:grid lg:grid-cols-2 lg:gap-4">
            <div class="pt-10 pb-12 px-6 sm:pt-16 sm:px-16 lg:py-16 lg:pr-0 xl:py-20 xl:px-20">
                <div class="lg:self-center">
                    <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                        <span class="block">Ready to get started?</span>
                        <span class="block text-orange-900">Download Nova today.</span>
                    </h2>

                    <div class="mt-6 flex flex-col lg:flex-row lg:items-center justify-between space-y-6 lg:space-y-0 lg:space-x-6">
                        <div class="flex-1">
                            <div>
                                <label for="version" class="block text-sm font-medium text-orange-900">Version</label>
                                <select id="version" x-model="version" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-transparent focus:outline-none focus:ring-blue-400 focus:border-blue-400 sm:text-sm rounded-md shadow">
                                    <option value="{{ $version }}">{{ $version }} (Latest)</option>
                                    <option value="2.6.2">2.6.2 (Legacy - PHP 5.6)</option>
                                    <option value="2.3.2">2.3.2 (Legacy - PHP 5.2)</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex-1">
                            <div>
                                <label for="genre" class="block text-sm font-medium text-orange-900">Genre</label>
                                <select id="genre" x-model="genre" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-transparent focus:outline-none focus:ring-blue-400 focus:border-blue-400 sm:text-sm rounded-md shadow">
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

                    <div x-show="version === '2.6.2'" class="mt-8 flex space-x-3 text-white font-medium text-sm leading-6" x-cloak>
                        @svg('plump-s-warning-triangle', 'h-7 w-7 shrink-0 text-amber-300')
                        <span>Nova 2.6.2 is legacy software and intended only for games hosted on a server running PHP 5.3 - 5.6. This version of Nova is no longer receiving updates.</span>
                    </div>

                    <div x-show="version === '2.3.2'" class="mt-8 flex space-x-3 text-white font-medium text-sm leading-6" x-cloak>
                        @svg('plump-s-warning-triangle', 'h-7 w-7 shrink-0 text-amber-300')
                        <span>Nova 2.3.2 is legacy software and intended only for games hosted on a server running PHP 5.2. This version of Nova is no longer receiving updates.</span>
                    </div>

                    <a x-show="genre && version" :href=`/downloads/nova2/nova-${version}-${genre}.zip` class="mt-8 bg-white border border-transparent rounded-lg shadow px-6 py-3 inline-flex items-center justify-center space-x-2 text-base font-medium text-amber-500 hover:bg-amber-50 w-full lg:w-auto transition-colors ease-in-out duration-200" x-cloak>
                        <span>Download now</span>
                        @svg('plump-s-cloud-download', 'h-6 w-6')
                    </a>
                </div>
            </div>
            <div class="-mt-6 aspect-w-5 aspect-h-3 md:aspect-w-2 md:aspect-h-1">
                <img class="translate-x-6 translate-y-6 rounded-xl object-cover object-left-top sm:translate-x-12 lg:translate-y-20" src="/images/nova2-admin.webp" alt="Nova 2 admin screenshot">
            </div>
        </div>
    </div>
</div>