@props([
  'identifier',
  'gradient' => false,
])

<g>
  <path fill-rule="evenodd" clip-rule="evenodd" d="M78.0123 0L0 135.998L19.0963 170H58.6851L38.1926 135.998L117.834 0H78.0123ZM108.52 40.055L178.694 170L197.636 136.321L124.822 9.78012L108.52 40.055ZM55.8883 136.93L74.9846 170H161.616L142.054 133.672H95.9433L118.766 89.89L100.134 54.9582L55.8883 136.93Z" fill="{{ $gradient ? 'url(#paint'.$identifier.'_linear_0_2)' : 'currentColor' }}" />
  <defs>
    <linearGradient id="paint{{ $identifier}}_linear_0_2" x1="0" y1="85" x2="197.636" y2="85" gradientUnits="userSpaceOnUse">
      <stop stop-color="#F2634C"/>
      <stop offset="1" stop-color="#F99C26"/>
    </linearGradient>
  </defs>
</g>