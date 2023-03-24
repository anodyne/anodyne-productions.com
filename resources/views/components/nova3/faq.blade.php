@php
  $faqs = [
    [
      'question' => 'When will Nova 3 be released?',
      'answer' => "There is no timeframe right now. Our goal is to continue building Nova 3 until we feel that it's rock solid and ready for use with a wide range of games.",
    ],
    [
      'question' => 'Will I be able to use my existing themes and extensions in Nova 3?',
      'answer' => "No. The format for themes and extensions in Nova 3 is completely different from Nova 2. All add-ons for Nova 3 will have to be re-written from scratch.",
    ],
    [
      'question' => 'Where can I download Nova 3?',
      'answer' => "At the moment, we do not offer a download of the work that's been done on Nova 3. People who support Anodyne through our Patreon are given early access to a downloadable copy of Nova 3 that is updated regularly as an exclusive benefit of their support. The wider community will be given access to alpha and beta milestones in the future.",
    ],
    [
      'question' => "I've heard the term Nova NextGen used a lot. Is Nova 3 the same thing or something different?",
      'answer' => "Yes. Several years ago there were a lot of discussions around Nova 3 and what it would be, but over time, those ideas evolved significantly. To avoid confusion between what had been discussed previously and what was actually being worked on, we chose to use the term \"Nova NextGen\" to differentiate the ideas. For all intents and purposes, Nova 3 and Nova NextGen can now be used interchangeably.",
    ],
    [
      'question' => 'Will I be able to migrate my Nova 2 site to Nova 3?',
      'answer' => "Like the transition from Nova 1 to Nova 2, we'll build scripts to migrate Nova 2 sites to Nova 3. Given the huge changes coming in Nova 3 though, there will be certain things we won't be able to migrate from Nova 2. More information about those items and the migration process will be available at a later date.",
    ],
  ];
@endphp

<a name="faq"></a>
<section
  id="faq"
  aria-labelledby="faq-title"
  class="bg-slate-900"
>
  <div class="mx-auto max-w-7xl px-6 py-24 sm:py-32 lg:py-40 lg:px-8">
    <div class="mx-auto max-w-4xl divide-y divide-white/10">
      <h2 class="text-2xl font-bold leading-10 tracking-tight text-white">Frequently asked questions</h2>
      <dl class="mt-10 space-y-6 divide-y divide-white/10" x-data>
        @foreach ($faqs as $faq)
          <div x-disclosure class="pt-6 cursor-pointer" {{ $loop->first ? 'default-open' : '' }}>
            <dt>
              <div x-disclosure:button class="flex w-full items-start justify-between text-left text-white">
                <span class="text-base font-semibold leading-7">{{ $faq['question'] }}</span>
                <span class="ml-6 flex h-7 items-center text-slate-500">
                  <span x-show="$disclosure.isOpen" x-cloak aria-hidden="true" class="ml-4">
                    @svg('flex-remove-square', 'h-5 w-5 shrink-0')
                  </span>
                  <span x-show="! $disclosure.isOpen" aria-hidden="true" class="ml-4">
                    @svg('flex-add-square', 'h-5 w-5 shrink-0')
                  </span>
                </span>
              </div>
            </dt>
            <dd class="mt-2 pr-12" x-disclosure:panel x-collapse>
              <p class="text-base leading-7 text-slate-300">{{ $faq['answer'] }}</p>
            </dd>
          </div>
        @endforeach
      </dl>
    </div>
  </div>
</section>