@props(['disabled' => false])

<select  {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([ 'class' => 'block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm']) !!}></select>
