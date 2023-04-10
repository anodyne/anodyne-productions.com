<select
    @class([
        'border-slate-200 dark:border-slate-200/[15%] focus:border-purple-400 focus:ring-purple-400 dark:focus:border-purple-600 dark:focus:ring-purple-600',
        'form-select block w-full pl-3 pr-10 py-2 text-base bg-white dark:bg-slate-700/50 text-slate-900 dark:text-slate-100 dark:focus:bg-slate-800 focus:outline-none focus:ring-1 rounded-lg shadow-sm',
        $attributes->get('class'),
    ])
    {{ $attributes }}
>
    {{ $slot }}
</select>
