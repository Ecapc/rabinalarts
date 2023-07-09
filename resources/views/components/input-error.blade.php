@props(['for'])

@error($for)
    <p {{ $attributes->merge(['class' => 'text-sm text-red-600 dark:text-yellow-400']) }}>{{ $message }}</p>
@enderror
